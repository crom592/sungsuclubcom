<? 
$PageNum="6";
$SubNum="1";
$Title="교육생 후기";
include_once $_SERVER['DOCUMENT_ROOT']."/m/include/include._header.php"; ?>

<div class="board_write_wrap">
	<!--Privacy-->
    <dl class="guide_wrap">
        <div class="input_tit">개인정보 수집 및 이용동의</div>
        <dd><? include_once $_SERVER['DOCUMENT_ROOT']."/members/include.privacy.php"; ?></dd>
    </dl>    
    <div class="guide_check"> 위의 개인정보 수집 및 이용에 동의합니다.
      <input type="checkbox" class="cheackbox" value="Y" title="개인정보 수집 및 이용에 동의" />
    </div>
    <!--//Privacy-->

	<!--Write-->
    <div class="input_tit">게시물 작성</div>
	<table class="board_write">    
    <tbody>
        <tr>
            <th>이름</th>
            <td><input type="text" class="ipw ipw1" title="이름"></td>
        </tr>
        <tr>
            <th>비밀번호</th>
            <td><input type="password" class="ipw ipw1" title="비밀번호">
            <span class="tt">비밀글로 하시겠습니까? <input type="checkbox"></span>
            </td>
        </tr>
        <tr>
          <th>휴대전화</th>
          <td><select title="항목 선택" class="ipw ipw1">
              <option value="">선택</option>
              <option value="010">010</option>
              <option value="011">011</option>
              <option value="016">016</option>
              <option value="017">017</option>
              <option value="018">018</option>
              <option value="019">019</option>
            </select>
            -
            <input type="text" class="ipw ipw1" title="핸드폰번호" maxlength="4">
            -
            <input type="text" class="ipw ipw1" title="핸드폰번호" maxlength="4">
          </td>
        </tr>
        <tr>
            <th>이메일</th>
            <td>
            <input type="text" class="ipw ipw1" title="이메일주소"> @ 
            <input type="text" class="ipw ipw1" title="이메일주소"> 
            <select title="항목 선택" class="ipw ipw1" >
                <option value="">직접입력</option>
                <option value="naver.com">네이버</option>
                <option value="daum.net">다음</option>
                <option value="gmail.com">지메일</option>
                <option value="nate.com">네이트</option>
                <option value="empas.com">엠파스</option>
                <option value="hanmail.net">한메일</option>
                <option value="naver.com">네이버</option>
                <option value="hotmail.com">핫메일</option>
            </select></td>
        </tr>
        <tr>
            <th>제목</th>
            <td><input type="text" class="ipw ipw2" title="제목" value=""></td>
        </tr>
        <tr>
            <th>내용</th>
            <td>
            <textarea class="ipw ipw_tt"></textarea>    
            </td>
        </tr>
        <tr>
            <th>첨부파일</th>
            <td><input type="file" class="ipw ipw2" ></td>
        </tr>
    </tbody>
    </table>
    <!--//Write-->    
    
    
    <div class="btn_wrap"> 
        <a href="diary01_view.php" class="btn btn1 cc">확인</a>
        <a href="diary01_view.php" class="btn btn1 cc">취소</a>
    </div>
    

</div>

<? include_once $_SERVER['DOCUMENT_ROOT']."/m/include/include._footer.php"; ?>
 