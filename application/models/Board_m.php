<?php
error_reporting(E_ALL);
ini_set("display_errors", 0);
class Board_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('ksct', true);
    }

    public function totalCount($where='', $tableSet="tbl_board")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }


        $this->db->select("count(*) as cnt");
        $this->db->from("tbl_board bt");
        $rs = $this->db->get();
        $rows = $rs->row_array();

        return $rows['cnt'];
    }

    public function codeLevel($where)
    {
        if (!empty($where)) {
            $this->db->where($where);
        }


        $this->db->select("read_role_level, write_role_level, comment_read_role_level, comment_write_role_level");
        $this->db->from("tbl_board_code");
        $rs = $this->db->get();
        $rows = $rs->row_array();

        return $rows;
    }

    public function list($where="", $sPage='', $ePage='', $orderBy=1, $tableSet="tbl_board")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }


        if ($orderBy==1) {
            $this->db->order_by('bt.no', 'desc');
        }

        if (strlen($sPage) >= 0 && strlen($ePage) > 0) {
            $this->db->limit($ePage, $sPage);
        }

        $this->db->select("bt.*, bt.name as reg_name, tu.user_nickname as nickname, ifnull(bt.name,tu.user_nickname) as user_nickname,tu.user_type, count(tc.fk_board_no) as comment, tf.file_path");
        $this->db->from("tbl_board bt");
        $this->db->join("tbl_board_comment tc", "bt.no=tc.fk_board_no","LEFT");
        $this->db->join("tbl_board_file tf", "tf.fk_board_no=bt.no and tf.file_sno=1", "LEFT");
        $this->db->join("tbl_user tu", "tu.user_no=bt.reg_user_no", "LEFT");
        $this->db->group_by("bt.no");
        $rs = $this->db->get();
        $rows = $rs->result_array();
        return $rows;
    }

    public function view($where="", $tableSet="tbl_board")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }


   
        $this->db->order_by('tc.reg_date', 'desc');
        

        $this->db->select("bt.*, bt.reg_date as b_reg_date, bt.reg_user_no as reg_no, ifnull(bt.name, tu2.user_nickname) as b_user_name, tu2.user_nickname, bt.name as reg_name, tu2.user_type, bt.content as board_content, bt.no as board_no, tc.no as cno, tc.*,  ifnull(tu.user_nickname, tc.reg_user_name) as user_name, tc.reg_user_no as c_reg_no");
        $this->db->from("tbl_board bt");
        $this->db->join("tbl_board_comment tc", "bt.no=tc.fk_board_no","LEFT");
        $this->db->join("tbl_user tu", "tc.reg_user_no=tu.user_no","LEFT");
        $this->db->join("tbl_user tu2", "bt.reg_user_no=tu2.user_no","LEFT");
        //$this->db->join("tbl_board_file tf", "tf.fk_board_no=bt.no and tf.file_sno=1", "LEFT");

        $rs = $this->db->get();
        $rows = $rs->result_array();
        return $rows;
    }

    ## 글쓰기 저장
    public function store($insertData = [], $tableSet="tbl_board")
    {
        $return['rs'] = $this->db->insert($tableSet, $insertData);
        $return['insertNo'] = $this->db->insert_id();
        return $return;
    }

    ## 글쓰기 수정
    public function update($updateData = [], $tableSet="tbl_board", $no)
    {
        $this->db->where("no=" . $no);
        $return['rs'] = $this->db->update($tableSet, $updateData);
        $return['insertNo'] = $no;
        return $return;
    }

    

    public function save($insertData=[],  $upFile=[])
    {
        $this->db->trans_begin();
        $this->db->insert('tbl_board', $insertData);

        $board_no = $this->db->insert_id();


        $error_array = $this->db->error();  
        if(empty($error_array['code']) ){
            ##  저장 성공 - 파일 등록
            if (count($upFile) > 0) {

                $this->load->library('upload');

                $finalFilesData = $this->upload->saveFiles($upFile, count($upFile));

                $error_check = 0;

                if (count($finalFilesData) > 0) {
                    $this->load->model('boardFile_m');
                    $error_check = $this->boardFile_m->saveFile($finalFilesData, $board_no, []);
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

        $this->db->update('tbl_board', $updateData);

        $error_array = $this->db->error();
        if(empty($error_array['code']) ){
            ## 골프장 저장 성공 - 파일 등록
            foreach ($oldFileCheckArray as $index => $value) {
                if (!empty($value)) {
                    @unlink($_SERVER['DOCUMENT_ROOT'] . $oldFileArray[$index]);
                    $this->db->delete('tbl_board_file', array('no' => $value));
                }
            }
            if (count($upFile) > 0) {

                $this->load->library('upload');

                $finalFilesData = $this->upload->saveFiles($upFile, 3);
                $error_check = 0;

                if (count($finalFilesData) > 0) {
                    $this->load->model('boardFile_m');
                    $error_check = $this->boardFile_m->saveFile($finalFilesData, $board_no, $oldFileArray);
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

    public function delete($no, $tableSet="tbl_board")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }

        $rs = $this->db->delete($tableSet, array('no' => $no));
        if($rs) {
            $this->db->delete('tbl_board_comment', array('fk_board_no'=>$no));
            $this->load->model('boardFile_m');
            $this->boardFile_m->deleteFile($no);
        }
        return $rs;
    }

    public function deleteArray($no_list=[], $tableSet="tbl_board")
    {
        
       
        foreach($no_list as $no) {

            $rs = $this->db->delete($tableSet, array('no' => $no));
            if($rs) {
                $this->db->delete('tbl_board_comment', array('fk_board_no'=>$no));
                $this->load->model('boardFile_m');
                $this->boardFile_m->deleteFile($no);
            }
        }

        
        return $rs;
    }


    public function updateCount($no)
    {
        $this->db->set('view_count', 'view_count+1', false);
        $this->db->where('no', $no);
        $this->db->update('tbl_board');
    }
    ## 글 삭제
    public function delComment($delData=[], $tableSet="tbl_board_comment")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }

        $rs = $this->db->delete($tableSet, $delData);
        return $rs;
    }
}