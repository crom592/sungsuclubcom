<?
if($_GET['code']) {
    switch ($_GET['code']) {
        case 'huntaek':
            $PageNum="1";
            $SubNum="1";
            $Title="시황 및 매매분석";
            $Contents = "당일 전개된 선물 옵션시장의 흐름과 변곡구간을 풀어헤친 분석";
            break;
        case 'tomorrow':
            $PageNum="1";
            $SubNum="2";
            $Title="명일투자+변곡의 창";
            $Contents = "명일 투자 전략등 옵션으로 보는 선물 상단과 하단의 예상구간 적중 분석";
            break;
        case 'communication':
            $PageNum="3";
            $SubNum="1";
            $Title="소통의 장";
            $Contents = "2008년 입소한 교육 1기생 부터 교육및 활동 강의내용을 드라마처럼 전개한  사진 ";
            break;
        case 'notice':
            $PageNum="3";
            $SubNum="2";
            $Title="공지사항";
            $Contents = "성수클럽 행사및 교육내용등 회원들의 불편사항 을 기록하는 창";
            break;
        case 'vod':
            $PageNum="5";
            $SubNum="1";
            $Title="동영상게시판";
            $Contents = "선물옵션 마감시황 오늘시장의 선물 상단과 하단을 콜 풋양 옵션이 곡점을 이룬 종목을 분석 해드립니다.<br/>대화방 옵션시세표 보는법 터득";
            break;
        case 'future':
            $PageNum="4";
            $SubNum="1";
            $Title="선물옵션분석표";
            $Contents = "주체별 포지션 분석과 옵션행사가를 양 배열하여 월고와 월저가를 비교 시가이후 내일장의 등락을 미리 알수있는 엑셀 보물지도.<br/>로그인후 엑셀을 다운 받으십시요.";
            break;
        case 'review':
            $PageNum="6";
            $SubNum="1";
            $Title="교육생 후기";
            $Contents = "2008 년 이후 입교한 졸업생들의 4주 숙식 교육후 눈물겨운 후기 가족처럼 아끼고 사랑했던 점심 밥상에서 교육까지 ";
            break;
        case 'trading':
            $PageNum="6";
            $SubNum="2";
            $Title="통합매매일지";
            $Contents = "기억은 공포이고 기록은 진실입니다.선물과 옵션의 시 고 저 종 한 종목이라도 기록을 남기십시요 수익이 달라집니다.";
            break;
        case 'corner':
            $PageNum="6";
            $SubNum="3";
            $Title="진서리코너";
            $Contents = "장인수 선생 노량진 대성학원 입시 전문학원에서 강사로 퇴직후 1만여권의 책을읽고 주옥같은 내용 을 선별하여 진서리 코너에 게제하고 있습니다.<br/>내가 이루지 못한꿈 자식에게 읽게 하십시요";
            break;
        case 'diary':
            $PageNum="6";
            $SubNum="4";
            $Title="운영자 Diary";
            $Contents = "운영자 다이어리";
            break;
        case 'qna':
            $PageNum="qna";
            $SubNum="1";
            $Title="산행+강연회 안내";
            $Contents = "24시간 골몰하는 회원들과 산행을 통한 안부등  등산 강연회 일정을 안내합니다";
            break;
        // default:
        //     $PageNum="1";
        //     $SubNum="1";
        //     $Title="시황 및 매매분석";
        //     $Contents = "당일 전개된 선물 옵션시장의 흐름과 변곡구간을 풀어헤친 분석";
        //     break;
    }
}

?>
<body id="main_bg">
    <div id="wrap">
        <!--Topmenu-->
        <? include_once APPPATH."views/include/include.topmenu.php"; ?>
        <!--//Topmenu-->
        
        <div id="sub_w" class="<? if($PageNum == "4" ||$PageNum == "5" || $PageNum == "7"|| $PageNum == "9"||$PageNum == "members" ) { ?>only1dp<? }?>">
            <div id="sub_visual">
                <div class="tit">
                    <?=$Title;?>
                    <u><?=$Contents?></u>
                </div>
            </div>
            <div id="sub_tab_w">
            <? include_once APPPATH."views/include/include.tab.php"; ?>
            </div>
        </div>
        
        <div id="container">
