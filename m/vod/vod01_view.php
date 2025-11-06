<? 
$PageNum="5";
$SubNum="1";
$Title="동영상게시판";
include_once $_SERVER['DOCUMENT_ROOT']."/m/include/include._header.php"; ?>

<div class="board_view_wrap vod_view">
	<!--View Info-->
    <div class="board_view">
    	<ul class="bw_top">
        	<li class="bw_subject">게시판의 공지사항입니다. 게시판의 공지사항입니다. </li>
            <li class="bw_date">
                <span class="date"><i class="i-calendar"></i>등록일 : 2021-12-12</span>
                <span class="count"><i class="i-eye"></i>7</span>
                <span class="time"><i class="i-time"></i>재생시간 : 3시간 30분</span>
             </li>
        </ul>
        <div class="view_con">
        	<div class="iframe_w">
			<iframe src="https://www.youtube.com/embed/v3Qx3AiSRuc"></iframe>
            </div>		
		</div>
    </div>
    <!--//View Info--> 
    
    <div class="btn_wrap"> 
        <a href="vod01.php" class="btn btn1">목록</a>
    </div>
    
    <!--View Next-->
    <ul class="board_next">
    	<li><span class="tit i-arrow-up">다음글</span><a href="">다음글의 제목이 들어갑니다.</a></li>
        <li><span class="tit i-arrow-down">이전글</span><a href="">이전글의 제목이 들어갑니다.</a></li>    
    </ul>
    <!--//View Next-->
</div>

<? include_once $_SERVER['DOCUMENT_ROOT']."/m/include/include._footer.php"; ?>
 