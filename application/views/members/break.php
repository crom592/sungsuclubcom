<? 
$PageNum="members";
$SubNum="break";
$Title="회원탈퇴";
include_once APPPATH."views/include/include._header.php"; ?>
<form name="form1" id="form1" method="post">
<div class="break_wrap join_wrap">
	<div class="members_tit"><i class="i-warning"></i>회원 <b>탈퇴</b><u>회원 탈퇴 후 기존 아이디는 사용이 불가능하며, 다른 아이디로 재가입 가능합니다.</u></div>
    
    <table class="td1">
      <tbody>
          <tr>
            <th>비밀번호</th>
            <td><input  class="ipw ipw1"  type="password" name="mb_pass" id="mb_pass" title="비밀번호"/> <span class="tt">회원 비밀번호를 입력하여 주세요.</span></td>
          </tr>
          <tr>
            <th>탈퇴사유</th>
            <td>
            <textarea name="break_contents" id="break_contents" cols="50" rows="20" class="ipw"></textarea>
            </td>
          </tr>              
      </tbody>
    </table>
    
    <div class="btn_wrap"> 
        <a id="go_break" class="btn btn1 cc">회원 탈퇴하기</a> 
    </div>     
</div>
</form>



<script language="javascript">
$(function(){
	$("#go_break").click(function(){sendit();});

});
function sendit()
{
	if(!$("#mb_pass").val())
	{
		alert("비밀번호를 입력해 주세요.");
		$('#mb_pass').focus();
		return;
	}	

	/*if($("#break_contents").val())
	{
		alert("불편사항을 남겨주세요");
		return;
	}	*/

	if(confirm("회원 탈퇴를 진행하시겠습니까?"))
	{
		$("#form1").attr("action","/ajax/user/withdrawal");
		$("#form1").submit();
	}

}
</script>

