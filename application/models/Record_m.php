<?php
error_reporting(E_ALL);
ini_set("display_errors", 0);
class Record_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('ksct', true);
    }
    

    public function save($insertData=[],  $upFile=[])
    {
        $this->db->trans_begin();
        $this->db->insert('tbl_record', $insertData);

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

    public function list($where="", $sPage='', $ePage='', $orderBy=1, $tableSet="tbl_record")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }


        if ($orderBy==1) {
            $this->db->order_by('reg_date', 'desc');
        }

        if (strlen($sPage) >= 0 && strlen($ePage) > 0) {
            $this->db->limit($ePage, $sPage);
        }

        $this->db->select("a.*");
        $this->db->from("tbl_record a");

        $rs = $this->db->get();
        $rows = $rs->result_array();
        return $rows;
    }



   
}