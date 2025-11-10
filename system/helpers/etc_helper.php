<?php
error_reporting(E_ALL);
ini_set("display_errors", 0);
defined('BASEPATH') OR exit('No direct script access allowed');

function unescape($val)
{
  return urldecode(preg_replace_callback('/%u([[:alnum:]]{4})/', 'unescapeEx', $val));
}
function unescapeEx($val){
  return iconv('UTF-16LE', 'UTF-8', chr(hexdec(substr($val[1], 2, 2))).chr(hexdec(substr($val[1],0,2))));
}
 
function sessionChk($target=1) {
    if (empty($_SESSION['__SS_USER_NO__'])){
        if($target) {
            alert('로그인이 필요합니다.','/member/login/?gourl='.$_SERVER['REQUEST_URI']);
        } else {
            alert_close2('로그인이 필요합니다.','/member/login/?gourl='.$_SERVER['REQUEST_URI']);
        }

    }
}
function adminChk() {
    if($_SESSION['__SS_USER_TYPE__']<9) {
        alert('관리자 로그인을 해주세요', '/secure-admin');
    }
}
function makeDate($date) {
    $this_date = date('Y년 m월 d일',strtotime($date)).' '.WEEK_TEXT[date('w', strtotime($date))].'요일';
    return $this_date;
}
function goto_url($url, $target=1)
{
    if($target==1) {
        echo "<script> location.replace('$url'); </script>";
        exit;
    } else {
        echo "<script>window.close(); opener.location.href='$url'; </script>";
        exit;
    }

}

// 경고메세지를 경고창으로
function alert($msg='', $url='', $target=1)
{
    if (!$msg) $msg = '올바른 방법으로 이용해 주십시오.';

    echo "<script>alert('$msg');";
    if (!$url)
        echo "history.go(-1);";
    echo "</script>";
    if ($url)
        goto_url($url, $target);
    exit;
}

// 경고메세지 후 팝업 닫기
function alert_close($msg='')
{
    if (!$msg) $msg = '올바른 방법으로 이용해 주십시오.';

    echo "<script>
            alert('$msg');
            window.close();
          </script>
         ";
    exit;
}

// 경고메세지 후 팝업 닫기 (부모화면 이동)
function alert_close2($msg='', $url='/')
{
    if (!$msg) $msg = '올바른 방법으로 이용해 주십시오.';
    echo "<script>
            window.opener.location='" . $url ."'; 
            alert('$msg');
            window.close();
          </script>
         ";
    exit;
}

//휴대폰번호 (-)
function phoneConvt($phone='') {
    $phone = preg_replace("/[^0-9]*/s","",$phone); //숫자이외 제거
    if (substr($phone,0,2) =='02' )
        return preg_replace("/([0-9]{2})([0-9]{3,4})([0-9]{4})$/","\\1-\\2-\\3", $phone);

    else if(substr($phone,0,2) =='8' && substr($phone,0,2) =='15' || substr($phone,0,2) =='16'||  substr($phone,0,2) =='18'  )

        return preg_replace("/([0-9]{4})([0-9]{4})$/","\\1-\\2",tel);
    //지능망 번호이면

    else
        return preg_replace("/([0-9]{3})([0-9]{3,4})([0-9]{4})$/","\\1-\\2-\\3" ,$phone);
}

## 페이징 세팅
function pagingSet($totalRows, $pagingDataCount, $page) {

    $pageNum = ceil($totalRows/$pagingDataCount); // 총 페이지
    $nowBlock = ceil($page/PAGING_TOTAL_PAGE);
    $sPage = ($nowBlock * PAGING_TOTAL_PAGE) - (PAGING_TOTAL_PAGE - 1);

    if ($sPage <= 1) {
        $sPage = 1;
    }

    $ePage = $nowBlock*PAGING_TOTAL_PAGE;
    if ($pageNum <= $ePage) {
        $ePage = $pageNum;
    }

    $data['sPage'] = $sPage;
    $data['ePage'] = $ePage;
    $data['pageNum'] = $pageNum;
    $data['sPoint'] = ($page-1) * $pagingDataCount;


    return $data;
}

## 페이징 뷰
function pagingView($url, $sPage, $page, $ePage, $pageNum, $param) {


        if ($sPage - 1 > 0) {
            $view .= "<li class=\"ar\" style='z-index: 0'><a href=\"" . $url .  "?page=1&" .   $param . "\"><i class='i-ar1'></i></a></li>";
            $view .= "<li class=\"ar\" style='z-index: 0'><a href=\"" . $url .  "?page=" . ($sPage-1) . "&" .   $param . "\"><i class='i-ar2'></i></a></li>";
        }
        for($i=$sPage; $i <= $ePage; $i++) {
            $view .= "<li class=\"num " . ( $i == $page ? 'on':'') . "\" style='z-index: 0'><a href=\"" . $url .  "?page=" . $i . "&" . $param . "\">" .  $i ."</a></li>";
        }
        if ($ePage + 1 <= $pageNum) {
            $view .= "<li class=\"ar\" style='z-index: 0'><a href=\"" . $url .  "?page=" . ($ePage+1) . "&" . $param . "\"><i class='i-ar3'></i></a></li>";
            $view .= "<li class=\"ar\" style='z-index: 0'><a href=\"" . $url .  "?page=" . ($pageNum) . "&" . $param . "\"><i class='i-ar4'></i></a></li>";
        }

    echo $view;
}

function coupon_generator($len = 40)
{
    $chars = "ABCDEFGHJKLMNOPQRSTUVWXYZ123456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $str = "";
    while ($i < $len) {
        $num = rand() % strlen($chars);
        $tmp = substr($chars, $num, 1);
        $str .= $tmp;
        $i++;
    }
    
    //$str = preg_replace("/([0-9A-Z]{4})([0-9A-Z]{4})([0-9A-Z]{4})([0-9A-Z]{4})/", "\1-\2-\3-\4", $str);
    //echo $str;
    return $str;
}

function checkLogin()
{
    if (empty($_SESSION['__SS_USER_NO__'])) {
        alert("해당 메뉴는 회원전용입니다.\\n로그인 후 이용바랍니다.", '/');
        exit;
    }
}

function checkAdmin()
{
    if (empty($_SESSION['__SS_ADM_NO__'])) {
        alert("해당 메뉴는 관리자전용입니다.\\n로그인 후 이용바랍니다.", '/');
        exit;
    }
}

function checkMobile()
{
    $mAgent = array("iPhone","iPod","Android","Blackberry", 
            "Opera Mini", "Windows ce", "Nokia", "sony" );
    $chkMobile = false;
    for($i=0; $i<sizeof($mAgent); $i++){

        if(stripos( $_SERVER['HTTP_USER_AGENT'], $mAgent[$i] )){
            $chkMobile = true;
            break;
        }
    }

    return $chkMobile;
}

function filecheck($filename)
{
    if(empty($filename)) {
        return false;
    }

    //확장자확인
    $ext = end(explode('.', $filename));
    $haystack = array('jpg', 'jpeg', 'png', 'gif');

    if(in_array($ext,$haystack)) {
        return true;
    }
    return false;
}
