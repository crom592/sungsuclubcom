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
        <div class="nopay_w">
        	<div class="status">
            	<b>홍길동</b>님의 미납내역 
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
            
            <div class="pa2">
           	  <h3 class="tit2">추가항목 청구<div class="btn"><a class="btn2">청구메일 발송</a> <a href="javascript:openPop('pop_etc.php','500','500','yes')" class="btn2">기타회비 청구하기</a></div></h3>              
                <table class="board_list td_c">
                    <thead>
                      <tr>
                        <th>연회비 청구항목</th>
                        <th>청구 시작 년/월</th>
                        <th>유효기간</th>
                        <th>청구금액</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td>
                          <select class="ipw">
                            <option selected="selected" >선택하세요</option>
                                <option>평의원 연회비</option>
                                <option>정회원(교수) 연회비</option>
                                <option>단체회원 연회비</option>
                                <option>평생회원 회비</option>
                                <option>정회원(일반) 연회비</option>
                                <option>정회원(박사) 연회비</option>
                                <option>정회원(석사) 연회비</option>
                          </select>                          
                          </td>
                          <td>
                          <select class="ipw">
                            <option>2021</option>
                            <option>2020</option>
                          </select> 년 &nbsp;
                          <select class="ipw">
                            <option>1월</option>
                          </select> 월                          
                          </td>
                          <td>
                          <select class="ipw">
                            <option>1년</option>
                            <option>종료일 없음</option>
                          </select>                          
                          </td>
                          <td><input type="text" class="ipw ipw1" ></td>
                        </tr>
                    </tbody>
                 </table>
                <div class="btn_wrap"> 
                  <a class="btn btn1 cc">청구하기</a>
              </div>
          </div>
            
            <div class="pa">
                <table class="board_list td_c">
                    <thead>
                      <tr>
                        <th><input type="checkbox"></th>
                        <th>항목이름</th>
                        <th>유효기간</th>
                        <th>정상가</th>
                        <th>청구액</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td class="bl_check"><input type="checkbox"></td>
                          <td>항목이름</td>
                          <td>2021-11-11</td>
                          <td>10,000 원</td>
                          <td>10,000 원</td>
                        </tr>
                        <tr>
                          <td class="bl_check"><input type="checkbox"></td>
                          <td>항목이름</td>
                          <td>2021-11-11</td>
                          <td>10,000 원</td>
                          <td>10,000 원</td>
                        </tr>
                    </tbody>
                 </table>
                <div class="btn_wrap"> 
                  <a href="pop_payment.php" class="btn btn1 cc">결제하기</a> <a class="btn btn1 cc">청구취소</a>
              </div>
            </div>
            
        </div>
        <!--Contents-->
    </div>
</body>
</html>
