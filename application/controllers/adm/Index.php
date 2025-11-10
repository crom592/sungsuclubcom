<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_m");
        session_start();
    }

    
    ## Admin Top Frame
    public function top()
    {
        adminChk();
        $this->load->view('admin/include/frame_top');
    }
    
    ## Admin Menu Frame
    public function menu()
    {
        adminChk();
        $this->load->view('admin/include/frame_menu');
    }
    
    ## Admin Main Frame
    public function frame()
    {
        adminChk();
        $data['frame_url'] = '/secure-admin/member/user';
        $this->load->view('admin/frame_index', $data);
    }
}