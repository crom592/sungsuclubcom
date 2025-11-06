<? include_once $_SERVER['DOCUMENT_ROOT']."/admin_backup/include/include.header.php"; ?>
<body class="ad_in">

<h2 class="tit1">동영상 관리</h2>
<div class="board_list_wrap">
 
    <!--Search-->
    <form name="search_frm" id="search_frm" method="GET" action="/adm/vod/list">
    <ul class="board_search">
        <li class="bs_tit">검색어</li>
        <li class="bs_select">
            <select id="searchType1" name="searchType1" class="ipw">
            <option value="vod_title" <?=$_GET['searchType1']=='title'?'selected':'';?>>제목</option>
            <option value="vod_content" <?=$_GET['searchType1']=='content'?'selected':'';?>>내용</option>
            </select>
        </li>
        <li class="bs_in"><input type="text"  name="searchText" value="<?=$_GET['searchText']?>" placeholder="검색어를 입력하세요" class="ipw"></li>
        <li class="bs_btn"><a href="javascript:search_sumbit()" class="btn btn1">검색하기</a></li>
    </ul>
    </form>
    <!--//Search-->

  <!--List-->
  <form>
    <table class="board_list">
    <thead>
      <tr>
        <th><input type="checkbox" name="toggle_check" value="1" onclick="toggle_checkbox(this.form['no[]'])"></th>
        <th>번호</th>
        <th>동영상 제목</th>
        <th>튜링 녹화영상</th>
        <th>영상 등록일</th>
        <th>최종 수정자</th>
      </tr>
    </thead>
    <tbody>
        <?
        if($list):
            $num = $totalRows - ($sPoint + $index);
            foreach($list as $value):
                $date = $value['reg_date']." +9 hours";
                $strtime = strtotime($date);
        ?>
        <tr>
            <td class="bl_check"><input type="checkbox" name="no[]" value="<?=$value['vod_no']?>" /></td>
            <td class="bl_num"><?=$num?></td>
            <td class="bl_subject"><a href="write?no=<?=$value['vod_no']?>&code=<?=$_GET['code']?>"><?=$value['vod_title']?></a></td>
            <td class="bl_date"><?=$value['goods_futz_filename']?></td>
            <td class="bl_date"><?=date('Y-m-d',$strtime)?> [<?=date('H:i:s', $strtime)?>]</td>
            <td class="bl_name"><?=$value['user_name']?></td>
        </tr>
        <?
            $num--;
            endforeach;
        else:
        ?>
        <tr><td colspan="8">등록된 글이 없습니다.</td></tr>
        <?endif;?> 
    </tbody>
    </table>
</form>
    <!--//List-->
    
    <ul class="pagenation">
        <?php  if (count($list) > 0) { ?>
                <?php echo pagingView('/adm/vod/list', $sPage, $_GET['page'], $ePage, $pageNum, $param)?>
            <?php } ?>

    </ul> 
       
  <div class="btn_wrap"> 
        <a href="#" class="btn btn1 rr" onclick="javascript:del()">선택삭제</a> 
        <a href="write?code=<?=$_GET['code']?>" class="btn btn1 rr">동영상 등록</a> 
  </div>
</div>

<script type="text/javascript">
    var no_list = make_no_list();
    function del() {
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
                url: '/ajax/vod/deleteArray',
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
    }
</script>
</body>
</html>
