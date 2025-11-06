<? 
$SubNum="1";
include_once $_SERVER['DOCUMENT_ROOT']."/admin/include/include.header.php"; ?>
<body class="ad_in">
<?

?>
<h2 class="tit1">결제항목 생성</h2>
<div class="board_view_wrap">	

  <div class="pa">
      <table class="board_write">    
        <tbody>
            <tr>
              <th>결제항목 구분<b class="pt"></b></th>
              <td>
              <select class="ipw ipw1" name="fee_division" id="fee_division" onchange="selectChange(this)">
                <?foreach($category_list as $value):?>
                <option value="<?=$value['no']?>"><?=$value['fee_cate_name'];?></option>
                <?endforeach;?>
            </select>
              </td>
            </tr>
            <tr>
              <th>결제항목 이름</th>
              <td><input type="text" class="ipw ipw1" name="fee_name" id="fee_name"></td>
            </tr>
            <tr>
              <th>청구 금액</th>
              <td><input type="text" class="ipw ipw1" name="price" id="price"></td>
            </tr>
            <tr id="div_show2" style="display:none;">
              <th>PAGE</th>
              <td><input type="text" class="ipw ipw3" name="fee_order" id="fee_order" onkeydown="funonlynumber();" > Page</td>
            </tr>
            <tr id="div_show" style="display:none;">
              <th>학술대회</th>
              <td>
              <select class="ipw ipw1" name="fk_symposium_no" id="fk_symposium_no">
                <?foreach($sym_list as $s):?>
                <option value="<?=$s['no']?>:<?=$s['sym_id']?>"><?=$s['title'];?></option>
                <?endforeach;?>
            </select>
            <span class="tt">* 진행중인 행사만 표시</span>
              </td>
            </tr>
            <tr>
              <th>적용 회원</th>
              <td>
              <select class="ipw ipw1" name="fk_user_layer_id" id="fk_user_layer_id">
                <option value=0>-----------</option>
                <?foreach($user_type as $i=>$u):?>
                <option value="<?=$i?>"><?=$u?></option>
                
                <?endforeach;?>
            </select>
            <span class="tt">* 연회비와 학술대회비는 각각 적용회원들을 설정해주셔야 합니다.</span>
              </td>
            </tr>
        </tbody>
      </table>
  </div> 
    
    <div class="btn_wrap"> 
      <a class="btn btn1 cc" href="javascript:add()">추가하기</a>
      <a class="btn btn1 cc" href="javascript:history.back()">취소</a>
    </div>
    

</div>
<script>
  function selectChange(a){
       $('#div_show').hide();
       $('#div_show2').hide();   
       if((a.value =="0"|| a.value =="3") ){           
           $('#fk_user_layer_id').attr("disabled", false)
           if(a.value =="3"){               
              $('#div_show').show();      
           }else{              
              $('#div_show').hide();           
           }
       
       }else{ 
       
           if(a.value =="1"){               
              $('#div_show2').show();   
           }else{              
              $('#div_show2').hide();           
           }
                             
           $('#fk_user_layer_id').attr("disabled",true);         
           $('#fk_user_layer_id').val(0);
           $('#div_show').hide();     
       
       }
    
    }
function add() {
    var fee_division = $('#fee_division').val();
    var fee_name = $('#fee_name').val();
    var price = $('#price').val();
    
   
    var fee_order = $('#fee_order').val();
    var fee_division_id = $('#fk_symposium_no').val();
    var fk_user_layer_id = $('#fk_user_layer_id').val();

    var idx;

    var ajax_data = {
      "no": '',
      "fee_division" : $('#fee_division').val(),
      "fee_name" : $('#fee_name').val(),
      "price" : $('#price').val(),
      "fee_order" : $('#fee_order').val(),
      "fee_division_uid" : $('#fk_symposium_no').val(),
      "fk_user_layer_id" : $('#fk_user_layer_id').val(),
    };
    console.log(ajax_data);
    $.ajax({
        url: "/ajax/account/setFee",
        type: 'POST',
        data: ajax_data,
        success: function (data) {
          console.log(data)
            if(data==1) {
              alert("추가되었습니다")
              window.location.href="payment_items";
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
