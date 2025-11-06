<?php
//error_reporting(E_ALL);
date_default_timezone_set('Asia/Seoul');
ini_set("display_errors", 0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Board extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model("board_m");
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
        $rs = $this->board_m->store($insertData,'tbl_board_comment');

        if($rs['insertNo']) echo 1;exit;
    }

    public function del_comment()
    {
        if($_SESSION['__SS_USER_NO__']) {
            $delData = array('no'=>$_GET['no'], 'reg_user_no'=>$_SESSION['__SS_USER_NO__']);
            $this->board_m->delComment($delData, 'tbl_board_comment');
            echo 1;exit;
        }
        
    }

    public function save()
    {

       

        if(!$_POST['board_no']) {

             $code = $_POST['code'];


            $rows = $this->board_m->codeLevel(" code='$code'");
            if ($_SESSION['__SS_USER_TYPE__']<$rows['write_role_level']) {
                alert("권한이 없습니다");
                exit;
            }

            $insertData = array(
                'code' => $_POST['code'],
                'is_notice' => 0,
                'name' => $_POST['name'],
                'passwd' => $_POST['passwd'],
                'view_count' => 1,
                'reg_date' => date('YmdHis'),
                'orderno' => 100,
                'link_url' => '',
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'reg_user_no' => $_SESSION['__SS_USER_NO__'],
                'is_secret' => $_POST['is_secret']?$_POST['is_secret']:0,
                'hphone' => $_POST['user_phone11'].'-'. $_POST['user_phone12'].'-'. $_POST['user_phone13'],
                'email' => $_POST['email']
           
            );

     
            $no = $this->board_m->save($insertData, $_FILES);
            alert("등록 되었습니다", "/board/view?no=$no&code=".$_POST['code']);
        } else {
            $code = $_POST['code'];

            $board_no = $_POST['board_no'];

            $where = "bt.no=$board_no";
            $rows = $this->board_m->view($where);
            $code = $rows[0]['code'];

            $rows = $this->board_m->codeLevel(" code='$code'");
            if ($_SESSION['__SS_USER_TYPE__']<$rows['write_role_level']) {
                alert("권한이 없습니다");
                exit;
            }
            for ($i=1; $i < 15; $i++) {
                $oldFileArray[$i] = $_POST['old_file_' . $i];
                $oldFileCheckArray[$i] = $_POST['old_file_check_' . $i];
            }

            
            $where = "no=$board_no";

            $updateData = array(

                'title' => $_POST['title'],
                'content' => $_POST['content'],
                
            );

            if($_POST['name']) {
               $updateData['name'] = $_POST['name'];
            
            }

            if($_POST['passwd']) {
                $updateData['passwd'] = $_POST['passwd'];
            }

            if($_POST['user_phone11']) {
                $updateData['hphone']  =  $_POST['user_phone11'].'-'. $_POST['user_phone12'].'-'. $_POST['user_phone13'];
            }

            if($_POST['email']) {
                $updateData['email'] = $_POST['email'];
            }


            if($_POST['is_secret']){
                $updateData['is_secret']  = $_POST['is_secret']?$_POST['is_secret']:0;
            }
            

            $this->board_m->modify($updateData, $where, $_FILES, $oldFileArray, $oldFileCheckArray, $board_no);
            alert("수정 되었습니다", "/board/view?no=$board_no&code=".$_POST['code']);
        }
    }

    public function save_admin()
    {
       
        if(!$_POST['board_no']) {
            $insertData = array(
                'code' => $_POST['code'],
                'is_notice' => $_POST['is_notice'],
                'name' => $_POST['name'],
                'passwd' => $_POST['passwd'],
                'view_count' => $_POST['view_count'],
                'reg_date' => $_POST['reg_date'],
                'orderno' => $_POST['orderno'],
                'link_url' => $_POST['link_url'],
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'reg_user_no' => $_SESSION['__SS_ADM_NO__'],
                'is_secret' => $_POST['is_secret']?$_POST['is_secret']:0,
                'hphone' => $_POST['user_phon11'].'-'. $_POST['user_phon12'].'-'. $_POST['user_phon13'],
                'email' => $_POST['email']
           
            );

            $no = $this->board_m->save($insertData, $_FILES);
            alert("등록 되었습니다", "/adm/board/view?no=$no&code=".$_POST['code']);
        } else {
            for ($i=1; $i < 15; $i++) {
                $oldFileArray[$i] = $_POST['old_file_' . $i];
                $oldFileCheckArray[$i] = $_POST['old_file_check_' . $i];
            }


            $board_no = $_POST['board_no'];
            $where = "no=$board_no";

            $updateData = array(
                'code' => $_POST['code'],
                'is_notice' => $_POST['is_notice'],
                'name' => $_POST['name'],
                'passwd' => $_POST['passwd'],
                'view_count' => $_POST['view_count'],
                'orderno' => 100,
                'link_url' => $_POST['link_url'],
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'is_secret' => $_POST['is_secret']?$_POST['is_secret']:0,
                'hphone' => $_POST['user_phon11'].'-'. $_POST['user_phon12'].'-'. $_POST['user_phon13'],
                'email' => $_POST['email']
            );

            $this->board_m->modify($updateData, $where, $_FILES, $oldFileArray, $oldFileCheckArray, $board_no);
            alert("수정 되었습니다", "/adm/board/view?no=$board_no&code=".$_POST['code']);
        }
    }

    public function deleteArray() 
    {
        $no_list = $_POST['no_list'];

        $this->board_m->deleteArray($no_list);
        echo 1;exit;
    }

    public function delete() 
    {
        $no = $_POST['no'];

        $code = $_POST['code'];

        $where = "bt.no=$no";
        $rows = $this->board_m->view($where);
        $code = $rows[0]['code'];

        $rows = $this->board_m->codeLevel(" code='$code'");
        if ($_SESSION['__SS_USER_TYPE__']<$rows['write_role_level']) {
            alert("권한이 없습니다");
            exit;
        }

        $this->board_m->delete($no);
        echo 1;exit;
    }

}