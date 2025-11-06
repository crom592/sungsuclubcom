<? 
$SubNum="4";
 ?>
<body class="ad_in">
<form name="sym_frm" id="sym_frm" method="post" action="/ajax/symposium/save_sym_program">
<input type="hidden" name="no" value="<?=$_GET['no']?>">
<div class="board_write_wrap sym_w">
	<!--임의로 페이지 나눔-->
  	<? include_once APPPATH."views/admin/include/include.sym_w.php"; ?> 
    <!--Write-->
    <div class="input_tit"><?=$sym['title']?></div>
	<table class="board_write">    
    <tbody>
        <tr>
            <th>학술대회 프로그램</th>
            <td><textarea class="ipw ipw_tt" name="sym_program"><?=$sym['sym_program']?></textarea></td>
        </tr>
    </tbody>
    </table>
    <!--//Write-->    
    
    
    <div class="btn_wrap"> 
        <a class="btn btn1 rr" href="javascript:form_submit()">확인</a>
        <a href="sym_list" class="btn btn1 cc">목록보기</a>
    </div>

</div>
</form>
<script>
    function form_submit() {
        $('#sym_frm').submit();
    }

</script>  
</body>
</html>
