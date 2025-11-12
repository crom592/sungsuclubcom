<?php
date_default_timezone_set('Asia/Seoul');
error_reporting(E_ALL);
ini_set("display_errors", 0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("board_m");
        $this->load->model("boardFile_m");
        session_start();
        adminChk();
    }

    ## 게시판 리스트
    public function index()
    {
        
        $parse_str = parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY);

        parse_str($parse_str, $get);

        $number_per_page = $_GET['number_per_page']?$_GET['number_per_page'] : PAGING_DATA_COUNT;

        $where = "code='notice' and is_notice=0";

        if($get['searchText1']) $where.= " and ".$get['searchType1']." like '%".$get['searchText1']."%'";


        $totalRows = $this->board_m->totalCount($where);
        $data = pagingSet($totalRows, $number_per_page, $_GET['page']);

        $rows = $this->board_m->list($where, $data['sPoint'], $number_per_page, '1');

        $data['list'] = $rows;

        $where = "code='notice' and is_notice=1";
        $rows = $this->board_m->list($where, $data['sPoint'], $number_per_page, '1');
        $data['notice'] = $rows;

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

        $where = "code='".$_GET['code']."'";

        if($get['searchText1']) $where.= " and ".$get['searchType1']." like '%".$get['searchText1']."%'";



        $totalRows = $this->board_m->totalCount($where);


        $data = pagingSet($totalRows, $number_per_page, $_GET['page']);



        $rows = $this->board_m->list($where, $data['sPoint'], $number_per_page, '1');

        $data['list'] = $rows;

        
        $data['totalRows'] = $totalRows;

        $data['number_per_page'] = $number_per_page;

        //$data['param'] = $parse_str;
        $data['param'] = "code=".$_GET['code']."&searchText1=".$_GET['searchText1']."&searchType1=".$_GET['searchType1'];
        $this->load->view("/admin/board/list", $data);
    }

   

    ## 게시판 글쓰기
    public function write()
    {
        $no = $_GET['no'];
        $where = "bt.no=$no";
        $rows = $this->board_m->view($where);
        $data['view'] = $rows;

        $parse_str = parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY);

        parse_str($parse_str, $get);

        $data['param'] = $parse_str;

        $where = "fk_board_no=".$rows[0]['board_no'];

        $rows = $this->boardFile_m->getFile($where);
        $data['file'] = $rows;


        $this->load->view("/admin/board/write", $data);
    }

    public function view()
    {
        $no = $_GET['no'];
        $where = "bt.no=$no";
        $rows = $this->board_m->view($where);
        $data['view'] = $rows;

        $parse_str = parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY);

        parse_str($parse_str, $get);

        $data['param'] = $parse_str;

        $where = "fk_board_no=".$rows[0]['board_no'];

        $rows = $this->boardFile_m->getFile($where);
        $data['file'] = $rows;
      
        $this->load->view("/admin/board/view", $data);
    }


  

}