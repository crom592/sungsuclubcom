<? 
$PageNum="3";
$SubNum="1";
$Title="송도에셋 소통의 장";
include_once $_SERVER['DOCUMENT_ROOT']."/m/include/include._header.php"; ?>

<div class="board_list_wrap">
<!--Search-->
    <ul class="board_search">
    	<li class="bs_select">
            <select id="s_scroll" name="s_scroll">
			<option value="subject">제목</option>
			<option value="contents">내용</option>
			<option value="name">작성자</option>
            </select>
        </li>
        <li class="bs_in"><input type="text"  placeholder=" 검색어를 입력하세요" alt="검색어 입력" value=""></li>
        <li class="bs_btn"><span class="btn" title="검색하기"><i class="i-search"></i></span></li>
    </ul>
    <!--//Search-->

	<!--List-->
	<div class="gallery_wrap">
    
    	<div class="gallery" onclick="location.href='free_view.php';">
        	<div class="pic"><img src="/images/board/pic1.png"></div>
            <ul class="g_con">
            	<li class="g_subject"><a href="free_view.php">제목이 들어갑니다. 제목이 들어갑니다. 제목이 들어갑니다.</a></li>
                <li class="g_name"><i class="i-user"></i> 홍길동</li>
                <li class="g_count num"><i class="i-eye"></i>2</li>
                <li class="g_date num">2021-11-11</li>
            </ul>        	
        </div>
        <div class="gallery" onclick="location.href='free_view.php';">
        	<div class="pic"><img src="/images/board/pic1.png"></div>
            <ul class="g_con">
            	<li class="g_subject"><a href="free_view.php">제목이 들어갑니다.</a></li>
                <li class="g_name"><i class="i-user"></i> 홍길동</li>
                <li class="g_count num"><i class="i-eye"></i>2</li>
                <li class="g_date num">2021-11-11</li>
            </ul>        	
        </div>
        <div class="gallery" onclick="location.href='free_view.php';">
        	<div class="pic"><img src="/images/board/pic1.png"></div>
            <ul class="g_con">
            	<li class="g_subject"><a href="free_view.php">제목이 들어갑니다. </a></li>
                <li class="g_name"><i class="i-user"></i> 홍길동</li>
                <li class="g_count num"><i class="i-eye"></i>2</li>
                <li class="g_date num">2021-11-11</li>
            </ul>        	
        </div>
        <div class="gallery" onclick="location.href='free_view.php';">
        	<div class="pic"><img src="/images/board/pic1.png"></div>
            <ul class="g_con">
            	<li class="g_subject"><a href="free_view.php">제목이 들어갑니다. </a></li>
                <li class="g_name"><i class="i-user"></i> 홍길동</li>
                <li class="g_count num"><i class="i-eye"></i>2</li>
                <li class="g_date num">2021-11-11</li>
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

<? include_once $_SERVER['DOCUMENT_ROOT']."/m/include/include._footer.php"; ?>
 