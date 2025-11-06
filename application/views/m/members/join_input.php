<? 
$PageNum="members";
$SubNum="join";
$Title="회원가입";
include_once APPPATH."views/m/include/include._header.php"; ?>
<form name="form" id="form" method="POST" action="/ajax/user/save_user">
<div class="join_wrap">
  <div class="members_tit"> 
    <i class="i-user-plus-o"></i>회원정보 <b>입력</b> <u>해당되는 정보를 입력하여 주시기 바랍니다. <br /><span class="tt_r">*</span> 는 필수입력 사항입니다.</u> 
  </div>
    
  <!--Join input-->
  <div class="pa2">
    <div class="input_tit">회원 기본정보 입력 <u>필수입력사항</u></div>
    <table class="td1 mb50">
      <tbody>
        <tr>
          <th><span class="tt_r">*</span> 아이디</th>
          <td><input  class="ipw ipw1" type="text" maxlength="12" name="user_id" id="user_id"/>  
             <span class="tt">4~12자의 영문과 숫자의 조합</span><span id="id_check_view"></span> </td>
        </tr>
        <tr>
          <th><span class="tt_r">*</span> 비밀번호</th>
          <td><input  class="ipw ipw1"  type="password" name="user_pwd" id="user_pwd">
            <span class="tt">6~20자의 영문과 숫자의 조합</span>
            <span id="pw_check_view"></span></td>
        </tr>
        <tr>
          <th><span class="tt_r">*</span> 비밀번호 확인</th>
          <td><input  class="ipw ipw1" type="password"  name="re_user_pwd" id="user_pwd_ck"> <span id="pw_check_view2"></span></td>
        </tr>
        <tr>
          <th><span class="tt_r">*</span> 성명</th>
          <td><input  class="ipw ipw1" type="text"  name="user_name" id="user_name" value="<?=$user['user_name']?>"></td>
        </tr>
        <tr>
          <th><span class="tt_r">*</span> 닉네임</th>
          <td><input  class="ipw ipw1" type="text" name="user_nickname" id="user_nickname" value="<?=$user['user_nickname']?>"> <span id="nick_check_view"></span> </td>
        </tr>
        <tr>
          <th><span class="tt_r">*</span> 이메일</th>
          <td><!-- <input class="ipw ipw1" type="text"  /> @ <input   class="ipw ipw1" type="text" />
            <select name="select2" class="ipw ipw1" >
                <option value="" selected="selected">직접입력</option>
                <option value="naver.com">naver.com</option>
                <option value="hanmail.net">hanmail.net</option>
                <option value="daum.net">daum.net</option>
                <option value="nate.com">nate.com</option>
                <option value="gmail.com">gmail.com</option>
            </select> -->
            <input class="ipw ipw1" type="text" name="user_email" value="<?=$user['user_email']?>" id="user_email">&nbsp; <span id="email_check_view">
          <ul class="radio in">
            <li><input type="radio" checked="checked"  name="email_yn" id="email_yn" value="Y" <?=$user['email_yn']=='Y'?'checked':'';?>>  메일 수신</li>
            <li><input type="radio"  name="email_yn" id="email_yn" value="N" <?=$user['email_yn']=='N'?'checked':'';?>> 메일 수신 거부</li>
          </ul>
        </td>
        </tr>
        <tr>
          <th><span class="tt_r">*</span> 우편번호</th>
          <td><input class="ipw ipw1" type="text" name="pzip" id="pzip" value="<?=$user['pzip']?>" maxlength="5"> <span class="btn btn1" id="zip_search" onclick="goPopup(2);">우편번호 검색</span></td>
        </tr>
        <tr>
          <th><span class="tt_r">*</span> 주소</th>
          <td><input class="ipw ipw2" type="text" name="paddress" id="paddress" value="<?=$user['paddress']?>">  <input class="ipw ipw2" type="text" name="paddress_part" id="paddress_part" value="<?=$user['paddress_part']?>"></td>
        </tr>
        <tr class="td1">
          <?
            $user_phone_arr = explode('-', $user['user_phone']);
          ?>
            <th><span class="tt_r">*</span> 휴대폰</th>
            <td><input class="ipw ipw3" type="text" maxlength="4" name="user_phone11" id="user_phone11" value="<?=$user_phone_arr[0]?>"> -
              <input class="ipw ipw3" type="text" maxlength="4" name="user_phone12" id="user_phone12" value="<?=$user_phone_arr[0]?>">  -
              <input class="ipw ipw3" type="text" maxlength="4" name="user_phone13" id="user_phone13" value="<?=$user_phone_arr[0]?>"> <span id="phone_check_view"></td>
        </tr>
     
        <?
          $user_phone2_arr = explode('-', $user['user_phone2']);
        ?>
        <tr>
          <th><span class="tt_r"></span> 전화번호</th>
          <td><input class="ipw ipw3" type="text" maxlength="4" name="user_phone21" id="user_phone21" value="<?=$user_phone2_arr[0]?>"> -
            <input class="ipw ipw3" type="text" maxlength="4" name="user_phone22" id="user_phone22" value="<?=$user_phone2_arr[0]?>">  -
            <input class="ipw ipw3" type="text" maxlength="4" name="user_phone23" id="user_phone23" value="<?=$user_phone2_arr[0]?>"> </td>
        </tr>
         <?
          $birth_arr = explode('-', $user['user_birth_day']);
        ?>
        <tr>
          <th><span class="tt_r">*</span> 생년월일</th>
          <td><input class="ipw ipw3" type="text" name="user_birth_year" value="<?=$birth_arr[0]?>"> 년
            <input class="ipw ipw3" type="text" name="user_birth_month" value="<?=$birth_arr[1]?>"> 월
            <input class="ipw ipw3" type="text" name="user_birth_day" value="<?=$birth_arr[2]?>">일 </td>
          </td>
        </tr>
        <tr>
          <th><span class="tt_r">*</span> 성별</th>
          <td><ul class="radio">
              <li><input type="radio" checked="checked" name="user_gender" value="M" <?=$user['user_gender']=='M'?'checked':'';?>> 남자</li>
               <li><input type="radio" name="user_gender" value="F" <?=$user['user_gender']=='F'?'checked':'';?>>  여자</li>
          </ul></td>
        </tr>
      </tbody>
    </table>
  </div>
  <!--//Join input-->
  
  <div class="btn_wrap"> 
      <button type="button" id="form_submit" class="btn btn1 cc">확인</button> 
      <button type="button" onclick="location.href='/'" class="btn btn1 cc">취소</button> 
  </div>
</div>

</form>


<script>
document.domain = "songdoasset.com";
$(function(){
  var idUseCheck=false;
  var pwUseCheck=false;
  var phoneUseCheck=false;
  var emailUseCheck=false;
  var idCheck= RegExp(/^[a-zA-Z0-9]{4,12}$/)
  var nicknameCheck = RegExp(/^[가-힣a-zA-Z0-9]{2,100}$/);
  var passwordCheck=  RegExp(/^[a-zA-Z0-9!@#$%^&*()?_~]{6,20}$/)
  var pattern1 = /[~!#$%^&*()_+|<>?:{}'`]/gi; // 특수문자
  var pattern2 = /[@]/gi; // 특수문자

  var reg_email = /^([0-9a-zA-Z_\.-]+)@([0-9a-zA-Z_-]+)(\.[0-9a-zA-Z_-]+){1,2}$/;

  //아이디 체크
  $(document).on("blur", "#user_id", function(){
      $("#id_check_view").show();
      if((!idCheck.test($(this).val()) || pattern1.test($(this).val())) && !pattern2.test($(this).val())){
          $("#id_check_view").css('color', '#ff0000');
          $("#id_check_view").text('아이디는 4자이상 12자까지 영문 , 숫자만 사용 가능합니다.');
          return false;
      }

      var ajax_ata = {
          "user_id": $(this).val()
      };

      $.ajax({
          url: "/ajax/user/idCheck",
          type: 'GET',
          data: ajax_ata,
          success: function (data) {
              if (data == 'Y') {
                  $("#id_check_view").css('color', '#ff0000');
                  $("#id_check_view").text('이미 가입된 아이디 입니다.');
                  $('#user_id').val("");
              } else {
                  $("#id_check_view").css('color', '#009b00');
                  $("#id_check_view").text('사용 가능한 아이디 입니다.');
                  idUseCheck=true;
              }
              return false;
          },
          error: function (jqXHR, textStatus, errorThrown) {
              alert("정보를 받아오는 도중 에러가 발생하였습니다. 다시 시도해 주세요. \n" + textStatus + " : " + errorThrown);
              self.close();
          }
      });
  });

  //비밀번호 체크
  $(document).on("blur", "#user_pwd, #user_pwd_ck", function(){
      $("#pw_check_view").show();
      if(!passwordCheck.test($("#user_pwd").val())){
          $("#pw_check_view").css('color', '#ff0000');
          $("#pw_check_view").text('6~20자 영문 , 숫자 , 특수문자를 사용하세요.');
          return false;
      } else {
          $("#pw_check_view").css('color', '#009b00');
          $("#pw_check_view").text('사용 가능한 비밀번호 입니다.');
      }

      $("#pw_check_view2").show();
      if($("#user_pwd_ck").val() == ""){
          $("#pw_check_view2").css('color', '#ff0000');
          $("#pw_check_view2").text('비밀번호 확인을 입력해주세요.');
          return false;
      }
      if ($("#user_pwd").val() != $("#user_pwd_ck").val()) {
          $("#pw_check_view2").css('color', '#ff0000');
          $("#pw_check_view2").text('비밀번호가 일치하지 않습니다.');
          return false;
      }

      $("#pw_check_view").css('color', '#009b00');
      $("#pw_check_view").text('사용 가능한 비밀번호 입니다.');
      $("#pw_check_view2").css('color', '#009b00');
      $("#pw_check_view2").text('비밀번호가 일치합니다.');

      pwUseCheck=true;
  });

  //휴대폰번호 체크
  $(document).on("blur", "#user_phone13", function(){
      $("#phone_check_view").show();

      if ($(this).val() == '') {
          $("#phone_check_view").css('color', '#ff0000');
          $("#phone_check_view").text('휴대전화 번호는 필수 입력대상입니다.');
          return false;
      }

      var ajax_ata = {
          "user_phone": $('#user_phone11').val()+"-"+$('#user_phone12').val()+"-"+$('#user_phone13').val()
      };

      $.ajax({
          url: "/ajax/user/phoneCheck",
          type: 'GET',
          data: ajax_ata,
          success: function (data) {
              if (data == 'Y') {
                  $("#phone_check_view").css('color', '#ff0000');
                  $("#phone_check_view").text('이미 가입된 휴대전화 번호.');
              } else {
                  $("#phone_check_view").css('color', '#009b00');
                  $("#phone_check_view").text('사용 가능한  휴대전화 번호.');
                  phoneUseCheck=true;
              }
              return false;
          },
          error: function (jqXHR, textStatus, errorThrown) {
              alert("정보를 받아오는 도중 에러가 발생하였습니다. 다시 시도해 주세요. \n" + textStatus + " : " + errorThrown);
              self.close();
          }
      });
  });

 
  //이메일체크
  $(document).on("blur", "#user_email", function(){
      $("#email_check_view").show();
      if(!reg_email.test($(this).val())){
          $("#email_check_view").css('color', '#ff0000');
          $("#email_check_view").text('유효하지 않은 이메일입니다.');
          return false;
      }

      var ajax_ata = {
          "user_email": $(this).val()
      };

      $.ajax({
          url: "/ajax/user/emailCheck",
          type: 'GET',
          data: ajax_ata,
          success: function (data) {
              if (data == 'Y') {
                  $("#email_check_view").css('color', '#ff0000');
                  $("#email_check_view").text('이미 사용중인 이메일 입니다.');
              } else {
                  $("#email_check_view").css('color', '#009b00');
                  $("#email_check_view").text('사용 가능한 이메일 입니다.');
                  emailUseCheck=true;
              }
              return false;
          },
          error: function (jqXHR, textStatus, errorThrown) {
              alert("정보를 받아오는 도중 에러가 발생하였습니다. 다시 시도해 주세요. \n" + textStatus + " : " + errorThrown);
              self.close();
          }
      });
  });

  $(document).on("click", "#form_submit", function(){

    if ($("#user_id").val() == "") {
        alert("아이디 입력은 필수입니다.");
        $("#user_id").focus();
        return false;
    }
    if (idUseCheck == false) {
        alert("아이디 중복체크를 해주세요");
        $("#user_id").focus();
        return false;
    }
    

    if ($("#user_pwd").val() == "") {
        alert("비밀번호 입력은 필수입니다.");
        $("#user_pwd").focus();
        return false;
    }

    if ($("#user_pwd_ck").val() == "") {
        alert("비밀번호 확인 입력은 필수입니다.");
        $("#user_pwd_ck").focus();
        return false;
    }


    if (pwUseCheck == false) {
        alert("비밀번호 입력이 잘못되었습니다.");
        $("#user_pwd").focus();
        return false;
    }
    if ($("#user_name").val() == "") {
        alert("이름 입력은 필수입니다.")
        $('#user_name').focus();
        return false;
    }

    if ($("#user_nickname").val() == "") {
        alert("닉네임입력은 필수입니다.")
        $('#user_nickname').focus();
        return false;
    }

    if ($("#user_email").val() == "") {
        alert("이메일 입력은 필수입니다.");
        $("#user_email").focus();
        return false;
    }




    if ($("#pzip").val() == "") {
        alert("자택우편번호는 필수입니다.");
        $("#pzip").focus();
        return false;
    }

    if ($("#paddress").val() == "") {
        alert("자택주소는 필수입니다.");
        $("#paddress").focus();
        return false;
    }

    if ($("#user_birth_year").val() == "" || $("#user_birth_month").val() == "" || $("#user_birth_day").val() == "") {
        alert("생년월일입력은 필수입니다.")
        $('#user_birth_year').focus();
        return false;
    }

    

    if ($("#user_phone11").val() == "" || $("#user_phone12").val() == "" || $("#user_phone13").val() == "") {
        alert("휴대폰번호는 필수입니다.");
        $("#user_phone11").focus();
        return false;
    }

    if (confirm("해당 정보로 가입하시겠습니까?")) {
        $("#form").submit();
    }
    return false;
  })
})

function jusoCallBack(roadAddrPart1,addrDetail,zipNo, gubun) {

    document.getElementById('paddress').value = roadAddrPart1;
    document.getElementById('paddress_part').value = addrDetail;

    document.getElementById('pzip').value = zipNo;
  
    
}
function goPopup(argc){
  // 주소검색을 수행할 팝업 페이지를 호출합니다.
  // 호출된 페이지(jusoPopup_utf8.php)에서 실제 주소검색URL(https://www.juso.go.kr/addrlink/addrLinkUrl.do)를 호출하게 됩니다.
  var pop = window.open("/addr/jusoPopup.php?argc="+argc,"pop","width=570,height=420, scrollbars=yes, resizable=yes"); 
  
  // 모바일 웹인 경우, 호출된 페이지(jusoPopup_utf8.php)에서 실제 주소검색URL(https://www.juso.go.kr/addrlink/addrMobileLinkUrl.do)를 호출하게 됩니다.
    //var pop = window.open("/jusoPopup_utf8.php","pop","scrollbars=yes, resizable=yes"); 
}
</script>
