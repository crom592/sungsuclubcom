<? 
$PageNum="members";
$Title="아이디 찾기";
include_once $_SERVER['DOCUMENT_ROOT']."/m/include/include._header.php"; ?>
 
<div class="find_wrap">
	<div class="members_tit"><i class="i-shield-checked-o"></i>아이디 <b>찾기</b> <u>회원님의 아이디가 생각나지 않으세요?<br />이름과 이메일을 입력하시면 아이디를 알려드립니다.</u></div>
    
	
    <div class="find_w">    
    	<dl>
            <dd class="input">
            	<input  type="text" class="ipw ipw1" name="idf_name" id="idf_name" title="이름" placeholder="이름"/>
                <input  type="text" class="ipw ipw2" name="idf_email" id="idf_email" title="이메일" placeholder="이메일"/> @ 
                <input  type="text" class="ipw ipw2" name="idf_email_cp" id="idf_email_cp" title="이메일 주소" placeholder="이메일 주소"/>
            </dd>
            <div class="btn_wrap col2"> 
                <a href="find_id_result.php" class="btn btn1">확인</a>
                <a href="find_pw.php" class="btn btn1">비밀번호 찾기</a>
            </div>   
        </dl>
    </div>
</div>

<? include_once $_SERVER['DOCUMENT_ROOT']."/m/include/include._footer.php"; ?>