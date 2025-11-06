<? include_once $_SERVER['DOCUMENT_ROOT']."/admin/include/include.header.php"; ?>
<body class="ad_in">

<div class="sym_index">
  <h2 class="tit1">학술대회 메인 <u>현재 진행중인 학술대회입니다.</u></h2>    
        
    <!--List-->
    <ul class="list_top top">
        <li class="total">현재 진행중인 학술대회 <b><?=count($list);?></b> 건 [누계 <?=$totalRows?> 건]</li>
    </ul>
    <?

      foreach($list as $value):

        $datetime1 = new DateTime($value['start_date']);
        $datetime2 = new DateTime(date('Y-m-d'));
        $interval = $datetime2->diff($datetime1);

    ?>
    <div class="pa2">
        <ul class="list_top">
            <li> <?=$value['title']?>(<?=$value['start_date']?> ~ <?=$value['end_date']?>) <span class="tt_r">진행중 (D-day <?=$interval->format('%a');?>)</span></li>
            <li><a href="symposium/reg_list" class="btn btn1">등록현황 바로가기</a></li>
            *아래는 프론트개발하면서 같이 할것!
        </ul>
        <table class="board_list td_c">
        <thead>
        <tr>
            <th>입금 확인</th>
            <th>입금 미확인</th>
            <th>미 결제</th>
            <th>합계</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>178</td>
            <td>8</td>
            <td>86</td>
            <td>272</td>
        </tr>
        </tbody>
        </table>
    </div>
    <!--//List-->
    
    <div class="pa2">
    <table class="td1 td_c">
    <thead>
      <tr>
        <th>접수분야</th>
        <td>포스터 (P)</td>
        <td>심포지움 (S)</td>
        <td>전체</td>
        </tr>
    </thead>
    <tbody>
        <tr>
          <th>전체</th>
          <td>91</td>
          <td>0</td>
          <td>99</td>
        </tr>
    </tbody>
    </table>
    </div>
    <?endforeach;?>

</div>

</body>
</html>
