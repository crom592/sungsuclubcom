<!--Top-->
<div id="header">  
    <div class="h_logo"><a href="/"></a></div>
    <div class="h_btn rr"><i class="i-bars menu"></i></div>
</div>
<!--//Top-->

<!--Right menu-->
<div id="right_menu">

    <div class="rm_top">
        <ul class="rm_spot">

            
            <?if($_SESSION['__SS_USER_NO__']):?>
            <!--로그인후-->
            
            <li><a href="/member/logout"><i class="i-power-off"></i> 로그아웃</a></li>
            <li><a href="/member/mypage"><i class="i-user-address"></i> 정보수정</a></li>
            <!--//로그인후-->
            <?else:?>
            <!--로그인전-->
            <li><a href="/member/login"><i class="i-lock"></i> 로그인</a></li>
            <li><a href="/member/join"><i class="i-user-plus"></i> 회원가입</a></li> 
            <!--//로그인전-->
            <?endif;?>
        </ul>
        <div class="close"><i class="i-close"></i></div>
    </div>
    
    <h2>시황투자전략 <i class="i-angle-down"></i></h2>
    <div class="s_menu">
    <ul>
        <li><a href="/board/list?code=huntaek">시황 및 매매분석</a></li>
        <li><a href="/board/list?code=tomorrow">복기의 창</a></li>
    </ul>  
    </div>        
        
    <h2>옵션비문 <i class="i-angle-down"></i></h2>
    <div class="s_menu">
    <ul>
        <li><a href="/m/option/option01.php">역사적통계표</a></li>
        <li><a href="/m/option/option02.php">옵션시세분석</a></li>
        <li><a href="/m/option/option03.php">옵션매매비문</a></li>
        <li><a href="/m/option/option04.php">한의수칙</a></li>
        <li><a href="/m/option/option05.php">만기일결제비문</a></li>
        <li><a href="/m/option/option06.php">3차는 금융공학이다</a></li>
        <li><a href="/m/option/option07.php">양매도비법</a></li>
    </ul>  
    </div>    
    
    <h2>정보게시판 <i class="i-angle-down"></i></h2>
    <div class="s_menu">
    <ul>
        <li><a href="/board/list?code=communication">성수클럽 소통의 장</a></li>
        <li><a href="/board/list?code=notice">공지사항</a></li>
    </ul>  
    </div>
    
    <h2><a href="/board/list?code=future">선물옵션 분석표 <i class="i-angle-down"></i></a></h2>
    
    <h2><a href="/vod/list?code=vod">동영상 <i class="i-angle-down"></i></a></h2>
    
    <h2>매매일지 <i class="i-angle-down"></i></h2>
    <div class="s_menu">
    <ul>
        <li><a href="/board/list?code=corner">진서리코너</a></li>
        <li><a href="/board/list?code=diary">운영자 Diary</a></li>
    </ul>  
    </div>
    
    <h2><a href="/m/company/company01.php">회사소개 <i class="i-angle-down"></i></a></h2>
    
    <h2>장성수 소장의 보도자료 <i class="i-angle-down"></i></h2>
    <div class="s_menu">
    <ul>
        <li><a href="/m/press/press01.php">시사오늘 2008.08.27</a></li>
        <li><a href="/m/press/press02.php">시사오늘 2011.08.27</a></li>
    </ul>  
    </div>
    
    <h2><a href="/m/guide/guide01.php">성수클럽 회원안내 <i class="i-angle-down"></i></a></h2>
  
</div>
<!--//Right menu-->