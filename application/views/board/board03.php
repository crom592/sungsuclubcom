<? 
$PageNum="5";
$SubNum="3";
$Title="행사정보";
include_once APPPATH."views/include/include._header.php"; ?>
<div class="board_list_wrap">
    <form name="search_frm" id="search_frm" method="GET" action="/board/notice">
    <ul class="board_search">
        <li class="bs_select">
            <select id="searchType1" name="searchType1">
            <option value="title" <?=$_GET['searchType1']=='title'?'selected':'';?>>제목</option>
            <option value="content" <?=$_GET['searchType1']=='content'?'selected':'';?>>내용</option>
            </select>
        </li>
        <li class="bs_in"><input type="text" id="searchText1" name="searchText1" value='<?=$_GET['searchText1']?>' placeholder=" 검색어를 입력하세요" alt="검색어 입력" value=""></li>
        <li class="bs_btn"><span class="btn" title="검색하기" onclick="search_submit()"><i class="i-search"></i></span></li>
    </ul>
    </form>
    <table class="board_list" summary="공지사항">
    <thead>
      <tr>
        <th>번호</th>
        <th>제목</th>
        <th>등록일</th>
        <th>조회수</th>
      </tr>
    </thead>
    <tbody>
        <?
        $today = date('Ymd');
        foreach($notice as $value):

        ?>
        <tr class="notice">
            <td class="bl_notice"><i class="i-notice"></i></td>
            <td class="bl_subject">
                <a href="view?no=<?=$value['no']?>&code=<?=$value['code']?>"><?=$value['title']?></a>
                <?if($value['comment']):?>
                <span class="comment">[<?=$value['comment']?>]</span> 
                <?endif;?>
                <?if(time() - strtotime($value['reg_date']) <= 60 * 60 * 24 * 2){?>
                <i class="new i-new"></i>
                <?}?>
            </td>
            <td class="bl_date"><?=date('Y-m-d',strtotime($value['reg_date']))?></td>
            <td class="bl_coun"><?=$value['view_count']?></td>
        </tr>
        <?endforeach;?>
        <?foreach($list as $index=>$value):
            $num = $totalRows - ($sPoint + $index);
        ?>
        <tr>
            <td class="bl_num"><?=$num?></td>
            <td class="bl_subject">
                <a href="view?no=<?=$value['no']?>&code=<?=$value['code']?>"><?=$value['title']?></a>
                <?if($value['comment']):?>
                <span class="comment">[<?=$value['comment']?>]</span> 
                <?endif;?>
                <?if(time() - strtotime($value['reg_date']) <= 60 * 60 * 24 * 2){?>
                <i class="new i-new"></i>
                <?}?>
            </td>
            <td class="bl_date"><?=date('Y-m-d',strtotime($value['reg_date']))?></td>
            <td class="bl_coun"><?=$value['view_count']?></td>
        </tr>
        <?
        $num--;
        endforeach;?>
    </tbody>
    </table>    
    <ul class="pagenation">
        <?php  if (count($list) > 0) { ?>
            <?php echo pagingView('/board/notice', $sPage, $_GET['page'], $ePage, $pageNum, $param)?>
        <?php } ?>

    </ul> 
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
</script>  
<? include_once APPPATH."views/include/include._footer.php"; ?>
 