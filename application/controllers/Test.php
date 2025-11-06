<?
class Test extends CI_Controller {
	 public function __construct()
	 {
	  parent::__construct();
	   
	  session_start();
	 }
	public function tsession() {

		$_SESSION['test'] = 1234;
		print_r($_SESSION);
	}
}