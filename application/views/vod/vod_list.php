<? 
include_once APPPATH."views/include/include._header.php"; ?>

<div class="board_list_wrap">

	<form name="search_frm" id="search_frm" method="GET" action="/vod/list">
    <input type="hidden" name="code" value="<?=$_GET['code']?>">
    <ul class="board_search">
        <li class="bs_select">
            <select id="searchType1" name="searchType1">
            <option value="vod_title" <?=$_GET['searchType1']=='vod_title'?'selected':'';?>>제목</option>
            </select>
        </li>
        <li class="bs_in"><input type="text" id="searchText1" name="searchText1" value='<?=$_GET['searchText1']?>' placeholder=" 검색어를 입력하세요" alt="검색어 입력" ></li>
        <li class="bs_btn"><span class="btn" title="검색하기" onclick="search_submit()"><i class="i-search"></i></span></li>
    </ul>
    </form>
    
	<!--List-->
	<div class="avi_wrap">
        <?
        $num = $totalRows - ($sPoint + $index);
        foreach($list as $index=>$value):
           // http://personal3.turing.co.kr/Partner/HitalkTv/Run.aspx?mode=url_replay&fileName
             $date = $value['reg_date']." +9 hours";
             $strtime = strtotime($date);
        ?>
        <dl class="avi_list" onclick="movieopen(<?=$value['vod_no']?>)">
            <dt class="pic"><img src="<?=$value['file_path']?>"></dt>
            <dd>
                <ul>
                    <li class="tit"><?=$value['vod_title']?></li>
                    <li class="info">
                        <span class="date"><i class="i-calendar"></i> 등록일 : <?=date('Y-m-d H:i:s', $strtime)?></span>
                        <!-- <span class="count"><i class="i-eye"></i>조회수 : <?=$value['view_count']?></span> -->
                        <span class="time"><i class="i-time"></i>재생시간 : <?=$value['play_time']?></span>
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
            <?php echo pagingView('/vod/list', $sPage, $_GET['page'], $ePage, $pageNum, $param)?>
        <?php } ?>

    </ul> 
</div>
<script type="text/javascript">
    
function movieopen(vod_no) {
    location.reload();
    url = "pop_live?vod_no="+vod_no
    aa = window.open(url,'a','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,top=10, left=5,width=720, height=700');
}
</script>

