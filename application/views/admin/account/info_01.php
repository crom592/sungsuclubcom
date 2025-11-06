<? 
$SubNum = $_GET['SubNum'];
if(!$SubNum) $SubNum = 0;
?>
<body class="ad_in">

<div class="acin_list">      
	<? include_once APPPATH."views/admin/include/include.account.php"; ?> 
    <!--SubNum을 위해 임의로 info_01 ~ info_10 로 페이지를 나눴습니다. SubNum값만 개발로 받을수 있으면 10개의 페이지를 하나로 통일해도 됩니다. 하단의 표안에 들어가있는 내용들은 임의로 작성된 표본입니다.-->         
	<table class="board_list td_c">
    <thead>
      <tr>
        <th>결제항목</th>
        <th>회원분류</th>
        <th>현재 결제금액</th>
        <th>수정할 결제금액</th>
        <th>수정</th>
      </tr>
    </thead>
    <tbody>
      <?
      if($SubNum==3) {
        array_merge($list[3],$list[12], $list[13]);
      }
      foreach($list[$SubNum] as $value):

        ?>
        <tr>
          <td class="ach_tit"><input type="text" class="ipw" name="fee_name<?=$value['no']?>" id="fee_name<?=$value['no']?>" value="<?=$value['fee_name']?>"></td>
          <td class="ach_type"><?=$user_type[$value['fk_user_layer_id']]?></td>
          <td class="ach_h"><?=number_format($value['price'])?>원</td>
          <td class="ach_m"><input type="text" class="ipw" name="price<?=$value['no']?>" id="price<?=$value['no']?>" value="<?=$value['price']?>"></td>
          <td class="btn"><a class="btn btn1" href="javascript:mod(<?=$value['no']?>,'up')">수정</a></td>
        </tr>
      <?endforeach;?>
    </tbody>
    </table>
  
</div>
<script>
  function chkPayItems(no) {
    window.location.href="payment_items?SubNum="+no;
  }

  function mod(no,gubun) {
    var fee_name = $('#fee_name'+no).val();
    var price = $('#price'+no).val();

    var idx;

    var ajax_data = {
      "no": no,
      "fee_name":fee_name,
      "price":price,
      "gubun":gubun
    };

    $.ajax({
        url: "/ajax/account/setFee",
        type: 'POST',
        data: ajax_data,
        success: function (data) {

            if(data==1) {
              alert("수정되었습니다")
              //window.location.reload();
            } else {
              alert("오류가 발생하였습니다.")
            }
            
           
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("정보를 받아오는 도중 에러가 발생하였습니다. 다시 시도해 주세요. \n" + textStatus + " : " + errorThrown);
            self.close();
        }
    });
  }
</script>
</body>
</html>
