<? include_once $_SERVER['DOCUMENT_ROOT']."/admin/include/include.header.php"; ?>
<body class="popw">
	<ul class="top">
    	<li class="name">홍길동 (정회원-일반)</li>
        <li class="info"><i class="i-flag"></i> 이화여자대학교</li>
        <li class="email"><i class="i-mail"></i> testid@naver.com</a></li>
        <li class="login"><i class="i-lock"></i> 해당회원으로 홈페이지 로그인</li>
        <a href="javascript:window.close()" class="close"><i class="i-close"></i></a>
    </ul>
    <div class="con">
    	<h2 class="tit tit1"><i class="i-user-plus"></i> 회계정보 <div class="btn"><a class="btn2" href="../members/pop_modify.php">회원정보</a></div>
        </h2>
        <ul class="sub_tab">
        	<li><a href="pop_nopay.php">미납내역</a></li>
            <li class="on"><a href="pop_pay.php">결제내역</a></li>
        </ul>
        <!--Contents-->
        <div class="nopay_w">
        	<div class="status">
            	<b>홍길동</b>님의 결제내역
                <select class="ipw ipw1">
                    <option selected="selected">전체</option>
                    <option>연회비</option>
                    <option>구독료</option>
                    <option>임원회비</option>
                    <option>학술대회비</option>
                    <option>논문심사료</option>
                    <option>입회비</option>
                    <option>기타회비</option>
                </select>
            </div>
           
            <div class="pa">
                <table class="board_list td_c">
                    <thead>
                      <tr>
                        <th><input type="checkbox"></th>
                        <th>결제번호</th>
                        <th>총액</th>
                        <th>결제 방법 </th>
                        <th>입금확인 여부</th>
                        <th>입금일<br>
                        (결제신청일)</th>
                        <th>결제내역</th>
                        <th>정보보기</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td class="bl_check"><input type="checkbox"></td>
                          <td>1637815705729</td>
                          <td>630,000원</td>
                          <td>신용카드 결제</td>
                          <td class="bl_yes"><span class="y">확인</span></td>
                          <td>2021-11-25<br>
                          (2021-11-25)</td>
                          <td class="bl_txt">11 page : 230,000 &amp; 급행비 포함,컬러 6 page : 300,000 &amp; 급행비 포함,논문 투고료</td>
                          <td><a href="pop_pay_view.php" class="btn btn1">결제정보</a></td>
                        </tr>
                        <tr>
                          <td class="bl_check"><input type="checkbox"></td>
                          <td>1637815705729</td>
                          <td>630,000원</td>
                          <td>신용카드 결제</td>
                          <td class="bl_yes"><span class="n">미확인</span></td>
                          <td>입금확인하기<br />(2021-11-25)</td>
                          <td class="bl_txt">2021년도 추계학술대회 정회원(석사과정) 등록비/td>
                          <td><a href="pop_pay_view.php" class="btn btn1">결제정보</a></td>
                        </tr>
                    </tbody>
                 </table>
              <div class="btn_wrap"> 
                  <a class="btn btn1 cc">결제취소</a> 
              </div>
            </div>
            
        </div>
        <!--Contents-->
    </div>
</body>
</html>
