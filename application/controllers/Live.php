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
        $this->load->model("user_m");
    }


    public function schedule_run()
    {
        //1번방 확인
        //1 차단대상자인지 확인
        sessionChk(0);
        $where = "1=1 and tu.user_no=".$_SESSION['__SS_USER_NO__'];
        $rows = $this->user_m->list($where, '','', '1');
        if($rows[0]['block_yn']=='Y') {
            alert_close('현재 방송시청을 하실 수 없습니다');
            exit;
        } else {
            $start_date = $rows[0]['start_dt'];
            $end_date = $rows[0]['end_dt'];
            $today = date('Ymd');

            if($rows[0]['is_leader']==1) {

            } else {
                if($today>$end_date) {
                    alert_close('시청기간이 종료되어 방송시청을 하실 수 없습니다');
                    exit;
                }
            }
        
            
        }


        $where = "1=1 and room_no=2";

        if($rows[0]['is_leader']==1) {
            $data['is_leader'] = 10;
        } else {
            $data['is_leader'] = 100;
        }

        $rows = $this->live_m->roomCheck($where);
        $data['room_no'] = $rows['room_no'];
        $data['masterId'] = $rows['masterId'];

        if($data['room_no']) {

            //$delData = array('room_no'=>$data['room_no'],'user_no'=>$_SESSION['__SS_USER_NO__'],'reg_date'=>date('Ymd'));

            $where = "room_no=".$data['room_no']." and user_no=".$_SESSION['__SS_USER_NO__']." and reg_date<='".date('Ymd')."'";
            $this->live_m->delete($where);
         
            $insertData = array('room_no'=>$data['room_no'],'masterId'=>$data['masterId'], 'user_no'=>$_SESSION['__SS_USER_NO__'], 'reg_date'=>date('Ymd'));
            $r = $this->live_m->user_save($insertData);

        }
        $this->load->view("live/schedule_run", $data);
    }


    public function schedule_run2()
    {
        //2번방 확인
        sessionChk(0);
        $where = "1=1 and tu.user_no=".$_SESSION['__SS_USER_NO__'];
        $rows = $this->user_m->list($where, '','', '1');
        if($rows[0]['block_yn']=='Y') {
            alert_close('현재 방송시청을 하실 수 없습니다');
            exit;
        } else {
            $start_date = $rows[0]['start_dt'];
            $end_date = $rows[0]['end_dt'];
            $today = date('Ymd');
            if($rows[0]['is_leader']==1) {

            } else {
                if($today>$end_date) {
                    alert_close('시청기간이 종료되어 방송시청을 하실 수 없습니다');
                    exit;
                }
            }
        }

        $where = "1=1 and room_no=3";

        if($rows[0]['is_leader']==1) {
            $data['is_leader'] = 10;
        } else {
            $data['is_leader'] = 100;
        }
        $rows = $this->live_m->roomCheck($where);
        $data['room_no'] = $rows['room_no'];
        $data['masterId'] = $rows['masterId'];


         if($data['room_no']) {

            $where = "room_no=".$data['room_no']." and user_no=".$_SESSION['__SS_USER_NO__']." and reg_date<='".date('Ymd')."'";
            $this->live_m->delete($where);
         

            $insertData = array('room_no'=>$data['room_no'],'masterId'=>$data['masterId'], 'user_no'=>$_SESSION['__SS_USER_NO__'], 'reg_date'=>date('Ymd'));
            $r = $this->live_m->user_save($insertData);

        }
        $this->load->view("live/schedule_run2", $data);
    }


}