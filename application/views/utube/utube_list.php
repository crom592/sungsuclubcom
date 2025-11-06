<? 
$PageNum="5";
$SubNum="1";
$Title="유튜브 게시판";
include_once APPPATH."views/include/include._header.php"; ?>

<div class="board_list_wrap">

	<!--Search-->
    <form name="search_frm" id="search_frm" method="GET" action="/utube/list">

    <ul class="board_search">
    	<li class="bs_select">
            <select id="s_scroll" name="s_scroll">
			<option value="title" <?=$_GET['searchType1']=='title'?'selected':'';?>>제목</option>
             </select>
        </li>
        <li class="bs_in"><input type="text" id="s_key" name="searchText1" placeholder=" 검색어를 입력하세요" alt="검색어 입력" value=></li>
        <li class="bs_btn"><span class="btn" title="검색하기" onclick="search_submit()"><i class="i-search"></i></span></li>
    </ul>
    <!--//Search-->
    </form>
	<!--List-->
	<div class="gallery_wrap">
        <?
        $num = $totalRows - ($sPoint + $index);
        foreach($list as $index=>$value):

        ?>
    	<div class="gallery"><!-- onclick="javascript:SLB_show('utube/view?no=<?=$value['no']?>','iframe', 600, 500, true);"-->
        	<div class="pic"><iframe src="<?=$value['link_url']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <ul class="g_con">
            	<li class="g_subject"><?=$value['title']?></li>
                <li class="g_date num"><?=date('Y-m-d',strtotime($value['reg_date']))?></li>
            </ul>        	
        </div>
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
<?
include_once $_SERVER['DOCUMENT_ROOT']."/include/include._footer.php"; ?>