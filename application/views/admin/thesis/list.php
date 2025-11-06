<? include_once $_SERVER['DOCUMENT_ROOT']."/admin/include/include.header.php"; ?>
<body class="ad_in">

<h2 class="tit1">논문투고</h2>
<div class="board_list_wrap">
 
	<!--Search-->
    <form name="search_frm" id="search_frm" method="GET" action="/adm/thesis/list">
    <ul class="board_search">
      <li class="bs_select">
            <select id="searchType1" name="searchType1" class="ipw">
            <option value="title" <?=$_GET['searchType1']=='title'?'selected':'';?>>제목</option>
            <option value="content" <?=$_GET['searchType1']=='content'?'selected':'';?>>내용</option>
            <option value="name" <?=$_GET['searchType1']=='name'?'selected':'';?>>작성자</option>
            </select>
        </li>
        <li class="bs_in"><input type="text"  name="searchText1" value="<?=$_GET['searchText1']?>" placeholder="검색어를 입력하세요" class="ipw"></li>
        <li class="bs_btn"><span class="btn" title="검색하기" onclick="search_submit()"><i class="i-search"></i></span></li>
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
        <th>제목</th>
        <th>파일</th>
        <th>작성자</th>
        <th>신청일자</th>
        <th>상태</th>
        <th>조회수</th>
      </tr>
    </thead>
    <tbody>
      <?
      if($list):
      $num = $totalRows - ($sPoint + $index);
      foreach($list as $value):
        
        ?>
        <tr>
            <td class="bl_check"><input type="checkbox" name="no[]" value="<?=$value['no']?>" /></td>
            <td class="bl_num"><?=$num?></td>
            <td class="bl_subject"><a href="view?no=<?=$value['no']?>"><?=$value['title']?></a></td>
            <td class="bl_file"><?if($value['file_path']):?><i class="i-bwfile" onclick="<?=$value['file_path']?>"></i><?endif;?><!--클릭시 첨부파일 바로 다운로드--></td>
            <td class="bl_name"><?=$value['b_user_name']?></td>
            <td class="bl_date"><?=date('Y-m-d',strtotime($value['reg_date']))?></td>
            <td class="bl_sis">
              <?
              switch($value['status']) {
                    case 1: echo '<b class="tbb b1">신청</b>';
                    break;
                    case 2: echo '<b class="tbb b2">접수</b>';
                    break;
                    case 3: echo '<b class="tbb b3">수정 후 승인</b>';
                    break;
                    case 4: echo '<b class="tbb b4">보완</b>';
                    break;
                    case 5: echo '<b class="tbb b5">반려</b>';
                    break;
                    case 6: echo '<b class="tbb b6">승인</b>';
                    break;
                }
              ?>
              
            </td>
            <td class="bl_coun"><?=$value['view_count'];?></td>
        </tr>
      <?
        $num--;
        endforeach;
      else:
      ?>
      <tr><td colspan="8">등록된 논문이 없습니다.</td></tr>
      <?endif;?> 
    </tbody>
    </table>
    </form>
	<!--//List-->
    
    <ul class="pagenation">
        <?php  if (count($list) > 0) { ?>
                <?php echo pagingView('/adm/member/user/list', $sPage, $_GET['page'], $ePage, $pageNum, $param)?>
            <?php } ?>

    </ul> 
       
    <div class="btn_wrap"> 
        <button type="button" class="btn btn1 rr" id="cancel">선택삭제</button> 
        <!-- <a href="write" class="btn btn1 rr">글쓰기</a>  -->
    </div>
</div>

<script>
    $(function(){

        $(document).on("click", "#search", function(){
            search_submit();
        });

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
                    url: '/ajax/thesis/deleteArray',
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
    });
    function search_submit() {

        $("#search_frm").submit();
    }
</script> 
</body>
</html>
