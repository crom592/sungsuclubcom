<? 
$PageNum="5";
$SubNum="1";
$Title="동영상게시판";
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
	<div class="avi_wrap">
        <dl class="avi_list" onclick="openPop('vod01_view.php','400','400','no')">
            <dt class="pic"><img src="/images/board/pic1.png"></dt>
            <dd>
                <ul>
                    <li class="tit">동영상의 제목이 들어갑니다. 동영상의 제목이 들어갑니다. 동영상의 제목이 들어갑니다. 동영상의 제목이 들어갑니다. 동영상의 제목이 들어갑니다. </li>
                    <li class="info"><span class="date"><i class="i-calendar"></i> 등록일 : 2021-12-05</span><span class="count"><i class="i-eye"></i>조회수 : 6</span><span class="time"><i class="i-time"></i>재생시간 : 3시간 30분</span></li>
                </ul>
            </dd>
        </dl>
        <dl class="avi_list" onclick="openPop('vod01_view.php','400','400','no')">
            <dt class="pic"><img src="/images/board/pic1.png"></dt>
            <dd>
                <ul>
                    <li class="tit">동영상의 제목이 들어갑니다. 동영상의 제목이 들어갑니다. 동영상의 제목이 들어갑니다. 동영상의 제목이 들어갑니다. 동영상의 제목이 들어갑니다. </li>
                    <li class="info"><span class="date"><i class="i-calendar"></i> 등록일 : 2021-12-05</span><span class="count"><i class="i-eye"></i>조회수 : 6</span><span class="time"><i class="i-time"></i>재생시간 : 3시간 30분</span></li>
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

<? include_once $_SERVER['DOCUMENT_ROOT']."/include/include._footer.php"; ?>
 