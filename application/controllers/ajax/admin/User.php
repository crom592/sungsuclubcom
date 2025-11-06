<?php
error_reporting(E_ALL);
ini_set("display_errors", 0);
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
        adminChk();
        $this->load->model("user_m");

       
  
    }



    public function updateType()
    {

        if($_POST['no_list']=='') {
            alert('회원번호가 필요합니다');
        }

        
        $where = "user_no in (".@implode(',',$_POST['no_list']).")";

        $updateData = array("user_type"=>$_POST['user_type']);
        $rows = $this->user_m->update($updateData, $where);

        if($rows) {
            echo 1;exit;
        } else {
            echo 2;exit;
        }

    }

    public function liveSave()
    {
        $user_no = $_POST['user_no'];

        if($_POST['user_no']=='') {
            alert('회원번호가 필요합니다');
        }

        
        $where = "user_no=".$_POST['user_no'];

        if(!$_POST['old_start_dt']) {
            $insertData = array(
                "user_no"=>$_POST['user_no'],
                "start_dt"=>$_POST['start_dt'],
                "end_dt"=>$_POST['end_dt'],
                "reg_date" => date('YmdHis')
            );
            $rows = $this->user_m->store($insertData, 'tbl_user_live');
        } else {
            $updateData = array(
                "start_dt"=>$_POST['start_dt'],
                "end_dt"=>$_POST['end_dt'],
                "reg_date" => date('YmdHis')
            );
            $rows = $this->user_m->update($updateData, $where, 'tbl_user_live');
        }

        if($_POST['user_pwd']) {
            $updateData = array(
                "user_pwd"=>$_POST['user_pwd']
  
            );
            $rows = $this->user_m->update($updateData, $where, 'tbl_user');
        }

        if($rows) {
            alert("수정 되었습니다", "/adm/member/user/view?user_no=$user_no");
        } else {
            alert("수정에 실패하였습니다", "/adm/member/user/view?user_no=$user_no");
        }

    }
        




}
