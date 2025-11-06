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
        	<li class="on"><a href="pop_nopay.php">미납내역</a></li>
            <li><a href="pop_pay.php">결제내역</a></li>
        </ul>
        <!--Contents-->
        <div class="join_wrap pop_payment">
        
          <div class="pa2">
          <h3 class="tit2">결제항목정보</h3>
            <table class="board_list td_c">
                <thead>
                  <tr>
                    <th>항목이름</th>
                    <th>유효기간</th>
                    <th>정상가</th>
                    <th>청구액</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>참가비</td>
                      <td>2021-12-12 ~ 2021-12-12</td>
                      <td>50,000 원</td>
                      <td class="bl_yes">50,000 원</td>
                    </tr>
                </tbody>
             </table>
             <div class="total">총 결제금액<b>50,000 원</b></div>
             </div>
             
            <div class="pa2">
            <table class="td1">
              <tbody>
                <tr>
                  <th><span class="tt_r">*</span> 이름</th>
                  <td><input class="ipw ipw1" type="text"></td>
                </tr>
                <tr>
                  <th><span class="tt_r">*</span> 소속</th>
                  <td><input class="ipw ipw1" type="text"></td>
                </tr>
                <tr>
                  <th><span class="tt_r">*</span> 이메일</th>
                  <td><input class="ipw ipw1" type="text"></td>
                </tr>
                <tr>
                  <th>전화번호</th>
                  <td><input class="ipw ipw1" type="text"></td>
                </tr>
                <tr>
                  <th>휴대폰번호</th>
                  <td><input class="ipw ipw1" type="text"></td>
                </tr>
                <tr>
                  <th>총 결제금액</th>
                  <td class="total"><b>50,000 원</b></td>
                </tr>
                <tr>
                  <th>입금방법</th>
                  <td>
                  <select class="ipw ipw1">
                    <option selected="selected" >선택</option>
                    <option>신용카드결제</option>
                    <option>지로</option>
                    <option>신용카드 결제(학회)</option>
                    <option>현금</option>
                    <option>사면</option>
                    <option>자동 결제</option>
                    <option>신용카드 결제(현장)</option>
                    <option>계좌이체</option>
                </select>
                  </td>
                </tr>
                <tr>
                  <th>입금인</th>
                  <td><input class="ipw ipw1" type="text"></td>
                </tr>
                <tr>
                  <th>입금 은행</th>
                  <td>
                  <select class="ipw ipw2">
                    <option selected="selected" >신한은행 : 100-014-194016 ((사)한국의류학회)</option>
                </select>
                  </td>
                </tr>
              </tbody>
            </table>
            <ul class="list_s"> 
                <li class="tt_r">결제가 진행중입니다. 결제가 자동으로 완료되기 전에 창을 닫거나 새로고침을 하지 마십시오.</li>
                <li class="tt_r">페이지가 이동하지 않고 계속해서 이 창에 머무는 경우 처음부터 다시 결제를 진행하십시오.</li>
              </ul>
      		</div>          
          
          <div class="btn_wrap"> 
              <a class="btn btn1 cc">결제하기</a> <a href="pop_nopay.php" class="btn btn1 cc">취소</a>
          </div>
        
        </div>
        <!--Contents-->
    </div>
</body>
</html>
