<? include_once $_SERVER['DOCUMENT_ROOT']."/admin/include/include.header.php"; ?>
<body class="ad_in">

<div class="board_view">
    <ul class="bw_top">
        <li class="bw_subject">게시물의 제목이 들어갑니다. 게시물의 제목이 들어갑니다. 게시물의 제목이 들어갑니다. 게시물의 제목이 들어갑니다. </li>
        <li class="bw_date"><span class="date"><i class="i-calendar-check"></i>2021-11-11</span><span class="count"><i class="i-eye"></i>17</span></li>
    </ul>
    <ul class="bw_info">
        <li><i class="i-user"></i><b>작성자</b>관리자</li>
    </ul> 
    <ul class="bw_file">
        <li><i class="i-bwfile"></i><a href="">view_pic.jpg</a></li><!--클릭하면 첨부파일 바로 다운로드-->
    </ul>
    <ul class="view_pic">
        <li><img src="/images/board/pic2.png" ></li>  
        <li><img src="/images/board/pic2.png" ></li>        
    </ul>
    <div class="view_con">
        <p>게시물의 내용이 들어갑니다. 게시물의 내용이 들어갑니다. </p>		
    </div>
    
    <!--Comment-->
    <div class="comment_wrap">
    	<ul class="comment">
        	<li class="cw_name"><i class="i-user"></i>홍길동</li>
            <li class="cw_con">코멘트가 나옵니다. 코멘트가 나옵니다. 코멘트가 나옵니다. </li>
            <li class="cw_date">2021-12-20 15:32:54  <a href="" class="i-close" title="삭제하기"></a></li>
        </ul>
        <ul class="comment">
        	<li class="cw_name"><i class="i-user"></i>홍길순</li>
            <li class="cw_con">본인이 쓴 코멘트의 경우 삭제 버튼이 나옵니다.</li>
            <li class="cw_date">2021-12-20 15:32:54 <a href="" class="i-close" title="삭제하기"></a>
            </li>
        </ul>
        <ul class="cw_write">
        	<li class="cwr_id"><input type="text" name="reply_name" placeholder="이름"> <input type="password" name="reply_pass" placeholder="비밀번호"></li>
            <li class="cwr_con"><textarea name="reply_contents" cols="" rows=""></textarea></li>
            <li class="cwr_btn"><span class="btn btn2">코멘트 작성</span></li>
        </ul>
    </div>
    <!--//Comment-->
    
    <div class="btn_wrap"> 
        <a href="s_notice.php" class="btn btn1 ll">목록</a>
        <a href="" class="btn btn1 rr">수정</a>
        <a href="" class="btn btn1 rr">삭제</a>
    </div>
    
    <ul class="board_next">
    	<li><span class="tit i-arrow-up">이전글</span>이전 글이 없습니다.</li>
        <li><span class="tit i-arrow-down">다음글</span>다음 글이 없습니다.</li>    
    </ul>
</body>    

</body>
</html>
