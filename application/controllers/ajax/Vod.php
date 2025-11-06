<?php
//error_reporting(E_ALL);
ini_set("display_errors", 0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Vod extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model("vod_m");
    }

    public function save_comment()
    {
        $insertData = array(
            'fk_board_no' => $_POST['fk_board_no'],
            'reg_user_name' => $_POST['name'],
            'passwd' => $_POST['passwd'],
            'comment' => $_POST['comment'],
            'reg_date' => date('YmdHis'),
            'reg_user_no' => $_SESSION['__SS_USER_NO__']
        );
        $rs = $this->vod_m->store($insertData,'tbl_board_comment');

        if($rs['insertNo']) echo 1;exit;
    }

    public function del_comment()
    {
        if($_SESSION['__SS_USER_NO__']) {
            $delData = array('no'=>$_GET['no'], 'reg_user_no'=>$_SESSION['__SS_USER_NO__']);
            $this->vod_m->delComment($delData, 'tbl_board_comment');
            echo 1;exit;
        }
        
    }

    public function save()
    {

        if(!$_POST['vod_no']) {
            $insertData = array(
                'vod_channel' => $_POST['vod_channel'],
                'vod_title' => $_POST['vod_title'],
                'vod_content' => $_POST['vod_content'],
                'reg_date' => date('YmdHis'),
                'goods_futz_analId' => $_POST['goods_futz_analId'],
                'goods_futz_nickname' => $_POST['goods_futz_nickName'],
                'goods_futz_filename' => $_POST['goods_futz_filename'],
                'goods_futz_bRoom' => $_POST['goods_futz_bRoom'],
                'goods_futz_date' => $_POST['goods_futz_date'],
                'reg_user_no' => $_SESSION['__SS_ADM_NO__'],
                'play_time' => $_POST['play_time']
            );



            $no = $this->vod_m->save($insertData, $_FILES);

            alert("등록 되었습니다", "/adm/vod/list");
        } else {
            for ($i=1; $i < 15; $i++) {
                $oldFileArray[$i] = $_POST['old_file_' . $i];
                $oldFileCheckArray[$i] = $_POST['old_file_check_' . $i];
            }

            $vod_no = $_POST['vod_no'];
            $where = "no=$vod_no";

            $updateData = array(
                'vod_channel' => $_POST['vod_channel'],
                'vod_title' => $_POST['vod_title'],
                'vod_content' => $_POST['vod_content'],
                'reg_date' => date('YmdHis'),
                'goods_futz_analId' => $_POST['goods_futz_analId'],
                'goods_futz_nickname' => $_POST['goods_futz_nickName'],
                'goods_futz_filename' => $_POST['goods_futz_filename'],
                'goods_futz_bRoom' => $_POST['goods_futz_bRoom'],
                'goods_futz_date' => $_POST['goods_futz_date'],
                'reg_user_no' => $_SESSION['__SS_ADM_NO__'],
                'play_time' => $_POST['play_time']
            );

            $this->vod_m->modify($updateData, $where, $_FILES, $oldFileArray, $oldFileCheckArray, $board_no);
            alert("수정 되었습니다", "/adm/vod/list");
        }
    }



    public function deleteArray() 
    {
        $no_list = $_POST['no_list'];

        $this->vod_m->deleteArray($no_list);
        echo 1;exit;
    }

    public function delete() 
    {
        $no = $_POST['no'];

        $this->vod_m->delete($no);
        echo 1;exit;
    }

}