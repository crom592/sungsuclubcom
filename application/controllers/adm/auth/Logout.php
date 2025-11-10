<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    ## 로그아웃 처리
    public function index()
    {
        //$this->session->sess_destroy();
        session_destroy();
        // Admin URL 변경: /admin -> /secure-admin
        echo "<script>alert('로그아웃 되었습니다');parent.location.href='/secure-admin'</script>";
        //alert("로그아웃 되었습니다", "/secure-admin");
    }
}
