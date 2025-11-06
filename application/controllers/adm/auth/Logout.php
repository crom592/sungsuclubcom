<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    ## 로그인 화면
    public function index()
    {
        //$this->session->sess_destroy();
        session_destroy();
        echo "<script>alert('로그아웃 되었습니다');parent.location.href='/admin'</script>";
        //alert("로그아웃 되었습니다", "/admin");
    }
}
