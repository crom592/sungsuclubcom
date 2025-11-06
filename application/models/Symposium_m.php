<?php

class Symposium_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('ksct', true);
    }

    ## 회원 전체
    public function totalCount($where='', $table = "tbl_symposium")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->select("count(*) as cnt");
        $rs = $this->db->get($table);
        $rows = $rs->row_array();

        return $rows['cnt'];
    }

    public function totalUserCount($where='')
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->select("count(*) as cnt");
        $rs = $this->db->get("tbl_symposium_user tsu");
        $rows = $rs->row_array();

        return $rows['cnt'];
    }

    public function getAbs($where="")
    {
        $rs = $this->db->query("
                SELECT no, abs_code, abs_code_name FROM tbl_symposium_abs_code $where order by abs_code
            ");
        $rows = $rs->result_array();

        return $rows;
    }

    public function getOtherSymposium($where="")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        
        $rs = $this->db->query("
                SELECT no, title from tbl_symposium $where order by no desc
            ");
        $this->db->order_by('no', 'desc');
        $rows = $rs->result_array();

        return $rows;
    }
    public function list($where="", $sPage='', $ePage='', $orderBy="")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }


        if ($orderBy=="1") {
            $this->db->order_by('no', 'desc');
        } else {
            $this->db->order_by('reg_date', 'desc');
        }

        if (strlen($sPage) > 0 && strlen($ePage) > 0) {
            $this->db->limit($ePage, $sPage);
        }
        $rs = $this->db->get("tbl_symposium");
        $rows = $rs->result_array();

        return $rows;
    }

    public function userList($where="", $sPage='', $ePage='', $orderBy="")
    {

        if (!empty($where)) {
            $this->db->where($where);
        }


        if (strlen($sPage) > 0 && strlen($ePage) > 0) {
            $this->db->limit($ePage, $sPage);
        }
        $this->db->select("tsu.*, ts.title as sym_title, tu.user_name,tu.user_type, tu.company_name, tu.user_email");
        $this->db->from("tbl_symposium_user tsu");
        $this->db->join("tbl_symposium ts","tsu.fk_symposium_no=ts.no", "LEFT");
        $this->db->join("tbl_user tu","tsu.fk_user_no=tu.no", "LEFT");

        if ($orderBy=="1") {
            $this->db->order_by('tsu.reg_date', 'desc');
        } else {
            $this->db->order_by('tsu.name', 'asc');
        }
        $rs = $this->db->get();
        $rows = $rs->result_array($rs);

        return $rows;
    }

    public function absList($where="", $sPage='', $ePage='', $orderBy="")
    {

        if (!empty($where)) {
            $this->db->where($where);
        }


        if (strlen($sPage) > 0 && strlen($ePage) > 0) {
            $this->db->limit($ePage, $sPage);
        }
        $this->db->select("ta.*, ts.title as sym_title, tu.user_name,tu.user_type, tu.company_name, tu.user_email");
        $this->db->from("tbl_abstract ta");
        $this->db->join("tbl_symposium ts","ta.fk_symposium_no=ts.no", "LEFT");
        $this->db->join("tbl_user tu","ta.fk_user_no=tu.no", "LEFT");


        if ($orderBy=="1") {
            $this->db->order_by('ta.created_date', 'desc');
        } else {
            $this->db->order_by('ta.cak_name', 'asc');
        }
        $rs = $this->db->get();
        $rows = $rs->result_array($rs);

        return $rows;
    }
    ## 회원가입
    public function store($insertData = [], $table="tbl_symposium")
    {
        $rs = $this->db->insert($table, $insertData);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function store_batch($insertData = [])
    {
        $rs = $this->db->insert_batch('tbl_symposium_abs_code', $insertData);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    ## 회원정보 수정
    public function update($updateData, $where, $table="tbl_symposium")
    {
        if (empty($where) || empty($updateData)) {
            return false;
        }

        $this->db->where($where);
        $rs = $this->db->update($table, $updateData);

        return $rs;
    }

    public function addAbs($insertData = [])
    {
        $rs = $this->db->insert('tbl_symposium_abs_code', $insertData);

        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function updateAbs($updateData, $where)
    {
        if (empty($where) || empty($updateData)) {
            return false;
        }

        $this->db->where($where);

        $rs = $this->db->update('tbl_symposium_abs_code', $updateData);

      
        return $rs;
    }

    public function delete($no, $tableSet="tbl_symposium")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }

        $rs = $this->db->delete($tableSet, array('no' => $no));
        return $rs;
    }



    public function saveAbs($insertData=[], $otherData=[], $upFile=[])
    {
        $this->db->trans_begin();
        $this->db->insert('tbl_abstract', $insertData);

        $abstract_no = $this->db->insert_id();

        if($abstract_no) {
            if($otherData[0]['name']) {
                for($i=0;$i<count($otherData);$i++) {
                    $otherData[$i]['fk_abstract_no'] = $abstract_no;
                }

                $this->symposium_m->author_batch($otherData);
            }
            
        }

        $error_array = $this->db->error();
        if(empty($error_array['code']) ){
            ## 골프장 저장 성공 - 파일 등록
            if (count($upFile) > 0) {

                $this->load->library('upload');

                $finalFilesData = $this->upload->saveFiles($upFile, 1);
                $error_check = 0;

                if (count($finalFilesData) > 0) {
                    $this->load->model('abstractFile_m');
                    $error_check = $this->abstractFile_m->saveFile($finalFilesData, $abstract_no, []);
                }
                if ($error_check > 0) {
                    $this->db->trans_rollback();
                    alert("시스템 오류! 관리자에게 문의(파일)");
                } else {
                    $this->db->trans_commit();
                }
            } else {
                $this->db->trans_commit();
            }
        } else {
            alert("시스템 오류! 관리자에게 문의");
        }
    }



    public function modifyAbs($updateData=[], $otherData, $where="", $upFile=[], $oldFileArray=[], $oldFileCheckArray=[], $abstract_no)
    {
        $this->db->where($where);

        $this->db->update('tbl_abstract', $updateData);


        if($abstract_no) {
            $this->db->delete('tbl_abstract_author', array('fk_abstract_no'=>$abstract_no));

            if($otherData[0]['name']) {

                $this->symposium_m->author_batch($otherData);

            }

            
        }

        $error_array = $this->db->error();
        if(empty($error_array['code']) ){
            ## 골프장 저장 성공 - 파일 등록
            foreach ($oldFileCheckArray as $index => $value) {
                if (!empty($value)) {
                    @unlink($_SERVER['DOCUMENT_ROOT'] . $oldFileArray[$index]);
                    $this->db->delete('tbl_abstract_file', array('no' => $value));
                }
            }
            if (count($upFile) > 0) {

                $this->load->library('upload');

                $finalFilesData = $this->upload->saveFiles($upFile, 1);
                $error_check = 0;

                if (count($finalFilesData) > 0) {
                    $this->load->model('abstractFile_m');
                    $error_check = $this->abstractFile_m->saveFile($finalFilesData, $abstract_no, $oldFileArray);
                }
                if ($error_check > 0) {
                    $this->db->trans_rollback();
                    alert("시스템 오류! 관리자에게 문의(파일)");
                } else {
                    $this->db->trans_commit();
                }
            } else {
                $this->db->trans_commit();
            }
        } else {
            alert("시스템 오류! 관리자에게 문의");
        }
    }

    public function author_batch($insertData = [])
    {
        $rs = $this->db->insert_batch('tbl_abstract_author', $insertData);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function authorList($where)
    {
        if (!empty($where)) {
            $this->db->where($where);
        }


        if (strlen($sPage) > 0 && strlen($ePage) > 0) {
            $this->db->limit($ePage, $sPage);
        }
        $this->db->select("ta.*, taa.*");
        $this->db->from("tbl_abstract_author taa");
        $this->db->join("tbl_abstract ta","taa.fk_abstract_no=ta.no", "LEFT");


        if ($orderBy=="1") {
            $this->db->order_by('ta.created_date', 'desc');
        } else {
            $this->db->order_by('ta.cak_name', 'asc');
        }
        $rs = $this->db->get();
        $rows = $rs->result_array($rs);

        return $rows;
    }

}