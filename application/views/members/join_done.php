<? 
$PageNum="members";
$SubNum="join";
$Title="회원가입";
include_once APPPATH."views/include/include._header.php"; ?>

<div class="join_wrap">
   <div class="members_tit"><i class="i-user-plus-o"></i>회원가입 <b>완료</b><u></u></div>    
    <div class="join_done">
    	<div class="tit">회원가입을 축하드립니다.</div>
        <p><b><?=$_GET['user_name']?></b> 님의 회원가입이 완료되었습니다. 등록하신 정보는 회원정보 수정에서 변경하실 수 있습니다.</p>
    </div>  
    <div class="btn_wrap"> 
        <a href="/member/login" class="btn btn1 cc">로그인하기</a> 
        <a href="/" class="btn btn1 cc">메인 페이지로 이동</a> 
    </div>
</div>


