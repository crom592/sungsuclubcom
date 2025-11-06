<?php
//error_reporting(E_ALL);
ini_set("display_errors", 0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Banner extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model("banner_m");
    }


    public function save()
    {

        if(!$_POST['no']) {
            $insertData = array(
                'title' => $_POST['title'],
                'contents' => $_POST['contents'],
                'reg_date' => date('YmdHis'),
            );

            $no = $this->banner_m->save($insertData, $_FILES);

            alert("등록 되었습니다", "/adm/banner/list");
        } else {
            for ($i=1; $i < 15; $i++) {
                $oldFileArray[$i] = $_POST['old_file_' . $i];
                $oldFileCheckArray[$i] = $_POST['old_file_check_' . $i];
            }

            $vod_no = $_POST['no'];
            $where = "no=$no";

            $updateData = array(
                'title' => $_POST['title'],
                'contents' => $_POST['contents'],
                'reg_date' => date('YmdHis'),
            );

            $this->banner_m->modify($updateData, $where, $_FILES, $oldFileArray, $oldFileCheckArray, $board_no);
            alert("수정 되었습니다", "/adm/banner/list");
        }
    }



    public function deleteArray() 
    {
        $no_list = $_POST['no_list'];

        //print_r($no_list);exit;

        $this->banner_m->deleteArray($no_list);
        echo 1;exit;
    }

    public function delete() 
    {
        $no = $_POST['no'];

        $this->banner_m->delete($no);
        echo 1;exit;
    }

}