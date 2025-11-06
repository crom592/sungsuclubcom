<?php
$sitecode = 'ssclub';
$id = 'ab2801';
$nick = '장성수';
$room_no = 99;
$room_title = '주간 위클';
/**
 * 6. 개발시 get 방식으로 접속 테스트 주소.
    방장일 경우
    https://tx2.livesam.co.kr/ssclub_launcher.php?sitecode=ssclub&id=testid&pw=1234&nick=testnick&lv=10&lec_id=99&lec_t=lectitle&test=t

    회원일 경우(방장이 입장(방개설) 후 입장할 수 있습니다.
    https://tx2.livesam.co.kr/ssclub_launcher.php?sitecode=ssclub&id=testid1&pw=1234&nick=testnick1&lv=100&lec_id=99&lec_t=lectitle&test=t
**/
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script type="text/javascript" src="//code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">


function goRoom(roomNo){

    var form=document.formname;

    form.submit();
}
</script>
<form name="formname" id="myform1" action="https://tx2.livesam.co.kr/ssclub_launcher.php" method="post" >
    <input type="hidden" name="sitecode"  value="<?php echo $sitecode; ?>" /> <!-- 고정 "ssclub" -->
    <input type="hidden" name="id"  value="<?php echo $id; ?>" /> <!-- 회원 id -->
    <input type="hidden" name="pw"  value="<?php echo $pw; ?>" /> <!-- 옵션, 사이트 회원여부 check시 사용가능 -->
    <input type="hidden" name="token"  value="<?php echo $token; ?>" /> <!-- 옵션, 접속보안요청시 사용가능 -->
    <input type="hidden" name="nick"  value="<?php echo $nick;?>" /> <!-- 회원 필명 --> 
    <input type="hidden" name="lv"  value="10" /> <!-- 강사 : 10 / 부방장 : 11 / 회원 : 100 -->
    <input type="hidden" name="lec_id" id="lec_id" value="99" /> <!-- 방 번호 -->
    <input type="hidden" name="lec_t" id="lec_t" value="주간위클리" /> <!-- 방제목 -->
     <button type="button" onClick="goRoom('99')">GO</button>
</form>