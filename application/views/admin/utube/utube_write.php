<body class="ad_in">

<h2 class="tit1">유투브 관리</h2>

<div class="board_write_wrap vod_write">
	<!--Write-->
    <div class="input_tit">동영상 등록<u class="tt_r">모든 항목을 빠짐없이 입력해야만 동영상 등록이 가능합니다.</u></div>

    <form name="frm"  id="frm" method="post" action="/ajax/utube/save" enctype='multipart/form-data'">

    <table class="board_write">    
    <tbody>
        <tr>
            <th>유투브 채널</th>
            <td>
            <select class="ipw ipw1" name="channel">
              <option value=1 <?=$view[0]['channel']==1?'selected':'';?>>1채널</option>
              <option value=2 <?=$view[0]['channel']==2?'selected':'';?>>>2채널</option>
            </select>              
            </td>
        </tr>
        <tr>
            <th>유투브 제목</th>
            <td><input type="text" class="ipw ipw2" name="title" id="vod_title" value="<?=$view[0]['title']?>"><span class="tt"> 25 글자 내로 작성해주세요</span></td>
        </tr>
        <tr>
            <th>유투브 링크</th>
            <td><input type="text" class="ipw ipw2" name="link_url" id="link" value="<?=$view[0]['link_url']?>"></td>
        </tr>

    </tbody>
    </table>
    </form>
    <!--//Write-->  
   
    <div class="btn_wrap"> 
        <a href="javascript:form_submit()" class="btn btn1 cc">유투브 등록</a>
    </div>

</div>


<script type="text/javascript">

    function form_submit() {
        if ($("#vod_title").val() == "") {
            alert("제목입력은 필수입니다.")
            $('#title').focus();
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
