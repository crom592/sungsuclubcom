<? 
$PageNum="members";
$Title="로그인";
include_once APPPATH."views/m/include/include._header.php"; ?>
<form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" action="/member/login/auth">
<div class="login_wrap">
	<div class="members_tit"><i class="i-user-plus-o"></i></i>회원 <b>로그인</b><u>아이디와 비밀번호를 입력해 주세요.</u></div>
	<ul class="login_input">
    	<li><input type="text"placeholder="아이디" class="ipw" name="user_id" /></li>
        <li><input type="password" placeholder="비밀번호" class="ipw" name="user_pw"/></li>
        <li><button type="button" class="btn btn1" id="login-submit">로그인</button></li>
        <div class="save_id"><input type="checkbox" name="idsave" value=1/> 아이디 저장</div>
    </ul>
    <ul class="login_menu">
        <!-- <li><a href="find_id.php"><i class="i-tags"></i><p>아이디 찾기</p></a></li>
        <li><a href="find_pw.php"><i class="i-lock"></i><p>비밀번호 찾기</p></a></li> -->
        <li><a href="/member/join"><i class="i-users-plus"></i><p>회원가입</p></a></li>
    </ul>
</div>
</form>
<script>
    $(function(){
        if (getCookie("user_id")) { // getCookie함수로 id라는 이름의 쿠키를 불러와서 있을경우
            document.form.user_id.value = getCookie("user_id"); //input 이름이 id인곳에 getCookie("id")값을 넣어줌
            document.form.idsave.checked = true; // 체크는 체크됨으로
        }
        $(document).on("click", "#login-submit", function () {
            var user_id = $("input[name='user_id']").val();
            var user_pw = $("input[name='user_pw']").val();

            if (user_id == "") {
                alert("아이디를 입력해주세요");
                $("input[name='user_id']").focus();
                return false;
            }

            if (user_pw == "") {
                alert("비밀번호를 입력해주세요");
                $("input[name='user_pw']").focus();
                return false;
            }

            if (document.form.idsave.checked == true) { // 아이디 저장을 체크 하였을때
                setCookie("user_id", document.form.user_id.value, 10000); //쿠키이름을 id로 아이디입력필드값을 7일동안 저장
            } else { // 아이디 저장을 체크 하지 않았을때
                setCookie("user_id", document.form.user_id.value, 0); //날짜를 0으로 저장하여 쿠키삭제
            }

            $("#form").submit();
            return false;

        });

        $(document).on("keypress", ".login_input", function (event) {
            if(event.which == 13){
                $("#login-submit").trigger('click');
            }
        });
    })
    function setCookie(name, value, expiredays) //쿠키 저장함수
    {
        var todayDate = new Date();
        todayDate.setDate(todayDate.getDate() + expiredays);
        document.cookie = name + "=" + escape(value) + "; path=/; expires="
                + todayDate.toGMTString() + ";"
    }
 
    function getCookie(Name) { // 쿠키 불러오는 함수
        var search = Name + "=";
        if (document.cookie.length > 0) { // if there are any cookies
            offset = document.cookie.indexOf(search);
            if (offset != -1) { // if cookie exists
                offset += search.length; // set index of beginning of value
                end = document.cookie.indexOf(";", offset); // set index of end of cookie value
                if (end == -1)
                    end = document.cookie.length;
                return unescape(document.cookie.substring(offset, end));
            }
        }
    }

</script>
