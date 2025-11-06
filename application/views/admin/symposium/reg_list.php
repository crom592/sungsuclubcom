<? include_once $_SERVER['DOCUMENT_ROOT']."/admin/include/include.header.php"; ?>
<body class="ad_in">
<span style="color: red">**프론트 작업후 추가 작업할것(결제부분등)</span>
<div class="board_list_wrap">
  <h2 class="tit1">학술대회 등록현황 <u>각 학술대회별 등록현황에 대해 볼 수 있습니다.</u></h2>
  <h3 class="tit2"><?=$sym_title?$sym_title:$_GET['sym_title']?></h3>	
    <!--Search-->
    <form name="search_frm" id="search_frm" method="GET" action="/adm/symposium/reg_list">
    <input type="hidden" name="fk_symposium_no" value="<?=$_GET['fk_symposium_no']?>">
    <div class="mem_search">
      <table class="td2">
        <tr>
          <th>필드선택</th>
          <td class="field">
            <select class="ipw" name="searchType1">
            <?foreach(SYM_USER_ARR as $s_index=>$s_val):
              if($_GET['searchType1']=='') {
                  $selected = $s_index=='no'?'selected':'';
              } else {
                  $selected = $s_index==$_GET['searchType1']?'selected':'';
              }
                
            ?>
            <option value="<?=$s_index?>" <?=$selected?>><?=$s_val?></option>
            <?endforeach;?>
            </select>
            
            <input type="text" class="ipw" name="searchText1" value="<?=$_GET['searchText1']?>"> 
            
            <select class="ipw" name="searchType2">
            <?foreach(SYM_USER_ARR as $s_index=>$s_val):
              if($_GET['searchType2']=='') {
                  $selected = $s_index=='name'?'selected':'';
              } else {
                  $selected = $s_index==$_GET['searchType2']?'selected':'';
              }
                
            ?>
            <option value="<?=$s_index?>" <?=$selected?>><?=$s_val?></option>
            <?endforeach;?>           
            </select>
            
            <input type="text" class="ipw" name="searchText2" value="<?=$_GET['searchText2']?>"> 
            
            <select class="ipw" name="andor">
              <option value="AND" <?=$_GET['andor']=='AND'?'selected':''?>>AND</option>
              <option value="OR" <?=$_GET['andor']=='OR'?'selected':''?>>OR</option>
          </select>     
          </td>
        </tr>
        <tr>
          <th>목록모양</th>
          <td>목록개수 <input type="text" name="number_per_page" class="ipw ipw3" value="<?=$number_per_page?>"></td>
        </tr>
      </table>
      <ul class="btn">
        <li><a class="btn1" id="search" href="javascript:search_submit()">검색</a></li>
        <li><a class="btn1" href="javascript:document.getElementById('search_frm').reset()">초기화</a></li>
      </ul>
    </div>
    </form>
    <!--//Search-->    
        
    <!--List-->
    <ul class="list_top">
        <li><a href="javascript:location.reload()" class="btn btn2">새로고침</a></li>
        <li class="total">검색한 항목/전체 항목 ( <b><?=$totalRows?></b> / <?=$totalAll?> ) &nbsp;&nbsp;&nbsp; 총액 : <b>4,250,000</b>원 (결제확인금액: <b>2,870,000</b>원)</li>
    </ul>
	<table class="board_list td_c">
    <thead>
      <tr>
        <th><input type="checkbox"></th>
        <th>번호이름 <br>
        (접수번호)</th>
        <th>등록구분</th>
        <th>소속기관</th>
        <th>사전/현장/포스터</th>
        <th>전화번호<br>
        (포스터수량)</th>
        <th>입금확인여부<br>
        (영수증발송일)</th>
        <th>결제방법</th>
        <th>등록일</th>
        <th>관리</th>
      </tr>
    </thead>
    <tbody>
      <?foreach($list as $value):

        ?>
        <tr>
          <td class="bl_check"><input type="checkbox" ></td>
          <td class="bl_num"><?=$value['name']?><br>
          (<?=$value['no']?>)</td>
          <td><?=$value['fk_user_no']?'회원':'비회원';?></td>
          <td><?=$value['company']?>(<?=$value['title']?>)</td>
          <td>사전</td>
          <td><?=$value['mobile'];?><br />
            (<?=$value['poster_count']?>개)</td>
          <td class="bl_yes"><span class="y">확인</span></td>
          <td>신용카드 결제</td>
          <td class="bl_date"><?=$value['reg_date']?></td>
          <td><a class="btn btn1" href="javascript:openPop('pop_reg?no=<?=$value['no']?>','1000','700','yes')">등록정보 상세</a> <a class="btn btn2" href="javascript:cancelUser(<?=$value['no']?>)">등록취소</a></td>
        </tr>
        <?endforeach;?>
    </tbody>
    </table>
	<!--//List-->
    
    <ul class="pagenation">
        <?php  if (count($list) > 0) { ?>
                <?php echo pagingView('/adm/symposium/reg_list', $sPage, $_GET['page'], $ePage, $pageNum, $param)?>
            <?php } ?>

    </ul> 
    
    <div class="btn_wrap"> 
        <a class="btn btn1 rr">선택 등록취소</a> 
    </div>

</div>
<script>
    $(function(){

        $(document).on("click", "#search", function(){
            search_submit();
        });
    });
    function search_submit() {

        $("#search_frm").submit();
    }
    function cancelUser(no) {
      var idx;

      var ajax_data = {
        "no": no,
      };

      $.ajax({
          url: "/ajax/symposium/cancel_user",
          type: 'POST',
          data: ajax_data,
          success: function (data) {
            if(data==1) alert('신청취소되었습니다');
            else alert('취소중 오류가 발생하였습니다');
            window.location.reload();

          },
          error: function (jqXHR, textStatus, errorThrown) {
              alert("정보를 받아오는 도중 에러가 발생하였습니다. 다시 시도해 주세요. \n" + textStatus + " : " + errorThrown);
              self.close();
          }
      });

      return idx;
    }
</script>   
</body>
</html>
