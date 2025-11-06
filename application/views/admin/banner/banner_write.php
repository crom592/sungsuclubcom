<body class="ad_in">

<h2 class="tit1">배너 관리</h2>

<div class="board_write_wrap vod_write">
	<!--Write-->
    <div class="input_tit">배너 등록<u class="tt_r">모든 항목을 빠짐없이 입력해야만 동영상 등록이 가능합니다.</u></div>

    <form name="frm"  id="frm" method="post" action="/ajax/banner/save" enctype='multipart/form-data'">

    <table class="board_write">    
    <tbody>

        <tr>
          <th>배너 제목</th>
          <td><input type="text" class="ipw ipw2" name="title" id="vod_title" value="<?=$view[0]['title']?>"><span class="tt"> 25 글자 내로 작성해주세요</span></td>
        </tr>
        <tr>
          <th>추가설명</th>
          <td><textarea  class="ipw ipw_tt" name="contents" id="vod_content"><?=$view[0]['contents']?></textarea> <span class="tt"> </td>
        </tr>

        <tr>
          <th>이미지</th>
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

    </tbody>
    </table>
    </form>
    <!--//Write-->  
   
    <div class="btn_wrap"> 
        <a href="javascript:form_submit()" class="btn btn1 cc">배너 등록</a>
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
            $('#vod_title').focus();
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
