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
            <dd class="btn"><a href="javascript:search_id();" class="btn1">확인</a></dd>        
        </dl>
        
        <dl class="find_r">
        	<div class="mb70"></div>
        	<dt><i class="i-lock"></i>비밀번호 찾기 결과</dt>
            <dd class="txt">회원님의 비밀번호는 <b>123456</b> 입니다.<br /> 로그인 후 서비스를 이용해주세요.</dd>
            <dd class="btn"><a href="login.php" class="btn1">로그인</a></dd>        
        </dl>
        
		<!--일치하는 정보가 없을경우
        <dl class="find_r">
        	<div class="mb70"></div>
        	<dt><i class="i-lock"></i>비밀번호 찾기 결과</dt>
            <dd class="txt">입력하신 내용과 일치하는 정보가 없습니다.<br />다시 한번 확인해주세요.</dd>            
            <dd class="btn"><a href="javascript:history.back(-1)" class="btn1">뒤로가기</a></dd>        
        </dl>
        -->
	
    </div>

</div>

<? include_once $_SERVER['DOCUMENT_ROOT']."/include/include._footer.php"; ?>
