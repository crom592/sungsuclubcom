<? include_once $_SERVER['DOCUMENT_ROOT']."/admin/include/include.header.php"; ?>
<body class="ad_in">

<h2 class="tit1">자료실</h2>
<div class="board_list_wrap">
 
	<!--Search-->
    <ul class="board_search">
    	<li class="bs_tit">검색어</li>
    	<li class="bs_select">
            <select class="ipw">
                <option value="">선택</option>
                <option value="">작성자</option>
                <option value="">제목</option>
                <option value="">내용</option>
            </select>
        </li>
        <li class="bs_in"><input type="text" placeholder="검색어를 입력하세요" class="ipw"></li>
        <li class="bs_btn"><a href="" class="btn btn1">검색하기</a></li>
    </ul>
    <!--//Search-->

	<!--List-->
    <form>
    <table class="board_list">
    <thead>
      <tr>
        <th><input type="checkbox" name="toggle_check" value="1" onclick="toggle_checkbox(this.form['no[]'])"></th>
        <th>번호</th>
        <!-- <th>이미지</th> -->
        <th>제목</th>
        <th>파일</th>
        <th>작성자</th>
        <th>등록일</th>
        <th>조회수</th>
      </tr>
    </thead>
    <tbody>
        <?
        if($list):
            $num = $totalRows - ($sPoint + $index);
          foreach($list as $value):?>
        <tr>
            <td class="bl_check"><input type="checkbox" name="no[]" value="<?=$value['no']?>" /></td>
            <td class="bl_num"><?=$num?></td>
            <!-- <td class="bl_pic"><img src="/images/board/pic1.png" ><!--첨부파일 이미지가 있을경우 미리보기 나옴--><!--/td> -->
            <td class="bl_subject"><a href="view?no=<?=$value['no']?>&code=data"><?=$value['title']?></a></td>
            <td class="bl_file"><?if($value['file_path']):?><i class="i-bwfile" onclick="<?=$value['file_path']?>"></i><?endif;?><!--클릭시 첨부파일 바로 다운로드--></td>
            <td class="bl_name"><?=$value['reg_user_name']?></td>
            <td class="bl_date"><?=date('Y-m-d',strtotime($value['reg_date']))?></td>
            <td class="bl_coun"><?=$value['view_count'];?></td>
        </tr>
        <?
            $num--;
            endforeach;
        else:
        ?>
      <tr><td colspan="8">등록된 학회소식이 없습니다.</td></tr>
      <?endif;?> 
    </tbody>
    </table>
    </form>
    <!--//List-->
    
    <ul class="pagenation">
        <?php  if (count($list) > 0) { ?>
                <?php echo pagingView('/adm/board/data', $sPage, $_GET['page'], $ePage, $pageNum, $param)?>
            <?php } ?>

    </ul> 
       
    <div class="btn_wrap"> 
        <a href="#" class="btn btn1 rr" onclick="javascript:del()">선택삭제</a> 
        <a href="write?no=&code=data" class="btn btn1 rr">글쓰기</a> 
    </div>
</div>


</body>
</html>
