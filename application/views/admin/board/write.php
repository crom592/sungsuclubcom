<script type="text/javascript" src="/smarteditor2/js/HuskyEZCreator.js" charset="utf-8"></script>
<body class="ad_in">
<!--쓰기와 수정은 같은 페이지를 사용합니다.-->
<div class="board_write_wrap">

	<!--Write-->
    <form name="form" id="form" method="POST" action="/ajax/board/save_admin" enctype="multipart/form-data">
    <input type="hidden" name="code" value="<?=$_GET['code']?>">
    <input type="hidden" name="board_no" value="<?=$_GET['no']?>">
    <div class="input_tit">게시물 작성</div>
	<table class="board_write">    
    <tbody>
        <tr>
            <th>공지여부</th>
            <td>
            <ul class="radio">
            	<li><input type="radio" name="is_notice" value='1' <?=$view[0]['is_notice']==1?'checked':'';?>> 공지글</li>
                <li><input type="radio" name="is_notice" value='0' <?=$view[0]['is_notice']==0?'checked':'';?> checked=''> 일반글</li>
            </ul>
            </td>
        </tr>
        <tr>
            <th>기존작성자</th>
            <td><?=$view[0]['user_nickname']?$view[0]['user_nickname']:$view[0]['reg_name'];?></td>
        </tr>
        <tr>
            <th>작성자</th>
            <td><input type="text" class="ipw ipw1" title="이름" name="name" id="name" value='<?=$view[0]['user_nickname']?>'></td>
        </tr>
        <tr>
            <th>비밀번호</th>
            <td><input type="password" class="ipw ipw1" title="비밀번호" name="passwd" id="passwd" value='<?=$view[0]['passwd']?>'></td>
        </tr>
        <tr>
            <th>조회수</th>
            <td><input type="text" class="ipw ipw1" title="조회수"  name="view_count" id="view_count" value='<?=$view[0]['view_count']?>'> <span class="tt">반드시 숫자로만 입력</span></td>
        </tr>
        <tr>
            <th>등록일</th>
            <td><input type="text" class="ipw ipw1" title="등록일" name="reg_date" id="reg_date" value="<?=$view[0]['reg_date']?$view[0]['reg_date']:date('Y-m-d H:i:s');?>"> <span class="tt">예) 2020-12-20 12:00:00</span></td>
        </tr>
        <tr>
            <th>출력순서</th>
            <td><input type="text" class="ipw ipw1" title="출력순서" name="orderno" id="orderno"  value="<?=$view[0]['orderno']?$view[0]['order_no']:1;?>" > <span class="tt">숫자로만 입력해 주세요. 미 입력시 고유 인덱스로 자동등록됩니다. 예) 550</span></td>
        </tr>
        <tr>
            <th>외부링크</th>
            <td><input type="text" class="ipw ipw2" title="외부링크"  name="link_url" id="link_url" value="<?=$view[0]['link_url']?>"> <span class="tt">http:// 포함 입력해야 하며 입력시 유저사이트에서 본문이 아닌 링크사이트가 열립니다.</span></td>
        </tr>
        <tr>
            <th>제목</th>
            <td><input type="text" class="ipw ipw2" title="제목"  name="title" id="title" value="<?=$view[0]['title']?>"></td>
        </tr>
        <tr>
            <th>내용</th>
            <td><textarea class="ipw ipw_tt"  name="content" id="content" ><?=$view[0]['content']?></textarea></td>
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
                <li class="before"><span  id="file<?=$idx?>"><a href="<?=$val['file_path']?>"><?=$val['file_name']?></a> <span class="del btn btn1" onclick="previewDelete(<?=$idx?>,<?=$val['no']?>)">기존파일 삭제</span></span></li>
                <?  $idx++;
                    endif;
                 endforeach;?>
              	<li><input type="file" class="ipw" name="up_file1"/><span class="file_btn"><!-- <i class="i-plus"></i></span> <span class="file_btn"><i class="i-minus"></i></span> --></li>
                <li><input type="file" class="ipw" name="up_file2"/><span class="file_btn"><!-- <i class="i-plus"></i></span> <span class="file_btn"><i class="i-minus"></i></span> --></li>
                <li><input type="file" class="ipw" name="up_file3"/><span class="file_btn"><!-- <i class="i-plus"></i></span> <span class="file_btn"><i class="i-minus"></i></span> --></li>
                <li><input type="file" class="ipw" name="up_file4"/><span class="file_btn"><!-- <i class="i-plus"></i></span> <span class="file_btn"><i class="i-minus"></i></span> --></li>
                <li><input type="file" class="ipw" name="up_file5"/><span class="file_btn"><!-- <i class="i-plus"></i></span> <span class="file_btn"><i class="i-minus"></i></span> --></li>
            </ul> 
            </td>
        </tr>
    </tbody>
    </table>
    <!--//Write-->    
    
    
    <div class="btn_wrap"> 
        <a href="javascript:form_submit()" class="btn btn1 cc">저장</a>
        <a href="/adm/board/list?<?=$param?>" class="btn btn1 cc">목록</a>
        

    </div>
</form>
</div>
<script type="text/javascript">

var oEditors = [];
 
$(function(){
    nhn.husky.EZCreator.createInIFrame({
        oAppRef: oEditors,
        elPlaceHolder: "content",
        //SmartEditor2Skin.html 파일이 존재하는 경로
        sSkinURI: "/smarteditor2/SmartEditor2Skin.html",  
        htParams : {
            // 툴바 사용 여부 (true:사용/ false:사용하지 않음)
            bUseToolbar : true,             
            // 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
            bUseVerticalResizer : true,     
            // 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
            bUseModeChanger : true,         
            fOnBeforeUnload : function(){

            }
        }, 
        fCreator: "createSEditor2",
        fOnAppLoad : function(){
        //textarea 내용을 에디터상에 바로 뿌려주고자 할때 사용
            oEditors.getById["content"].exec("PASTE_HTML", ['<?=$view['content']?>']);
            oEditors.getById['content'].setDefaultFont( "돋움", 11);  // 기본 글꼴 설정 추가

        }
    });
});    
</script>
<script type="text/javascript">
    function previewDelete(idx, file_no){
        $("#old_file_check_" + idx).val(file_no);
        $("#file"+idx).hide();
        $("input[name='up_file" + idx + "']").val('');
    }
    function form_submit() {
        if ($("#title").val() == "") {
            alert("제목입력은 필수입니다.")
            $('#title').focus();
            return false;
        }
        oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []); 
        if ($("#content").val() == "") {
            alert("내용 입력은 필수입니다.")
            $('#content').focus();
            return false;
        }

        //if (confirm("해당 정보로 등록하시겠습니까?")) {
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
        //}
        return false;
    }
</script>


</body>
</html>
