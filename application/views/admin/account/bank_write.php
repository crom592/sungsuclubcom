<? include_once $_SERVER['DOCUMENT_ROOT']."/admin/include/include.header.php"; ?>
<body class="ad_in">

<div class="bank_list">
  <h2 class="tit1">결제계좌 추가</h2>    
  <div class="board_view_wrap">	
  <form name="form" id="form">
  <div class="pa">
      <table class="board_write">    
        <tbody>
            
            <tr>
              <th>은행명</th>
              <td><input type="text" class="ipw ipw1" name="bank_name" id="bank_name" value="<?=$value['bank_name']?>"></td>
            </tr>
            <tr>
              <th>계좌번호</th>
              <td><input type="text" class="ipw ipw1" name="account_num" id="account_num" value="<?=$value['account_num']?>"></td>
          </tr>
            <tr>
              <th>예금주</th>
              <td><input type="text" class="ipw ipw1" name="depositor" id="depositor" value="<?=$value['depositor']?>"></td>
            </tr>
        </tbody>
      </table>
  </div> 
    
    <div class="btn_wrap"> 
      <a class="btn btn1 cc" href="javascript:form_submit()">추가하기</a>
      <a class="btn btn1 cc" href="javascript:history.back()">취소</a>
    </div>
    

</div>

<script>
  function goAjax(no, gubun) {
        var idx;

        var ajax_data = {
          "no": no,
          "gubun":gubun,
          "bank_name":$('#bank_name').val(),
          "account_num":$('#account_num').val(),
          "depositor":$('#depositor').val(),
        };
 
        $.ajax({
            url: "/ajax/account/setAccount",
            type: 'POST',
            data: ajax_data,
            success: function (data) {
    
                if(data==1) {
                  alert("추가되었습니다")
                  window.location.href="/adm/account/bank";
                } else if(data==2) {
                  alert("삭제되었습니다")
                } else {
                  alert("오류가 발생하였습니다.")
                }
                
               
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("정보를 받아오는 도중 에러가 발생하였습니다. 다시 시도해 주세요. \n" + textStatus + " : " + errorThrown);
                self.close();
            }
        });

        return idx;
    }


    function form_submit() {

        if ($('#bank_name').val()=='') {
            alert("은행명을 선택해주세요.");
            return;
        }

        if ($('#account_num').val()=='') {
            alert("은행명을 선택해주세요.");
            return;
        }

        if ($('#depositor').val()=='') {
            alert("은행명을 선택해주세요.");
            return;
        }

        goAjax('','up');

    }

</script>
</body>
</html>
