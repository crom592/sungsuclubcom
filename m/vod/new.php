<? 
$PageNum="5";
$SubNum="1";
$Title="유튜브 게시판";
include_once $_SERVER['DOCUMENT_ROOT']."/m/include/include._header.php"; ?>

<div class="board_list_wrap">
	<!--Search-->
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
    <div class="news_wrap">
		 <dl class="news_list" onclick="javascript:SLB_show('new_view.php','iframe', 300, 400, true);">
        	<dt class="pic"><img src="/images/board/pic1.png" ></dt>
            <dd>
            <ul>
                <li class="tit">제목이 들어갑니다. 제목이 들어갑니다.</li>
                <li class="info">
                    <span class="date"><i class="i-calendar"></i> 등록일 : 2023-10-10</span>
                </li>
            </ul>
            </dd>
        </dl>
        <dl class="news_list" onclick="javascript:SLB_show('new_view.php','iframe', 300, 400, true);">
        	<dt class="pic"><img src="/images/board/pic1.png" ></dt>
            <dd>
            <ul>
                <li class="tit">제목이 들어갑니다. 제목이 들어갑니다.</li>
                <li class="info">
                    <span class="date"><i class="i-calendar"></i> 등록일 : 2023-10-10</span>
                </li>
            </ul>
            </dd>
        </dl>
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
 