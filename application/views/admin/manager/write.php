<? include_once $_SERVER['DOCUMENT_ROOT']."/admin/include/include.header.php"; ?>
<body class="ad_in"><!--관리자 등록과 수정하기 페이지의 코딩은 동일-->  

<h2 class="tit1">관리자 관리 <u>관리자 명단을 관리할 수 있습니다.</u></h2>
<div class="board_view_wrap manager_w">	

  <div class="pa">
      <table class="board_write">    
        <tbody>
            <tr>
                <th colspan="2">아이디</th>
                <td><input type="text" class="ipw ipw1"></td>
            </tr>
            <tr>
              <th colspan="2">암호</th>
              <td><input type="text" class="ipw ipw1"></td>
            </tr>
            <tr>
              <th colspan="2">이름</th>
              <td><input type="text" class="ipw ipw1"></td>
            </tr>
            <tr>
              <th colspan="2">로그인 여부</th>
              <td>
              <ul class="radio">
                  <li><input type="radio" > 로그인 가능</li>
                  <li><input type="radio" > 로그인 불가능</li>
              </ul>
              <input type="text" class="ipw ipw4" placeholder="불가사유를 적어주세요"></td>
            </tr>
            <tr>
              <th rowspan="5">관리자 권한설정<br />[모두선택]</th>
              <th>회원</th>
              <td>
                <ul class="radio">
                    <li><input type="checkbox" > 회원목록</li>
                    <li><input type="checkbox" > 단체회원</li>
                    <li><input type="checkbox" > 심사위원</li>
                </ul>
              </td>
            </tr>
            <tr>
              <th>회계</th>
              <td>
                <ul class="radio">
                    <li><input type="checkbox" > 결제회원</li>
                    <li><input type="checkbox" > 세부결제 관리</li>
                    <li><input type="checkbox" > 기본정보 관리</li>
                </ul>
              </td>
            </tr>
            <tr>
              <th>학술대회</th>
              <td>
                <ul class="radio">
                    <li><input type="checkbox" > 학술대회관리</li>
                    <li><input type="checkbox" > 학술대회생성</li>
                    <li><input type="checkbox" > 학술대회 등록현황</li>
                    <li><input type="checkbox" > 학술대회 공지사항</li>
                    <li><input type="checkbox" > 초록 등록현황</li>
                    <li><input type="checkbox" > 초록인쇄</li>
                    <li><input type="checkbox" > 학술대회 갤러리</li>
                    <li><input type="checkbox" > 학술대회 Q&A</li>
                </ul>
              </td>
            </tr>
            <tr>
              <th>논문투고</th>
              <td>
                <ul class="radio">
                    <li><input type="checkbox" > 논문투고</li>
                </ul>
              </td>
            </tr>
            <tr>
              <th>학회소식</th>
              <td>
                <ul class="radio">
                    <li><input type="checkbox" > 학회소식</li>
                    <li><input type="checkbox" > 채용공고</li>
                    <li><input type="checkbox" > 행사정보</li>
                    <li><input type="checkbox" > 자료실</li>
                </ul>
              </td>
            </tr>
        </tbody>
      </table>
    </div>
    
    <div class="btn_wrap"> 
      <a href="list.php" class="btn btn1 rr">목록</a>
      <a href="list.php" class="btn btn1 rr">확인</a>
    </div>
    

</div>

</body>
</html>
