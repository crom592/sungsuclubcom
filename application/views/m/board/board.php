<? 
include_once APPPATH."views/m/include/include._header.php"; ?>

<div class="board_list_wrap">
    <ul class="board_search">
    	<li class="bs_select">
            <select id="searchType1" name="searchType1">
            <option value="title" <?=$_GET['searchType1']=='title'?'selected':'';?>>제목</option>
            <option value="content" <?=$_GET['searchType1']=='content'?'selected':'';?>>내용</option>
            <option value="name" <?=$_GET['searchType1']=='name'?'selected':'';?>>작성자</option>
            </select>
        </li>
        <li class="bs_in"><input type="text" id="searchText1" name="searchText1" value='<?=$_GET['searchText1']?>' placeholder=" 검색어를 입력하세요" alt="검색어 입력" ></li>
        <li class="bs_btn"><span class="btn" title="검색하기" onclick="search_submit()"><i class="i-search"></i></span></li>
    </ul>
    <!--//Search-->
    
	<!--List-->
	<div class="board_list">
	    <?
        $today = date('Ymd');
        foreach($notice as $value):

        ?>
    	<ul class="bl_list notice" onclick="location.href='view?no=<?=$value['no']?>&code=<?=$value['code']?>&this_page=<?=$_GET['page']?>';">
        	<li class="bl_num"><i class="i-notice"></i></li>
            <li class="bl_subject"><?=$value['title']?></li>
            <li class="bl_info">
                <span class="bl_date"><?=date('Y.m.d',strtotime($value['reg_date']))?></span>
                <!-- <span class="bl_coun"><i class="i-eye"></i><?=$value['view_count']?></span> -->
            </li>
        </ul>
        <?endforeach;?>
        <?
        $num = $totalRows - ($sPoint + $index);
        foreach($list as $index=>$value):
            
        ?>
	    <ul class="bl_list" onclick="location.href='view?no=<?=$value['no']?>&<?=$param?>&this_page=<?=$_GET['page']?>';">
        	<li class="bl_num"><?=$num?></li>
            <li class="bl_subject"><?=$value['title']?>
            <?if($value['comment']):?>
            <span class="comment">[<?=$value['comment']?>]</span> 
            <?endif;?>
            <?if(time() - strtotime($value['reg_date']) <= 60 * 60 * 24 * 2){?>
            <i class="new i-new"></i>
            <?}?>
            </li>
            <li class="bl_info">
                <span class="bl_date"><?=date('Y.m.d',strtotime($value['reg_date']))?></span>
               <!--  <span class="bl_coun"><i class="i-eye"></i><?=$value['view_count']?></span> -->
            </li>
        </ul>
        <?
        $num--;
        endforeach;?>
	</div>
    <!--//List-->
    
    <ul class="pagenation">
        <?php  if (count($list) > 0) { ?>
            <?php echo pagingView('/board/list', $sPage, $_GET['page'], $ePage, $pageNum, $param)?>
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