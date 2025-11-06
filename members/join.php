<? 
$PageNum="members";
$SubNum="join";
$Title="회원가입";
include_once $_SERVER['DOCUMENT_ROOT']."/include/include._header.php"; ?>

<div class="join_wrap">
    <div class="members_tit">
        <i class="i-user-plus-o"></i>약관 <b>동의</b>
        <u>회원가입을 하기 위해서는 약관동의가 필요합니다.</u>
    </div> 
    
    <!--Guide-->
    <dl class="guide_wrap">
        <div class="input_tit">이용약관</div>
        <dd><? include_once $_SERVER['DOCUMENT_ROOT']."/members/include.guide.php"; ?></dd>
    </dl>    
    <div class="guide_check"> 위의 이용약관에 동의합니다.
      <input type="checkbox" class="cheackbox" />
    </div>
    <!--//Guide-->
    
    <!--Privacy-->
    <dl class="guide_wrap">
        <div class="input_tit">개인정보 처리방침</div>
        <dd><? include_once $_SERVER['DOCUMENT_ROOT']."/members/include.privacy.php"; ?></dd>
    </dl>    
    <div class="guide_check"> 위의 개인정보 처리방침에 동의합니다.
      <input type="checkbox" class="cheackbox" />
    </div>
    <!--//Privacy-->    
    
    <div class="btn_wrap"> 
    	<a href="join_input.php" class="btn btn1 cc">확인</a> 
    </div>
</div>
