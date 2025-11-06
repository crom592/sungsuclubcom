<? if($room_no) {

   $and = '/(Android)/';
   $ios = '/(iPod|iPhone|iPad)/';

   $sitecode = 'ssclub';
   $id = $_SESSION['__SS_USER_ID__'];
   $nick = $_SESSION['__SS_USER_NICKNAME__']?$_SESSION['__SS_USER_NICKNAME__']:$_SESSION['__SS_USER_NAME__'];
   $level = $is_leader;
   $room_no = 2;
   $room_title = "국내 주야간 선물 옵션";

   //안드로이드 이면
   if(preg_match($and, $_SERVER['HTTP_USER_AGENT'])) {
      echo "<script> location.href='intent://app.livesam.com?sitecode=".$sitecode."&Id=".$id."&pw=".$Pw."&nickname=".urlencode($nick)."&level=".urlencode($level)."&lectureid=".urlencode($room_no)."&lecturetitle=".urlencode($room_title)."&logip=221.143.48.197&logport=7001#Intent;scheme=livesam;action=android.intent.action.VIEW;category=android.intent.category.BROWSABLE;package=com.LiveSam.LiveSamAnd2;end';</script>";
   }
   elseif(preg_match($ios, $_SERVER['HTTP_USER_AGENT'])) {
      echo "<script> alert('아이폰은 아직 지원하지 않습니다.'); </script>";
   }
   else {
   
   //PC용. 아래 form post
?>

    <form name="liveForm" id="liveForm" action="https://tx2.livesam.co.kr/ssclub_launcher.php" method="post" >
    <input type="hidden" name="sitecode"  value="ssclub" /> <!-- 고정 "ssclub" -->
    <input type="hidden" name="id"  value="<?echo $_SESSION['__SS_USER_ID__']?>" /> <!-- 회원 id -->
    <input type="hidden" name="pw"  value="" /> <!-- 옵션, 사이트 회원여부 check시 사용가능 -->
    <input type="hidden" name="token"  value="" /> <!-- 옵션, 접속보안요청시 사용가능 -->
    <input type="hidden" name="nick"  value="<?echo $nick?>" /> <!-- 회원 필명 -->
    <input type="hidden" name="lv"  value="<?=$is_leader?>" /> <!-- 강사 : 10 / 부방장 : 11 / 회원 : 100 -->
    <input type="hidden" name="lec_id" id="lec_id" value="2" /> <!-- 방 번호 -->
    <input type="hidden" name="lec_t" id="lec_t" value="국내 주야간 선물 옵션" /> <!-- 방제목 -->
</form>

<script language="javascript" type="text/javascript">
// function onRun()
// {
// window.open("http://personal3.turing.co.kr/Partner/Sungsu/UrlHandler.aspx?mode=connect&fileName=&no=10293&userid=<?echo $_SESSION['__SS_USER_ID__']?>&tutorId=<?=$masterId?>&url1=http://songdoasset.com/chat/chat_url1.php", "RunWin", "left=100, top=100, width=428,height=366,scrollbars=no,status=no");
// }
// onRun();
// window.close();
//
function goRoom(){

alert('11')
    var form=document.liveForm;
    form.submit();
}

goRoom();
</script>

<? }
} else { ?>
<script type="text/javascript">
    alert('실행중인 방송이 없습니다.');
    window.close();
</script>

<? } ?>