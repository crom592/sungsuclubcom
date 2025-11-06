<? include_once $_SERVER['DOCUMENT_ROOT']."/admin/include/include.header.php"; ?>
<body class="ad_in">

<div class="board_view">
    <ul class="bw_top">
            <li class="bw_subject"><?=$view[0]['title']?></li>
            <li class="bw_date"><span class="date"><i class="i-calendar-check"></i><?=date('Y-m-d', strtotime($view[0]['b_reg_date']))?></span><span class="count"><i class="i-eye"></i><?=$view[0]['view_count']?></span></li>
        </ul>
    <ul class="bw_info">
        <li><i class="i-user"></i><b>작성자</b><?=$view[0]['user_nickname']?$view[0]['user_nickname']:$view[0]['reg_name'];?></li>
    </ul> 
    <ul class="bw_file">
        <?foreach($file as $val):
            if($val['file_path']):
        ?>
        <li><i class="i-bwfile"></i><a href="<?=$val['file_path']?>"><?=$val['file_name']?></a></li>

        <?endif;
        endforeach;?>
    </ul>
    <!-- <ul class="view_pic">
        <li><img src="/images/board/pic2.png" ></li>  
        <li><img src="/images/board/pic2.png" ></li>        
    </ul> -->
    <div class="view_con">
        <?=nl2br($view[0]['board_content'])?>	
    </div>
    
    <!--Comment-->
    <div class="comment_wrap">
    	<?foreach($view as $val):
            if($val['comment']):
        ?>
        <ul class="comment">
            <li class="cw_name"><i class="i-user"></i><?=$val['user_name']?></li>
            <li class="cw_con"><?=$val['comment']?></li>
            <li class="cw_date"><?=$val['reg_date']?>
            <?if($val['reg_user_no'] && $val['reg_user_no']==$_SESSION['__SS_USER_NO__']):?> <a href="javascript:openPop('/board/pop_comment_pw.php','500','400','yes')" class="i-close" title="삭제하기"></a><?endif;?></li>
        </ul>
        <?endif;
    endforeach;?>
        <form name="comment" id="comment">
        <input type="hidden" name="fk_board_no" value="<?=$view[0]['board_no']?>">
        <ul class="cw_write">
            <li class="cwr_id"><input type="text" name="name" placeholder="이름"/> <input type="password" name="passwd" placeholder="비밀번호"/></li>
            <li class="cwr_con"><textarea name="comment" cols="" rows=""></textarea></li>
            <li class="cwr_btn"><span class="btn btn2" onclick="save_comment()">코멘트 작성</span></li>
        </ul>
        </form>
    </div>
    <!--//Comment-->
    
    <div class="btn_wrap"> 
        <a href="/adm/board/list?<?=$param?>" class="btn btn1 ll">목록</a>
        <a href="/adm/board/write?<?=$param?>" class="btn btn1 rr">수정</a>
        <a href="javascript:del(<?=$view[0]['board_no']?>)" class="btn btn1 rr">삭제</a>
    </div>
    
    <!-- <ul class="board_next">
    	<li><span class="tit i-arrow-up">이전글</span>이전 글이 없습니다.</li>
        <li><span class="tit i-arrow-down">다음글</span>다음 글이 없습니다.</li>    
    </ul> -->
</body>    
<script type="text/javascript">
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

    function del(no) {
        $.ajax({
          url: "/ajax/board/delete",
          type: 'POST',
          data: {'no':no},
          success: function (data) {
    
            if(data==1) {
                alert('삭제되었습니다');
                window.location.href="/adm/board/list?<?=$param?>"
            } 
            else alert('삭제중 오류가 발생하였습니다');
            
          },
          error: function (jqXHR, textStatus, errorThrown) {
              alert("정보를 받아오는 도중 에러가 발생하였습니다. 다시 시도해 주세요. \n" + textStatus + " : " + errorThrown);
             
          }
        });
    }
    
</script>
</body>
</html>
