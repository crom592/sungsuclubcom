<? 
$PageNum="5";
$SubNum="1";
$Title="유튜브 게시판";
include_once APPPATH."views/m/include/include._header.php"; ?>

<div class="board_list_wrap">
	<!--Search-->

    <ul class="board_search">
    	<li class="bs_select">
            <select id="searchType1" name="searchType1">
            <option value="title" <?=$_GET['searchType1']=='title'?'selected':'';?>>제목</option>

            </select>
        </li>
        <li class="bs_in"><input type="text" name="searchText1" id="searchText1" placeholder=" 검색어를 입력하세요" alt="검색어 입력" value="<?=$_GET['searchText1']?>"></li>
        <li class="bs_btn"><span class="btn" title="검색하기" onclick="search_submit()"><i class="i-search"></i></span></li>
    </ul>
     <form name="search_frm" id="search_frm" method="GET" action="/utube/list">
        <input type="hidden" name="searchType1" value="title">
        <input type="hidden" name="searchText1" id="searchText1_1" value="">
    </form>
    <!--//Search-->
    
	<!--List-->
    <div class="news_wrap">
        <?
        $num = $totalRows - ($sPoint + $index);
        foreach($list as $index=>$value):

        ?>
		 <dl class="news_list"> <!--onclick="javascript:SLB_show('new_view.php','iframe', 300, 400, true);"-->
        	<dt class="pic">
             <iframe src="<?=$value['link_url']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </dt>
            <dd>
            <ul>
                <li class="tit"><?=$value['title']?></li>
                <li class="info">
                    <span class="date"><i class="i-calendar"></i> 등록일 : <?=date('Y-m-d',strtotime($value['reg_date']))?></span>
                </li>
            </ul>
            </dd>
        </dl>
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
        $('#searchText1_1').val($('#searchText1').val());
        $("#search_frm").submit();
    }
</script>
<?
include_once $_SERVER['DOCUMENT_ROOT']."/m/include/include._footer.php"; ?>
