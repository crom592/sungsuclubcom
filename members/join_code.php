<? 
$PageNum="members";
$SubNum="join";
$Title="회원가입";
include_once $_SERVER['DOCUMENT_ROOT']."/include/include._header.php"; ?>

<div class="join_wrap join_code">
  <div class="members_tit"> 
    <i class="i-user-plus-o"></i>가입 <b>인증</b>
  </div>
  
  <div class="txt">이메일로 전송된 가입코드를 입력하시고 가입인증을 클릭해주시기 바랍니다.<br />발송된 인증코드의 유효기간은 <span class="tt_r">24시간</span>입니다. 24시간 이내 본 페이지를 통해 가입인증을 해주시기 바랍니다. </div>
  
  <div class="input">
  <table class="td1">
      <tbody>
        <tr>
          <th>가입코드</th>
          <td><input  class="ipw ipw1" type="text"/></td>
        </tr>
      </tbody>
    </table>
   </div>
  
  <div class="btn_wrap"> 
      <a href="join_done.php" class="btn btn1 cc">가입인증</a> 
      <a href="" class="btn btn1 cc">취소</a> 
  </div>
</div>

<? include_once $_SERVER['DOCUMENT_ROOT']."/include/include._footer.php"; ?>
