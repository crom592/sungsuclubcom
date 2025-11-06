<?php
//error_reporting(E_ALL);
ini_set("display_errors", 0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Record extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model("record_m");
    }
    public function saveRecord()
    {
        $userid = $_GET['userid'];
        $title = $_GET['title'];
        $fileName = $_GET['fileName'];
        $stime = $_GET['stime'];
        $etime = $_GET['etime'];
        $vod_type = $_GET['vod_type'];

        $insertData = array(
            "userid" => $userid,
            "title" => $title,
            "filename" => $fileName,
            "stime" => $stime,
            "etime" => $etime,
            "vod_type"=>$vod_type,
            "reg_date" => date("YmdHis")
        );

        if($userid&&$title&&$fileName) {
            $this->record_m->save($insertData);
        }
        
    }
}