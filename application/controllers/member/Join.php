<?php
//error_reporting(E_ALL);
ini_set("display_errors", 0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Join extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model("user_m");
    }

    ## 회원가입 동의 화면
    public function index()
    {

/*        $data = [];
        $files1 = fopen("http://golftong.co.kr/text/agree.txt", "r");
        $data['titleText1'] = "이용약관";

        $files2 = fopen("http://golftong.co.kr/text/privacy.txt", "r");
        $data['titleText2'] = "개인정보취급방침";

        //$files = fopen("http://golftong.net/setting/location.txt", "r");
        //$titleTex = "위치정보동의";
        //break;

        while ($ss = fgets($files1, 1024)) {
            $data['agree_main_calendar'] .= $ss;
        }

        while ($ss = fgets($files2, 1024)) {
            $data['agree_imbak_special'] .= $ss;
        }*/

        $chkMobile = checkMobile();
 

        if($chkMobile==false) {
            $this->load->view("/members/join", $data);

        } else {
            $this->load->view("/m/members/join", $data);
        }

    
    }

    ## 회원가입 폼 화면
    public function join_input()
    {
        /*if ($_SERVER['HTTP_REFERER'] !== $_SERVER['HTTP_ORIGIN'] . '/member/join') {
            alert("정보가 일치하지 않습니다.", "/");
            exit;
        }*/

        $userTypeRows = $this->user_m->userType('');
        $data['user_type_list'] = $userTypeRows;

        $chkMobile = checkMobile();
 

        if($chkMobile==false) {
           $this->load->view("members/join_input", $data);

        } else {
            $this->load->view("/m/members/join_input", $data);
        }
        
    }

    public function join_done()
    {
        $chkMobile = checkMobile();
 

        if($chkMobile==false) {
            $this->load->view("members/join_done", $data);

        } else {
            $this->load->view("m/members/join_done", $data);
        }
        
    }

    ## 회원가입
    public function store()
    {
        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
        $user_pwd = isset($_POST['user_pwd']) ? $_POST['user_pwd'] : '';
        $user_name = isset($_POST['user_name']) ? $_POST['user_name'] : '';
        $user_phone = isset($_POST['user_phone']) ? $_POST['user_phone'] : '';
        $user_birth_y = isset($_POST['user_birth_y']) ? $_POST['user_birth_y'] : '';
        $user_email = isset($_POST['user_email']) ? $_POST['user_email'] : '';
        $user_gender = isset($_POST['user_gender']) ? $_POST['user_gender'] : '';
        $user_nickname = isset($_POST['user_nickname']) ? $_POST['user_nickname'] : '';
        $os_type = isset($_POST['os_type']) ? $_POST['os_type'] : '';
        $user_type = '1';

        if (empty($user_id) || empty($user_nickname) || empty($user_pwd) || empty($user_name) || empty($user_phone) || empty($os_type)) {
            alert("잘못된 접근입니다.");
            return false;
        }

        $requestUrl = API_URL . "/api/member/join/store";
        $param = array(
            "user_id" => $user_id
            ,"user_pwd" => $user_pwd
            ,"user_name" => $user_name
            ,"user_phone" => $user_phone
            ,"user_birth_y" => $user_birth_y
            ,"user_email" => $user_email
            ,"user_gender" => $user_gender
            ,"os_type" => $os_type
            ,"user_type" => $user_type
            ,"user_nickname" => $user_nickname
            ,"exit_yn" => 'N'
            ,"block_yn" => 'N'
        );
        $paramJson = json_encode($param, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
        $rows = fetchData($requestUrl, $paramJson, "POST", "Y");
        $rows['data'] = json_decode($rows['data'], true);


        if ($rows['data']['status'] === false) {
            alert(" 회원가입 실패! 고객센터에 문의해주세요");
        }  else {
            alert("회원가입 되었습니다", "member/step_end");
        }
    }

    ## 회원가입 완료 화면
    public function step3()
    {
        $this->load->view("member/join_step3");
    }

    ## 회원가입 수정폼 화면
    public function edit()
    {
        $requestUrl = API_URL . "/api/member/join/userList";
        $param = "user_no=" . $_SESSION['__SS_USER_NO__'];
        $rows = fetchData($requestUrl, $param, "GET");
        $data['viewData'] = json_decode($rows['data'], true);

        $this->load->view("member/edit", $data);
    }

    ## 회원 수정 처리
    public function update()
    {
        $user_no = isset($_POST['user_no']) ? $_POST['user_no'] : '';
        $join_update_type = isset($_POST['join_update_type']) ? $_POST['join_update_type'] : '';
        $user_phone = isset($_POST['user_phone']) ? $_POST['user_phone'] : '';
        $user_email = isset($_POST['user_email']) ? $_POST['user_email'] : '';
        $user_pwd = isset($_POST['user_pwd']) ? $_POST['user_pwd'] : '';
        $user_nickname = isset($_POST['user_nickname']) ? $_POST['user_nickname'] : '';

        if ($join_update_type == '1') {
            if (empty($user_no) || empty($user_phone)) {
                alert("잘못된 접근입니다.");
                return false;
            }
        } else {
            if (empty($user_pwd)) {
                alert("잘못된 접근입니다.");
                return false;
            }
        }

        $requestUrl = API_URL . "/api/member/join/update";
        $param = array(
            "user_no" => $user_no
            ,"join_update_type" => $join_update_type
            ,"user_phone" => $user_phone
            ,"user_email" => $user_email
            ,"user_pwd" => $user_pwd
            ,"comment" => $comment
            ,"memo" => $memo
            ,"user_nickname" => $user_nickname
        );
        $paramJson = json_encode($param, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
        $rows = fetchData($requestUrl, $paramJson, "PUT", "Y");
        $rows['data'] = json_decode($rows['data'], true);

        if ($join_update_type == '1') {
            if ($rows['data']['status'] === false) {
                alert(" 회원정보 수정 실패! 고객센터에 문의해주세요");
            } else {
                alert("회원정보가 수정되었습니다", "/join/edit");
            }
        } else if ($join_update_type == '2') {
            if ($rows['data']['status'] === false) {
                alert(" 비밀번호 변경 실패! 고객센터에 문의해주세요");
            } else {
                alert("비밀번호가 변경되었습니다", "/password/change");
            }
        } else if ($join_update_type == '3') {
            if ($rows['data']['status'] === false) {
                alert($rows['data']['error']);
            } else {
                alert("처리가 완료 되었습니다", "/logout");
            }
        }
    }

    ## 비밀번호 변경 화면
    public function password_change()
    {
        $data['viewData']['user_no'] = $_SESSION['__SS_USER_NO__'];
        $this->load->view("member/password_change", $data);
    }

    ## 회원탈퇴 화면
    public function withdrawal()
    {
        $data['viewData']['user_no'] = $_SESSION['__SS_USER_NO__'];
        $data['viewData']['user_id'] = $_SESSION['__SS_USER_ID__'];
        $this->load->view("member/withdrawal", $data);
    }
}