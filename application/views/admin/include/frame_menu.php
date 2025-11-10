<?php include_once APPPATH."views/admin/include/header.php"; ?>
<style>
    body#left {
        margin: 0;
        padding: 0;
        background: #f5f5f5;
        width: 100%;
    }
    #leftm {
        width: 100%;
        padding: 0;
        margin: 0;
    }
</style>
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
        <div class="s_menu" force="10"> <a>동영상</a> </div>
        <div class="ss_menu" id="smenu10">
            <ul>
                <li><a href="#" target="detail">생방송 관리</a></li>
                <li><a href="/secure-admin/vod/list?code=vod" target="detail">동영상 관리</a></li>
            </ul>
        </div>
        <div class="s_menu" force="30"> <a>시황투자전략</a> </div>
        <div class="ss_menu" id="smenu30">
            <ul>
                <li><a href="/secure-admin/board/list?code=huntaek" target="detail">시황 및 매매분석</a></li>
                <li><a href="/secure-admin/board/list?code=tomorrow" target="detail">복기의 창</a></li>
            </ul>
        </div>

        <div class="s_menu" force="20"> <a>공지사항</a> </div>
        <div class="ss_menu" id="smenu20">
            <ul>
                <li><a href="/secure-admin/board/list?code=communication" target="detail">소통의 장</a></li>
                <li><a href="/secure-admin/board/list?code=notice" target="detail">공지사항</a></li>
            </ul>
        </div>  
        <div class="s_menu" force="40"> <a>선물옵션분석표</a> </div>
        <div class="ss_menu" id="smenu40">
            <ul>
                <li><a href="/secure-admin/board/list?code=future" target="detail">선물옵션분석표</a></li>
             
            </ul>
        </div>  
        <div class="s_menu" force="50"> <a>매매일지</a> </div>
        <div class="ss_menu" id="smenu50">
            <ul>
                <li><a href="/secure-admin/board/list?code=review" target="detail">교육생후기</a></li>
                <li><a href="/secure-admin/board/list?code=trading" target="detail">통합매매일지</a></li>
                <li><a href="/secure-admin/board/list?code=corner" target="detail">진서리코너</a></li>
                <li><a href="/secure-admin/board/list?code=diary" target="detail">운영Diary</a></li>
            </ul>
        </div> 

        <div class="s_menu"> <a href="/secure-admin/member/user/list" target="detail">회원목록</a> </div>
        <div class="s_menu" force="60"> <a>메인관리</a> </div>
        <div class="ss_menu" id="smenu60">
            <ul>
                <li><a href="/secure-admin/utube/list" target="detail">유투브관리</a></li>
                <li><a href="/secure-admin/banner/list" target="detail">배너관리</a></li>
                <!-- <li><a href="/secure-admin/popup/list" target="detail">팝업관리</a></li> -->

            </ul>
        </div>
        <!-- <div class="s_menu"> <a href="../popup/list.php">팝업설정</a> </div>      -->        
        <div class="s_menu"> <a href="/secure-admin/auth/logout" target="_top">로그아웃</a> </div>
    </div>
    <!--//Leftmenu-->
</body>
</html>

