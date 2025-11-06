<?php
//error_reporting(E_ALL);
ini_set("display_errors", 0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    ## 로그아웃
    public function index()
    {
        //$this->session->sess_destroy();
        session_destroy();
        alert("로그아웃 되었습니다", "/");
    }
}