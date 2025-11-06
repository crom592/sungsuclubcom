<?php

class Account_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('ksct', true);
    }

    

    public function list($where="", $sPage='', $ePage='', $orderBy=1, $tableSet="tbl_bank")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }



        if (strlen($sPage) >= 0 && strlen($ePage) > 0) {
            $this->db->limit($ePage, $sPage);
        }

        $this->db->select("*");
        $this->db->from("tbl_bank");

  
        $rs = $this->db->get();
        $rows = $rs->result_array();
        return $rows;
    }

    ## 글쓰기 저장
    public function store($insertData = [], $tableSet="tbl_bank")
    {
        $return['rs'] = $this->db->insert($tableSet, $insertData);
        $return['insertNo'] = $this->db->insert_id();
        return $return;
    }

    ## 글쓰기 수정
    public function update($updateData = [], $where, $tableSet="tbl_bank")
    {
        $this->db->where($where);
        $rs = $this->db->update($tableSet, $updateData);
  
        return $rs;
    }



    ## 글 삭제
    public function delete($where, $tableSet="tbl_bank")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }

        $rs = $this->db->delete($tableSet);
        return $rs;
    }
}