<?php include_once APPPATH."views/admin/include/header.php"; ?>
<body>

<div id="admin_login_wrap">
    <h1>성수클럽 Administrator Mode</h1>
    <ul id="alw_input">
    <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" action="/secure-admin/auth/login/check">
        <li class="id"><input name="user_id" type="text" placeholder="아이디" id="id"></li>
        <li class="id"><input name="user_pw" type="password" placeholder="비밀번호" id="pwd"></li>
        <li class="btn"><button type="submit" class="btn btn1" id="login-submit" style="width:120px;"><a>로그인</a></button></li>
    </form>
    </ul>
    <div id="alw_copy">
    ⓒ 성수클럽. All Rights Reserved.
    </div>
</div>
<script>
    $(function(){
        $(document).on("click", ".btn", function () {
            var user_id = $("input[name='user_id']").val();
            var user_pw = $("input[name='user_pw']").val();

            if (user_id == "") {
                alert("아이디를 입력해주세요");
                $('#id').focus();
                return false;
            }

            if (user_pw == "") {
                alert("비밀번호를 입력해주세요");
                $('#pwd').focus();
                return false;
            }

            $("#form").submit();
            return false;

        });
        

        $(document).on("keypress", ".form-control", function (event) {
            if(event.which == 13){
                $(".login-submit").trigger('click');
            }
        });
    })
</script>
</body>
</html>
