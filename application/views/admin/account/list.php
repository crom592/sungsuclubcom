<? include_once $_SERVER['DOCUMENT_ROOT']."/admin/include/include.header.php"; ?>
<body class="ad_in">

<div class="ac_list">
  <h2 class="tit1">결제관리</h2>
    
    <!--Search-->
    <div class="mem_search">
    <table class="td2">
      <tr>
        <th>납부자명/입금자명</th>
        <td><input type="text" class="ipw ipw1"></td>
      </tr>
      <tr>
        <th>기타</th>
        <td>
        <ul class="etc">
        	<li><b>결제방법</b>
            <select class="ipw ipw1">
                <option selected="selected" value="">전체</option>
                <option value="0">무통장 입금</option>
                <option value="1">신용카드 결제</option>
                <option value="8">계좌이체</option>            
            </select>
            </li>
            <li><b>입금상태</b>
            <select class="ipw ipw1">
                <option selected="selected" value="">전체</option>
                <option value="0">입금대기</option>
                <option value="1">임금완료</option>
            </select>
            </li>
            <li><b>회원여부</b>
            <select class="ipw ipw1">
                <option selected="selected" value="">전체</option>
                <option value="1">예</option>
                <option value="0">아니오</option>
            </select>
            </li>
        </ul>
        </td>
      </tr>
      <tr>
        <th>날짜</th>
        <td>
        <select class="ipw">
            <option selected="selected">신청일</option>
            <option value="">납부일</option>
        </select>
        <ul class="select_date">
            <li><i class="i-calendar-check" title="날짜선택"></i><input type="text" class="ipw ipw1" > ~ </li>
            <li><i class="i-calendar-check" title="날짜선택"></i><input type="text" class="ipw ipw1" ></li>
        </ul>
        </td>
      </tr>
    </table>
    <ul class="btn">
    	<li><a class="btn1">검색</a></li>
        <li><a class="btn1">초기화</a></li>
    </ul>
    </div>
    <!--//Search-->
    
    <!--List-->
    <ul class="list_top">
        <li><a class="btn btn2">엑셀로 다운받기</a></li>
        <li class="total">총 결제금액 : <b>518,361,000</b>원 &nbsp;&nbsp; 검색한 결제 수 : <b>10211</b>건 ( 1 / 1022page )</li>
    </ul>
	<table class="board_list td_c">
    <thead>
      <tr>
        <th><input type="checkbox"></th>
        <th>주문번호<br />(납부자이름)</th>
        <th>청구대상</th>
        <th>총액</th>
        <th>결제방법</th>
        <th>입금확인 여부</th>
        <th>납부일 (신청일)</th>
        <th>세부항목</th>
        <th>회계정보</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td class="bl_check"><input type="checkbox" ></td>
          <td class="order_num">123456789<b>(홍길동)</b></td>
          <td>홍길동(정회원(석사과정))<br />이화여자대학교 의류산업학과</td>
          <td>630,000 원</td>
          <td>신용카드 결제</td>
          <td class="bl_yes"><span class="y">확인</span></td>
          <td class="bl_date">2021-11-11<br />
            (2021-11-11)</td>
          <td class="bl_txt">11 page : 230,000 & 급행비 포함 : 230,000원<br />컬러 6 page : 300,000원<br />논문 투고료 : 100,000원</td>
          <td><a href="javascript:openPop('../account/pop_pay.php','1000','700','yes')" class="btn btn1">보기</a></td>
        </tr>
        <tr>
          <td class="bl_check"><input type="checkbox" ></td>
          <td class="order_num">123456789<b>(홍길순)</b></td>
          <td>홍길순(비회원)<br>
          공주대학교</td>
          <td>30,000 원</td>
          <td>신용카드 결제</td>
          <td class="bl_yes"><span class="n">미확인</span></td>
          <td class="bl_date">2021-11-11<br />
            (2021-11-11)</td>
          <td class="bl_txt">분과 워크샵(교수, 일반)<br>
          : 30,000원</td>
          <td><a href="javascript:openPop('../account/pop_pay.php','1000','700','yes')" class="btn btn1">보기</a></td>
        </tr>
        <tr>
          <td class="bl_check"><input type="checkbox" ></td>
          <td class="order_num">123456789<b>(홍길순)</b></td>
          <td>홍길순(비회원)<br>
          공주대학교</td>
          <td>30,000 원</td>
          <td>신용카드 결제</td>
          <td class="bl_yes"><span class="y">확인</span></td>
          <td class="bl_date">2021-11-11<br />
            (2021-11-11)</td>
          <td class="bl_txt">분과 워크샵(교수, 일반)<br>
          : 30,000원</td>
          <td><a href="javascript:openPop('../account/pop_pay.php','1000','700','yes')" class="btn btn1">보기</a></td>
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

</div>

</body>
</html>
