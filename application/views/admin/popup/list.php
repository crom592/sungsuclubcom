<? include_once $_SERVER['DOCUMENT_ROOT']."/admin/include/include.header.php"; ?>
<body class="ad_in">

<h2 class="tit1">팝업 설정<u>PC버전과 Mobile버전을 각각 따로 등록하셔야 합니다.</u></h2>
<div class="board_list_wrap">
	<!--Search-->
    <ul class="board_search">
    	<li class="bs_tit">검색어</li>
    	<li class="bs_select">
            <select class="ipw">
                <option value="">회원 아이디</option>
                <option value="">회원 이름</option>
            </select>
        </li>
        <li class="bs_in"><input type="text" placeholder="검색어를 입력하세요" alt="검색어 입력" class="ipw"></li>
        <li class="bs_btn"><a href="" class="btn btn1">검색하기</a></li>
    </ul>
    <!--//Search-->

	<!--List-->
	<table class="board_list td_c">
    <thead>
      <tr>
        <th><input type="checkbox" ></th>
        <th>번호</th>
        <th>팝업이름</th>
        <th>팝업기간</th>
        <th>팝업사이즈</th>
        <th>팝업위치</th>
        <th>모드</th>
        <th>진행여부</th>
      </tr>
    </thead>
    <tbody>
        <tr>
           <td class="bl_check"><input type="checkbox"></td>
            <td class="bl_num">2</td>
            <td class="bl_subject"><a href="write.php">팝업의 제목이 들어갑니다.</a></td>
            <td class="bl_date">2021-11-11 ~ 2022-11-22</td>
            <td class="bl_date">400 X 400</td>
            <td class="bl_date">100 X 100</td>
            <td class="bl_pop">PC</td>
            <td class="bl_pop"><span class="tt_b">사용</span></td>
        </tr>
        <tr>
           <td class="bl_check"><input type="checkbox"></td>
            <td class="bl_num">1</td>
            <td class="bl_subject"><a href="write.php">따로 뷰페이지가 없습니다. 제목 클릭시 쓰기페이지의 수정모드로 이동합니다.</a></td>
            <td class="bl_date">2021-11-11 ~ 2022-11-22</td>
            <td class="bl_date"></td>
            <td class="bl_date"></td>
            <td class="bl_pop">Mobile</td>
            <td class="bl_pop"><span class="tt_r">미사용</span></td>
        </tr>
    </tbody>
    </table>
	<!--//List-->
    
    <ul class="pagenation">
   		<li class="ar"><i class="i-ar1"></i></li>
        <li class="ar"><i class="i-ar2"></i></li>
        <li class="num on">1</li>
        <li class="ar"><i class="i-ar3"></i></li>
        <li class="ar"><i class="i-ar4"></i></li>
    </ul> 
    
    <div class="btn_wrap"> 
        <a href="" class="btn btn1 rr">선택삭제</a> 
        <a href="write.php" class="btn btn1 rr">팝업등록</a> 
    </div>

</div>

</body>
</html>
