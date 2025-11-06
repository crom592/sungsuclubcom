<?php
error_reporting(E_ALL);
ini_set("display_errors", 0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("banner_m");
        $this->load->model("bannerFile_m");
        session_start();
        adminChk();
    }


    public function list() 
    {
        $_GET['page'] = $_GET['page'] ? $_GET['page'] : 1;
        $parse_str = parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY);

        parse_str($parse_str, $get);

        $number_per_page = $_GET['number_per_page']?$_GET['number_per_page'] : PAGING_DATA_COUNT;


        if($get['searchText1']) $where.= " and ".$get['searchType1']." like '%".$get['searchText1']."%'";



        $totalRows = $this->banner_m->totalCount($where);


        $data = pagingSet($totalRows, $number_per_page, $_GET['page']);



        $rows = $this->banner_m->list($where, $data['sPoint'], $number_per_page, '1');

        $data['list'] = $rows;

        
        $data['totalRows'] = $totalRows;

        $data['number_per_page'] = $number_per_page;

        $data['param'] = $parse_str;
        
        $this->load->view("/admin/banner/banner_list", $data);
    }

   

    ## 게시판 글쓰기
    public function write()
    {
        checkAdmin();
        $no = $_GET['no'];

        if($no) {
            $where = "bt.no=$no";
            $rows = $this->banner_m->view($where);
            $data['view'] = $rows;
        }

        $parse_str = parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY);

        parse_str($parse_str, $get);

        $data['param'] = $parse_str;

        $where = "fk_banner_no=".$rows[0]['no'];

        $rows = $this->bannerFile_m->getFile($where);
        $data['file'] = $rows;


        $this->load->view("/admin/banner/banner_write", $data);
    }



}