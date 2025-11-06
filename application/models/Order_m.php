<?php

class Order_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('ksct', true);
    }

    

    public function list($where="", $sPage='', $ePage='', $orderBy=1, $tableSet="tbl_order1")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }


        if ($orderBy==1) {
            $this->db->order_by('no', 'desc');
        }

        if (strlen($sPage) >= 0 && strlen($ePage) > 0) {
            $this->db->limit($ePage, $sPage);
        }

        $this->db->select("a.*, tf.fee_name, t2.real_price, t2.fk_asked_amount_no");
        $this->db->from("$tableSet a");
        $this->db->join("tbl_order2 t2", "a.no=t2.fk_order_no", "LEFT");
        $this->db->join("tbl_fee tf", "t2.fk_fee_no=tf.no", "LEFT");
   
        $rs = $this->db->get();
        $rows = $rs->result_array();


        return $rows;
    }

    //결제자 확인
    public function confirmPay($where) {
        if (!empty($where)) {
            $this->db->where($where);
        }

        $this->db->select("*");
        $this->db->from("tbl_symposium_user tsu");
        $this->db->join("tbl_fee tf", "tsu.fk_fee_no=tf.no and tf.fee_division=3", "LEFT");
        $this->db->join("tbl_order2 to2", "to2.fk_fee_no=tsu.fk_fee_no", "LEFT");
        $this->db->join("tbl_asked_amount ask", "to2.fk_asked_amount_no=ask.no", "LEFT");
        $rs = $this->db->get();
        $rows = $rs->row_array();

        return $rows;
    }
     public function confirmPayNoUser($where) {
        if (!empty($where)) {
            $this->db->where($where);
        }

        $this->db->select("*");
        $this->db->from("tbl_symposium_user tsu");
        $this->db->join("tbl_fee tf", "tsu.fk_fee_no=tf.no and tf.fee_division=3", "LEFT");
        $this->db->join("tbl_asked_amount ask", "tsu.no_user_cookie_id=ask.no_user_cookie_id", "LEFT");
        $this->db->join("tbl_order2 to2", "to2.fk_asked_amount_no=ask.no", "LEFT");
        
        $rs = $this->db->get();
        $rows = $rs->row_array();

        return $rows;
    }

    ## 글쓰기 저장
    public function store($insertData = [], $tableSet="tbl_order1")
    {
        $return['rs'] = $this->db->insert($tableSet, $insertData);
        $return['insertNo'] = $this->db->insert_id();
        return $return;
    }

    public function store_batch($insertData = [])
    {
        $rs = $this->db->insert_batch('tbl_order2', $insertData);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    ## 글쓰기 수정
    public function update($updateData = [], $where, $tableSet="tbl_order1")
    {
        $this->db->where($where);
    
        $rs = $this->db->update($tableSet, $updateData);
  
        return $rs;
    }



    ## 글 삭제
    public function delete($where, $tableSet="tbl_order1")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }

        $rs = $this->db->delete($tableSet);
        return $rs;
    }
}