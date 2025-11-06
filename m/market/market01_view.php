<? 
$PageNum="1";
$SubNum="1";
$Title="임훈택 시황분석";
include_once $_SERVER['DOCUMENT_ROOT']."/m/include/include._header.php"; ?>

<div class="board_view_wrap">
	<!--View Info-->
    <div class="board_view">
    	<ul class="bw_top">
        	<li class="bw_subject"><span class="market_icon"><img src="/images/market/bi_01.png" /> <img src="/images/market/bi_02.png" /></span> 게시판의 공지사항입니다. 게시판의 공지사항입니다. </li>
            <li class="bw_date"><span class="date"><i class="i-calendar-check"></i>2021-12-09</span><span class="count"><i class="i-eye"></i>3</span></li>
        </ul>
        <div class="bw_name"><i class="i-user"></i>임훈택 실장</div>
        <div class="view_con">
			게시물의 내용이 들어갑니다.			
		</div>
    </div>
    <!--//View Info-->

    <!--View Comment-->
    <div class="comment_wrap">
    	<ul class="comment">
        	<li class="cw_name"><i class="i-user"></i>홍길동</li>
            <li class="cw_con">코멘트가 나옵니다. 코멘트가 나옵니다. 코멘트가 나옵니다. </li>
            <li class="cw_date">2021-10-20 15:32:54</li>
        </ul>
        <ul class="comment">
        	<li class="cw_name"><i class="i-user"></i>홍길순</li>
            <li class="cw_con">본인이 쓴 코멘트의 경우 삭제 버튼이 나옵니다.</li>
            <li class="cw_date">2021-10-20 15:32:54 <a href="javascript:openPop('/m/board/pop_comment_pw.php','500','350','yes')" class="i-close" title="삭제하기"></a></li>
        </ul>
        <ul class="cw_write">
        	<li class="cwr_id"><input type="text" name="reply_name" placeholder="이름"/> <input type="password" name="reply_pass" placeholder="비밀번호"/></li>
            <li class="cwr_con"><textarea name="reply_contents" cols="" rows=""></textarea></li>
            <li class="cwr_btn"><span class="btn btn2">코멘트 작성</span></li>
        </ul>
    </div>
    <!--//View Comment--> 
    
    <div class="btn_wrap"> 
        <a href="market01.php" class="btn btn1">목록</a>
    </div>
    
    <!--View Next-->
    <ul class="board_next">
    	<li><span class="tit i-arrow-up">다음글</span><a href="">다음글의 제목이 들어갑니다.</a></li>
        <li><span class="tit i-arrow-down">이전글</span><a href="">이전글의 제목이 들어갑니다.</a></li>    
    </ul>
    <!--//View Next-->
</div>

<? include_once $_SERVER['DOCUMENT_ROOT']."/m/include/include._footer.php"; ?>
 