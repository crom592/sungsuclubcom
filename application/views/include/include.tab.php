<? if($PageNum == "1") { ?>
<ul class="sub_tab">
<li class="<?=$SubNum == '1' ? 'on' : '' ?>"><a href="/board/list?code=huntaek">시황 및 매매분석</a></li>
<li class="<?=$SubNum == '2' ? 'on' : '' ?>"><a href="/board/list?code=tomorrow">명일투자+변곡의 창</a></li>
</ul>

<? } else if($PageNum == "2") {?>
<ul class="sub_tab many">
<li class="<?=$SubNum == '1' ? 'on' : '' ?>"><a href="/option/option01.php">역사적통계표</a></li></li>
<li class="<?=$SubNum == '2' ? 'on' : '' ?>"><a href="/option/option02.php">옵션시세분석</a></li></li>
<li class="<?=$SubNum == '3' ? 'on' : '' ?>"><a href="/option/option03.php">옵션매매비문</a></li></li>
<li class="<?=$SubNum == '4' ? 'on' : '' ?>"><a href="/option/option04.php">한의수칙</a></li></li>
<li class="<?=$SubNum == '5' ? 'on' : '' ?>"><a href="/option/option05.php">만기일결제비문</a></li></li>
<li class="<?=$SubNum == '6' ? 'on' : '' ?>"><a href="/option/option06.php">3차는 금융공학이다</a></li></li>
<li class="<?=$SubNum == '7' ? 'on' : '' ?>"><a href="/option/option07.php">양매도비법</a></li></li>
</ul>

<? } else if($PageNum == "3") {?>
<ul class="sub_tab">
<li class="<?=$SubNum == '1' ? 'on' : '' ?>"><a href="/board/list?code=communication">소통의 장</a></li>
<?if($_GET['code'] != 'communication'):?>
<li class="<?=$SubNum == '2' ? 'on' : '' ?>"><a href="/board/list?code=notice">공지사항</a></li>
<?endif;?>
</ul>

<? } else if($PageNum == "6") {?>
<ul class="sub_tab">
<?if($_SESSION['__SS_USER_TYPE__']==9):?><li class="<?=$SubNum == '2' ? 'on' : '' ?>"><a href="/board/list?code=diary">운영자 Diary</a></li><?endif;?>
</ul>

<? } else if($PageNum == "8") {?>
<ul class="sub_tab">
<li class="<?=$SubNum == '1' ? 'on' : '' ?>"><a href="/press/press01.php">시사오늘 <span class="num">2008.08.27</span></a></li>
<li class="<?=$SubNum == '2' ? 'on' : '' ?>"><a href="/press/press02.php">시사오늘 <span class="num">2011.08.27</span></a></li>
</ul>

<? } else if($PageNum == "terms") {?>
<ul class="sub_tab">
<li class="<?=$SubNum == 'guide' ? 'on' : '' ?>"><a href="/members/guide.php">이용약관</a></li>
<li class="<?=$SubNum == 'privacy' ? 'on' : '' ?>"><a href="/members/privacy.php">개인정보처리방침</a></li>
<li class="<?=$SubNum == 'email' ? 'on' : '' ?>"><a href="/members/email.php">이메일무단수집거부</a></li>
</ul>

<? } else if($PageNum == "payment") {?>
<ul class="sub_tab">
<li class="<?=$SubNum == '1' ? 'on' : '' ?>"><a href="/payment/payment.php">미납내역</a></li>
<li class="<?=$SubNum == '2' ? 'on' : '' ?>"><a href="/payment/login.php">결제내역</a></li>
</ul>

<? } ?>

<!--3depth-->
<? if($PageNum == "1" && $SubNum == "4") { ?>
<ul class="sub_tab2">
<li class="<?=$SubNum2 == '1' ? 'on' : '' ?>"><a href="">3뎁스</a></li>
</ul>

<? } else if($PageNum == "1" && $SubNum == "5") { ?>



<? } ?>
<!--//3depth-->