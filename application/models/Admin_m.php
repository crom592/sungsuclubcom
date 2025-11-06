<?php

class Admin_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('ksct', true);
    }

    ## 회원 전체
    public function totalCount($where='')
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->select("count(*) as cnt");
        $rs = $this->db->get("tbl_admin");
        $rows = $rs->row_array();

        return $rows['cnt'];
    }

    ## 회원 목록
    public function list($where="", $sPage='', $ePage='', $orderBy="")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }


        if ($orderBy=="1") {
            $this->db->order_by('reg_date', 'desc');
        } else {
            $this->db->order_by('user_name', 'asc');
        }

        if (strlen($sPage) > 0 && strlen($ePage) > 0) {
            $this->db->limit($ePage, $sPage);
        }
        $rs = $this->db->get("tbl_admin");
        $rows = $rs->result_array($rs);

        return $rows;
    }

    ## 회원가입
    public function store($insertData = [])
    {
        $rs = $this->db->insert('tbl_admin', $insertData);
        return $rs;
    }

    ## 회원정보 수정
    public function update($updateData, $where)
    {
        if (empty($where) || empty($updateData)) {
            return false;
        }

        $this->db->where($where);
        $rs = $this->db->update('tbl_admin', $updateData);

        return $rs;
    }
}