<? 
$PageNum="members";
$SubNum="login";
$Title="로그인";
include_once $_SERVER['DOCUMENT_ROOT']."/include/include._header.php"; ?>

<div class="login_wrap">
	<div class="members_tit"><i class="i-user-plus-o"></i></i>회원 <b>로그인</b><u>회원의 아이디와 비밀번호를 입력하신 후, 로그인 버튼을 클릭해 주세요.</u></div>
	<ul class="login_input">
    	<li><input type="text" title="아이디" placeholder="아이디" class="ipw"/></li>
        <li><input type="password" title="비밀번호" placeholder="비밀번호" class="ipw" /></li>
        <li><a href="" class="btn btn1">로그인</a></li>
        <div class="save_id"><input type="checkbox" /> 아이디 저장</div>
    </ul>
    <ul class="login_txt">
    	<li><i class="i-users-plus"></i> <p>회원가입으로 다양한 혜택을 누리실 수 있습니다.</p> <a href="join.php" class="btn btn2">회원가입</a></li>
        <li><i class="i-lock"></i> <p>아이디 및 비밀번호를 잊으셨나요?</p> <a href="find.php" class="btn btn2">찾기</a></li>
        <!--<li><i class="i-credit-card"></i> <p>비회원도 결제가 가능합니다.</p> <a href="/payment/payment.php" class="btn btn2">비회원 결제하기</a></li>-->
    </ul>
</div>

<? include_once $_SERVER['DOCUMENT_ROOT']."/include/include._footer.php"; ?>
