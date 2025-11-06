<?php
error_reporting(E_ALL);
ini_set("display_errors", 0);
class Live_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('ksct', true);
    }


    public function roomCheck($where)
    {
        if (!empty($where)) {
            $this->db->where($where);
        }


        $this->db->select("room_no, masterId, status");
        $this->db->from("tbl_live");
        $rs = $this->db->get();
        $rows = $rs->row_array();

        return $rows;
    }

    public function mem_count($where='', $tableSet="tbl_live_room")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }


        $this->db->select("room_no, count(*) as cnt");
        $this->db->from("tbl_live_room");
         $this->db->group_by("room_no");
        $rs = $this->db->get();
        $rows = $rs->result_array();

        return $rows;
    }

    public function delete($where, $tableSet="tbl_live_room")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }

        $rs = $this->db->delete($tableSet, $where);
        
        return $rs;
    }



    ## 글쓰기 수정
    public function update($updateData = [], $tableSet="tbl_live", $no)
    {
        $this->db->where("no=" . $no);
        $return['rs'] = $this->db->update($tableSet, $updateData, $where);
        $return['insertNo'] = $no;
        return $return;
    }

    

    public function save($insertData=[],  $upFile=[])
    {
        $this->db->trans_begin();
        $this->db->insert('tbl_live', $insertData);

        $board_no = $this->db->insert_id();


        $error_array = $this->db->error();  

        if(empty($error_array['code']) ){
            ##  저장 성공 - 파일 등록
            
            $this->db->trans_commit();
            return $board_no;
                
           
        } else {
            alert("시스템 오류! 관리자에게 문의");
        }
        return $board_no;
    }

    public function user_save($insertData=[],  $upFile=[])
    {
        $this->db->trans_begin();
        $this->db->insert('tbl_live_room', $insertData);

        $board_no = $this->db->insert_id();


        $error_array = $this->db->error();  

        if(empty($error_array['code']) ){
            ##  저장 성공 - 파일 등록
            
            $this->db->trans_commit();
            return $board_no;
                
           
        } else {
            alert("시스템 오류! 관리자에게 문의");
        }
        return $board_no;
    }




   
}