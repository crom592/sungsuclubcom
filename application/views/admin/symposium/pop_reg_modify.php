<body class="popw">
  <ul class="top">
      <li class="name"><?=$sym['user_name']?> (<?=$sym['fk_user_no']?$user_type[$sym['user_type']]:'비회원';?>)</li>
        <li class="info"><i class="i-flag"></i> <?=$sym['company_name']?></li>
        <li class="email"><i class="i-mail"></i> <?=$sym['user_email']?></a></li>
        <a href="javascript:window.close()" class="close"><i class="i-close"></i></a>
    </ul>
    <div class="con">
      <h2 class="tit tit1">
            <i class="i-user-plus"></i> <?=$sym_title?> 등록 및 수정 
            <div class="btn"><a class="btn2" href="javascript:cancelUser(<?=$_GET['no']?>)">참가신청 취소</a> <a href="javascript:window.print()"class="btn2">인쇄하기</a></div>
        </h2>
        <ul class="sub_tab">
        	<li><a href="pop_reg?no=<?=$_GET['no']?>">등록정보 상세보기</a></li>
          <li class="on"><a href="pop_reg_modify?no=<?=$_GET['no']?>">등록정보 수정하기</a></li>
        </ul>
        <!--Contents-->
        <div class="join_wrap">
            
          <!--Join input-->
          <div class="pa">
            <div class="input_tit">등록정보 수정<u>* 표시는 필수항목입니다.</u></div>
            <form name="form" id="form" method="POST" action="/ajax/symposium/update_user">
            <input type="hidden" name="no" value="<?=$sym['no']?>">
            <table class="td1 mb50">
              <tbody>
                <tr>
                  <th><span class="tt_r">*</span> 등록번호</th>
                  <td><input class="ipw ipw1" type="text" name="reg_num" id="reg_num" value="<?=$sym['reg_num']?>"> <span class="tt">등록번호 변경시 주의</span></td>
                </tr>
                <tr>
                  <th><span class="tt_r">*</span> 이름</th>
                  <td><input class="ipw ipw1" type="text" name="name" id="name" value="<?=$sym['name']?>"></td>
                </tr>
                <tr>
                  <th><span class="tt_r">*</span> 소속기관</th>
                  <td><input class="ipw ipw2" type="text" name="company" id="company" value="<?=$sym['company']?>"></td>
                </tr>
                <tr>
                  <th>직위</th>
                  <td><input class="ipw ipw1" type="text" name="title" id="title" value="<?=$sym['title']?>"></td>
                </tr>
                <tr>
                  <th><span class="tt_r">*</span> 전화번호</th>
                  <td><input class="ipw ipw1" type="text" name="phone" id="phone" value="<?=$sym['phone']?>"></td>
                </tr>
                <tr>
                  <th>휴대폰 번호</th>
                  <td><input class="ipw ipw1" type="text" name="mobile" id="mobile" value="<?=$sym['mobile']?>"></td>
                </tr>
                <tr>
                  <th>Fax</th>
                  <td><input class="ipw ipw1" type="text" name="fax" id="fax" value="<?=$sym['fax']?>"></td>
                </tr>
                <tr>
                  <th>등록구분</th>
                  <td><ul class="radio">
                        <li><input type="radio" name="is_join"  value="0" checked="checked" <?=$sym['is_join']==0?'checked':'';?>> 사전등록자</li>
                        <li><input type="radio" name="is_join"  value="1" <?=$sym['is_join']==1?'checked':'';?>> 현장등록자</li>
                    </ul></td>
                </tr>
                <tr>
                  <th>학술대회 참여여부</th>
                  <td><ul class="radio">
                        <li><input type="radio" name="is_day"  value="0" checked="checked" <?=$sym['is_day']==0?'checked':'';?>> 참석</li>
                        <li><input type="radio" name="is_day"  value="1" <?=$sym['is_day']==1?'checked':'';?>> 불참석</li>
                    </ul></td>
                </tr>
                <tr>
                  <th>Gala Dinner 참여여부</th>
                  <td><ul class="radio">
                        <li><input type="radio" name="is_gala"  value="0" checked="checked" <?=$sym['is_gala']==0?'checked':'';?>> 참석</li>
                        <li><input type="radio" name="is_gala"  value="1" <?=$sym['is_gala']==1?'checked':'';?>> 불참석</li>
                    </ul></td>
                </tr>
                <tr>
                  <th><span class="tt_r">*</span> 비밀번호</th>
                  <td><input class="ipw ipw1" type="password" name="passwd" id="passwd" value="<?=$sym['passwd']?>" ></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!--//Join input-->
          
          <div class="btn_wrap"> 
              <button type="button" class="btn btn1 cc" id="form_submit">수정</button>
          </div>
         </form>
        </div>
        <!--Contents-->
    </div>
</body>
<script type="text/javascript">
$(function(){
  $(document).on("click", "#form_submit", function(){
    if ($("#reg_num").val() == "") {
        alert("등록번호는 필수입니다.");
        $("#reg_num").focus();
        return false;
    }

    if ($("#name").val() == "") {
          alert("이름은 필수입니다.");
        $("#name").focus();
        return false;
    }

    if ($("#company").val() == "") {
        alert("소속기관은 필수입니다.");
        $("#company").focus();
        return false;
    }

    if ($("#phone").val() == "" ) {
        alert("전화는 필수입니다.");
        $("#home_phone1").focus();
        return false;
    }

    if ($("#passwd").val() == "") {
        alert("비밀번호 입력은 필수입니다.");
        $("#passwd").focus();
        return false;
    }

    if (confirm("해당 정보로 수정하시겠습니까?")) {
        $("#form").submit();
    }
    return false;
  })
})

function cancelUser(no) {
  var idx;

  var ajax_data = {
    "no": no,
  };

  $.ajax({
      url: "/ajax/symposium/cancel_user",
      type: 'POST',
      data: ajax_data,
      success: function (data) {
        if(data==1) alert('신청취소되었습니다');
        else alert('취소중 오류가 발생하였습니다');
        window.location.reload();
        opener.location.reload();
      },
      error: function (jqXHR, textStatus, errorThrown) {
          alert("정보를 받아오는 도중 에러가 발생하였습니다. 다시 시도해 주세요. \n" + textStatus + " : " + errorThrown);
          self.close();
      }
  });

  return idx;
}
</script>

</html>
