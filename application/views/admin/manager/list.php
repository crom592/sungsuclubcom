<? include_once $_SERVER['DOCUMENT_ROOT']."/admin/include/include.header.php"; ?>
<body class="ad_in">

<h2 class="tit1">관리자 관리 <u>관리자 명단을 관리할 수 있습니다.</u></h2>
<div class="board_list_wrap members_w">
	
    <!--Search-->
    <ul class="board_search">
    	<li class="bs_tit">검색어</li>
    	<li class="bs_select">
            <select class="ipw">
                <option value="">선택</option>
                <option value="">이름</option>
                <option value="">아이디</option>
            </select>
        </li>
        <li class="bs_in"><input type="text" placeholder="검색어를 입력하세요" class="ipw"></li>
        <li class="bs_btn"><a href="" class="btn btn1">검색하기</a></li>
    </ul>
    <!--//Search-->

    <!--List-->
	<table class="board_list td_c">
    <thead>
      <tr>
        <th><input type="checkbox"></th>
        <th>번호</th>
        <th>아이디</th>
        <th>이름</th>
        <th>로그인 가능</th>
        <th>로그인 실패 횟수</th>
        <th>수정하기</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td class="bl_check"><input type="checkbox" ></td>
          <td class="bl_num">4</td>
          <td class="bl_name">testid</td>
          <td class="bl_name">홍길동</td>
          <td class="bl_yes"><span class="y">가능</span></td>
          <td>3</td>
          <td><a href="modify.php" class="btn btn1">수정하기</a></td>
        </tr>
        <tr>
          <td class="bl_check"><input type="checkbox" ></td>
          <td class="bl_num">3</td>
          <td class="bl_name">testid</td>
          <td class="bl_name">홍길동</td>
          <td class="bl_yes"><span class="n">불가능</span></td>
          <td>1</td>
          <td><a href="modify.php" class="btn btn1">수정하기</a></td>
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
        <a href="write.php" class="btn btn1 rr">관리자 등록</a><!--관리자 등록과 수정하기 페이지의 코딩은 동일-->  
        <a class="btn btn1 rr">선택삭제</a>  
    </div>
</div>

</body>
</html>
