<?php
error_reporting(E_ALL);
ini_set("display_errors", 0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Live extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model("live_m");
    }


    public function roomCheck()
    {
        
        //방번호
        $room_no = $_GET['room_no'];
        //강사/관리자 아이디
        $masterId = $_GET['masterId'];
        //방상태
        $status = $_GET['status'];

        $where = "room_no='".$room_no."' and masterId='".$masterId."'";

        if($room_no && $masterId) {
            $rows = $this->live_m->roomCheck($where);


            if($rows['room_no']) {
                $updateData = array('status'=>$status, 'masterId'=>$masterId,'reg_date'=>date('YmdHis'));
                $r = $this->live_m->update($updateData,'tbl_live',$rows['no']);
            } else {
                $insertData = array('room_no'=>$room_no,'masterId'=>$masterId, 'status'=>$status, 'reg_date'=>date('YmdHis'));
                $r = $this->live_m->save($insertData);
          
            }
        }

    }
}