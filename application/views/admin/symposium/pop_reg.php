
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
        	<li class="on"><a href="pop_reg?no=<?=$_GET['no']?>">등록정보 상세보기</a></li>
          <li><a href="pop_reg_modify?no=<?=$_GET['no']?>">등록정보 수정하기</a></li>
        </ul>
        <!--Contents-->
        <div class="board_view_wrap">
            
          <!--Join input-->
          <div class="pa2">
            <div class="input_tit">기본정보</div>
            <table class="td1 mb50">
              <tbody>
                <tr>
                  <th>이름(접수번호)</th>
                  <td><?=$sym['name']?> (<?=$sym['no']?>)</td>
                </tr>
                <tr>
                  <th>소속기관</th>
                  <td><?=$sym['company']?></td>
                </tr>
                <tr>
                  <th>직위</th>
                  <td><?=$sym['title']?></td>
                </tr>
                <tr>
                  <th>전화번호</th>
                  <td><?=$sym['phone']?></td>
                </tr>
                <tr>
                  <th>휴대폰번호</th>
                  <td><?=$sym['mobile']?></td>
                </tr>
                <tr>
                  <th>Fax</th>
                  <td><?=$sym['fax']?></td>
                </tr>
                <tr>
                  <th>신청일자</th>
                  <td><?=$sym['reg_date']?></td>
                </tr>
                <tr>
                  <th>비밀번호</th>
                  <td><?=$sym['passwd']?></td>
                </tr>               
              </tbody>
            </table>
          </div>
          <!--//Join input-->
          <!--Join input-->
          <div class="pa">
            <div class="input_tit">등록비 결제정보</div>
            <table class="td1">
              <tbody>
                <tr>
                  <th>결제방식</th>
                  <td>신용카드 결제</td>
                </tr>
                <tr>
                  <th>입금확인여부</th>
                  <td class="bl_yes"><span class="y">확인</span></td><!--<span class="y">미확인</span>-->
                </tr>
                <tr>
                  <th>참가비입금계좌</th>
                  <td></td>
                </tr>
                <tr>
                  <th>결제내역</th>
                  <td>등록구분 : 2021년도 추계학술대회 정회원(교수) 등록비<br />등록비 : 20,000원</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!--//Join input-->
          
          <div class="btn_wrap"> 
              <a href="pop_reg_modify?no=<?=$_GET['no']?>" class="btn btn1 cc">정보 수정하기</a>
          </div>
        </div>
        <!--Contents-->
    </div>
<script type="text/javascript">
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
</body>
</html>
