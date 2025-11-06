<? 
$PageNum="members";
$Title="아이디 찾기 결과";
include_once $_SERVER['DOCUMENT_ROOT']."/m/include/include._header.php"; ?>

<div class="find_wrap">
	<div class="members_tit"><i class="i-zoom-in"></i>아이디 <b>찾기</b> <u>회원님의 아이디입니다. <br /><span class="userid">[testid]</span><br />로그인 후 서비스를 이용해주세요.</u></div>    
    <div class="find_w">    
    	<dl>
            <div class="btn_wrap col1"> 
                <a href="find_id.php" class="btn btn1">확인</a>
            </div>   
        </dl>
    </div>

	<!--아이디 찾기 실패시--
	<div class="members_tit"><i class="i-ban"></i>아이디 <b>찾기</b> <u>입력하신 정보와 일치하는 아이디가 없습니다.<br />찾기 방법을 변경하거나, 회원가입을 해주세요.</u></div>    
    <div class="find_w">    
    	<dl>
            <div class="btn_wrap col2"> 
                <a href="join.php" class="btn btn1">회원가입</a>
                <a href="javascript:history.back(-1)" class="btn btn1">뒤로가기</a>
            </div>   
        </dl>
    </div>
	<!--//아이디 찾기 실패시-->
</div>


<? include_once $_SERVER['DOCUMENT_ROOT']."/m/include/include._footer.php"; ?>