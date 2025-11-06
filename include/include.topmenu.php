<div id="topmenu_w">
    <div id="spot">
    	<ul id="spot_l">
        	<li class="sl1"><a href="/press/press01.php">장성수 소장의 보도자료</a></li>
            <li class="sl2"><a href="/guide/guide01.php">교육 및 회원안내</a></li>
        </ul>
        <div id="logo"><a href="/"><img src="/images/common/logo.png" title="송도에셋" /></a></div>
        <ul id="spot_r">
             <!--After Login-->
            <?if($_SESSION['__SS_USER_NO__']):?>
            <li><a href="/member/logout">로그아웃</a></li>
            <li><a href="/member/mypage">회원정보수정</a></li>
            <li><a href="javascript:windowOpen('schedule_run', '/live/schedule_run', 437, 357, '');void(0);">송도에셋 생방송</a></li>
            <a href="" class="ar"><i class="i-angle-down-min"></i></a>
            <li class="welcome"><b><?=$_SESSION['__SS_USER_NICKNAME__']?></b> 회원님 환영합니다. 회원님의 대화방 종료일은 <b><?=$_SESSION['__SS_USER_END_DT__']?></b> 입니다.</li> 
            <!--//After Login-->
            <?else:?>
            <!--Before Login-->
            <li><a href="/member/login">로그인</a></li>
            <li><a href="/member/join">회원가입</a></li>
            <li><a href="/member/login">성수클럽 생방송</a></li>
            <a href="" class="ar"><i class="i-angle-down-min"></i></a>
            <!--//Before Login-->
            <?endif;?>
                 
        </ul>
    </div>    
    
    <div id="topmenu">
        <div class="t_bigmenu">
            <ul class="t_menu">
                <li class="<?=$PageNum=='company' ? 'select' : '' ?>"><a href="/company/company01.php">회사소개</a></li>
                <li class="<?=$PageNum=='press' ? 'select' : '' ?>"><a href="/press/press01.php">보도자료</a></li>
                <li class="<?=$PageNum=='option' ? 'select' : '' ?>"><a href="/option/option01.php">옵션비문</a></li>
                <li class="<?=$PageNum=='guide' ? 'select' : '' ?>"><a href="/guide/guide01.php">교육 및 회원안내</a></li>
                <li class="<?=$PageNum=='corner' ? 'select' : '' ?>"><a href="/board/list?code=corner">진서리 코너</a></li>
            </ul>
        </div>

		<!--Submenu-->
		<div id="submenu">
			<div class="t_submenu">
				<div class="submenu_wrap">
                <ul class="sub_company">
                    <li><a href="/company/company01.php">회사소개</a></li>
                </ul>
                <ul class="sub_press">
                    <li class="<?=$SubNum == '1' ? 'on' : '' ?>"><a href="/press/press01.php">시사오늘 <span class="num">2008.08.27</span></a></li>
                    <li class="<?=$SubNum == '2' ? 'on' : '' ?>"><a href="/press/press02.php">시사오늘 <span class="num">2011.08.27</span></a></li>
                </ul>
                <ul class="sub_option">
                    <li><a href="/option/option01.php">역사적통계표</a></li>
                    <li><a href="/option/option02.php">옵션시세분석</a></li>
                    <li><a href="/option/option03.php">옵션매매비문</a></li>
                    <li><a href="/option/option04.php">한의수칙</a></li>
                    <li><a href="/option/option05.php">만기일결제비문</a></li>
                    <li><a href="/option/option06.php">3차는 금융공학이다</a></li>
                    <li><a href="/option/option07.php">양매도비법</a></li>
                </ul>
                <ul class="sub_guide">
                    <li><a href="/guide/guide01.php">교육 및 회원안내</a></li>
                </ul>
                <ul class="sub_corner">
                    <li><a href="/board/list?code=corner">진서리코너</a></li>
                </ul>
			</div>
		</div>
		</div>
		<!--//Submenu-->

    </div>
    

</div>
