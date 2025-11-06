<?php

class Thesis_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('ksct', true);
    }

    public function totalCount($where='', $tableSet="tbl_thesis")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }


        $this->db->select("count(*) as cnt");
        $this->db->from("tbl_thesis bt");
        $rs = $this->db->get();
        $rows = $rs->row_array();

        return $rows['cnt'];
    }

    public function list($where="", $sPage='', $ePage='', $orderBy=1, $tableSet="tbl_thesis")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }


        if ($orderBy==1) {
            $this->db->order_by('bt.reg_date', 'desc');
        }

        if (strlen($sPage) >= 0 && strlen($ePage) > 0) {
            $this->db->limit($ePage, $sPage);
        }

        $this->db->select("bt.*, count(*) as comment,ifnull(tu2.user_name, bt.name) as b_user_name");
        $this->db->from("tbl_thesis bt");
        $this->db->join("tbl_thesis_comment tc", "bt.no=tc.fk_thesis_no","LEFT");
        $this->db->join("tbl_user tu2", "bt.reg_user_no=tu2.no","LEFT");
        $this->db->join("tbl_thesis_file tf", "tf.fk_thesis_no=bt.no and tf.file_sno=1", "LEFT");
        $this->db->group_by("bt.no");
        $rs = $this->db->get();
        $rows = $rs->result_array();
        return $rows;
    }

    public function adFIview($where="", $tableSet="tbl_thesis")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }


   
        $this->db->order_by('tc.reg_date', 'desc');
        

        $this->db->select("bt.*, tc.*,  bt.reg_date as b_reg_date, bt.reg_user_no as board_user_no, bt.content as board_content, bt.no as thesis_no, tc.no as cno, tc.reg_date as c_reg_date, tc.reg_user_no as c_reg_user_no,ifnull(tu.user_name, tc.reg_user_name) as c_user_name,ifnull(tu2.user_name, bt.name) as b_user_name");
        $this->db->from("tbl_thesis bt");
        $this->db->join("tbl_thesis_comment tc", "bt.no=tc.fk_thesis_no","LEFT");
        $this->db->join("tbl_user tu", "tc.reg_user_no=tu.no","LEFT");
        $this->db->join("tbl_user tu2", "bt.reg_user_no=tu2.no","LEFT");
        //$this->db->join("tbl_thesis_file tf", "tf.fk_thesis_no=bt.no and tf.file_sno=1", "LEFT");

        $rs = $this->db->get();
        $rows = $rs->result_array();
        return $rows;
    }

    ## 글쓰기 저장
    public function store($insertData = [], $tableSet="tbl_thesis")
    {
        $return['rs'] = $this->db->insert($tableSet, $insertData);
        $return['insertNo'] = $this->db->insert_id();
        return $return;
    }

    ## 글쓰기 수정
    public function update($updateData = [], $tableSet="tbl_thesis", $no)
    {
        $this->db->where("no=" . $no);
        $return['rs'] = $this->db->update($tableSet, $updateData);
        $return['insertNo'] = $no;
        return $return;
    }

    ## 글 삭제
    public function delete($no, $tableSet="tbl_thesis")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }

        $rs = $this->db->delete($tableSet, array('no' => $no));
        if($rs) {
            $this->db->delete('tbl_thesis_comment', array('fk_thesis_no'=>$no));
            $this->load->model('thesisFile_m');
            $this->thesisFile_m->deleteFile($no);
        }
        return $rs;
    }

     public function deleteArray($no_list=[], $tableSet="tbl_thesis")
    {
        
       
        foreach($no_list as $no) {

            $rs = $this->db->delete($tableSet, array('no' => $no));
            if($rs) {
                $this->db->delete('tbl_thesis_comment', array('fk_thesis_no'=>$no));
                $this->load->model('thesisFile_m');
                $this->thesisFile_m->deleteFile($no);
            }
        }

        
        return $rs;
    }

    public function save($insertData=[],  $upFile=[])
    {
        $this->db->trans_begin();
        $this->db->insert('tbl_thesis', $insertData);

        $thesis_no = $this->db->insert_id();


        $error_array = $this->db->error();  
        if(empty($error_array['code']) ){
            ## 골프장 저장 성공 - 파일 등록
            if (count($upFile) > 0) {

                $this->load->library('upload');

                $finalFilesData = $this->upload->saveFiles($upFile, 3);
                $error_check = 0;

                if (count($finalFilesData) > 0) {
                    $this->load->model('thesisFile_m');
                    $error_check = $this->thesisFile_m->saveFile($finalFilesData, $thesis_no, []);
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
        return $thesis_no;
    }



    public function modify($updateData=[],$where="", $upFile=[], $oldFileArray=[], $oldFileCheckArray=[], $thesis_no)
    {
        $this->db->where($where);

        $this->db->update('tbl_thesis', $updateData);

        $error_array = $this->db->error();
        if(empty($error_array['code']) ){
            ## 골프장 저장 성공 - 파일 등록
            foreach ($oldFileCheckArray as $index => $value) {
                if (!empty($value)) {
                    @unlink($_SERVER['DOCUMENT_ROOT'] . $oldFileArray[$index]);
                    $this->db->delete('tbl_thesis_file', array('no' => $value));
                }
            }
            if (count($upFile) > 0) {

                $this->load->library('upload');

                $finalFilesData = $this->upload->saveFiles($upFile, 3);
                $error_check = 0;

                if (count($finalFilesData) > 0) {
                    $this->load->model('thesisFile_m');
                    $error_check = $this->thesisFile_m->saveFile($finalFilesData, $thesis_no, $oldFileArray);
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

    public function view($where="", $tableSet="tbl_board")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }


   
        $this->db->order_by('tc.reg_date', 'desc');
        

        $this->db->select("bt.*, bt.name as b_user_name, bt.content as board_content, bt.no as board_no, tc.no as cno, tc.*,  ifnull(tu.user_name, tc.reg_user_name) as user_name");
        $this->db->from("tbl_thesis bt");
        $this->db->join("tbl_thesis_comment tc", "bt.no=tc.fk_thesis_no","LEFT");
        $this->db->join("tbl_user tu", "tc.reg_user_no=tu.no","LEFT");
        //$this->db->join("tbl_thesis_file tf", "tf.fk_thesis_no=bt.no and tf.file_sno=1", "LEFT");

        $rs = $this->db->get();
        $rows = $rs->result_array();
        return $rows;
    }
}