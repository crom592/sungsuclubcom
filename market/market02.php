<? 
$PageNum="1";
$SubNum="2";
$Title="명일투자전략";
include_once $_SERVER['DOCUMENT_ROOT']."/include/include._header.php"; ?>

<div class="board_list_wrap">
    <ul class="board_search">
    	<li class="bs_select">
            <select id="s_scroll" name="s_scroll">
            <option value="subject">제목</option>
            <option value="contents">내용</option>
            <option value="name">작성자</option>
            </select>
        </li>
        <li class="bs_in"><input type="text" id="s_key" name="s_key" placeholder=" 검색어를 입력하세요" alt="검색어 입력" value=""></li>
        <li class="bs_btn"><span class="btn" title="검색하기"><i class="i-search"></i></span></li>
    </ul>
    
	<table class="board_list" summary="공지사항">
    <thead>
      <tr>
        <th>번호</th>
        <th>제목</th>
        <th>작성자</th>
        <th>등록일</th>
        <th>조회수</th>
      </tr>
    </thead>
    <tbody>
        <tr class="notice">
            <td class="bl_notice"><i class="i-notice"></i></td>
            <td class="bl_subject"><a href="market02_view.php">대화방 입장이 안될때 처리방법</a><span class="comment">[4]</span> <i class="new i-new"></i></td>
            <td class="bl_name">홍길동</td>
            <td class="bl_date">2021-11-11</td>
            <td class="bl_coun">152</td>
        </tr>
        <tr>
            <td class="bl_num">4</td>
            <td class="bl_subject"><a href="market02_view.php">새로운 게시물에는 new라는 표시가 나옵니다.</a><i class="new i-new"></i></td>
            <td class="bl_name">홍길동</td>
            <td class="bl_date">2021-11-11</td>
            <td class="bl_coun">152</td>
        </tr>
        <tr>
            <td class="bl_num">3</td>
            <td class="bl_subject"><a href="market02_view.php">트리워칭만기 양방으로 10-20배주다</a></td>
            <td class="bl_name">홍길동</td>
            <td class="bl_date">2021-11-11</td>
            <td class="bl_coun">152</td>
        </tr>
        <tr>
            <td class="bl_num">2</td>
            <td class="bl_subject"><a href="market02_view.php">2019년12월 만기콜옵션280의1박2일</a><span class="comment">[4]</span> <i class="new i-new"></i></td>
            <td class="bl_name">홍길동</td>
            <td class="bl_date">2021-11-11</td>
            <td class="bl_coun">152</td>
        </tr>
        <tr>
            <td class="bl_num">1</td>
            <td class="bl_subject"><a href="market02_view.php">추리는 과학을 이기지못했다(08-08만기)</a></td>
            <td class="bl_name">홍길동</td>
            <td class="bl_date">2021-11-11</td>
            <td class="bl_coun">152</td>
        </tr>
    </tbody>
    </table>    
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
 