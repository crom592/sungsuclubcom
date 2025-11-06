<?php
error_reporting(E_ALL);
ini_set("display_errors", 0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct()
    {
        parent::__construct();
        session_start();
        
    }


	public function index()
	{
		//Check Mobile

		//IP check
		/*
		if($_SERVER['REMOTE_ADDR'] == '211.60.78.172' || $_SERVER['REMOTE_ADDR']=='128.134.5.42') {
			
		} else {
			echo "작업중입니다";
			exit;
		}
		*/
	
		$mAgent = array("iPhone","iPod","Android","Blackberry", 
		    "Opera Mini", "Windows ce", "Nokia", "sony" );
		$chkMobile = false;
		for($i=0; $i<sizeof($mAgent); $i++){

		    if(stripos( $_SERVER['HTTP_USER_AGENT'], $mAgent[$i] )){
		        $chkMobile = true;
		        break;
		    }
		}

		if($chkMobile) {
			//print_r($_GET['argc']);exit;
			goto_url("/home?device=m");
			
		} else {

			goto_url("/home");
		}
       
        exit;
	}
}
