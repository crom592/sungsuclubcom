<body class="ad_in">
<?
foreach($user_type_list as $type):
    $user_type[$type['type_no']] = $type['type_name'];
endforeach;
?>
<h2 class="tit1">회원목록<u>회원관리를 할 수 있습니다.</u></h2>
<div class="board_list_wrap">
    <!--Search-->
    <form name="search_frm" id="search_frm" method="GET" action="/adm/member/user/list">
    <input type="hidden" name="user_gubun" value="<?=$_GET['user_gubun']?>">
    <input type="hidden" name="sort_by" id="sort_by" value="<?=$_GET['sort_by']?>">
    <input type="hidden" name="page" id="page" value="<?=$_GET['page']?>">
    <ul class="board_search">
        <li class="bs_tit">검색어</li>
        <li class="bs_select">
            <select class="ipw" name="searchType1">
            <?foreach(SEARCH_ARR as $s_index=>$s_val):
                if($_GET['searchType1']=='') {
                    $selected = $s_index=='user_number'?'selected':'';
                } else {
                    $selected = $s_index==$_GET['searchType1']?'selected':'';
                }
                
            ?>
            <option value="<?=$s_index?>" <?=$selected?>><?=$s_val?></option>
            <?endforeach;?>
        </select>
        </li>
        <li class="bs_in"><input type="text" placeholder="검색어를 입력하세요" alt="검색어 입력" class="ipw" name="searchText1" value="<?=$_GET['searchText1']?>"> </li>
        <li class="bs_btn"><a href="javascript:search_submit()" class="btn btn1">검색하기</a></li>
    </ul>
    </form>
    <!--//Search-->
    <!--List-->
    <ul class="list_top">
        <li class="mem_type">
            <!--회원선택 후 회원종류 변경 버튼을 누르면 나오는 부분-->
            <select id="list_user_type" name="list_user_type">
                <?
                foreach($user_type as $index=>$value):
                ?>
                <option value="<?=$index?>"><?=$value?>
                <?endforeach;?>
            </select>
            <a class="btn btn2" href="javascript:updateType()">회원종류 변경</a>
        </li>
        <!-- <li><a class="btn btn2">엑셀로 다운받기</a></li> -->
        <li><a class="btn btn2"  href="javascript:location.reload()">새로고침</a></li>
        <li class="total">검색한 회원 수 : <b><?=$totalRows?></b>명 (  / <?=$pageNum?>page )</li>
    </ul>
    <!--List-->
    <div class="btn_wrap"> 
        <a href="#" class="btn btn1 rr" onclick="javascript:del()">선택삭제</a> 
        <!--a href="write?no=&code=<?=$_GET['code']?>&page=<?=$_GET['page']?>" class="btn btn1 rr">글쓰기</a--> 
    </div>
    <form>
    <table class="board_list td_c">
    <thead>
      <tr>
        <th><input type="checkbox" name="toggle_check" value="1" onclick="toggle_checkbox(this.form['no[]'])"></th>
        <th>번호</th>
        <th>회원구분
            <a href='#' onclick="set_sort('user_type asc')">▲</a>
            <a href='#' onclick="set_sort('user_type desc')">▼</a>
        </th>
        <th>아이디</th>
        <th>이름</th>
        <th>닉네임<a href='#' onclick="set_sort('user_nickname asc')">▲</a>
            <a href='#' onclick="set_sort('user_nickname desc')">▼</a></th>
        <th>최근접속
            <a href='#' onclick="set_sort('last_login_date asc')">▲</a>
            <a href='#' onclick="set_sort('last_login_date desc')">▼</a>
        </th>
        <th>이메일</th>
        <th>휴대폰</th>  
        <th>시작일</th>
        <th>종료일</th>
        <th>가입일</th>
        <th>정보확인</th>
      </tr>
    </thead>
    <tbody>
        <?
        $this_no = $totalRows-($number_per_page*($page-1));
        foreach($list as $value):

        ?>
        <tr>
          <td class="bl_check"><input type="checkbox" name="no[]" value="<?=$value['user_no']?>" /></td>
          <td class="bl_num"><?=$this_no?></td>
          <td class="bl_name"><?=$user_type[$value['user_type']]?></td>
          <td class="bl_name"><?=$value['user_id']?></td>
          <td class="bl_name"><?=$value['user_name']?></td>
          <td class="bl_name"><?=$value['user_nickname']?></td>
          <td class="bl_name"><?=$value['last_login_date']?></td>
          <td class="bl_name"><?=$value['user_email']?></td>
          <td class="bl_name"><?=$value['user_phone']?></td>
          <!-- <td class="bl_name"><?=$value['paddress']." ".$value['paddress_part']?></td> -->
          
          <td class="bl_date"><?=$value['start_dt']?></td>
          <td class="bl_date"><?=$value['end_dt']?></td>
          <td class="bl_date"><?=$value['reg_date']?></td>
          <td><a href="/adm/member/user/view?user_no=<?=$value['user_no']?>" class="btn btn1">정보확인</a>
               
          </td>
        </tr>
        <?
        $this_no--;
        endforeach;?>
    </tbody>
    </table>
</form>
    <!--//List-->
    
    <ul class="pagenation">
        <?php  if (count($list) > 0) { ?>
                <?php echo pagingView('/adm/member/user/list', $sPage, $_GET['page'], $ePage, $pageNum, $param)?>
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

    function updateType() {
        var no_list = make_no_list();

        if(no_list.length<=0) {
            alert("항목을 선택해주세요");
            return false;
        }
        var allData = {
            "no_list": no_list,
            "user_type":$('#list_user_type').val()
        };

        if (confirm("정말 변경 하시겠습니까?")) {
            $.ajax({
                url: '/ajax/admin/user/updateType',
                type: 'POST',
                data:  allData,
                success: function (data) {
                    console.log(data)
                    if(data==1) {
                        alert('변경되었습니다.');
                        window.location.reload();
                    } else {
                        alert('변경 중 오류가 발생하였습니다. 잠시후 다시 시도해주세요');
                    }
                    
                    //window.location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("시스템 장애[관리자에게 문의] \n" + textStatus + " : " + errorThrown);
                }
            });
        }
    }

    function set_sort(_sort_)
    {
        $("#sort_by").val(_sort_);
        document.search_frm.submit();
    }
    function del() {
        var no_list = make_no_list();

        if(no_list.length<=0) {
            alert("항목을 선택해주세요");
            return false;
        }
        var allData = {
            "no_list": no_list
        };
        if (confirm("정말 삭제 하시겠습니까?")) {
            $.ajax({
                url: '/ajax/user/deleteArray',
                type: 'POST',
                data:  allData,
                success: function (data) {
                    console.log(data)
                    if(data==1) {
                        alert('삭제되었습니다.');
                        window.location.reload();
                    } else {
                        alert('삭제중 오류가 발생하였습니다. 잠시후 다시 시도해주세요');
                    }
                    
                    //window.location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("시스템 장애[관리자에게 문의] \n" + textStatus + " : " + errorThrown);
                }
            });
        }
    }
</script>   
</body>
</html>
