<? 
$PageNum="members";
$SubNum="find";
$Title="아이디 / 비밀번호 찾기";
include_once $_SERVER['DOCUMENT_ROOT']."/include/include._header.php"; ?>

<div class="find_wrap">
	<div class="members_tit"><i class="i-shield-checked-o"></i>아이디 / 비밀번호 <b>찾기</b></div>
    
    <div class="find_w">
    	<dl>
        	<dt><i class="i-tag"></i>아이디 찾기</dt>
            <dd class="txt">아이디를 분실하셨나요?<br />회원님의 <b>본인 실명</b>과 <b>이메일</b>을 입력해주세요.</dd>
            <dd class="input">
            	<input  type="text" class="ipw ipw1" title="이름" placeholder="이름"/>
                <input  type="text" class="ipw ipw1" title="이메일 주소" placeholder="이메일 주소"/>
            </dd>
            <dd class="btn"><a href="find_id_result.php" class="btn1">확인</a></dd>        
        </dl>
        <dl class="find_r">
        	<dt><i class="i-lock"></i>비밀번호 찾기</dt>
            <dd class="txt">비밀번호를 분실하셨나요?<br />회원님의 <b>본인 실명</b>과 <b>아이디, 이메일</b>을 입력해주세요.</dd>
            <dd class="input">
            	<input  type="text" class="ipw ipw1" title="이름" placeholder="이름"/>
                <input  type="text" class="ipw ipw1" title="아이디" placeholder="아이디"/>
                <input  type="text" class="ipw ipw1" title="이메일 주소" placeholder="이메일 주소"/>
            </dd>
            <dd class="btn"><a href="find_pw_result.php" class="btn1">확인</a></dd>        
        </dl>
    </div>

</div>


<? include_once $_SERVER['DOCUMENT_ROOT']."/include/include._footer.php"; ?>
