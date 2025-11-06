<script language="javascript">

function setMovie(analId, filename, title, bDate)
{
	var span_file_name = opener.document.getElementById('span_file_name');
	span_file_name.innerHTML = '<font color=red>' + filename + '</font>';
	opener.document.frm.goods_futz_analId.value = analId;
	opener.document.frm.goods_futz_nickName.value = '';
	opener.document.frm.goods_futz_filename.value = filename;
	opener.document.frm.goods_futz_bRoom.value = title;
	opener.document.frm.goods_futz_date.value = bDate;
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
        <td width='300'><p align='center'>파일명</p></td>
        <td width='158'><p align='center'>녹화시작시간</p></td>
        <td width='156'><p align='center'>녹화종료시간</p></td>
        <td width='46'><p align='center'>선택</p></td>
	</tr>

	<? 
		foreach($list as $index=>$value){

		?>
		<tr>
			<td><?=$value['no']?></td>
			<td><?=$value['userid']?></td>
			<td><?=$value['filename']?></td>
			<td><?=$value['stime']?></td>
			<td><?=$value['etime']?></td>
			<td><b><a href="javascript:setMovie('<?=$value['userid']?>','<?=$value['filename']?>','<?=iconv("EUC-KR", "UTF-8", $value['title']);?>','<?=iconv("EUC-KR", "UTF-8", $value['stime']);?>')"><u>선택</u></a></b></td>
		</tr>
		
	<?
	}
	?>
</table>
</div>
 </BODY>
</HTML>
