<body class="ad_in">

<h2 class="tit1">동영상 관리</h2>

<div class="board_write_wrap vod_write">
	<!--Write-->
    <div class="input_tit">동영상 등록<u class="tt_r">모든 항목을 빠짐없이 입력해야만 동영상 등록이 가능합니다.</u></div>

    <form name="frm"  id="frm" method="post" action="/ajax/vod/save" enctype='multipart/form-data'">

    <input type="hidden" name="goods_futz_analId" value="<?=$view[0]['goods_futz_analId']?>">
    <input type="hidden" name="goods_futz_nickName" value="<?=$view[0]['goods_futz_nickname']?>">
    <input type="hidden" name="goods_futz_filename" value="<?=$view[0]['goods_futz_filename']?>">
    <input type="hidden" name="goods_futz_bRoom" value="<?=$view[0]['goods_futz_bRoom']?>">
    <input type="hidden" name="goods_futz_date" value="<?=$view[0]['goods_futz_date']?>">
    <table class="board_write">    
    <tbody>
        <tr>
            <th>동영상 채널</th>
            <td>
            <select class="ipw ipw1" name="vod_channel">
              <option value=1>1채널</option>
              <option value=2>2채널</option>
            </select>              
            </td>
        </tr>
        <tr>
            <th>동영상 제목</th>
          <td><input type="text" class="ipw ipw2" name="vod_title" id="vod_title" value="<?=$view[0]['vod_title']?>"><span class="tt"> 25 글자 내로 작성해주세요</span></td>
        </tr>
        <tr>
          <th>추가설명</th>
          <td><textarea  class="ipw ipw_tt" name="vod_content" id="vod_content"><?=$view[0]['vod_content']?></textarea> <span class="tt"> 70 글자 내로 작성해주세요</span></td>
        </tr>
        <tr>
            <th>재생시간</th>
          <td><input type="text" class="ipw ipw2" name="play_time" id="play_time" value="<?=$view[0]['play_time']?>"><span class="tt"> 09:10:10 형태로 입력하세요</span></td>
        </tr>
        <tr>
          <th>대표이미지</th>
          <td>
            <?
                $idx=1;
                foreach($file as $val):
                    if($val['file_path']):
                ?>
                <input type="hidden" name="old_file_<?=$idx?>" value="<?=$val['file_path']?>" />
                <input type="hidden" name="old_file_check_<?=$idx?>" id="old_file_check_<?=$idx?>" />
                <li class="before"><span  id="file<?=$idx?>"><a href="<?=$val['file_path']?>"><?=$val['file_name']?></a> <span class="del btn btn1" onclick="previewDelete(<?=$idx?>,<?=$val['no']?>)">기존파일 삭제</span></span></li>
                <?  $idx++;
                    endif;
                 endforeach;?>
            <input type="file" class="ipw" name="up_file1"/><span class="file_btn"> <span class="tt">604 X 310 pixel 로 업로드해주세요</span>
            </td>
        </tr>
        <tr>
          <th>튜링 녹화영상</th>
          <td><a class="btn btn1" href="javascript:futzopen()">선택 BUTTON</a> </span><span id='span_file_name'><?=$view[0]['goods_futz_filename']?></span></td>
        </tr>
    </tbody>
    </table>
    </form>
    <!--//Write-->  
   
    <div class="btn_wrap"> 
        <a href="javascript:form_submit()" class="btn btn1 cc">동영상 등록</a>
    </div>

</div>
<script>
    function futzopen() {
        url = "pop_vodlist";
        aa = window.open(url,'in','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,top=10, left=5,width=900, height=450');
    }
</script>

<script type="text/javascript">
    function previewDelete(idx, file_no){
        $("#old_file_check_" + idx).val(file_no);
        $("#file"+idx).hide();
        $("input[name='up_file" + idx + "']").val('');
    }
    function form_submit() {
        if ($("#vod_title").val() == "") {
            alert("제목입력은 필수입니다.")
            $('#title').focus();
            return false;
        }
        if ($("#vod_content").val() == "") {
            alert("내용 입력은 필수입니다.")
            $('#vod_content').focus();
            return false;
        }

        if (confirm("해당 정보로 등록하시겠습니까?")) {
            $('#frm').submit();
            /*$.ajax({
              url: "/ajax/thesis/save",
              type: 'POST',
              data: $('#form').serialize(),
              success: function (data) {
        
                if(data==1) alert('저장되었습니다');
                else alert('저장중 오류가 발생하였습니다');
                window.location.reload();

              },
              error: function (jqXHR, textStatus, errorThrown) {
                  alert("정보를 받아오는 도중 에러가 발생하였습니다. 다시 시도해 주세요. \n" + textStatus + " : " + errorThrown);
                 
              }
            });*/
        }
        return false;
    }
</script>

</body>
</html>
