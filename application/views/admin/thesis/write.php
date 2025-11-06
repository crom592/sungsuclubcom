<? 
$arr = array(1=>'신청',2=>'접수',3=>'수정후승인',4=>'보완',5=>'반려',6=>'승인');
?>
<body class="ad_in">
<!--쓰기와 수정은 같은 페이지를 사용합니다.-->
<div class="board_write_wrap">

	<!--Write-->
    <div class="input_tit">게시물 작성</div>
    <form name="form" id="form" method="POST" action="/ajax/thesis/save" enctype="multipart/form-data">
    <input type="hidden" name="type" value="a">
    <input type="hidden" name="fk_thesis_no" value="<?=$view[0]['thesis_no']?>">
	<table class="board_write">    
    <tbody>
        
        <tr>
            <th>작성자</th>
            <td><input type="text" class="ipw ipw1" title="이름" name="name" id="name" value='<?=$view[0]['name']?>'></td>
        </tr>
        <tr>
            <th>비밀번호</th>
            <td><input type="password" class="ipw ipw1" title="비밀번호" name="passwd" id="passwd" value='<?=$view[0]['passwd']?>'></td>
        </tr>
        <tr>
            <th>조회수</th>
            <td><input type="text" class="ipw ipw1" title="조회수" value='<?=$view[0]['view_count']?>'> <span class="tt">반드시 숫자로만 입력</span></td>
        </tr>
        <tr>
            <th>등록일</th>
            <td><input type="text" class="ipw ipw1" title="등록일" name="reg_date" id="reg_date" value="<?=$view[0]['reg_date']?$view[0]['reg_date']:date('Y-m-d H:i:s');?>"> <span class="tt">예) 2020-12-20 12:00:00</span></td>
        </tr>
        <tr>
          <th>현재상태</th>
          <td>
            <select class="ipw ipw1" name="status">
                <?foreach($arr as $index=>$val):?>
                <option value="<?=$index?>" <?=$view[0]['status']==$index?'selected':'';?>><?=$val?></option>
                <?endforeach;?>
            </select>
          </td>
        </tr>
        <tr>
            <th>제목</th>
            <td><input type="text" class="ipw ipw2" title="제목" name="title" id="title" value="<?=$view[0]['title']?>"></td>
        </tr>
        <tr>
            <th>내용</th>
            <td><textarea class="ipw ipw_tt" name="content" id="content" ><?=$view[0]['content']?></textarea></td>
        </tr>
        <tr>
            <th>첨부파일</th>
            <td>
              <ul class="bw_file">
                <?
                $idx=1;
                foreach($file as $val):
                    if($val['file_path']):
                ?>
                <input type="hidden" name="old_file_<?=$idx?>" value="<?=$val['file_path']?>" />
                <input type="hidden" name="old_file_check_<?=$idx?>" id="old_file_check_<?=$idx?>" />
                <li class="before"><span  id="file<?=$idx?>"><a href="<?=$val['file_path']?>"><?=$val['file_name']?></a> <span class="del btn btn1" onclick="previewDelete(<?=$idx?>,<?=$file['no']?>)">기존파일 삭제</span></span></li>
                <?  $idx++;
                    endif;
                 endforeach;?>
                <li><input type="file" class="ipw" name="up_file1"/><span class="file_btn"><!-- <i class="i-plus"></i></span> <span class="file_btn"><i class="i-minus"></i></span> --></li>
                <li><input type="file" class="ipw" name="up_file2"/><span class="file_btn"><!-- <i class="i-plus"></i></span> <span class="file_btn"><i class="i-minus"></i></span> --></li>
                </ul>             
            </td>
        </tr>
    </tbody>
    </table>
    <!--//Write-->    
    
    
    <div class="btn_wrap"> 
        <a href="javascript:form_submit()" class="btn btn1 cc">저장</a>
        <a href="/admin/thesis/list?<?=$param?>" class="btn btn1 cc">목록</a>
    </div>
    </form>
</div>

<script type="text/javascript">
    function form_submit() {
        if ($("#title").val() == "") {
            alert("제목입력은 필수입니다.")
            $('#title').focus();
            return false;
        }
        if ($("#content").val() == "") {
            alert("내용 입력은 필수입니다.")
            $('#content').focus();
            return false;
        }

        if (confirm("해당 정보로 등록하시겠습니까?")) {
            $('#form').submit();
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
