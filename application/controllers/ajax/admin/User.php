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

        // SQL Injection 방지: 배열 값 검증 및 이스케이핑
        $no_list = $_POST['no_list'];
        if(is_array($no_list)) {
            $safe_list = array();
            foreach($no_list as $no) {
                if(is_numeric($no)) {
                    $safe_list[] = intval($no);
                }
            }
            if(empty($safe_list)) {
                alert('유효한 회원번호가 없습니다');
            }
            $where = "user_no in (".implode(',', $safe_list).")";
        } else {
            alert('잘못된 요청입니다');
        }

        $updateData = array("user_type"=>intval($_POST['user_type']));
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

        // SQL Injection 방지: user_no를 정수로 변환
        $user_no = intval($_POST['user_no']);
        if($user_no <= 0) {
            alert('유효한 회원번호가 아닙니다');
        }
        
        $where = "user_no=".$user_no;

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
