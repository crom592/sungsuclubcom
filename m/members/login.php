<? 
$PageNum="members";
$Title="로그인";
include_once $_SERVER['DOCUMENT_ROOT']."/m/include/include._header.php"; ?>

<div class="login_wrap">
	<div class="members_tit"><i class="i-user-plus-o"></i></i>회원 <b>로그인</b><u>아이디와 비밀번호를 입력해 주세요.</u></div>
	<ul class="login_input">
    	<li><input type="text"placeholder="아이디" class="ipw" /></li>
        <li><input type="password" placeholder="비밀번호" class="ipw" /></li>
        <li><a class="btn btn1">로그인</a></li>
        <div class="save_id"><input type="checkbox" /> 아이디 저장</div>
    </ul>
    <ul class="login_menu">
        <li><a href="find_id.php"><i class="i-tags"></i><p>아이디 찾기</p></a></li>
        <li><a href="find_pw.php"><i class="i-lock"></i><p>비밀번호 찾기</p></a></li>
        <li><a href="join.php"><i class="i-users-plus"></i><p>회원가입</p></a></li>
    </ul>
</div>

<? include_once $_SERVER['DOCUMENT_ROOT']."/m/include/include._footer.php"; ?>