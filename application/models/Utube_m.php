<?php
error_reporting(E_ALL);
ini_set("display_errors", 0);
class Utube_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('ksct', true);
    }

    public function totalCount($where='', $tableSet="tbl_utube")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }


        $this->db->select("count(*) as cnt");
        $this->db->from("tbl_utube bt");
        $rs = $this->db->get();
        $rows = $rs->row_array();

        return $rows['cnt'];
    }



    public function list($where="", $sPage='', $ePage='', $orderBy=1, $tableSet="tbl_utube")
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

        $this->db->select("bt.*");
        $this->db->from("tbl_utube bt");

        $rs = $this->db->get();
        $rows = $rs->result_array();
        return $rows;
    }

    public function view($where="", $tableSet="tbl_utube")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }


   
        $this->db->order_by('bt.reg_date', 'desc');
        

        $this->db->select("bt.*");
        $this->db->from("tbl_utube bt");

        $rs = $this->db->get();
        $rows = $rs->result_array();
        return $rows;
    }

    ## 글쓰기 저장
    public function store($insertData = [], $tableSet="tbl_utube")
    {
        $return['rs'] = $this->db->insert($tableSet, $insertData);
        $return['insertNo'] = $this->db->insert_id();
        return $return;
    }

    ## 글쓰기 수정
    public function update($updateData = [], $tableSet="tbl_utube", $no)
    {
        $this->db->where("no=" . $no);
        $return['rs'] = $this->db->update($tableSet, $updateData);
        $return['insertNo'] = $no;
        return $return;
    }

    

    public function save($insertData=[],  $upFile=[])
    {
        $this->db->trans_begin();
        $this->db->insert('tbl_utube', $insertData);

        $board_no = $this->db->insert_id();


        $error_array = $this->db->error();  

        if(empty($error_array['code']) ){

            $this->db->trans_commit();

        } else {
            alert("시스템 오류! 관리자에게 문의");
        }
        return $board_no;
    }



    public function modify($updateData=[],$where="", $upFile=[], $oldFileArray=[], $oldFileCheckArray=[], $board_no)
    {
        $this->db->where($where);

        $this->db->update('tbl_utube', $updateData);

        $error_array = $this->db->error();
        if(empty($error_array['code']) ){

            $this->db->trans_commit();

        } else {
            alert("시스템 오류! 관리자에게 문의");
        }
    }

    public function delete($no, $tableSet="tbl_utube")
    {
        if (!empty($where)) {
            $this->db->where($where);
        }

        $rs = $this->db->delete($tableSet, array('no' => $no));

        return $rs;
    }

    public function deleteArray($no_list=[], $tableSet="tbl_utube")
    {
        
       
        foreach($no_list as $no) {

            $rs = $this->db->delete($tableSet, array('no' => $no));
        }

        
        return $rs;
    }


}