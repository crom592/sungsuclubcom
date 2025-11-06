<?php
//error_reporting(E_ALL);
ini_set("display_errors", 0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Utube extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model("utube_m");
    }


    public function save()
    {

        if(!$_POST['no']) {
            $insertData = array(
                'title' => strip_tags($_POST['title']),
                'link_url' => strip_tags($_POST['link_url']),
                'reg_date' => date('YmdHis'),
            );



            $no = $this->utube_m->save($insertData, $_FILES);

            alert("등록 되었습니다", "/adm/utube/list");
        } else {

            $no = $_POST['no'];
            $where = "no=$no";

            $updateData = array(
                'title' => $_POST['title'],
                'link_url' => $_POST['link_url'],
                'reg_date' => date('YmdHis'),
            );

            $this->vod_m->modify($updateData, $where, $_FILES, $oldFileArray, $oldFileCheckArray, $board_no);
            alert("수정 되었습니다", "/adm/utube/list");
        }
    }



    public function deleteArray() 
    {
        $no_list = $_POST['no_list'];

        $this->utube_m->deleteArray($no_list);
        echo 1;exit;
    }

    public function delete() 
    {
        $no = $_POST['no'];

        $this->utube_m->delete($no);
        echo 1;exit;
    }

}