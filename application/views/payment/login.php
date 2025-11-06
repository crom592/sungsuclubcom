<? 
$PageNum="payment";
$SubNum="2";
$Title="비회원 로그인";
include_once $_SERVER['DOCUMENT_ROOT']."/include/include._header.php"; ?>

<div class="login_wrap">
	<div class="members_tit"><i class="i-user-plus-o"></i></i>비회원 <b>로그인</b><u>이름과 휴대폰 번호를 입력하시면 비회원 로그인이 가능합니다.</u></div>
	<ul class="login_input">
    	<li><input type="text" title="이름" placeholder="이름" class="ipw"/></li>
        <li><input type="text" title="휴대폰번호" placeholder="휴대폰번호" class="ipw"/></li>
        <li><a href="" class="btn btn1">로그인</a></li>
    </ul>
</div>

<? include_once $_SERVER['DOCUMENT_ROOT']."/include/include._footer.php"; ?>
 