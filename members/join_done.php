<? 
$PageNum="members";
$SubNum="join";
$Title="회원가입";
include_once $_SERVER['DOCUMENT_ROOT']."/include/include._header.php"; ?>

<div class="join_wrap">
   <div class="members_tit"><i class="i-user-plus-o"></i>회원가입 <b>완료</b><u></u></div>    
    <div class="join_done">
    	<div class="tit">성공적으로 가입되었습니다.</div>
        <p><b>홍길동</b> 님의 회원가입을 축하드립니다.<br />회원님께서는 성수클럽의 서비스를 이용하실 수 있으며, 회원등급에 따라 서비스 범위가 변경됩니다.</p>
    </div>  
    <div class="btn_wrap"> 
        <a href="login.php" class="btn btn1 cc">로그인하기</a> 
        <a href="" class="btn btn1 cc">메인 페이지로 이동</a> 
    </div>
</div>

<? include_once $_SERVER['DOCUMENT_ROOT']."/include/include._footer.php"; ?>
