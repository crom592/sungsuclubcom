<? 
$PageNum="2";
$SubNum="1";
$SubNum2="3";
$Title="회비납부 및 확인";
include_once APPPATH."views/include/include._header.php";  ?>

<div class="pa1 ev5">
  <div class="pa2">
    <h3 class="tit1">결제내역 상세정보<u><?=$_SESSION['__SS_USER_NAME__']?>님이 결제하신 결제번호 <span class="tt_r"><?=$list['order_num']?></span> 의 상세정보</u></h3>
    <table class="td1">
      <tbody>
        <tr>
          <th>결제번호</th>
          <td><?=$list['order_num']?></td>
        </tr>
        <tr>
          <th>결제자 이름</th>
          <td><?=$list['name']?></td>
        </tr>
        <tr>
          <th>결제자 소속</th>
          <td><?=$list['company']?></td>
        </tr>
        <tr>
          <th>이메일</th>
          <td><?=$list['email']?></td>
        </tr>
        <tr>
          <th>전화번호</th>
          <td><?=$list['phone']?></td>
        </tr>
        <tr>
          <th>휴대폰번호</th>
          <td><?=$list['mobile']?></td>
        </tr>
        <tr>
          <th>총 금액</th>
          <td class="total"><b><?=number_format($list['total_amount'])?> 원</b></td>
        </tr>
        <tr>
          <th>결제방법</th>
          <td><?=PAYMENTMETHOD_ARR[$list['paymethod']]?></td>
        </tr>
        <tr>
          <th>입금계좌 정보</th>
          <td><?=$list['bank']?></td>
        </tr>
        <tr>
          <th>카드승인번호</th>
          <td><?=$list['auth_number']?></td>
        </tr>
        <tr>
          <th>입금인</th>
          <td><?=$list['deposit_person']?></td>
        </tr>
        <tr>
          <th>결제신청일</th>
          <td><?=date('Y-m-d',strtotime($list['reg_date']))?></td>
        </tr>
        <tr>
          <th>입금확인여부</th>
          <td class="bl_yes">
            <?if($list['status']==1):?>
            <span class="y">확인</span>
            <?else:?>
            <span class="n">미확인</span>
            <?endif;?>
          </td>
        </tr>
        <tr>
          <th>입금일</th>
          <td><?=$list['deposit_date']?></td>
        </tr>
      </tbody>
    </table>
  </div>
  
  <div class="pa2">
    <h3 class="tit1">결제항목 정보</h3>
    <table class="td2 td_c">
        <thead>
            <tr>
                <td>번호</td>
                <td>항목</td>
                <td>유효기간</td>
            </tr>
        </thead>
        <tbody>
          <?
          $no=1;
          foreach($asked_list as $a):?>
            <tr>
              <td><?=$no?></td>
              <td><?=$a['fee_name']?></td>
              <td><?=$a['start_date']?> ~ <?=$a['end_date']?></td>
            </tr>
          <?
          $no++;
        endforeach;?> 
        </tbody>
    </table>
    <div class="btn_wrap">         
        <a href="mypage_pay" class="btn btn1 cc">결제내역 목록</a>
    </div> 
  </div>
    
</div>

<? include_once APPPATH."views/include/include._footer.php"; ?>
 