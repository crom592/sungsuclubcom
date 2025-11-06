<? 
$PageNum="5";
$SubNum="1";
$Title="동영상게시판";
include_once APPPATH."views/m/include/include._header.php"; ?>

<div class="board_list_wrap">
	<!--Search-->
    <form name="search_frm" id="search_frm" method="GET" action="/board/list">
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
    <!--//Search-->
    
	<!--List-->
    <div class="news_wrap">
        <?
        $num = $totalRows - ($sPoint + $index);
        foreach($list as $index=>$value):
            http://personal3.turing.co.kr/Partner/HitalkTv/Run.aspx?mode=url_replay&fileName
        ?>
		 <dl class="news_list" onclick="location.href='eliveh://personal3.turing.co.kr/RecordFile/Channel/<?=$value['goods_futz_filename']?>';">
        	<dt class="pic"><img src="<?=$value['file_path']?>"></dt>
            <dd>
            <ul>
                <li class="tit"><?=$value['vod_title']?></li>

                <li class="info">
                    <span class="date"><i class="i-calendar"></i> 등록일 : <?=$value['reg_date']?></span>
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

