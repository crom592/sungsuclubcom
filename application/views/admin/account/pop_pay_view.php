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
            	<b>홍길동</b>님이 결제하신 결제번호 <b>1637815705729</b> 의 상세정보 입니다.
            </div>
           
            <div class="pa board_view_wrap">            
            <table class="td1">
              <tbody>
                  <tr>
                    <th>결제번호</th>
                    <td>1637815705729</td>
                  </tr>
                  <tr>
                    <th>결제자 이름</th>
                    <td>홍길동</td>
                  </tr>
                  <tr>
                    <th>결제자 소속</th>
                    <td>이화여자대학교 의류산업학과</td>
                  </tr>
                  <tr>
                    <th>E-mail</th>
                    <td>bona5392@naver.com</td>
                  </tr>
                  <tr>
                    <th>전화번호</th>
                    <td>010-6323-5392</td>
                  </tr>
                  <tr>
                    <th>핸드폰번호</th>
                    <td>01063235392</td>
                  </tr>
                  <tr>
                    <th>총 금액</th>
                    <td>630,000 원</td>
                  </tr>
                  <tr>
                    <th>결제방법</th>
                    <td>신용카드 결제</td>
                  </tr>
                  <tr>
                    <th>입금계좌 정보</th>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <th>카드승인번호</th>
                    <td>55257642****3083 [카드 매출 전표 보기</td>
                  </tr>
                  <tr>
                    <th>입금인</th>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <th>결제신청일</th>
                    <td>2021-11-25</td>
                  </tr>
                  <tr>
                    <th>입금확인여부</th>
                    <td>예</td>
                  </tr>
                  <tr>
                    <th>입금일</th>
                    <td><ul class="select_date">
                        <li><i class="i-calendar-check" title="날짜선택"></i><input type="text" class="ipw ipw1"></li>
                        <li><a class="btn btn1">입금확인</a></li>
                        <li><a class="btn btn1">입금일 수정</a></li>
                        <li><a class="btn btn1">입금확인 취소</a></li>
                    </ul>
                    </td>
                  </tr>
                  <tr>
                    <th>메일발송일</th>
                    <td>입금확인 메일발송일 :<br />영수증 메일 발송일 :</td>
                  </tr>
              </tbody>
            </table>
              
              <div class="btn_wrap"> 
                <a href="pop_pay.php" class="btn btn1 cc">목록</a> 
                <a class="btn btn1 cc">다시 결제하기</a> 
                <a class="btn btn1 cc">결제취소</a> 
                <a href="javascript:openPop('pop_pay_print.php','620','700','yes')" class="btn btn1 cc">영수증보기</a> 
                <a class="btn btn1 cc">입금확인 메일발송</a> 
                <a class="btn btn1 cc">영수증 메일발송</a> 
              </div>
                <ul class="list_s">
                	<li>결제 취소 : 결제내역을 삭제하고 모든 항목을 미납(청구)상태로 만듭니다.</li>
                    <li>입금 확인(취소) : 해당 결제내역의 입금확인여부를 확인(취소)합니다.</li>
                </ul>
          </div>
            
        </div>
        <!--Contents-->
    </div>
</body>
</html>
