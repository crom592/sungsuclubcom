<? 
$PageNum="members";
$Title="회원정보 수정";
include_once $_SERVER['DOCUMENT_ROOT']."/m/include/include._header.php"; ?>

<div class="join_wrap">
    <div class="members_tit"> 
    <i class="i-user-plus-o"></i>회원정보 <b>수정</b> <u>해당되는 정보를 입력하여 주시기 바랍니다.<br /> <span class="tt_r">*</span> 는 필수입력 사항입니다.</u> 
  </div>
    
  <!--Join input-->
  <div class="pa">
    <div class="input_tit">회원 기본정보 입력 <u>필수입력사항</u></div>
    <table class="td1">
      <tbody>
        <tr>
          <th><span class="tt_r">*</span> 아이디</th>
          <td>testid</td>
        </tr>
        <tr>
          <th><span class="tt_r">*</span> 비밀번호</th>
          <td><input class="ipw ipw1"  type="password" />
            <span class="tt">4~12자의 영문과 숫자의 조합</span></td>
        </tr>
        <tr>
          <th><span class="tt_r">*</span> 비밀번호 확인</th>
          <td><input class="ipw ipw1" type="password" /></td>
        </tr>
        <tr>
          <th><span class="tt_r">*</span> 성명</th>
          <td><input class="ipw ipw1" type="text" /></td>
        </tr>
        <tr>
          <th><span class="tt_r">*</span> 닉네임</th>
          <td><input class="ipw ipw1" type="text" /> <span class="btn btn1">중복확인</span></td>
        </tr>
        <tr>
          <th><span class="tt_r">*</span> 이메일</th>
          <td><input class="ipw ipw1" type="text"  /> @ <input  class="ipw ipw1" type="text" />
            <select name="select2" class="ipw ipw1" >
                <option value="" selected="selected">직접입력</option>
                <option value="naver.com">naver.com</option>
                <option value="hanmail.net">hanmail.net</option>
                <option value="daum.net">daum.net</option>
                <option value="nate.com">nate.com</option>
                <option value="gmail.com">gmail.com</option>
            </select>
          <ul class="radio in">
            <li><input type="radio" checked="checked"/> 메일 수신</li>
            <li><input type="radio" /> 메일 수신 거부</li>
          </ul>
        </td>
        </tr>
        <tr>
          <th><span class="tt_r">*</span> 우편번호</th>
          <td><input class="ipw ipw1" type="text" maxlength="5"/> <span class="btn btn1" id="zip_search">우편번호 검색</span></td>
        </tr>
        <tr>
          <th><span class="tt_r">*</span> 주소</th>
          <td><input class="ipw ipw2" type="text" /> <input class="ipw ipw2" type="text" /></td>
        </tr>
        <tr class="td1">
          <th><span class="tt_r">*</span> 연락처1</th>
          <td><select name="select"   class="ipw ipw3">
              <option value="">선택</option>
              <option value="02">02</option>
              <option value="031">031</option>
              <option value="032">032</option>
              <option value="033">033</option>
              <option value="041">041</option>
              <option value="042">042</option>
              <option value="043">043</option>
              <option value="051">051</option>
              <option value="052">052</option>
              <option value="053">053</option>
              <option value="054">054</option>
              <option value="055">055</option>
              <option value="061">061</option>
              <option value="062">062</option>
              <option value="063">063</option>
              <option value="064">064</option>
              <option value="0502">0502</option>
              <option value="0505">0505</option>
              <option value="070">070</option>
            </select>
            -
            <input class="ipw ipw3" type="text" maxlength="4"/>
            -
            <input class="ipw ipw3" type="text" maxlength="4"/>          
            </td>
        </tr>
        <tr>
          <th><span class="tt_r">*</span> 연락처2</th>
          <td><select class="ipw ipw3" >
              <option value="">선택</option>
              <option value="010">010</option>
              <option value="011">011</option>
              <option value="016">016</option>
              <option value="017">017</option>
              <option value="018">018</option>
              <option value="019">019</option>
            </select> -            
            <input class="ipw ipw3" type="text" maxlength="4"/> -
            <input class="ipw ipw3" type="text" maxlength="4"/>          
          </td>
        </tr>
        <tr>
          <th><span class="tt_r">*</span> 생년월일</th>
          <td><input class="ipw ipw3" type="text"/> 년
            <input class="ipw ipw3" type="text"/> 월
            <input class="ipw ipw3" type="text"/> 일 
          </td>
        </tr>
        <tr>
          <th><span class="tt_r">*</span> 성별</th>
          <td><ul class="radio">
              <li> <input type="radio" checked="checked" /> 남자</li>
              <li> <input type="radio" /> 여자</li>
          </ul></td>
        </tr>
      </tbody>
    </table>
  </div>
  <!--//Join input-->
  
  <div class="btn_wrap"> 
      <a href="" class="btn btn1 cc">확인</a> 
      <a href="" class="btn btn1 cc">취소</a> 
  </div>
    <div class="break_w">
        <a href="break.php" class="break_btn btn1">회원탈퇴하기</a>
    </div>
</div>


<? include_once $_SERVER['DOCUMENT_ROOT']."/m/include/include._footer.php"; ?>
