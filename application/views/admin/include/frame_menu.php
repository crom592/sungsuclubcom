<script language=javascript>
$(document).ready(function(){
    $('.s_menu').click(function(){
        if ($("#smenu"+$(this).attr("force")).is(":hidden"))
            $("#smenu"+$(this).attr("force")).slideDown(300);
        else
            $("#smenu"+$(this).attr("force")).slideUp(300);
    }); 
}); 
</script>
<body id="left">
<base target="detail">
    <!--Leftmenu-->
    <div id="leftm">
        <!-- 동영상관리 숨김 -->
        <!-- 시황투자전략 숨김 -->
        <!-- 공지사항 숨김 -->
        <!-- 선물옵션분석표 숨김 -->
        
        <div class="s_menu"> <a href="/adm/board/list?code=corner" target="detail">진서리코너</a> </div>

        <div class="s_menu"> <a href="/adm/member/user/list" target="detail">회원목록</a> </div>
        <div class="s_menu"> <a href="/adm/banner/list" target="detail">배너관리</a> </div>
        <!-- <div class="s_menu"> <a href="../popup/list.php">팝업설정</a> </div>      -->        
        <div class="s_menu"> <a href="/adm/auth/logout" target="_top">로그아웃</a> </div>
    </div>
    <!--//Leftmenu-->
</body>
</html>

