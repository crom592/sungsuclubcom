<?php
error_reporting(E_ALL);
ini_set("display_errors", 0);
class Banner_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('ksct', true);
    }

    public function totalCount($where='', $tableSet="tbl_banner")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }


        $this->db->select("count(*) as cnt");
        $this->db->from("tbl_banner bt");
        $rs = $this->db->get();
        $rows = $rs->row_array();

        return $rows['cnt'];
    }


    public function list($where="", $sPage='', $ePage='', $orderBy=1, $tableSet="tbl_banner")
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

        $this->db->select("bt.*, tf.file_path");//" tu.user_name as user_name, tu.user_type");
        $this->db->from("tbl_banner bt");
        $this->db->join("tbl_banner_files tf", "tf.fk_banner_no=bt.no and tf.file_sno=1", "LEFT");
        //$this->db->join("tbl_user tu", "tu.user_no=bt.reg_user_no", "LEFT");
        $this->db->group_by("bt.no");
        $rs = $this->db->get();
        $rows = $rs->result_array();
        return $rows;
    }

    public function view($where="", $tableSet="tbl_banner")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }


   
        $this->db->order_by('bt.reg_date', 'desc');
        

        $this->db->select("bt.*, tf.*");
        $this->db->from("tbl_banner bt");

        //$this->db->join("tbl_user tu", "bt.reg_user_no=tu.user_no","LEFT");

        $this->db->join("tbl_banner_files tf", "tf.fk_banner_no=bt.no and tf.file_sno=1", "LEFT");

        $rs = $this->db->get();
        $rows = $rs->result_array();
        return $rows;
    }

    ## 글쓰기 저장
    public function store($insertData = [], $tableSet="tbl_banner")
    {
        $return['rs'] = $this->db->insert($tableSet, $insertData);
        $return['insertNo'] = $this->db->insert_id();
        return $return;
    }

    ## 글쓰기 수정
    public function update($updateData = [], $tableSet="tbl_banner", $no)
    {
        $this->db->where("no=" . $no);
        $return['rs'] = $this->db->update($tableSet, $updateData);
        $return['insertNo'] = $no;
        return $return;
    }

    

    public function save($insertData=[],  $upFile=[])
    {
        $this->db->trans_begin();
        $this->db->insert('tbl_banner', $insertData);

        $board_no = $this->db->insert_id();


        $error_array = $this->db->error();  

        if(empty($error_array['code']) ){
            ##  저장 성공 - 파일 등록
            if (count($upFile) > 0) {

                $this->load->library('upload');

                $finalFilesData = $this->upload->saveFiles($upFile, 3);



                $error_check = 0;

                if (count($finalFilesData) > 0) {
                    $this->load->model('bannerFile_m');
                    $error_check = $this->bannerFile_m->saveFile($finalFilesData, $board_no, []);
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
        return $board_no;
    }



    public function modify($updateData=[],$where="", $upFile=[], $oldFileArray=[], $oldFileCheckArray=[], $board_no)
    {
        $this->db->where($where);

        $this->db->update('tbl_banner', $updateData);

        $error_array = $this->db->error();
        if(empty($error_array['code']) ){
            ## 골프장 저장 성공 - 파일 등록
            foreach ($oldFileCheckArray as $index => $value) {
                if (!empty($value)) {
                    @unlink($_SERVER['DOCUMENT_ROOT'] . $oldFileArray[$index]);
                    $this->db->delete('tbl_banner_files', array('no' => $value));
                }
            }
            if (count($upFile) > 0) {

                $this->load->library('upload');

                $finalFilesData = $this->upload->saveFiles($upFile, 3);
                $error_check = 0;

                if (count($finalFilesData) > 0) {
                    $this->load->model('bannerFile_m');
                    $error_check = $this->bannerFile_m->saveFile($finalFilesData, $board_no, $oldFileArray);
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

    public function delete($no, $tableSet="tbl_banner")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }

        $rs = $this->db->delete($tableSet, array('no' => $no));

        if($rs) {
            $this->bannerFile_m->deleteFile($no);
        }

        return $rs;
    }

    public function deleteArray($no_list=[], $tableSet="tbl_banner")
    {
        

        foreach($no_list as $no) {

            $rs = $this->db->delete($tableSet, array('no' => $no));

            // if($rs) {
            //     $this->bannerFile_m->deleteFile($no);
            // }

        }

        
        return $rs;
    }




}