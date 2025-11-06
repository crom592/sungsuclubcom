<? 
$PageNum="mypage";
$SubNum="1";
$SubNum2="1";
$Title="회비납부 및 확인";
include_once $_SERVER['DOCUMENT_ROOT']."/include/include._header.php"; ?>

<div class="pa1 ev5">
    <h3 class="tit1">결제항목 정보</h3>
      
    <div class="pa2">
    <table class="td2 td_c">
        <thead>
          <tr>
            <th>항목</th>
            <th>유효기간</th>
            <th>정상가</th>
            <th>청구액</th>
          </tr>
        </thead>
        <tbody>
            <tr>
              <td>2021년도 추계학술대회 등록비</td>
              <td>2021-12-12 ~ 2021-12-12</td>
              <td class="bl_yes">20,000 원</td>
              <td class="bl_yes">20,000 원</td>
            </tr>
            <tr>
              <td>2021년도 추계학술대회 등록비</td>
              <td>2021-12-12 ~ 2021-12-12</td>
              <td class="bl_yes">20,000 원</td>
              <td class="bl_yes">20,000 원</td>
            </tr>
        </tbody>
     </table>
     <div class="total">총 결제금액<b>40,000 원</b></div>
  </div>
     
  <div class="pa">
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
          <td><input class="ipw ipw1" type="text"> <span class="tt">"-"는 삭제 해주세요.</span></td>
        </tr>
        <tr>
          <th>총 결제금액</th>
          <td class="total"><b>40,000 원</b></td>
        </tr>
        <tr>
          <th>입금방법</th>
          <td>
          <select class="ipw ipw1">
            <option selected="selected" >선택</option>
            <option>무통장 입금</option>
            <option>신용카드</option>
            <option>은행계좌이체</option>
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
    <div class="btn_wrap">         
        <a class="btn btn1 cc">결제하기</a>
        <a class="btn btn1 cc">취소</a>
    </div> 
    </div>
    
</div>


<? include_once $_SERVER['DOCUMENT_ROOT']."/include/include._footer.php"; ?>
 