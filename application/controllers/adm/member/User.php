<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('log_errors', 1);
ini_set('error_log', '/home/sungsuclubcom/php_errors.log');
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
        adminChk();
        $this->load->model("user_m");

       
  
    }

    ## 회원 리스트 화면 (프레임 구조)
	public function index()
	{
        $data['frame_url'] = "/secure-admin/member/user/list";
        $this->load->view('admin/frame_index', $data);
	}

    public function list()
    {

        $_GET['page'] = $_GET['page'] ? $_GET['page'] : 1;
        $_GET['sort_by'] = $_GET['sort_by'] ? $_GET['sort_by'] : '1';

        $parse_str = parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY);

        parse_str($parse_str, $get);

        $_GET['user_gubun'] = $_GET['user_gubun'] ? $_GET['user_gubun'] : 'auth';

        $number_per_page = $_GET['number_per_page']?$_GET['number_per_page'] : PAGING_DATA_COUNT;
        //유저타입
        $userTypeRows = $this->user_m->userType();
  
        //회원대쉬보드
        $statisticsRows = $this->user_m->statisticsCount();
        //검색필드

        //리스트시작
        $where = "1=1 ";

        if($get['searchText1']) $where.= " and tu.".$get['searchType1']." like '%".$get['searchText1']."%'";


        $totalRows = $this->user_m->totalCount($where);
        $data = pagingSet($totalRows, $number_per_page, $_GET['page']);

        $rows = $this->user_m->list($where, $data['sPoint'], $number_per_page, $_GET['sort_by']);
        $data['list'] = $rows;

        $data['totalRows'] = $totalRows;
        $data['number_per_page'] = $number_per_page;
        $data['page'] = $_GET['page'];
        $data['type'] = 'user';
        $data['title'] = '회원 리스트';
        $data['param'] = "";

        $data['user_type_list'] = $userTypeRows;
        $data['number_per_page'] = $number_per_page;

        //$data['param'] = $parse_str;
        $data['param'] = "code=".$_GET['code']."&searchText1=".$_GET['searchText1']."&searchType1=".$_GET['searchType1'];

        $this->load->view('admin/members/list', $data);
    }



    public function view()
    {
        if($_GET['user_no']=='') {
            alert('회원번호가 필요합니다');
        }

        $userTypeRows = $this->user_m->userType();

        
        $where = "tu.user_no=".$_GET['user_no'];
        $rows = $this->user_m->list($where, '','', '1');


        $data['user'] = $rows[0];
 
        $this->load->view('admin/members/view', $data);
    }





}
