<? 
$PageNum="5";
$SubNum="1";
$Title="유튜브 게시판";
include_once $_SERVER['DOCUMENT_ROOT']."/include/include._header.php"; ?>

<div class="board_list_wrap">

	<!--Search-->
    <ul class="board_search">
    	<li class="bs_select">
            <select id="s_scroll" name="s_scroll">
			<option value="subject">제 목</option>
			<option value="contents">내 용</option>
            </select>
        </li>
        <li class="bs_in"><input type="text" id="s_key" name="s_key" placeholder=" 검색어를 입력하세요" alt="검색어 입력" value=""></li>
        <li class="bs_btn"><span class="btn" title="검색하기" onclick="form1.submit();"><i class="i-search"></i></span></li>
    </ul>
    <!--//Search-->

	<!--List-->
	<div class="gallery_wrap">
    	<div class="gallery" onclick="javascript:SLB_show('new_view.php','iframe', 600, 500, true);">
        	<div class="pic"><img src="../images/board/pic1.png" /></div>
            <ul class="g_con">
            	<li class="g_subject">제목이 들어갑니다. 제목이 들어갑니다.  제목이 들어갑니다.</li>              
                <li class="g_date num">2023-09-10</li>
            </ul>        	
        </div>
        <div class="gallery" onclick="javascript:SLB_show('new_view.php','iframe', 600, 500, true);">
        	<div class="pic"><img src="../images/board/pic1.png" /></div>
            <ul class="g_con">
            	<li class="g_subject">제목이 들어갑니다. 제목이 들어갑니다.  제목이 들어갑니다.</li>              
                <li class="g_date num">2023-09-10</li>
            </ul>        	
        </div>
        <div class="gallery" onclick="javascript:SLB_show('new_view.php','iframe', 600, 500, true);">
        	<div class="pic"><img src="../images/board/pic1.png" /></div>
            <ul class="g_con">
            	<li class="g_subject">제목이 들어갑니다. 제목이 들어갑니다.  제목이 들어갑니다.</li>              
                <li class="g_date num">2023-09-10</li>
            </ul>        	
        </div>
        <div class="gallery" onclick="javascript:SLB_show('new_view.php','iframe', 600, 500, true);">
        	<div class="pic"><img src="../images/board/pic1.png" /></div>
            <ul class="g_con">
            	<li class="g_subject">제목이 들어갑니다. 제목이 들어갑니다.  제목이 들어갑니다.</li>              
                <li class="g_date num">2023-09-10</li>
            </ul>        	
        </div>
        <div class="gallery" onclick="javascript:SLB_show('new_view.php','iframe', 600, 500, true);">
        	<div class="pic"><img src="../images/board/pic1.png" /></div>
            <ul class="g_con">
            	<li class="g_subject">제목이 들어갑니다. 제목이 들어갑니다.  제목이 들어갑니다.</li>              
                <li class="g_date num">2023-09-10</li>
            </ul>        	
        </div>
	</div>
    <!--//List-->
    
    <ul class="pagenation">
        <li class="ar"><i class="i-ar1"></i></li>
        <li class="ar"><i class="i-ar2"></i></li>
        <li class="num on">1</li>
        <li class="num">2</li>
        <li class="num">3</li>
        <li class="num">4</li>
        <li class="num">5</li>
    	<li class="ar"><i class="i-ar3"></i></li>
        <li class="ar"><i class="i-ar4"></i></li>
    </ul>
</div>

<? include_once $_SERVER['DOCUMENT_ROOT']."/include/include._footer.php"; ?>
 