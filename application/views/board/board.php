<? 
$PageNum = $_SESSION['PageNum'] ? $_SESSION['PageNum'] : 'corner';
include_once APPPATH."views/include/include._header.php"; ?>

<div class="board_list_wrap">
    <form name="search_frm" id="search_frm" method="GET" action="/board/list">
    <input type="hidden" name="code" value="<?=$_GET['code']?>">
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
    <?if($_SESSION['__SS_USER_TYPE__']>=$write && $_GET['code'] != 'corner' && $_GET['code'] != 'communication'):?>
    <div class="btn_wrap"> 
        <a href="/board/create?code=<?=$_GET['code']?>" class="btn btn1 rr">글쓰기</a> 
    </div>
    <?endif;?>
    </form>
    <?if($_GET['code']!='communication'):?>
	<table class="board_list" summary="공지사항">
    <thead>
      <tr>
        <th>번호</th>
        <th>제목</th>
        <th>작성자</th>
        <?if($_GET['code'] != 'corner' && $_GET['code'] != 'communication'):?>
        <th>등록일</th>
        <?endif;?>
        <!-- <th>조회수</th> -->
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
                <a href="view?no=<?=$value['no']?>&code=<?=$value['code']?>&this_page=<?=$_GET['page']?>"><?=$value['title']?></a>
                <?if($value['comment']):?>
                <span class="comment">[<?=$value['comment']?>]</span> 
                <?endif;?>
                <?if(time() - strtotime($value['reg_date']) <= 60 * 60 * 24 * 2){?>
                <i class="new i-new"></i>
                <?}?>
            </td>
            <td class="bl_name">성수클럽</td>
            <?if($_GET['code'] != 'corner' && $_GET['code'] != 'communication'):?>
            <td class="bl_date"><?=date('Y-m-d',strtotime($value['reg_date']))?></td>
            <?endif;?>
            <!-- <td class="bl_coun"><?=$value['view_count']?></td> -->
        </tr>
        <?endforeach;?>
        <?
        $num = $totalRows - ($sPoint + $index);
        foreach($list as $index=>$value):
            
        ?>
        <tr>
            <td class="bl_num"><?=$num?></td>
            <td class="bl_subject">
                <?if($_SESSION['__SS_USER_TYPE__']>=$read || $read==0):?>
                <a href="view?no=<?=$value['no']?>&<?=$param?>&this_page=<?=$_GET['page']?>"><?=$value['title']?></a>
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
            <td class="bl_name"><?=$value['user_type']==9?'성수클럽':$value['user_nickname']?></td>
            <?if($_GET['code'] != 'corner' && $_GET['code'] != 'communication'):?>
            <td class="bl_date"><?=date('Y-m-d',strtotime($value['reg_date']))?></td>
            <?endif;?>
            <!-- <td class="bl_coun"><?=$value['view_count']?></td> -->
        </tr>
        <?
        $num--;
        endforeach;?>
    </tbody>
    </table>    
    <?else:?>
    
    <div class="gallery_wrap">
        <?
        $num = $totalRows - ($sPoint + $index);
        foreach($list as $index=>$value):
            
        ?>
        <?if($_SESSION['__SS_USER_TYPE__']>=$read || $read==0):?>
        <div class="gallery" onclick="location.href='view?no=<?=$value['no']?>&<?=$param?>&this_page=<?=$_GET['page']?>';">
        <?else:?>
        <div class="gallery" onclick="alert('권한이 없습니다');">
        <?endif;?>
            <div class="pic">
                <?if($value['file_path']):
                    $imgChk = filecheck($value['file_path']);
                    if($imgChk){

                ?>
                    <img src="<?=$value['file_path']?>">
                    <? }else{?>
                    <img src="images/board/pic1.png">
                    <?}?>
                <?else:?>
                <img src="images/board/pic1.png">
                <?endif;?>
            </div>
            <ul class="g_con">
                <li class="g_subject"><a href="view?no=<?=$value['no']?>&<?=$param?>&this_page=<?=$_GET['page']?>"><?=$value['title']?></a></li>
                <li class="g_name"><i class="i-user"></i> <?=$value['user_type']==9?'성수클럽':$value['user_nickname']?></li><?if($_GET['code'] != 'corner' && $_GET['code'] != 'communication'):?><li class="g_date num"><?=date('Y-m-d',strtotime($value['reg_date']))?></li><?endif;?>
                <li class="g_count num"><i class="i-eye"></i><?=$value['view_count']?></li>
            </ul>           
        </div>
        <?
        $num--;
        endforeach;?>
    </div>
    
    <?endif;?>
	<ul class="pagenation">
        <?php  if (count($list) > 0) { ?>
            <?php echo pagingView('/board/list', $sPage, $_GET['page'], $ePage, $pageNum, $param)?>
        <?php } ?>

    </ul> 
    <?if($_SESSION['__SS_USER_TYPE__']>=$write && $_GET['code'] != 'corner' && $_GET['code'] != 'communication'):?>
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
