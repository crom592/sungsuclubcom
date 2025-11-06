<? 
$PageNum="members";
$Title="비밀번호 찾기";
include_once $_SERVER['DOCUMENT_ROOT']."/m/include/include._header.php"; ?>

<div class="find_wrap">
	<div class="members_tit"><i class="i-shield-checked-o"></i>비밀번호 <b>찾기</b> <u>회원님의 비밀번호가 생각나지 않으세요?<br />이름, 아이디, 이메일을 입력하시면 이메일로 임시비밀번호를 <br />알려드립니다.</u></div>
<form name="form1" method="post" >	
    <div class="find_w">    
    	<dl>
            <dd class="input">
            	<input  type="text" class="ipw ipw1" name="pwf_name" id="idf_name" title="이름" placeholder="이름"/>
                <input  type="text" class="ipw ipw1" name="pwf_userid" id="pwf_userid" title="아이디" placeholder="아이디"/>
                <input  type="text" class="ipw ipw2" name="pwf_email" id="pwf_email" title="이메일" placeholder="이메일"/> @ 
                <input  type="text" class="ipw ipw2" name="pwf_email_cp" id="pwf_email_cp" title="이메일 주소" placeholder="이메일 주소"/>
            </dd>
            <div class="btn_wrap col1"> 
                <a href="javascript:search_pw();" class="btn btn1">보내기</a>
            </div>   
        </dl>
    </div>
</div>
</form>

<script language="javascript">
function search_id() {
	var myform = document.form1;

	if(!checkSpace($("#idf_name").val()))
	{
		alert("이름을 입력해 주세요");
		$("#idf_name").focus();
		return;
	}
	if(!checkSpace($("#idf_email").val()))
	{
		alert("이메일 주소를 입력해 주세요");
		$("#idf_email").focus();
		return;
	}
	if(!checkSpace($("idf_email_cp").val()))
	{
		alert("이메일 주소를 입력해 주세요");
		$("idf_email_cp").focus();
		return;
	}

	myform.action="find_id_result.php";
	myform.submit();

	//SLB_show('pop_find_id.php?p_name='+$("#idf_name").val()+'&p_email='+$("#idf_email").val()+'&p_email_cp='+$("#idf_email_cp").val(),'iframe', 500, 400, true);
}
function search_pw() {
	var myform = document.form1;
	if(!checkSpace($("#pwf_name").val()))
	{
		alert("이름을 입력해 주세요");
		$("#pwf_name").focus();
		return;
	}
	if(!checkSpace($("#pwf_userid").val()))
	{
		alert("아이디를 입력해 주세요");
		$("#pwf_userid").focus();
		return;
	}
	if(!checkSpace($("#pwf_email").val()))
	{
		alert("이메일 주소를 입력해 주세요");
		$("#pwf_email").focus();
		return;
	}
	if(!checkSpace($("pwf_email_cp").val()))
	{
		alert("이메일 주소를 입력해 주세요");
		$("pwf_email_cp").focus();
		return;
	}
	myform.action="find_pw_result.php";
	myform.submit();
	//SLB_show('pop_find_pw.php?p_name='+$("#pwf_name").val()+'&p_userid='+$("#pwf_userid").val()+'&p_email='+$("#pwf_email").val()+'&p_email_cp='+$("#pwf_email_cp").val(),'iframe', 500, 400, true);
}
</script>
<? include_once $_SERVER['DOCUMENT_ROOT']."/m/include/include._footer.php"; ?>