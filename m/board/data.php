<? 
$PageNum="4";
$SubNum="1";
$Title="선물옵션 분석표";
include_once $_SERVER['DOCUMENT_ROOT']."/m/include/include._header.php"; ?>

<div class="board_list_wrap">
    <ul class="board_search">
    	<li class="bs_select">
            <select>
                <option>제목</option>
                <option>내용</option>
                <option>작성자</option>
            </select>
        </li>
        <li class="bs_in"><input type="text"placeholder=" 검색어를 입력하세요" alt="검색어 입력" value=""></li>
        <li class="bs_btn"><span class="btn" title="검색하기"><i class="i-search"></i></span></li>
    </ul>
    <!--//Search-->
    
	<!--List-->
	<div class="board_list">
	  
    	<ul class="bl_list notice" onclick="location.href='data_view.php';">
        	<li class="bl_num"><i class="i-notice"></i></li>
            <li class="bl_subject">게시판의 공지사항입니다.</li>
            <li class="bl_info">
                <span class="bl_date">2021.12.12.</span>
                <span class="bl_coun"><i class="i-eye"></i>100</span>
            </li>
        </ul>
	    <ul class="bl_list" onclick="location.href='data_view.php';">
        	<li class="bl_num">2</li>
            <li class="bl_subject">게시판의 제목이 들어갑니다. 새로운 게시물은 뉴아이콘이 붙습니다.<i class="new i-new"></i> </li>
            <li class="bl_info">
                <span class="bl_date">2021.12.12.</span>
                <span class="bl_coun"><i class="i-eye"></i>100</span>
            </li>
        </ul>
        <ul class="bl_list" onclick="location.href='data_view.php';">
        	<li class="bl_num">2</li>
            <li class="bl_subject">코멘트의 갯수가 표시됩니다. <span class="comment">[4]</span></li>
            <li class="bl_info">
                <span class="bl_date">2021.12.12.</span>
                <span class="bl_coun"><i class="i-eye"></i>100</span>
            </li>
        </ul>
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