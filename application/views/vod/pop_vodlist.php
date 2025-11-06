<?
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: pre-check=0, post-check=0, max-age=0");
header("Pragma: no-cache"); 
//&date=2013-09-25 이후 날짜 검색.
$siteData['futz_url'] ="http://personal.turing.co.kr/Partner/SungsuClub/VodList.aspx?partnerId=sungsuclub";
$file_url = fetch_url($siteData['futz_url']); 

write_file("/futz_xml/xmlVodList.xml", $file_url);

$file = "/futz_xml/xmlVodList.xml";               // 불러올 파일명
$f = fopen( $file, "r" );     // 파일을 열어 '읽기만' 한다. (포인터는 파일의 맨 처음)
$i=0;
while ( ( $line = fgets( $f, 4096 ) ) !== false ) {  // 파일이 끝날 때까지 loop
$filetext[$i] = iconv('utf8','euckr',$line);
$i++;
}
fclose($f);
                // 파일을 닫는다.
?>

<HTML>
<HEAD>
<TITLE> 성수클럽 동영상리스트</TITLE>
<link href="../../style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/common/script/jquery.js"></script>
<script language="javascript">

function setMovie(analId, nickName, filename, bRoom)
{
	var span_file_name = opener.document.getElementById('span_file_name');
	span_file_name.innerHTML = '<font color=red>' + filename + '</font>';
	opener.document.frm.goods_futz_analId.value = analId;
	opener.document.frm.goods_futz_nickName.value = nickName;
	opener.document.frm.goods_futz_filename.value = filename;
	opener.document.frm.goods_futz_bRoom.value = bRoom;
	self.close();
}
 </script>
 </HEAD>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<div id="movielist">
<table align='center' border='1' cellspacing='0' width='872' bordercolordark='white' bordercolorlight='#999999'>
	<tr height='25' bgcolor='#C7E0F8'>
        <td width='50'><p align='center'>순번</p></td>
        <td width='44'><p align='center'>ID</p></td>
        <td width='96'><p align='center'>닉네임</p></td>
        <td width='300'><p align='center'>파일명</p></td>
        <td width='158'><p align='center'>방번호</p></td>
        <td width='156'><p align='center'>등록시간</p></td>
        <td width='46'><p align='center'>선택</p></td>
	</tr>
	<? 
	for($i=0;$i<sizeof($filetext);$i++){
	$rows = explode("\t",$filetext[$i]);
	//print_r($rows);
	?>
	<tr>
		<td><?=$rows[0]?></td>
		<td><?=$rows[3]?></td>
		<td><?=$rows[1]?></td>
		<td><?=$rows[4]?></td>
		<td><?=$rows[1]?></td>
		<td><?=$rows[7]?></td>
		<td><b><a href="javascript:setMovie('<?=$rows[3]?>','<?=$rows[1]?>','<?=$rows[4]?>','<?=$rows[3]?>')"><u>선택</u></a></b></td>
	</tr>
	
<?
}
?>
</table>
</div>
 </BODY>
</HTML>
