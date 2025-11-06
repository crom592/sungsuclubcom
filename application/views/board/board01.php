<? 
include_once APPPATH."views/include/include._header.php"; ?>

<div class="board_list_wrap">
    <form name="search_frm" id="search_frm" method="GET" action="/board/notice">
    <ul class="board_search">
    	<li class="bs_select">
            <select id="searchType1" name="searchType1">
            <option value="title" <?=$_GET['searchType1']=='title'?'selected':'';?>>제목</option>
            <option value="content" <?=$_GET['searchType1']=='content'?'selected':'';?>>내용</option>
            <option value="name" <?=$_GET['searchType1']=='name'?'selected':'';?>>작성자</option>
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
        <th>작성자</th>
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
            <td class="bl_name"><?=$value['user_name']?></td>
            <td class="bl_date"><?=date('Y-m-d',strtotime($value['reg_date']))?></td>
            <td class="bl_coun"><?=$value['view_count']?></td>
        </tr>
        <?endforeach;?>
        <?
        $num = $totalRows - ($sPoint + $index);
        foreach($list as $index=>$value):
            
        ?>
        <tr>
            <td class="bl_num"><?=$num?></td>
            <td class="bl_subject">
                <?if($_SESSION['__SS_USER_TYPE__']>=$read):?>
                <a href="view?no=<?=$value['no']?>&code=<?=$value['code']?>"><?=$value['title']?></a>
                <?else:?>
                <a href="javascript:alert('권한이 없습니다')"><?=$value['title']?></a>
                <?endif;?>

                <?if($value['comment']):?>
                <span class="comment">[<?=$value['comment']?>]</span> 
                <?endif;?>
                <?if(time() - strtotime($value['reg_date']) <= 60 * 60 * 24 * 2){?>
                <i class="new i-new"></i>
                <?}?>
            </td>
            <td class="bl_name"><?=$value['user_name']?></td>
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
    <?if($_SESSION['__SS_USER_TYPE__']>=$write):?>
    <div class="btn_wrap"> 
        <a href="/board/create?code=<?=$_GET['code']?>" class="btn btn1 rr">글쓰기</a> 
    </div>
    <?endif;?>
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
