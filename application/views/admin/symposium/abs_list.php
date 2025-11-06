<? include_once $_SERVER['DOCUMENT_ROOT']."/admin/include/include.header.php"; ?>
<body class="ad_in">

<div class="board_list sym_reg_list">
  <h2 class="tit1">초록 등록현황 <u>각 학술대회별 초록에 대해 볼 수 있습니다.</u></h2>    
        
    <!--List-->
	<table class="board_list td_c">
    <thead>
      <tr>
        <th><input type="checkbox"></th>
        <th>번호</th>
        <th>대회이름</th>
        <th>대회기간</th>
        <th>장소</th>
        <th>진행여부</th>
        <th>등록현황</th>
      </tr>
    </thead>
    <tbody>
      <?

      foreach($list as $value):?>
        <tr>
          <td class="bl_check"><input type="checkbox" ></td>
          <td class="bl_num"><?=$value['no'];?></td>
          <td><?=$value['title']?></td>
          <td class="bl_sym_date">
            <ul>
              <li><b>대회기간</b><?=makeDate($value['start_date'])?>~<?=makeDate($value['end_date'])?></li>
                <li><b>참가신청기간</b><?=makeDate($value['reg_start_date'])?>~<?=makeDate($value['reg_end_date'])?></li>
                <li><b>참가신청수정기간</b><?=makeDate($value['update_start_date'])?>~<?=makeDate($value['update_end_date'])?></li>
            </ul>            </td>
          <td><?=$value['place']?></td>
          <td class="bl_yes"><span class="<?=$value['end_yn']=='Y'?'n':'y';?>"><?=SYM_STATUS[$value['end_yn']]?></span></td>
          <td><a href="abs_reg_list?fk_symposium_no=<?=$value['no']?>&sym_title=<?=$value['title']?>" class="btn btn1">등록현황 보기</a></td>
        </tr>
      <?endforeach;?>
        
    </tbody>
    </table>
	<!--//List-->
    
    <ul class="pagenation">
        <?php  if (count($list) > 0) {

         ?>
            <?php echo pagingView('/adm/symposium/abs_list', $sPage, $_GET['page'], $ePage, $pageNum, $param)?>
        <?php } ?>

    </ul> 

</div>

</body>
</html>
