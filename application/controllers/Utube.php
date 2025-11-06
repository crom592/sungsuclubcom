<?php
echo "유투브 게시판은 당분간 운영 중지합니다.";
exit;
error_reporting(E_ALL);
ini_set("display_errors", 0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Utube extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model("utube_m");
    }

    ## 게시판 리스트
    public function index()
    {
        $_GET['page'] = $_GET['page'] ? $_GET['page'] : 1;

        $parse_str = parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY);

        parse_str($parse_str, $get);

        $number_per_page = $_GET['number_per_page']?$_GET['number_per_page'] : PAGING_DATA_COUNT;



        if($get['searchText1']) $where.= " and ".$get['searchType1']." like '%".$get['searchText1']."%'";


        $totalRows = $this->utube_m->totalCount($where);
        $data = pagingSet($totalRows, $number_per_page, $_GET['page']);

        $rows = $this->utube_m->list($where, $data['sPoint'], $number_per_page, '1');
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


        if($get['searchText1']) $where.= " and ".$get['searchType1']." like '%".$get['searchText1']."%'";


        $totalRows = $this->utube_m->totalCount($where);
        $data = pagingSet($totalRows, $number_per_page, $_GET['page']);

        $rows = $this->utube_m->list($where, $data['sPoint'], $number_per_page, '1');

        $data['list'] = $rows;

        /*$where = "code='$code' and is_notice=1";
        $rows = $this->utube_m->list($where, $data['sPoint'], $number_per_page, '1');
        $data['notice'] = $rows;*/

        $data['totalRows'] = $totalRows;

        $data['number_per_page'] = $number_per_page;

        $data['param'] = $parse_str;

        $chkMobile = checkMobile();
 
        if($chkMobile==false) {
            $this->load->view("utube/utube_list.php", $data);

        } else {
            $this->load->view("m/utube/utube_list.php", $data);
        }
    }


    public function view()
    {
        //sessionChk();
        $where = 'no='.$_GET['no'];

        $rows = $this->utube_m->view($where);

        $data['view'] = $rows[0];

         $chkMobile = checkMobile();

        if($chkMobile==false) {
            $this->load->view("utube/new_view.php", $data);

        } else {
            $this->load->view("m/utube/new_view.php", $data);
        }


    }


    public function pop_live()
    {
        sessionChk();
        $where = 'vod_no='.$_GET['vod_no'];


        $totalRows = $this->utube_m->totalCount($where);

        $data = pagingSet($totalRows, 1, 1);

        $rows = $this->utube_m->list($where, $data['sPoint'], 1, '1');

        $data['list'] = $rows;

        if($chkMobile==false) {
            $this->load->view("utube/new_pop.php", $data);

        } else {
            $this->load->view("m/utube/new_pop.php", $data);
        }


    }

}