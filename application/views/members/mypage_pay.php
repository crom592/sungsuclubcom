<? 
$PageNum="mypage";
$SubNum="1";
$SubNum2="2";
$Title="회비납부 및 확인";
include_once APPPATH."views/include/include._header.php"; 

?>

<div class="pay1">
	<div class="pa2">
    	<ul class="list2 box gr">
        	<li><b class="tt_bk"><?=$_SESSION['__SS_USER_NAME__']?></b>님의 결제내역 정보입니다.</li>
            <li>결제취소는 결제상세보기 페이지에서 가능합니다.</li>
            <li class="tt_r">환불안내 : 학회로 메일 또는 전화문의 해주시기 바랍니다. 처리 시일은 3~5일 소요됩니다.</li>
        </ul>
    </div>

    <table class="td2 td_c">
        <thead>
            <tr>
                <td>결제번호</td>
                <td>총액</td>
                <td>결제방법</td>
                <td>입금확인 여부</td>
                <td>입금일<br />
                  (결제신청일)</td>
                <td>결제내역</td>
              <td>상세보기</td>
            </tr>
        </thead>
        <tbody>
            <?foreach($list as $value):

            ?>
            <tr>
              <td><a href="mypage_pay_view?no=<?=$value['no']?>"><?=$value['order_num']?></a></td>
              <td><?=number_format($value['total_amount'])?> 원</td>
              <td><?=PAYMENTMETHOD_ARR[$value['paymethod']]?></td>
              <td class="bl_yes">
                <?if($value['status']==1):?>
                <span class="y">확인</span>
                <?else:?>
                <span class="n">미확인</span>
                <?endif;?>
              </td>
              <td><?=$value['deposit_date']?><br />
                (<?=date('Y-m-d',strtotime($value['reg_date']))?>)</td>
              <td><?=$value['fee_name']?></td>
              <td><a href="mypage_pay_view?no=<?=$value['no']?>" class="btn btn1">상세보기</a></td>
            </tr>
            <?endforeach;?>
        </tbody>
    </table>



</div>

<? include_once APPPATH."views/include/include._footer.php"; ?>
 