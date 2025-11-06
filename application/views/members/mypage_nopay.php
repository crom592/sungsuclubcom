<? 
$PageNum="mypage";
$SubNum="1";
$SubNum2="1";
$Title="회비납부 및 확인";

include_once APPPATH."views/include/include._header.php"; ?>

<div class="pay1">
	<div class="pa2">
    	<ul class="list2 box gr">
        	<li>결제하려는 내역에 미납내역에 없는 경우, 결제 항목을 생성한 후에 결제를 할 수 있습니다.</li>
            <li>결제항목을 생성하려면 결제항목 생성하기 버튼을 클릭해 주시기 바랍니다.</li>
            <li class="tt_r">환불안내 : 학회로 메일 또는 전화문의 해주시기 바랍니다. 처리 시일은 3~5일 소요됩니다.</li>
            <a href="javascript:openPop('/members/pop_payment.php','500','550','yes')" class="btn btn1">결제항목 생성하기</a>
        </ul>
    </div>
    <form name="pay_frm" id="pay_frm" method="POST" action="/symposium/realPay">
    <input type="hidden" name="no_list" id="no_list" value=''>
    <table class="td2 td_c">
        <thead>
            <tr>
                <th><input type="checkbox"/></th>
                <td>항목이름</td>
                <td>유효기간</td>
                <td>정상가</td>
            </tr>
        </thead>
        <tbody>
            <?foreach($list as $value):?>
            <tr>
              <td><input type="checkbox"/></td>
              <td><?=$value['fee_name'];?></td>
              <td><?=$value['start_date']?> ~ <?=$value['end_date']?></td>
              <td><?=number_format($value['real_price'])?> 원</td>
            </tr>
            <?endforeach;?>
        </tbody>
    </table>
	<div class="btn_wrap">         
        <button type="button" class="btn btn1 rr" id="cancel">삭제하기</button>
        <button type="button" class="btn btn1 rr" id="payment">결제하기</button>
    </div> 

    </form>
</div>
<script type="text/javascript">
$(function(){

  //아이디 체크
    $(document).on("click", "#cancel", function(){  
        var no_list = make_no_list();

        if(no_list.length<=0) {
            alert("항목을 선택해주세요");
            return false;
        }
        var allData = {
            "no_list": no_list
        };
        if (confirm("정말 삭제 하시겠습니까?")) {
            $.ajax({
                url: '/ajax/payment/ask_del',
                type: 'POST',
                data:  allData,
                success: function (data) {
                    console.log(data)
                    if(data==1) {
                        alert('삭제되었습니다.');
                        window.location.reload();
                    } else {
                        alert('삭제중 오류가 발생하였습니다. 잠시후 다시 시도해주세요');
                    }
                    
                    //window.location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("시스템 장애[관리자에게 문의] \n" + textStatus + " : " + errorThrown);
                }
            });
        }

        return false;
    });

    $(document).on("click", "#payment", function(){  
        var no_list = make_no_list();

        if(no_list.length<=0) {
            alert("항목을 선택해주세요");
            return false;
        }
        $('#no_list').val(no_list);
  
        
        $('#pay_frm').submit();


        return false;
    });
});
</script>
<? include_once APPPATH."views/include/include._footer.php"; ?>
 