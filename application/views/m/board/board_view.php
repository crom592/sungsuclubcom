<? 
include_once APPPATH."views/m/include/include._header.php"; ?>

<div class="board_view_wrap">

	<!--View Info-->
    <div class="board_view">
    	<ul class="bw_top">
        	<li class="bw_subject"><?=$view[0]['title']?></li>
            <?if($_GET['code'] != 'corner' && $_GET['code'] != 'communication'):?>
            <li class="bw_date"><span class="date"><i class="i-calendar-check"></i><?=date('Y-m-d', strtotime($view[0]['b_reg_date']))?></span><!-- <span class="count"><i class="i-eye"></i><?=$view[0]['view_count']?></span> --></li>
            <?endif;?>
        </ul>
        <div class="bw_name"><i class="i-user"></i><?=$view[0]['user_type']==9?'성수클럽':$view[0]['b_user_name']?></div>
        <?if($file[0]['file_path']):?>
        <ul class="bw_file">
            <?foreach($file as $val):
                if($val['file_path']):
            ?>
            <li><i class="i-bwfile"></i><a href="<?=$val['file_path']?>" target="_blank"><?=$val['file_name']?></a></li>

            <?endif;
            endforeach;?>
        </ul>
        <?endif;?>

        <div class="view_con">
        	<?=nl2br($view[0]['board_content'])?>
        </div>
    </div>
    <!--//View Info-->  
    
    <!--View Comment-->
    <?if($_GET['code'] != 'communication'):?>
    <div class="comment_wrap">
        <?foreach($view as $val):
            if($val['comment']):
        ?>
        <ul class="comment">
            <li class="cw_name"><i class="i-user"></i><?=$val['user_name']?></li>
            <li class="cw_con"><?=$val['comment']?></li>
            <li class="cw_date"><?=$val['reg_date']?>
            <?if($val['reg_user_no'] && $val['reg_user_no']==$_SESSION['__SS_USER_NO__']):?> <a href="javascript:del_comment('<?=$val['no']?>')" class="i-close" title="삭제하기"></a><?endif;?></li>
            <!-- <a href="javascript:openPop('/board/pop_comment_pw.php','500','400','yes')" class="i-close" title="삭제하기"></a> -->
        </ul>
        <?endif;
    endforeach;?>

        <?if($_SESSION['__SS_USER_NO__']):?>
        <form name="comment" id="comment">
        <input type="hidden" name="fk_board_no" value="<?=$view[0]['board_no']?>">
        <ul class="cw_write">
            <!-- <li class="cwr_id"><input type="text" name="name" placeholder="이름"/> <input type="password" name="passwd" placeholder="비밀번호"/></li> -->
            <li class="cwr_con"><textarea name="comment" cols="" rows=""></textarea></li>
            <li class="cwr_btn"><span class="btn btn2" onclick="save_comment()">코멘트 작성</span></li>
        </ul>
        <?endif;?>
    </div>
    <?endif;?>
    <!--//View Comment-->   
    
    
    <div class="btn_wrap"> 
        <?if(($_SESSION['__SS_USER_TYPE__'] && ($_SESSION['__SS_USER_TYPE__']>=9) || ($_SESSION['__SS_USER_NO__'])==$view[0]['reg_no'])):?>
        <a href="/board/edit?<?=$param?>" class="btn btn1 rr">수정</a>
        <a href="javascript:del(<?=$view[0]['board_no']?>)" class="btn btn1 rr">삭제</a>
        <?endif;?>
        <a href="/board/list?<?=$param2?>&page=<?=$_GET['this_page']?>" class="btn btn1 rr">목록</a>
    </div>
    
    <!--View Next-->
    <!-- <ul class="board_next">
    	<li><span class="tit i-arrow-up">다음글</span><a href="">다음글의 제목이 들어갑니다.</a></li>
        <li><span class="tit i-arrow-down">이전글</span><a href="">이전글의 제목이 들어갑니다. 이전글의 제목이 들어갑니다.</a></li>    
    </ul> -->
    <!--//View Next-->
    

</div>

<script type="text/javascript">

    function del(no) {
        if(!confirm('정말 삭제하시겠습니까?')) {
            return false;
        }
        $.ajax({
          url: "/ajax/board/delete",
          type: 'POST',
          data: {'no':no},
          success: function (data) {
    
            if(data==1) {
                alert('삭제되었습니다');
                window.location.href="/board/list?<?=$param?>"
            } 
            else alert('삭제중 오류가 발생하였습니다');
            
          },
          error: function (jqXHR, textStatus, errorThrown) {
              alert("정보를 받아오는 도중 에러가 발생하였습니다. 다시 시도해 주세요. \n" + textStatus + " : " + errorThrown);
             
          }
        });
    }
    function save_comment(){


        $.ajax({
          url: "/ajax/board/save_comment",
          type: 'POST',
          data: $('#comment').serialize(),
          success: function (data) {
    
            if(data==1) alert('저장되었습니다');
            else alert('저장중 오류가 발생하였습니다');
            window.location.reload();

          },
          error: function (jqXHR, textStatus, errorThrown) {
              alert("정보를 받아오는 도중 에러가 발생하였습니다. 다시 시도해 주세요. \n" + textStatus + " : " + errorThrown);
             
          }
        });
    }

    function del_comment(no){


        $.ajax({
          url: "/ajax/board/del_comment",
          type: 'GET',
          data: {'no':no},
          success: function (data) {
    
            if(data==1) alert('삭제되었습니다');
            else alert('삭제중 오류가 발생하였습니다');
            window.location.reload();

          },
          error: function (jqXHR, textStatus, errorThrown) {
              alert("정보를 받아오는 도중 에러가 발생하였습니다. 다시 시도해 주세요. \n" + textStatus + " : " + errorThrown);
             
          }
        });
    }
    
</script>
 