<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_m");
        session_start();
        adminChk();
    }

    ## 로그인 화면
	public function index()
	{
		$this->load->view('admin/index');
	}

    ## 로그인 처리
    public function check()
    {
        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
        $user_pw = isset($_POST['user_pw']) ? $_POST['user_pw'] : '';

        $where = "user_id = '" . $user_id . "'";
       
        $where .= " AND user_pw = '" . md5($user_pw) . "'";
        
        $rows = $this->user_m->list($where, "");

        if (empty($rows[0]['user_no'])) {
            alert("로그인 실패\\n관리자에게 문의 바랍니다.");
        }  else {
            ## 세션 데이터 생성
            $sessionArray = array(
                  '__SS_USER_NO__' => $rows[0]['user_no']
                , '__SS_USER_ID__' => $rows[0]['user_id']
                , '__SS_USER_NAME__' => $rows[0]['user_name']
                , '__SS_USER_TYPE__' => $rows[0]['user_type']
            );
            $this->session->set_userdata($sessionArray);

            alert("로그인 되었습니다", "/adm/member/user");
            

            
        }
    }
}