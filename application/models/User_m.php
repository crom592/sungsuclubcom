<?php

class User_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('ksct', true);
    }

    ## 회원 전체
    public function statisticsCount($where='')
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $rs = $this->db->query("SELECT 
            sum(if(user_type=1,1,0)) as cnt1,  
            sum(if(user_type=2,1,0)) as cnt2, 
            sum(if(user_type=3,1,0)) as cnt3, 
            sum(if(user_type=4,1,0)) as cnt4, 
            sum(if(user_type=5,1,0)) as cnt5, 
            sum(if(user_type=6,1,0)) as cnt6, 
            sum(if(user_type=7,1,0)) as cnt7, 
            sum(if(user_type=8,1,0)) as cnt8, 
            sum(if(user_type=9,1,0)) as cnt9
            FROM `tbl_user` 
        ");

        $rows = $rs->row_array();

        return $rows;
    }

    public function userType($where='')
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->select("type_no, type_name");
        $rs = $this->db->get("tbl_user_type");

        $this->db->order_by('reg_date', 'desc');

        $rows = $rs->result_array();

        return $rows;
    }


    public function totalCount($where='')
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->select("count(*) as cnt");
        $rs = $this->db->get("tbl_user tu");
        $rows = $rs->row_array();

        return $rows['cnt'];
    }

    ## 회원 목록
    public function list($where="", $sPage='', $ePage='', $orderBy="")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }

        if (strlen($sPage) > 0 && strlen($ePage) > 0) {
            $this->db->limit($ePage, $sPage);
        }
        $this->db->select("tu.*,  tl.start_dt, tl.end_dt, tut.type_name");
        $this->db->from("tbl_user tu");
        $this->db->join("tbl_user_type tut","tu.user_type=tut.type_no", "LEFT");
        $this->db->join("tbl_user_live tl","tu.user_no=tl.user_no", "LEFT");

        if ($orderBy=="1") {
            $this->db->order_by('reg_date', 'desc');
        } else {
            if($orderBy) {
                $oBy = explode(' ', $orderBy);
                $this->db->order_by($oBy[0], $oBy[1]);
            } else {
                $this->db->order_by('user_name', 'asc');
            }
            
        }
        $rs = $this->db->get();
        $rows = $rs->result_array($rs);

        return $rows;
    }

    ## 회원가입
    public function store($insertData = [], $table='tbl_user')
    {
        $rs = $this->db->insert($table, $insertData);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    ## 회원정보 수정
    public function update($updateData, $where, $table='tbl_user')
    {
        if (empty($where) || empty($updateData)) {
            return false;
        }

        $this->db->where($where);
        $rs = $this->db->update($table, $updateData);

   

        return $rs;
    }

    //무료방송청취기간
    public function free_day()
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->select("day_set");
        $rs = $this->db->get("tbl_free_day_set");
        $rows = $rs->row_array();

        return $rows['day_set'];
    }

    public function school_batch($insertData = [])
    {

        $rs = $this->db->insert_batch('tbl_graduated_school ', $insertData);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function delete($no, $tableSet="tbl_user")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }

        $rs = $this->db->delete($tableSet, array('user_no' => $no));

        return $rs;
    }

    public function deleteArray($no_list=[], $tableSet="tbl_user")
    {
        
       
        foreach($no_list as $no) {

            $rs = $this->db->delete($tableSet, array('user_no' => $no));

        }

        
        return $rs;
    }
}