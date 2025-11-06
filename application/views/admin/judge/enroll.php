<? include_once $_SERVER['DOCUMENT_ROOT']."/admin/include/include.header.php"; ?>
<body class="ad_in">

<h2 class="tit1">심사위원 등록 <u>* 표시는 필수항목입니다.</u></h2>
<div class="board_view_wrap">	

    <div class="pa1">
        <table class="td2">    
        <tbody>
            <tr>
              <th><b class="pt">*</b> 아이디</th>
              <td><input type="text" class="ipw ipw1">  
              <span class="btn btn1">중복확인</span> 
              <span class="tt tt_r">사용 중인 아이디입니다.</span> 
              <span class="tt tt_b">사용 가능한 아이디입니다.</span>
              </td>
            </tr>
            <tr>
              <th><b class="pt">*</b> 비밀번호</th>
              <td><input type="text" class="ipw ipw1"> <span class="tt">비밀번호는 6~20자의 최소 1개의 숫자, 영문자를 포함</span></td>
            </tr>
			 <tr>
              <th><b class="pt">*</b> 비밀번호 확인</th>
              <td><input type="text" class="ipw ipw1"></td>
            </tr>
			<tr>
			  <th><b class="pt">*</b> 이메일</th>
			  <td><input class="ipw ipw1" type="text"> @ <input class="ipw ipw1" type="text"> <select class="ipw ipw1">
				  <option value="">직접입력</option>
				  <option value="">naver.com</option>
				  <option value="">daum.net</option>
				</select></td>
			</tr>
			<tr>
              <th><b class="pt">*</b> 성명</th>
              <td>
                  <ul class="name">
                    <li><b><span class="tt_r">*</span> 한글</b> <input class="ipw ipw3" type="text"></li>
                    <li><b>한자</b> <input class="ipw ipw3" type="text"></li>
                    <li><b><span class="tt_r">*</span> 영문</b> <input class="ipw ipw3" type="text"> First Name (이름)  &nbsp; <input class="ipw ipw3" type="text"> Last Name (성)</li>
                  </ul>                 
              </td>
			</tr>
            <tr>
              <th><b class="pt">*</b> 성별</th>
              <td>
              <ul class="radio">
              	<li><input type="radio" > 남성</li>
                <li><input type="radio" > 여성</li>
              </ul>              
              </td>
            </tr>
			<tr>
			  <th><b class="pt">*</b> 휴대폰</th>
			  <td><select class="ipw ipw1">
				  <option value="">선택</option>
				  <option value="">010</option>
				  <option value="">011</option>
				  <option value="">016</option>
				  <option value="">019</option>
				</select> <input class="ipw ipw3" type="text"> 
				<input class="ipw ipw3" type="text"> </td>
			</tr>
        </tbody>
        </table>
    </div>    
    
    <div class="pa1">
      <h3 class="tit2">연구분야</h3>
        <table class="td2">    
        <tbody>
            <tr>
                <th><b class="pt">*</b> 연구분야</th>
                <td>
				<select class="ipw ipw1">
                      <option value="">패션디자인</option>
                      <option value="">패션마케팅</option>
                      <option value="">의류소재시스템</option>
                      <option value="">의류설계생산</option>
                      <option value="">한국아시아복식</option>
                      <option value="">기타</option>
                    </select>
                </td>
            </tr>
            
        </tbody>
        </table>
    </div>
	<div class="pa1">
      <h3 class="tit2">직장정보</h3>
        <table class="td2">    
        <tbody>
            <tr>
                <th><b class="pt">*</b> 직장정보</th>
                <td>
                <select class="ipw ipw1">
                    <option value="대학교">대학교</option>
                    <option value="연구소">연구소</option>
                    <option value="직장">직장</option>
                    <option value="관련직종">관련직종</option>
                    <option value="기타">기타</option>
                </select>
                </td>
            </tr>
            <tr>
                <th><b class="pt">*</b> 소속기관명</th>
                <td><input type="text" class="ipw ipw1"></td>
            </tr>
            <tr>
                <th><b class="pt">*</b> 직위</th>
                <td><input type="text" class="ipw ipw1"></td>
            </tr>
        </tbody>
        </table>
    </div> 
    
    <div class="btn_wrap"> 
      <a class="btn btn1 rr">등록</a>
    </div>
    

</div>

</body>
</html>
