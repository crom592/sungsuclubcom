<? 
$PageNum="1";
$SubNum="1";
$Title="임훈택 시황분석";
include_once $_SERVER['DOCUMENT_ROOT']."/include/include._header.php"; ?>

<div class="board_view_wrap">
	

	<!--View Info-->
    <div class="board_view">
    	<ul class="bw_top">
        	<li class="bw_subject"><img src="../images/market/bi_01.png" /> <img src="../images/market/bi_02.png" /> 게시물의 제목이 들어갑니다.</li>
            <li class="bw_date"><span class="date"><i class="i-calendar-check"></i>2021-11-11</span><span class="count"><i class="i-eye"></i>105</span></li>
        </ul>
        <div class="bw_name"><i class="i-user"></i>임훈택 실장</div>
        <ul class="bw_file">
        	<li><i class="i-bwfile"></i><a href="">1234.zip</a></li>
            <li><i class="i-bwfile"></i><a href="">첨부파일이름.zip</a></li>
        </ul>
        <div class="view_con">
        	게시물의 내용이 들어갑니다.<br />
            나 보기가 역겨워 가실 때에는 말없이 고이 보내드리우리다<br /><br />영변에 약산<br />진달래꽃<br />아름 따다 가실 길에 뿌리우리다<br /><br />가시는 걸음걸음<br />놓인 그 꽃을<br />사뿐히 즈려밟고 가시옵소서
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
            <li class="cw_date">2021-10-20 15:32:54 <a href="javascript:openPop('/board/pop_comment_pw.php','500','350','yes')" class="i-close" title="삭제하기"></a>
            <!--pop_comment_pw.php 레이어팝업-->
            </li>
        </ul>
        <ul class="cw_write">
        	<li class="cwr_id"><input type="text" name="reply_name" placeholder="이름"/> <input type="password" name="reply_pass" placeholder="비밀번호"/></li>
            <li class="cwr_con"><textarea name="reply_contents" cols="" rows=""></textarea></li>
            <li class="cwr_btn"><span class="btn btn2">코멘트 작성</span></li>
        </ul>
        
    
    
    </div>
    <!--//View Comment-->   
    
    
    <div class="btn_wrap"> 
        <a href="market01.php" class="btn btn1 rr">목록</a>
    </div>
    
    <!--View Next-->
    <ul class="board_next">
    	<li><span class="tit i-arrow-up">다음글</span><a href="">다음글의 제목이 들어갑니다.</a></li>
        <li><span class="tit i-arrow-down">이전글</span><a href="">이전글의 제목이 들어갑니다. 이전글의 제목이 들어갑니다.</a></li>    
    </ul>
    <!--//View Next-->
    

</div>

<? include_once $_SERVER['DOCUMENT_ROOT']."/include/include._footer.php"; ?>
 