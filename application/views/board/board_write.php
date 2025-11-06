<? 
include_once APPPATH."views/include/include._header.php";

 ?>
<script type="text/javascript" src="/smarteditor2/js/HuskyEZCreator.js" charset="utf-8"></script>
<div class="board_write_wrap">
    <?if($write==0):?>
	<!--Privacy-->
    <dl class="guide_wrap">
        <div class="input_tit">개인정보 수집 및 이용동의</div>
        <dd><? include_once $_SERVER['DOCUMENT_ROOT']."/members/include.privacy.php"; ?></dd>
    </dl>    
    <div class="guide_check"> 위의 개인정보 수집 및 이용에 동의합니다.
      <input type="checkbox" class="cheackbox" value="Y" title="개인정보 수집 및 이용에 동의" />
    </div>
    <!--//Privacy-->
    <?endif;?>
	<!--Write-->
    <div class="input_tit">게시물 작성</div>
    <form name="form" id="form" method="POST" action="/ajax/board/save" enctype="multipart/form-data">
    <input type="hidden" name="board_no" value="<?=$view['board_no']?>">
    <input type="hidden" name="code" value="<?=$_GET['code']?>">
	<table class="board_write">    
    <tbody>
        <?if($write==0):?>
        <tr>
            <th>이름</th>
            <td><input type="text" class="ipw ipw1" title="이름" name="name" id="name" value="<?=$view['b_user_name']?$view['b_user_name']:$_SESSION['__SS_USER_NAME__']?>"></td>
        </tr>
        <tr>
            <th>비밀번호</th>
            <td><input type="password" class="ipw ipw1" id="passwd" title="비밀번호" name="passwd">
            <span class="tt">비밀글로 하시겠습니까? <input type="checkbox" name="is_secret" value="1" <?=$view['is_secret']?'checked':''?>></span>
            </td>
        </tr>
        <tr>
          <th>휴대전화</th>
          <td>
            <input class="ipw ipw3" type="text" maxlength="4" name="user_phone11" id="user_phone11" value="<?=$view[$user_phone_arr[0]]?>"> -
            <input class="ipw ipw3" type="text" maxlength="4" name="user_phone12" id="user_phone12" value="<?=$view[$$user_phone_arr[0]]?>">  -
            <input class="ipw ipw3" type="text" maxlength="4" name="user_phone13" id="user_phone13" value="<?=$view[$$user_phone_arr[0]]?>">
          </td>
        </tr>
        <tr>
            <th>이메일</th>
            <td>
            <input class="ipw ipw1" type="text" name="user_email" value="<?=$view['user_email']?>" id="user_email">
            <!-- <input type="text" class="ipw ipw1" title="이메일주소"> @ 
            <input type="text" class="ipw ipw1" title="이메일주소"> 
            <select title="항목 선택" class="ipw ipw1" >
                <option value="">직접입력</option>
                <option value="naver.com">네이버</option>
                <option value="daum.net">다음</option>
                <option value="gmail.com">지메일</option>
                <option value="nate.com">네이트</option>
                <option value="empas.com">엠파스</option>
                <option value="hanmail.net">한메일</option>
                <option value="naver.com">네이버</option>
                <option value="hotmail.com">핫메일</option>
            </select> --></td>
        </tr>
        <?endif;?>
        <tr>
            <th>제목</th>
            <td><input  type="text" class="ipw ipw2" name="title"  id="title" title="제목" value="<?=$view['title']?>"/></td>
        </tr>
        <tr>
            <th>내용</th>
            <td><textarea name="content" id="content" cols="" rows="" class="ipw ipw_tt"></textarea></td>

        </tr>
        <tr>
            <th>첨부파일</th>
            <td><?
                $idx=1;
                foreach($file as $val):
                    if($val['file_path']):
                ?>
                <input type="hidden" name="old_file_<?=$idx?>" value="<?=$val['file_path']?>" />
                <input type="hidden" name="old_file_check_<?=$idx?>" id="old_file_check_<?=$idx?>" />
                <span  id="file<?=$idx?>"><a href="<?=$val['file_path']?>"><?=$val['file_name']?></a> <a href="javascript:previewDelete(<?=$idx?>,<?=$val['no']?>)" class="i-close" title="삭제하기"></a></span>&nbsp;&nbsp;
                <?  $idx++;
                    endif;
                 endforeach;?>
                <li><input type="file" class="ipw" name="up_file1"/><span class="file_btn"><!-- <i class="i-plus"></i></span> <span class="file_btn"><i class="i-minus"></i></span> --></li>
                <li><input type="file" class="ipw" name="up_file2"/><span class="file_btn"><!-- <i class="i-plus"></i></span> <span class="file_btn"><i class="i-minus"></i></span> --></li>
                <li><input type="file" class="ipw" name="up_file3"/><span class="file_btn"><!-- <i class="i-plus"></i></span> <span class="file_btn"><i class="i-minus"></i></span> --></li>
                <li><input type="file" class="ipw" name="up_file4"/><span class="file_btn"><!-- <i class="i-plus"></i></span> <span class="file_btn"><i class="i-minus"></i></span> --></li>
            </td>
        </tr>
    </tbody>
    </table>
    <!--//Write-->    
    </form>
    
    <div class="btn_wrap"> 
        <a href="javascript:form_submit()" class="btn btn1 cc">확인</a>
        <a href="javascript:history.back()" class="btn btn1 cc">취소</a>
    </div>
    

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
<script>
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

        $('#form').submit();

        //if (confirm("해당 정보로 등록하시겠습니까?")) {
            
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
 