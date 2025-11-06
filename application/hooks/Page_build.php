<?php
error_reporting(E_ALL);
ini_set("display_errors", 0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_build extends CI_Controller {

    private $CI;

    function __construct() {

        $this->CI = & get_instance();
    }

    public function index($mode = []) {

        if ($mode[0] == "head") {
            $this->load_header();
        } else {
            $this->load_footer();
        }


    }

    // function yield()
    // {
    //     global $OUT;
    //     $CI =& get_instance();
    //     $output = $CI->output->get_output();

 
    //     $CI->yield = isset($CI->yield) ? $CI->yield : TRUE;
    //     $CI->layout = isset($CI->layout) ? $CI->layout : 'frame_index';
    //     if ($CI->yield === TRUE)
    //     {
    //         if (!preg_match('/(.+).php$/', $CI->layout))
    //         {
    //             $CI->layout .= '.php';
    //         }
    //         $requested = APPPATH . 'views/admin/' . $CI->layout;
    //         $layout = $CI->load->file($requested, true);
    //         $view = str_replace("{yield}", $output, $layout);
    //     }
    //     else
    //     {
    //         $view = $output;
    //     }
    //     $OUT->_display($view);

    // }

    function load_header()
    {
        $mAgent = array("iPhone","iPod","Android","Blackberry", 
            "Opera Mini", "Windows ce", "Nokia", "sony" );
        $chkMobile = false;
        for($i=0; $i<sizeof($mAgent); $i++){

            if(stripos( $_SERVER['HTTP_USER_AGENT'], $mAgent[$i] )){
                $chkMobile = true;
                break;
            }
        }

        if(!empty($this->CI->uri->segment(1)) && $this->CI->uri->segment(1) !== 'ajax') {
        
            if (  ($this->CI->uri->segment(1) !== 'admin' && $this->CI->uri->segment(1) !== 'adm' )) {

                if($chkMobile==false) {
                    $this->CI->load->view('include/header');
                } else {
                    $this->CI->load->view('m/include/header');
                }
                
                
            } else {
                $this->CI->load->view('admin/include/header');
                
            }
        }
    }

    public function load_footer() { 
        $mAgent = array("iPhone","iPod","Android","Blackberry", 
            "Opera Mini", "Windows ce", "Nokia", "sony" );
        $chkMobile = false;
        for($i=0; $i<sizeof($mAgent); $i++){

            if(stripos( $_SERVER['HTTP_USER_AGENT'], $mAgent[$i] )){
                $chkMobile = true;
                break;
            }
        }

        if(!empty($this->CI->uri->segment(1)) && $this->CI->uri->segment(1) !== 'ajax' && $this->CI->uri->segment(1) !== 'utube') {
            if (!empty($this->CI->uri->segment(1)) && ($this->CI->uri->segment(1) !== 'admin' && $this->CI->uri->segment(1) !== 'adm')) {
                if($chkMobile==false) {
                    $this->CI->load->view('include/footer');
                } else {
                    $this->CI->load->view('m/include/footer');
                }
            }
        }
    }
}