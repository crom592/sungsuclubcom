<?php
error_reporting(E_ALL);
ini_set("display_errors", 0);
defined('BASEPATH') OR exit('No direct script access allowed');


class Mypage extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();

        $this->load->model("user_m");

    }
    ## 로그인 화면
	public function index()
	{
        sessionChk();

        $where = "user_id = '" . $_SESSION['__SS_USER_ID__'] . "'";



        $rows = $this->user_m->list($where, "");


        $data['user'] = $rows[0];

        $chkMobile = checkMobile();
 

        if($chkMobile==false) {
            $this->load->view('members/mypage_modify.php', $data);

        } else {
            $this->load->view("/m/members/modify.php", $data);
        }

	}

    public function withdrawal()
    {
        sessionChk();

        $chkMobile = checkMobile();
 

        if($chkMobile==false) {
            $this->load->view('members/break.php', $data);

        } else {
            $this->load->view("/m/members/break.php", $data);
        }

    }



}