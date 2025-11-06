<?

if(!$list[0]['vod_no'])
{
?>
<script language="javascript">
alert("동영상 정보가 부족합니다.");
window.close();
</script>
<?
	exit;
}

?> 

<?
	// 무료동영상 강좌가 아닐경우
	//$filename_k = explode("/",$list[0]['goods_futz_filename']);
	//print_r($filename_k);
	//$excnt = count($filename_k);
	$filenames = $list[0]['goods_futz_filename'];
?>
	<script language="javascript" type="text/javascript">
	function OnWantJoin(param, mode, fileUrl, packages) {
    var l = (screen.width - 400) / 2;
    var t = (screen.height - 350) / 2;
    //window.open("http://personal3.turing.co.kr/Partner/SungSu/Run.aspx?mode=url_replay&fileName="+ fileUrl, "RunWin", "left=100, top=100, width=428,height=366,scrollbars=no,status=no");

    window.open("http://personal3.turing.co.kr/Partner/Sungsu/UrlHandler.aspx?mode=url_replay&fileName="+ fileUrl, "RunWin", "left=100, top=100, width=428,height=366,scrollbars=no,status=no");

    
}
OnWantJoin('','','<?=$filenames?>','');
window.close();
</script>

<script>
function KeyEventHandle() {
	if(( event.ctrlKey == true && ( event.keyCode == 78 || event.keyCode == 82 ) ) ||( event.keyCode >= 112 && event.keyCode <= 123 )) {
		event.keyCode = 0;
		event.cancelBubble = true;
		event.returnValue = false; 
	}
}
document.onkeydown=KeyEventHandle;
document.onkeyup=KeyEventHandle;
</script>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" oncontextmenu="return false" ondragstart="return false"  onselectstart="return false">
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td><img src="../../img/movie/pop_title.gif" width="700" height="59"></td>
  </tr>
  <tr>
    <td align="center" valign="top" background="../../img/movie/pop_bg01.gif">
	<!-- 동영상 컨텐츠 테이블 시작 -->
	  <table width="654" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td height="53" background="../../img/movie/pop_bg02.gif" class="view-font01"><?=$title?></td>
        </tr>
        <tr> 
          <td height="10"></td>
        </tr>
        <tr>
          <td height="492" align="center" background="../../img/movie/pop_bg03.gif">
		  <OBJECT CLASSID="clsid:6BF52A52-394A-11D3-B153-00C04F79FAA6" width="640" height="480" ID="WMP">
			<PARAM NAME="Name" VALUE="WMP1">
			<PARAM NAME="URL" VALUE="mms://<?=$siteData['media_server']?><?=$siteData['media_path']?><?=$rowmv[goods_code]?>.wmv"></OBJECT>
			<!--<embed src="mms://118.221.120.47/sungsu/racecar_300.wmv" >-->
		  <!--<img src="../../img/movie/sample06.gif" width="640" height="480" border="0">--></td>
        </tr>
        <tr>
          <td height="45" valign="bottom" class="view-font05">동영상 상세내용</td>
        </tr>
        <tr>
          <td><table width="654" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td><img src="../../img/movie/view_bg02.gif" width="654" height="10"></td>
              </tr>
              <tr> 
                <td height="25" bgcolor="#F6F6F6" class="view-font06"><?=$content?></td>
              </tr>
              <tr> 
                <td><img src="../../img/movie/view_bg03.gif" width="654" height="10"></td>
              </tr>
            </table></td>
        </tr>
      </table>
	  <!-- 동영상 컨텐츠 테이블 끝 -->
	  </td>
  </tr>
  <tr>
    <td><img src="../../img/movie/pop_img01.gif" width="700" height="23"></td>
  </tr>
</table>

</body>
</html>
