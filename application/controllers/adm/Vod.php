<?php
error_reporting(E_ALL);
ini_set("display_errors", 0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Vod extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("vod_m");
        $this->load->model("vodFile_m");
        $this->load->model("record_m");
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



        $totalRows = $this->vod_m->totalCount($where);


        $data = pagingSet($totalRows, $number_per_page, $_GET['page']);



        $rows = $this->vod_m->list($where, $data['sPoint'], $number_per_page, '1');

        $data['list'] = $rows;

        
        $data['totalRows'] = $totalRows;

        $data['number_per_page'] = $number_per_page;

        $data['param'] = $parse_str;
        
        $this->load->view("/admin/vod/vod_list", $data);
    }

   

    ## 게시판 글쓰기
    public function write()
    {
        checkAdmin();
        $no = $_GET['no'];

        if($no) {
            $where = "bt.vod_no=$no";
            $rows = $this->vod_m->view($where);
            $data['view'] = $rows;
        }

        $parse_str = parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY);

        parse_str($parse_str, $get);

        $data['param'] = $parse_str;

        $where = "fk_board_no=".$rows[0]['vod_no'];

        $rows = $this->vodFile_m->getFile($where);
        $data['file'] = $rows;


        $this->load->view("/admin/vod/vod_write", $data);
    }



    public function pop_vodlist()
    {

        /*header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: pre-check=0, post-check=0, max-age=0");
        header("Pragma: no-cache"); 
        //&date=2013-09-25 이후 날짜 검색.
        $siteData['futz_url'] ="http://personal.turing.co.kr/Partner/SungsuClub/VodList.aspx?partnerId=sungsuclub";
        $file_url = fetch_url($siteData['futz_url']); 

        write_file2($_SERVER['DOCUMENT_ROOT']."/futz_xml/xmlVodList.xml", $file_url);
 

        $file = $_SERVER['DOCUMENT_ROOT']."/futz_xml/xmlVodList.xml";               // 불러올 파일명
        $f = fopen( $file, "r" );     // 파일을 열어 '읽기만' 한다. (포인터는 파일의 맨 처음)
        $i=0;
        while ( ( $line = fgets( $f, 4096 ) ) !== false ) {  // 파일이 끝날 때까지 loop
            $filetext[$i] = iconv('utf8','euckr',$line);
            $i++;
        }

        fclose($f);
                        // 파일을 닫는다.
        $data['filetext'] = $filetext;
        $this->load->view("/admin/vod/pop_vodlist", $data);*/

        $where = "1=1 and reg_date between date_add(now(), interval -1 month) and now()";

        $rows = $this->record_m->list($where);
        $data["list"] = $rows;

        $this->load->view("/admin/vod/pop_vodlist", $data);

    }
}