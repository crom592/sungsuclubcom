<body class="ad_in">

<h2 class="tit1">회원 상세 정보</h2>
<div class="board_view_wrap">	
<form name="form" id="form" method="POST" action="/ajax/admin/user/liveSave" enctype="multipart/form-data">
    <input type="hidden" name="user_no" value="<?=$user['user_no']?>">
    <input type="hidden" name="old_start_dt" value="<?=$user['start_dt']?>">
	<!--View Info-->
    <table class="td1">
      <tbody>
          <tr>
            <th>아이디</th>
            <td><?=$user['user_id']?></td>
          </tr>
          <tr>
            <th>비밀번호</th>
            <td><input type="text" name="user_pwd" id="user_pwd" value="<?=$user['user_pwd']?>" class="ipw"></td>
          </tr>
          <tr>
            <th>이름</th>
            <td><?=$user['user_name']?></td>
          </tr>
          <tr>
            <th>닉네임</th>
            <td><?=$user['user_nickname']?></td>
          </tr>
          <tr>
            <th>이메일</th>
            <td><?=$user['user_email']?> <?if($user['email_yn']=='Y'):?><span class="tt_b">[이메일 수신]</span><?endif;?></td>
          </tr>
          <tr>
            <th>성별</th>
            <td><?=USER_GENDER[$user['user_gender']]?></td>
          </tr>
          <tr>
            <th>우편번호</th>
            <td><?=$user['pzip']?></td>
          </tr>
          <tr>
            <th>주소</th>
            <td><?=$user['paddress']." ".$user['paddress_part']?></td>
          </tr>
          <tr>
            <th>연락처1</th>
            <td><?=$user['user_phone']?></td>
          </tr>
          <tr>
            <th>연락처2</th>
            <td><?=$user['user_phone2']?> </td>
          </tr>
          <tr>
            <th>생년월일</th>
            <td><?=$user['user_birth_day']?></td>
          </tr>
      </tbody>
    </table>
    <!--//View Info-->    
    
    <table class="td1">
      <tbody>

          <tr>
            <th>시청가능시작일</th>
            <td><input type="text" class="ipw" id="start_dt" name="start_dt" value="<?=$user['start_dt']?>">
               ex) 20221230 형태(년월일)
            </td>
          </tr>
          <tr>
            <th>시청가능종료일</th>
            <td><input type="text" class="ipw" id="end_dt" name="end_dt" value="<?=$user['end_dt']?>">
               ex) 20221230형태(년월일)
            </td>
          </tr>
      </tbody>
    </table>  
    </form>
    <div class="btn_wrap"> 
       <a href="javascript:form_submit()" class="btn btn1 cc">저장</a>
      <a href="javascript:history.back()" class="btn btn1 rr">목록</a>
    </div>
    

</div>
<script type="text/javascript">

    function form_submit() {
        if ($("#start_dt").val() == "") {
            alert("시작일은 필수입니다.")
            $('#start_dt').focus();
            return false;
        }
        if ($("#end_dt").val() == "") {
            alert("종료일은 필수입니다.")
            $('#end_dt').focus();
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
