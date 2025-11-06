<?
if($_GET['code']) {
    switch ($_GET['code']) {
        case 'huntaek':
            $PageNum="1";
            $SubNum="1";
            $Title="시황 및 매매분석";
            break;
        case 'tomorrow':
            $PageNum="1";
            $SubNum="2";
            $Title="명일투자+변곡의 창";
            break;
        case 'communication':
            $PageNum="3";
            $SubNum="1";
            $Title="소통의 장";
            break;
        case 'notice':
            $PageNum="3";
            $SubNum="2";
            $Title="공지사항";
            break;
        case 'vod':
            $PageNum="5";
            $SubNum="1";
            $Title="유튜브게시판";
            break;
        case 'future':
            $PageNum="4";
            $SubNum="1";
            $Title="선물옵션분석표";
            break;
        case 'review':
            $PageNum="6";
            $SubNum="1";
            $Title="교육생 후기";
            break;
        case 'trading':
            $PageNum="6";
            $SubNum="2";
            $Title="통합매매일지";
            break;
        case 'corner':
            $PageNum="6";
            $SubNum="3";
            $Title="진서리코너";
            break;
        case 'diary':
            $PageNum="6";
            $SubNum="4";
            $Title="운영자 Diary";
            break;
        case 'qna':
            $PageNum="qna";
            $SubNum="1";
            $Title="성수클럽 대관안내";
            break;
        default:
            $PageNum="1";
            $SubNum="1";
            $Title="시황 및 매매분석";
            break;
    }
}

?>
<div id="wrap">
    <?include_once APPPATH."views/m/include/include.right.php"; ?>
    
    <!--Body-->
    <div id="body">
    	<? if($PageNum != "main"){ ?>
        <!--Sub Menu-->
        <script>
        $(function(){
        
            $(".b_menu").hide();
            $("a.btn_smenu").click(function() {
                $(".b_menu").slideToggle(200);
            });		
        });
        </script>        
        <div id="body_top">
            <div id="body_tit">
                <div class="ar ll"><a href="javascript:history.go(-1);"><i class="i-angle-left-min"></i></a></div>
                <h3><?=$Title?></h3>
                <? if($SubNum != ""){ ?><div class="ar rr"><a class="btn_smenu"><i class="i-angle-down-min"></i></a></div><?}?>
            </div> 
            <div class="b_menu">
                <ul>
                <?include_once APPPATH."views/m/include/include.topmenu.php"; ?>
                </ul>               
            </div>
        </div>
        <!--//Sub Menu-->
        <? }?>

		<!--Container-->
        <div id="contents" class="<? if($PageNum == "main"){ ?>wapge<? }?>"> 