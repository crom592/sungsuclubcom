<body class="ad_in">

<div class="board_list">
  <h2 class="tit1">학술대회 관리 <u>학술대회를 관리할 수 있습니다. 행사별 관리하기 버튼을 누르면 상세 관리가 가능합니다.</u></h2>    
        
    <!--List-->
	<table class="board_list td_c">
    <thead>
      <tr>
        <th><input type="checkbox"></th>
        <th>번호</th>
        <th>대회이름</th>
        <th>기간</th>
        <th>장소</th>
        <th>진행여부</th>
        <th>관리</th>
      </tr>
    </thead>
    <tbody>
      <?

      foreach($list as $value):

        ?>
        <tr>
          <td class="bl_check"><input type="checkbox" ></td>
          <td class="bl_num"><?=$value['no'];?></td>
          <td><?=$value['title']?></td>
          <td><?=makeDate($value['start_date'])?>~<?=makeDate($value['end_date'])?></td>
          <td><?=$value['place']?></td>
          <td class="bl_yes">
            <span class="<?=$value['end_yn']=='Y'?'n':'y';?>"><?=SYM_STATUS[$value['end_yn']]?></span>
          </td>
          <td><a href="sym_w1?no=<?=$value['no']?>" class="btn btn1">관리하기</a></td>
        </tr>

      <?endforeach;?>
    </tbody>
    </table>
    <!--//List-->
    
    <ul class="pagenation">
        <?php  if (count($list) > 0) { ?>
                <?php echo pagingView('/adm/symposium/sym_list', $sPage, $_GET['page'], $ePage, $pageNum, $param)?>
            <?php } ?>

    </ul> 

</div>

</body>
</html>
