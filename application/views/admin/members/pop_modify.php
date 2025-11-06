<script language="javascript">
// opener관련 오류가 발생하는 경우 아래 주석을 해지하고, 사용자의 도메인정보를 입력합니다. ("팝업API 호출 소스"도 동일하게 적용시켜야 합니다.)
//document.domain = "abc.go.kr";


</script>
<body class="popw">
	<ul class="top">
    	<li class="name"><?=$user['user_name']?> (<?=$user_type[$user['user_type']]?>)</li>
        <li class="info"><i class="i-flag"></i> <?=$user['company_name']?></li>
        <li class="email"><i class="i-mail"></i> <?=$user['user_email']?></a></li>
        <li class="login"><i class="i-lock"></i> 해당회원으로 홈페이지 로그인</li>
        <a href="javascript:window.close()" class="close"><i class="i-close"></i></a>
    </ul>
    <div class="con">
    	<h2 class="tit tit1"><i class="i-user-plus"></i> 회원정보수정 <div class="btn"><a class="btn2" href="../account/pop_nopay.php">회계정보</a> <a class="btn2" href="javascript:window.print()">인쇄하기</a></div>
        </h2>
        <ul class="sub_tab">
        	<li class="on"><a href="pop_modify?user_no=<?=$user['no']?>">기본정보</a></li>
            <li><a href="pop_edu.php">학력정보</a></li>
        </ul>
        <!--Contents-->
        <div class="join_wrap">
            
          <!--Join input-->
          <form name="form" id="form" method="POST" action="/ajax/user/save_user">
          <input type="hidden" name="no" value="<?=$user['no']?>">
          <div class="pa2">
            <div class="input_tit">인적정보 <u>필수입력사항</u></div>
            <table class="td1 mb50">
              
              <tbody>
                <tr>
                  <th><span class="tt_r">*</span> 회원구분</th>
                  <td><?=$user_type[$user['user_type']]?></td>
                </tr>
                <tr>
                  <th>회원번호</th>
                  <td><?=$user['user_number']?></td>
                </tr>
                <tr>
                  <th>회원가입일</th>
                  <td><?=$user['reg_date']?></td>
                </tr>
                <tr>
                  <th><span class="tt_r">*</span> 아이디</th>
                  <td><?=$user['user_id']?></td>
                </tr>
                <tr>
                  <th><span class="tt_r">*</span> 비밀번호</th>
                  <td><input class="ipw ipw1" type="password" name="user_pwd" id="user_pwd">
                    <span class="tt">6~20자의 최소 1개의 숫자, 영문자를 포함</span>
                    nbsp; <span id="pw_check_view">
                  </td>
                </tr>
                <tr>
                  <th><span class="tt_r">*</span> 비밀번호 확인</th>
                  <td><input class="ipw ipw1" type="password" name="re_user_pwd" id="user_pwd_ck"> <span id="pw_check_view2">
                  </td>
                </tr>
                <tr>
                  <th><span class="tt_r">*</span> 이메일</th>
                  <td><input class="ipw ipw1" type="text" name="user_email" value="<?=$user['user_email']?>" id="user_email">&nbsp; <span id="email_check_view">
                    <span id="email_check_view">
                  </td>
                </tr>
                <tr>
                  <th><span class="tt_r">*</span> 성명</th>
                  <td>
                  <ul class="name">
                    <li><b><span class="tt_r">*</span> 성명</b> <input class="ipw ipw3" type="text" name="user_name" id="user_name" value="<?=$user['user_name']?>"></li>
                    <li><b>한자</b> <input class="ipw ipw3" type="text" name="user_name_cn" id="user_name_cn" value="<?=$user['user_name_cn']?>"></li>
                    <li><b><span class="tt_r">*</span> 영문</b> <input class="ipw ipw3" type="text" name="user_name_en_first" id="user_name_en_first" value="<?=$user['user_name_en_first']?>"> First Name (이름)  &nbsp; <input class="ipw ipw3" type="text" name="user_name_en_last" id="user_name_en_last" value="<?=$user['user_name_en_last']?>"> Last Name (성)</li>
                  </ul>                 
                   </td>
                </tr>
                <?
                  $birth_arr = explode('-', $user['user_birth_day']);
                ?>
                <tr>
                  <th><span class="tt_r">*</span> 생년월일</th>
                  <td><input class="ipw ipw3" type="text" name="user_birth_year" value="<?=$birth_arr[0]?>"> 년
                    <input class="ipw ipw3" type="text" name="user_birth_month" value="<?=$birth_arr[1]?>"> 월
                    <input class="ipw ipw3" type="text" name="user_birth_day" value="<?=$birth_arr[2]?>"> 일 </td>
                </tr>
                <tr>
                  <th><span class="tt_r">*</span> 성별</th>
                  <td><ul class="radio">
                      <li><input type="radio" checked="checked" name="user_gender" value="M" <?=$user['user_gender']=='M'?'checked':'';?>> 남자</li>
                      <li><input type="radio" name="user_gender" value="F" <?=$user['user_gender']=='F'?'checked':'';?>>  여자</li>
                    </ul></td>
                </tr>
                <tr>
                  <th><span class="tt_r">*</span> 휴대전화</th>
                  <td><input class="ipw ipw1" type="text" name="user_phone" id="user_phone" value="<?=$user['user_phone']?>">&nbsp; <span id="phone_check_view"></td>
                </tr>
                <tr>
                  <th><span class="tt_r">*</span> 학회지 수신여부</th>
                  <td><ul class="radio">
                        <li><input type="radio" checked="checked" name="book_yn" id="book_yn" value="E" <?=$user['book_yn']=='E'?'checked':'';?>> 온라인발송</li>
                        <li><input type="radio" name="book_yn" id="book_yn" value="F" <?=$user['book_yn']=='F'?'checked':'';?>> 우편발송</li>
                    </ul></td>
                </tr>
                <tr>
                  <th><span class="tt_r">*</span> 메일 수신여부</th>
                  <td><ul class="radio">
                      <li><input type="radio" checked="checked"  name="email_yn" id="email_yn" value="Y" <?=$user['email_yn']=='Y'?'checked':'';?>> 메일 수신</li>
                      <li><input type="radio"  name="email_yn" id="email_yn" value="N" <?=$user['email_yn']=='N'?'checked':'';?>> 메일 수신 거부</li>
                    </ul></td>
                </tr>
                <tr>
                  <th>메모</th>
                  <td><textarea class="ipw ipw_tt" name="memo" id="memo"><?=$user['memo']?></textarea></td>
                </tr>
                <tr>
                  <th>기타 정보1</th>
                  <td><input class="ipw ipw2" type="text" name="etc_info1" id="etc_info1" value="<?=$user['etc_info1']?>"></td>
                </tr>
                <tr>
                  <th>기타 정보2</th>
                  <td><input class="ipw ipw2" type="text" name="etc_info2" id="etc_info2" value="<?=$user['etc_info2']?>"></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!--//Join input-->
          
          <!--Join input-->
          <div class="pa2">
            <div class="input_tit">연구정보 <u>필수입력사항</u></div>
            <table class="td1">
              <tbody>
                <tr>
                  <th><span class="tt_r">*</span> 연구분야</th>
                  <td><select class="ipw ipw1" name="study_part" id="study_part">
                    <?foreach(STUDY_ARR as $study):?>
                      <option value="<?=$study?>" <?=$study==$user['study_part']?'selected':'';?>><?=$study?></option>
                      
                    <?endforeach;?>
                    </select></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!--//Join input-->
          <!--Join input-->
          <div class="pa2">
            <div class="input_tit">직장정보 <u>필수입력사항</u></div>
            <table class="td1">
              <tbody>
                <tr>
                  <th><span class="tt_r">*</span> 직장종류</th>
                  <td><select class="ipw ipw1" name="company_type" id="company_type">
                      <?foreach(COMPANY_ARR as $company):?>
                      <option value="<?=$company?>" <?=$company==$user['company_type']?'selected':'';?>><?=$company?></option>
                      
                    <?endforeach;?>
                    </select></td>
                </tr>
                <tr>
                  <th><span class="tt_r">*</span> 소속기관명</th>
                  <td><input class="ipw ipw1" type="text" name="company_name" id="company_name" value="<?=$user['company_name']?>"></td>
                </tr>
                <tr>
                  <th><span class="tt_r">*</span> 직위</th>
                  <td><input class="ipw ipw1" type="text" name="company_position" id="company_position" value="<?=$user['company_position']?>"></td>
                </tr>
                <tr>
                  <th><span class="tt_r">*</span> 직장 우편번호</th>
                  <td><input class="ipw ipw1" type="text" maxlength="5" name="company_zip" id="company_zip" value="<?=$user['company_zip']?>"> <span class="btn btn1"  onclick="goPopup(1);">우편번호 검색</span></td>
                </tr>
                <tr>
                  <th><span class="tt_r">*</span> 직장 주소</th>
                  <td><input class="ipw ipw2" type="text" name="company_address" id="company_address" value="<?=$user['company_address']?>">  <input class="ipw ipw2" type="text" name="company_address_part" id="company_address_part" value="<?=$user['company_address_part']?>"></td>
                </tr>
                <?
                  $company_phone_arr = explode('-', $user['company_phone']);
                ?>
                <tr>
                  <th><span class="tt_r">*</span> 직장 전화번호</th>
                  <td><input class="ipw ipw3" type="text" maxlength="4" name="company_phone1" id="company_phone1" value="<?=$company_phone_arr[0]?>"> -
                    <input class="ipw ipw3" type="text" maxlength="4" name="company_phone2" id="company_phone2" value="<?=$company_phone_arr[1]?>">  -
                    <input class="ipw ipw3" type="text" maxlength="4" name="company_phone3" id="company_phone3" value="<?=$company_phone_arr[2]?>"> <span class="tt">지역번호를 반드시 포함할 것</span></td>
                </tr>
                <tr>
                  <th>팩스번호</th>
                  <td><input class="ipw ipw1" type="text" name="company_fax" id="company_fax" value="<?=$user['company_fax']?>"></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!--//Join input-->
          
          <!--Join input-->
          <div class="pa2">
            <div class="input_tit">자택정보 <u>필수입력사항</u></div>
            <table class="td1">
              <tbody>
                <tr>
                  <th><span class="tt_r">*</span> 우편번호</th>
                  <td><input class="ipw ipw1" type="text" name="home_zip" id="home_zip" value="<?=$user['home_zip']?>" maxlength="5"> <span class="btn btn1" id="zip_search" onclick="goPopup(2);">우편번호 검색</span></td>
                </tr>
                <tr>
                  <th><span class="tt_r">*</span> 주소</th>
                  <td><input class="ipw ipw2" type="text" name="home_address" id="home_address" value="<?=$user['home_address']?>">
                    <input class="ipw ipw2" type="text" name="home_address_part" id="home_address_part" value="<?=$user['home_address_part']?>"></td>
                </tr>
                <tr>
                <?
                  $home_phone_arr = explode('-', $user['home_phone']);
                ?>
                  <th><span class="tt_r">*</span> 전화번호</th>
                  <td><input class="ipw ipw3" type="text" maxlength="4" name="home_phone1" id="home_phone1" value="<?=$home_phone_arr[0]?>"> -
                    <input class="ipw ipw3" type="text" maxlength="4" name="home_phone2" id="home_phone2" value="<?=$home_phone_arr[0]?>">  -
                    <input class="ipw ipw3" type="text" maxlength="4" name="home_phone3" id="home_phone3" value="<?=$home_phone_arr[0]?>"> <span class="tt">지역번호를 반드시 포함할 것</span></td>
                </tr>
                <tr>
                  <th>팩스번호</th>
                  <td><input class="ipw ipw1" type="text" name="home_fax" id="home_fax" value="<?=$user['home_fax']?>"></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!--//Join input-->
        
          <!--Join input-->
          <div class="pa2">
            <div class="input_tit">우편물 수령지 정보 <u>필수입력사항</u></div>
            <table class="td1">
              <tbody>
                <tr>
                  <th><span class="tt_r">*</span> 우편물 수령지</th>
                  <td><ul class="radio">
                    <li><input type="radio" checked="checked" value='C' name="mail_take_address" id="mail_take_address" <?=$user['mail_take_address']=='C'?'checked':'';?> /> 직장</li>
                    <li><input type="radio" name="mail_take_address" value='H' id="mail_take_address" <?=$user['mail_take_address']=='H'?'checked':'';?> /> 자택</li>                
                </ul></td>
                </tr>   
              </tbody>
            </table>
          </div>
          <!--//Join input-->
          
          <!--Join input-->
          <div class="pa2">
            <div class="input_tit">기타 정보</div>
            <table class="td1">
              <tbody>
                <tr>
                  <th>회원 명부 게재 여부</th>
                  <td><ul class="radio">
                        <li><input type="radio" checked="checked" value='Y' name="member_list_yn" id="member_list_yn" <?=$user['member_list_yn']=='C'?'checked':'';?> /> 예</li>
                        <li><input type="radio" name="member_list_yn" value='N' id="member_list_yn" <?=$user['member_list_yn']=='C'?'checked':'';?> /> 아니오</li>
                    </ul></td>
                </tr> 
                <tr>
                  <th>인증여부</th>
                  <td>
                  <ul class="cert">
                    <?if($user['auth_yn']=='Y'):?>
                  	<li class="check y">인증회원</li>
                    <?else:?>
                    <li class="check n">미인증회원</li>
                    <?endif;?>
                    <li><input type="checkbox" name="auth_yn" value="N"> 회원승인을 취소하고자 하는 경우 이 곳에 체크를 해주세요. 취소시 승인번호, 승인날짜는 자동 삭제됩니다.</li>
                  </ul>
                  </td>
                </tr> 
                <tr>
                  <th>탈퇴여부</th>
                  <td><ul class="radio">
                        <li><input type="radio" name="exit_yn" value='Y' id="exit_yn" <?=$user['exit_yn']=='Y'?'checked':'';?> /> 예</li>
                        <li><input type="radio" checked="checked"  value='N' name="exit_yn" id="exit_yn" <?=$user['exit_yn']=='N'?'checked':'';?> /> 아니오</li>
                    </ul></td>
                </tr> 
                <tr>
                  <th>사망여부</th>
                  <td><ul class="radio">
                        <li><input type="radio" name="death_yn" value='Y' id="death_yn" <?=$user['death_yn']=='Y'?'checked':'';?> /> 예</li>
                        <li><input type="radio" checked="checked" value='N' name="death_yn" id="death_yn" <?=$user['death_yn']=='N'?'checked':'';?> /> 아니오</li>
                    </ul></td>
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
<script>
document.domain = "cafe24.com";
$(function(){
  var idUseCheck=false;
  var pwUseCheck=false;
  var phoneUseCheck=false;
  var emailUseCheck=false;
  var idCheck= RegExp(/^[a-zA-Z0-9]{5,100}$/)
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
          $("#id_check_view").text('아이디는 5자이상 영문 , 숫자만 사용 가능합니다.');
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
  $(document).on("blur", "#user_phone", function(){
      $("#phone_check_view").show();

      if ($(this).val() == '') {
          $("#phone_check_view").css('color', '#ff0000');
          $("#phone_check_view").text('휴대전화 번호는 필수 입력');
          return false;
      }

      var ajax_ata = {
          "user_phone": $(this).val()
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
    if ($("#user_name_en_last").val() == "") {
        alert("First Name 입력은 필수입니다.")
        $('#user_name_en_first').focus();
        return false;
    }
    if ($("#user_name_en_last").val() == "") {
        alert("Last Name 입력은 필수입니다.");
        $('#user_name_en_last').focus();
        return false;
    }
    /*if ($("#user_id").val() == "") {
        alert("아이디 입력은 필수입니다.");
        $("#user_id").focus();
        return false;
    }

    if (idUseCheck == false) {
        alert("아이디가 중복 되었거나 잘못 입력 되었습니다.");
        $("#user_id").focus();
        return false;
    }*/

    if ($("#user_birth_year").val() == "" || $("#user_birth_month").val() == "" || $("#user_birth_day").val() == "") {
        alert("생년월일입력은 필수입니다.")
        $('#user_birth_year').focus();
        return false;
    }

    


    if ($("#user_phone").val() == "") {
        alert("휴대전화번호 입력은 필수입니다.");
        $("#user_phone").focus();
        return false;
    }

    // if (phoneUseCheck == false) {
    //     alert("휴대전화번호가 중복 되었습니다.");
    //     $("#user_phone").focus();
    //     return false;
    // }

    if ($("#user_email").val() == "") {
        alert("이메일 입력은 필수입니다.");
        $("#user_email").focus();
        return false;
    }

    // if (emailUseCheck == false) {
    //     alert("이메일이 중복 되었거나 잘못 입력 되었습니다.");
    //     $("#user_email").focus();
    //     return false;
    // }

    if ($("#company_name").val() == "") {
        alert("소속기관명은 필수입니다.");
        $("#company_name").focus();
        return false;
    }

    if ($("#company_position").val() == "") {
        alert("직위는 필수입니다.");
        $("#company_position").focus();
        return false;
    }

    if ($("#company_zip").val() == "") {
        alert("직장우편번호는 필수입니다.");
        $("#company_zip").focus();
        return false;
    }

    if ($("#company_address").val() == "") {
        alert("직장주소는 필수입니다.");
        $("#company_address").focus();
        return false;
    }

    if ($("#company_phone1").val() == "" || $("#company_phone2").val() == "" || $("#company_phone3").val() == "") {
        alert("직장전화는 필수입니다.");
        $("#company_phone1").focus();
        return false;
    }

    if ($("#home_zip").val() == "") {
        alert("자택우편번호는 필수입니다.");
        $("#company_zip").focus();
        return false;
    }

    if ($("#home_address").val() == "") {
        alert("직장주소는 필수입니다.");
        $("#company_address").focus();
        return false;
    }

    if ($("#home_phone1").val() == "" || $("#home_phone2").val() == "" || $("#home_phone3").val() == "") {
        alert("집전화는 필수입니다.");
        $("#home_phone1").focus();
        return false;
    }

    if (confirm("해당 정보로 수정하시겠습니까?")) {
        $("#form").submit();
    }
    return false;
  })
})


function jusoCallBack(roadAddrPart1,addrDetail,zipNo, gubun) {
  if(gubun==1) {
    document.getElementById('company_address').value = roadAddrPart1;
    document.getElementById('company_address_part').value = addrDetail;

    document.getElementById('company_zip').value = zipNo;
  } else {
    document.getElementById('home_address').value = roadAddrPart1;
    document.getElementById('home_address_part').value = addrDetail;

    document.getElementById('home_zip').value = zipNo;
  }
    
}
function goPopup(argc){
  // 주소검색을 수행할 팝업 페이지를 호출합니다.
  // 호출된 페이지(jusoPopup_utf8.php)에서 실제 주소검색URL(https://www.juso.go.kr/addrlink/addrLinkUrl.do)를 호출하게 됩니다.
  var pop = window.open("/addr/jusoPopup.php?argc="+argc,"pop","width=570,height=420, scrollbars=yes, resizable=yes"); 
  
  // 모바일 웹인 경우, 호출된 페이지(jusoPopup_utf8.php)에서 실제 주소검색URL(https://www.juso.go.kr/addrlink/addrMobileLinkUrl.do)를 호출하게 됩니다.
    //var pop = window.open("/jusoPopup_utf8.php","pop","scrollbars=yes, resizable=yes"); 
}
</script>
</body>
</html>
