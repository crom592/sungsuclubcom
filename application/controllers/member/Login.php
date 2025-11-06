<?php
//error_reporting(E_ALL);
date_default_timezone_set('Asia/Seoul');
ini_set("display_errors", 0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model("user_m");
        
    }
    public function delSpecialText($str) {
        return preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $str);
    }

    ## 로그인 화면
    public function index()
    {
        $chkMobile = checkMobile();
 

        if($chkMobile==false) {
            $this->load->view("/members/login");
        } else {
            $this->load->view("/m/members/login");
        }
        
    }

    ## 로그인 인증
    public function auth()
    {
        header('P3P: CP="NOI CURa ADMa DEVa TAIa OUR DELa BUS IND PHY ONL UNI COM NAV INT DEM PRE"');
        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
        $user_pw = isset($_POST['user_pw']) ? $_POST['user_pw'] : '';

        $user_pw = str_replace("'",'',$user_pw);
        $user_pw = str_replace('"','',$user_pw);

        $where = "user_id = '" . $this->delSpecialText($user_id) . "'";
        $where .= " AND user_pwd = '" . $user_pw . "'";
        $where .= " AND exit_yn='N'";

        $rows = $this->user_m->list($where, "");


        if (empty($rows[0]['user_no'])) {
            alert("로그인 실패\\n유효하지 않거나 비밀번호가 다릅니다\\n고객센터에 문의바랍니다.");
        }  else {
            ## 세션 데이터 생성
            $where = "user_id = '" . $user_id . "'";
            $imsi_pwd = md5($user_id);
            $updateData = array('imsi_pwd'=>$imsi_pwd, 'last_login_date'=>date('YmdHis'));
            $this->user_m->update($updateData, $where);
            
            $end_dt = substr($rows[0]['end_dt'], 0,4).'.'.substr($rows[0]['end_dt'], 4,2).'.'.substr($rows[0]['end_dt'], 6,2);
        

            // $sessionArray = array(
            //     '__SS_USER_NO__' => $rows[0]['user_no']
            // , '__SS_USER_ID__' => $rows[0]['user_id']
            // , '__SS_USER_NAME__' => $rows[0]['user_name']
            // , '__SS_USER_TYPE__' => $rows[0]['user_type']
            // );
            // $this->session->set_userdata($sessionArray);

            $_SESSION['__SS_USER_NO__'] = $rows[0]['user_no'];
            $_SESSION['__SS_USER_ID__'] = $rows[0]['user_id'];
            $_SESSION['__SS_IMSI_PWD__'] = $imsi_pwd;
            $_SESSION['__SS_USER_NAME__'] = $rows[0]['user_name'];
            $_SESSION['__SS_USER_NICKNAME__'] = $rows[0]['user_nickname'];
            $_SESSION['__SS_USER_TYPE__'] = $rows[0]['user_type'];
            $_SESSION['__SS_USER_END_DT__'] = $end_dt;


    
            if($_REQUEST['gourl']) goto_url($_REQUEST['gourl']);
            else goto_url("/");
        }
    }
}

