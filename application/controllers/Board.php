<?php
error_reporting(E_ALL);
ini_set("display_errors", 0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model("board_m");
        $this->load->model("boardFile_m");
    }

    ## 게시판 리스트
    public function index()
    {
        $_GET['page'] = $_GET['page'] ? $_GET['page'] : 1;

        $parse_str = parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY);

        parse_str($parse_str, $get);

        $number_per_page = $_GET['number_per_page']?$_GET['number_per_page'] : PAGING_DATA_COUNT;



        if($get['searchText1']) $where.= " and ".$get['searchType1']." like '%".$get['searchText1']."%'";


        $totalRows = $this->board_m->totalCount($where);
        $data = pagingSet($totalRows, $number_per_page, $_GET['page']);

        $rows = $this->board_m->list($where, $data['sPoint'], $number_per_page, '1');
        $data['list'] = $rows;

        $data['totalRows'] = $totalRows;

        $data['number_per_page'] = $number_per_page;

        $data['param'] = $parse_str;
        $this->load->view("board/board01.php", $data);
      
    }
    public function list()
    {
        $_GET['page'] = $_GET['page'] ? $_GET['page'] : 1;

        $parse_str = parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY);

        parse_str($parse_str, $get);

        $number_per_page = $_GET['number_per_page']?$_GET['number_per_page'] : PAGING_DATA_COUNT;

        $code = $_GET['code'];

        // PageNum 설정 (메뉴 선택 상태 표시용)
        if($code=='corner') {
            $_SESSION['PageNum'] = 'corner';
        }

        if($code=='diary' && $_SESSION['__SS_USER_TYPE__']<9) {
            alert("권한이 없습니다");
            exit;
        }

        $where = "code='$code' and is_notice=0";

        if($get['searchText1']) $where.= " and ".$get['searchType1']." like '%".$get['searchText1']."%'";


        $totalRows = $this->board_m->totalCount($where);
        if($code=='communication'){
            $number_per_page = 20;
        }
        $data = pagingSet($totalRows, $number_per_page, $_GET['page']);

        $rows = $this->board_m->list($where, $data['sPoint'], $number_per_page, '1');

        $data['list'] = $rows;

        $where = "code='$code' and is_notice=1";
        $rows = $this->board_m->list($where, $data['sPoint'], $number_per_page, '1');
        $data['notice'] = $rows;

        $data['totalRows'] = $totalRows;

        $data['number_per_page'] = $number_per_page;

        $data['param'] = "code=$code&searchText1=".$_GET['searchText1']."&searchType1=".$_GET['searchType1'];

        /*게시판레벨 알아오기*/
        $rows = $this->board_m->codeLevel(" code='$code'");
        $data['read'] = $rows['read_role_level'];
        $data['write'] = $rows['write_role_level'];
        $data['cwrite'] = $rows['comment_read_role_level'];
        $data['cread'] = $rows['comment_write_role_level'];

        

        $chkMobile = checkMobile();
 

        if($chkMobile==false) {
            $this->load->view("board/board.php", $data);
        } else {
            $this->load->view("m/board/board.php", $data);
        }
    }




    ## 게시판 글쓰기
    public function create()
    {
        $code = $_GET['code'];

        $rows = $this->board_m->codeLevel(" code='$code'");

        if ($_SESSION['__SS_USER_TYPE__']<$rows['write_role_level']) {
            alert("권한이 없습니다");
            exit;
        }

        $data['read'] = $rows['read_role_level'];
        $data['write'] = $rows['write_role_level'];
        $data['cwrite'] = $rows['comment_read_role_level'];
        $data['cread'] = $rows['comment_write_role_level'];

        $paramSet =  "code=" . $code;

        $data['param'] = $paramSet;
        $data['param2'] = $data['param'] . "&page=" . $_GET['page'];
        $this->load->view("board/board_write.php", $data);
    }

    ## 게시판 글수정
    public function edit()
    {
        $board_no = $_GET['board_no'];
        $code = $_GET['code'];

        // if (empty($_SESSION['__SS_USER_ID__'])) {
        //     alert("글수정은 회원서비스 입니다.\\n로그인 후 이용바랍니다.");
        //     exit;
        // }

        if (empty($board_no) || !$_SESSION['__SS_USER_TYPE__']) {
            alert("잘못된 접근입니다.");
            exit;
        }


        $code = $_GET['code'];

        $rows = $this->board_m->codeLevel(" code='$code'");

        if ($_SESSION['__SS_USER_TYPE__']<$rows['write_role_level']) {
            alert("권한이 없습니다");
            exit;
        } else {

            if($_SESSION['__SS_USER_TYPE__']==9){
                $where = "bt.no=$board_no";
            } else {
                $where = "bt.no=$board_no and bt.code='$code' and bt.reg_user_no='".$_SESSION['__SS_USER_NO__']."'";
            }
        }

        $data['read'] = $rows['read_role_level'];
        $data['write'] = $rows['write_role_level'];
        $data['cwrite'] = $rows['comment_read_role_level'];
        $data['cread'] = $rows['comment_write_role_level'];


        $rows = $this->board_m->view($where);

        $data['view'] = $rows[0];

        $where = "fk_board_no=".$rows[0]['board_no'];

        $rows = $this->boardFile_m->getFile($where);
        $data['file'] = $rows;


        $this->load->view("/board/board_write.php", $data);
    }

    public function delete() 
    {
        $no = $_GET['no'];

        $this->board_m->delete($no);
        echo 1;exit;
    }

    ## 게시판 상세
    public function view()
    {


        $rows = $this->board_m->codeLevel(" code='$code'");

        if($rows['read_role_level']>0) {
            if ($_SESSION['__SS_USER_TYPE__']<$rows['read_role_level']) {
                alert("권한이 없습니다");
                exit;
            } 
        }
        

        $no = $_GET['no'];
        $where = "bt.no=$no";
        $rows = $this->board_m->view($where);
        $data['view'] = $rows;

        

        $board_no = $rows[0]['board_no'];
        
        $where = "fk_board_no=".$rows[0]['board_no'];


        $rows = $this->boardFile_m->getFile($where);

        $data['file'] = $rows;

         /*조회수 업데이트*/
        $this->board_m->updateCount($no);

        $data['param'] = 'code='.$_GET['code'].'&board_no='.$board_no.'&page='.$_GET['page'].'&searchType1='.$_GET['searchType1'].'&searchText1='.$_GET['searchText1'];

        $data['param2'] = $data['param'];
      
        $chkMobile = checkMobile();
 

        if($chkMobile==false) {
            $this->load->view("board/board_view", $data);
        } else {
            $this->load->view("m/board/board_view", $data);
        }
    }

    public function save()
    {

        if(!$_POST['board_no']) {
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
                'hphone' => $_POST['user_phon11'].'-'. $_POST['user_phon12'].'-'. $_POST['user_phon13'],
                'email' => $_POST['email']
           
            );

            $no = $this->board_m->save($insertData, $_FILES);
            alert("등록 되었습니다", "/board/view?no=$no&code=".$_POST['code']);
        } else {
            for ($i=1; $i < 15; $i++) {
                $oldFileArray[$i] = $_POST['old_file_' . $i];
                $oldFileCheckArray[$i] = $_POST['old_file_check_' . $i];
            }

            $board_no = $_POST['fk_board_no'];
            $where = "no=$board_no";

            $updateData = array(
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
                'hphone' => $_POST['user_phon11'].'-'. $_POST['user_phon12'].'-'. $_POST['user_phon13'],
                'email' => $_POST['email']
            );

            $this->board_m->modify($updateData, $where, $_FILES, $oldFileArray, $oldFileCheckArray, $board_no);
            alert("수정 되었습니다", "/board/view?no=$board_no&code=".$_POST['code']);
        }

    }


}