<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->database();
        $this->load->model("user_m");
    }

    ## 로그인 화면
    public function index()
    {
        $this->load->view('admin/index');
    }

    public function delSpecialText($str) {
        return preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $str);
    }

    ## 로그인 처리
    public function check()
    {
        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
        $user_pw = isset($_POST['user_pw']) ? $_POST['user_pw'] : '';

        // SQL Injection 방지: 완전한 이스케이핑 적용
        $user_id = $this->db->escape_str($this->delSpecialText($user_id));
        $user_pw = $this->db->escape_str($user_pw);
        
        $where = "tu.user_id = '" . $user_id . "'";
        $where .= " AND tu.user_pwd = '" . $user_pw . "'";
        $where .= " AND tu.user_type=9";
        //echo $where;exit;
        
        $rows = $this->user_m->list($where, "");


        if (empty($rows[0]['user_no'])) {
            alert("로그인 실패\\n관리자에게 문의 바랍니다.");
        }  else {
            ## 세션 데이터 생성
            /*$sessionArray = array(
                  '__SS_ADM_NO__' => $rows[0]['user_no']
                , '__SS_ADM_ID__' => $rows[0]['user_id']
                , '__SS_ADM_NAME__' => $rows[0]['user_name']

                , '__SS_ADM_TYPE__' => $rows[0]['user_type']
            );
            $this->session->set_userdata($sessionArray);*/

            $where = "user_id = '" . $user_id . "'";
            $where .= " AND user_pwd = '" . $user_pw . "'";

            $updateData = array('last_login_date'=>date('YmdHis'),'last_login_ip'=>$_SERVER["REMOTE_ADDR"]);
            $this->user_m->update($updateData, $where);

            $_SESSION['__SS_ADM_NO__'] = $rows[0]['user_no'];

            $_SESSION['__SS_USER_NO__'] = $rows[0]['user_no'];
            $_SESSION['__SS_USER_ID__'] = $rows[0]['user_id'];
            $_SESSION['__SS_USER_NAME__'] = $rows[0]['user_name'];
            $_SESSION['__SS_USER_TYPE__'] = $rows[0]['user_type'];

            // Admin URL 변경: /adm -> /secure-admin
            alert("로그인 되었습니다", "/secure-admin/member/user");
           

            
        }
    }
}


