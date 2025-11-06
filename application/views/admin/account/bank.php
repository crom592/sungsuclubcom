
<body class="ad_in">

<div class="bank_list">
  <h2 class="tit1">기본정보 관리 [결제계좌]</h2>    
        
    <!--List-->
    <ul class="list_top">
        <li><a href="bank_write" class="btn btn2">계좌 추가</a></li>
    </ul>
  <table class="board_list td_c">
    <thead>
      <tr>
        <th>은행명</th>
        <th>계좌번호</th>
        <th>예금주</th>
        <th>수정/삭제</th>
      </tr>
    </thead>
    <tbody>
      <?foreach($list as $value):?>
        <tr>
          <td class="ip"><input type="text" class="ipw" name="bank_name" id="bank_name<?=$value['no']?>" value="<?=$value['bank_name']?>"></td>
          <td class="ip"><input type="text" class="ipw" name="account_num" id="account_num<?=$value['no']?>" value="<?=$value['account_num']?>"></td>
          <td class="ip"><input type="text" class="ipw" name="depositor" id="depositor<?=$value['no']?>" value="<?=$value['depositor']?>"></td>
          <td class="btn"><a href="javascript:mod(<?=$value['no']?>)" class="btn btn1">수정</a> <a href="javascript:del(<?=$value['no']?>)" class="btn btn1">삭제</a></td>
        </tr>
      <?endforeach;?>
        <!-- <tr>
          <td class="ip"><input type="text" class="ipw"></td>
          <td class="ip"><input type="text" class="ipw"></td>
          <td class="ip"><input type="text" class="ipw"></td>
          <td class="btn"><a href="" class="btn btn1">수정</a> <a href="" class="btn btn1">삭제</a></td>
        </tr> -->
    </tbody>
    </table>
  <!--//List-->

</div>
<script>
  function goAjax(no, gubun) {
        var idx;

        var ajax_data = {
          "no": no,
          "gubun":gubun,
          "bank_name":$('#bank_name'+no).val(),
          "account_num":$('#account_num'+no).val(),
          "depositor":$('#depositor'+no).val(),
        };
 
        $.ajax({
            url: "/ajax/account/setAccount",
            type: 'POST',
            data: ajax_data,
            success: function (data) {
    
                if(data==1) {
                  alert("수정되었습니다")
                } else if(data==2) {
                  alert("삭제되었습니다")
                } else {
                  alert("오류가 발생하였습니다.")
                }
                window.location.reload();
               
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("정보를 받아오는 도중 에러가 발생하였습니다. 다시 시도해 주세요. \n" + textStatus + " : " + errorThrown);
                self.close();
            }
        });

        return idx;
    }

    function addAbs(argc) {
        var text = $('#abs_code_name'+argc).val();
        var idx = goAjax(argc, text,'add',<?=$_GET['no']?>);
  
        if(text) {
            
        } else {
            alert('설정명을 입력해주세요!');
        }
        $('#abs_code_name'+argc).val('');
    }

    function mod(no) {

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

        goAjax(no,'up');

    }
    function del(no) {
        goAjax(no, 'del')

    }
</script>
</body>
</html>
