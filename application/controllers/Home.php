<?php
error_reporting(E_ALL);
ini_set("display_errors", 0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model("board_m");
        $this->load->model("vod_m");
        $this->load->model("live_m");
    }

    ## 게시판 리스트
    public function index()
    {

        $_GET['page'] = isset($_GET['page']) ? $_GET['page'] : 1;

        $table = 'tbl_board';

        $orderBy = 1;

        $where = "code='huntaek'";
        $sqlRow = $this->board_m->list($where, 0, 5, $orderBy,  $table);

        $data['huntaek'] = $sqlRow;

        $where = "code='tomorrow'";
        $sqlRow = $this->board_m->list($where, 0, 5, $orderBy,  $table);

        $data['tomorrow'] = $sqlRow;

        $where = "code='corner'";
        $sqlRow = $this->board_m->list($where, 0, 5, $orderBy,  $table);

        $data['corner'] = $sqlRow;

        $where = "code='future'";
        $sqlRow = $this->board_m->list($where, 0, 5, $orderBy,  $table);

        $data['future'] = $sqlRow;

        $where = "code='trading'";
        $sqlRow = $this->board_m->list($where, 0, 5, $orderBy,  $table);

        $data['trading'] = $sqlRow;

        $where = "code='communication'";
        $sqlRow = $this->board_m->list($where, 0, 8, $orderBy,  $table);

        $data['communication'] = $sqlRow;


        $sqlRow = $this->vod_m->list('', 0, 4, $orderBy,  $table);

        $data['vod'] = $sqlRow;

        $date = date('Ymd');

        $where = "reg_date='$date'";

        $sqlRow = $this->live_m->mem_count($where);

        if($sqlRow) {
            foreach($sqlRow as $val) {

                if($val['cnt']>1) {
                    $data['live'][$val['room_no']] = $val['cnt'] + rand(20, 50);
                } else {
                    $data['live'][$val['room_no']] = $val['cnt'];
                }

                
            }

        }
        
     


        $chkMobile = checkMobile();
 

        if($chkMobile==false) {
            $this->load->view("/home", $data);
        } else {

            
            $this->load->view("/m/home", $data);
        }

        
    }

}