<? 
$SubNum="1";

?>
<body class="ad_in">

<div class="board_write_wrap sym_w">
	<!--임의로 페이지 나눔-->
  	<? include_once APPPATH."views/admin/include/include.sym_w.php"; ?> 
    <!--Write-->
    <form name="sym_frm" id="sym_frm" method="post" action="/ajax/symposium/save">
    <input type="hidden" name="abs_code_hidden1" id="abs_code_hidden1" value=''>
    <input type="hidden" name="abs_code_hidden2" id="abs_code_hidden2" value=''>
    <input type="hidden" name="abs_code_hidden3" id="abs_code_hidden3" value=''>
    <input type="hidden" name="abs_code_hidden4" id="abs_code_hidden4" value=''>
    <input type="hidden" name="abs_code_hidden5" id="abs_code_hidden5" value=''>
    <input type="hidden" name="abs_code_hidden6" id="abs_code_hidden6" value=''>
    <input type="hidden" name="no" value="<?=$_GET['no']?>">
    <div class="input_tit"><?=$sym['title']?></div>
	<table class="board_write">    
    <tbody>
        <tr>
            <th>학술대회명</th>
            <td><input type="text" class="ipw ipw2" name="title" id="title" value="<?=$sym['title']?>"></td>
        </tr>
        <tr>
            <th>학술대회 소개</th>
            <td><textarea  class="ipw ipw_tt" name="intro" id="intro"><?=$sym['intro']?></textarea></td>
        </tr>
        <tr>
            <th>학술대회기간</th>
            <td>
            <ul class="select_date">
                <li><i class="i-calendar-check" title="날짜선택"></i><input type="text" class="ipw ipw1" name="start_date" id="start_date" value="<?=$sym['start_date']?>"> ~ </li>
                <li><i class="i-calendar-check" title="날짜선택"></i><input type="text" class="ipw ipw1" name="end_date" id="end_date" value="<?=$sym['end_date']?>"></li>
            </ul>
        	</td>
        </tr>
        <tr>
            <th>사전등록접수기간</th>
            <td>
            <ul class="select_date">
                <li><i class="i-calendar-check" title="날짜선택"></i><input type="text" class="ipw ipw1" name="reg_start_date" id="reg_start_date" value="<?=$sym['reg_start_date']?>"> ~ </li>
                <li><i class="i-calendar-check" title="날짜선택"></i><input type="text" class="ipw ipw1" name="reg_end_date" id="reg_end_date" value="<?=$sym['reg_end_date']?>"></li>
            </ul>
        	</td>
        </tr>
        <tr>
            <th>사전등록정보 수정기간</th>
            <td>
            <ul class="select_date">
                <li><i class="i-calendar-check" title="날짜선택"></i><input type="text" class="ipw ipw1" name="update_start_date" id="update_start_date" value="<?=$sym['update_start_date']?>"> ~ </li>
                <li><i class="i-calendar-check" title="날짜선택"></i><input type="text" class="ipw ipw1" name="update_end_date" id="update_end_date" value="<?=$sym['update_end_date']?>"></li>
            </ul>
        	</td>
        </tr>
        <tr>
            <th>초록제출기간</th>
            <td>
            <ul class="select_date">
                <li><i class="i-calendar-check" title="날짜선택"></i><input type="text" class="ipw ipw1" name="abs_start_date" id="abs_start_date" value="<?=$sym['abs_start_date']?>"> ~ </li>
                <li><i class="i-calendar-check" title="날짜선택"></i><input type="text" class="ipw ipw1" name="abs_end_date" id="abs_end_date" value="<?=$sym['abs_end_date']?>"></li>
            </ul>
        	</td>
        </tr>
        <tr>
            <th>초록수정기간</th>
            <td>
            <ul class="select_date">
                <li><i class="i-calendar-check" title="날짜선택"></i><input type="text" class="ipw ipw1" name="abs_update_start_date" id="abs_update_start_date" value="<?=$sym['abs_update_start_date']?>"> ~ </li>
                <li><i class="i-calendar-check" title="날짜선택"></i><input type="text" class="ipw ipw1" name="abs_update_end_date" id="abs_update_end_date" value="<?=$sym['abs_update_start_date']?>"></li>
            </ul>
        	</td>
        </tr>
        <tr>
                <th>장소</th>
                <td><input type="text" class="ipw ipw2" name="place" id="place" value="<?=$sym['place']?>"></td>
            </tr>
            <tr>
                <th>담당자</th>
                <td><input type="text" class="ipw ipw1" name="manager" id="manager" value="<?=$sym['manager']?>"></td>
            </tr>
            <tr>
                <th>전화</th>
                <td><input type="text" class="ipw ipw1" name="tel" id="tel" value="<?=$sym['tel']?>"></td>
            </tr>
            <tr>
                <th>팩스</th>
                <td><input type="text" class="ipw ipw1" name="fax" id="fax" value="<?=$sym['fax']?>"></td>
            </tr>
            <tr>
                <th>이메일</th>
                <td><input type="text" class="ipw ipw1" name="email" id="email" value="<?=$sym['email']?>"></td>
            </tr>
        <tr>
            <th>종료여부</th>
            <td>
            <ul class="radio">
            	<li><input type="radio" name="end_yn" value="Y" <?=$sym['end_yn']=='Y'?'checked':'';?>> 예</li>
                <li><input type="radio" name="end_yn" value="N" <?=$sym['end_yn']=='N'||$sym['end_yn']==''?'checked':'';?>> 아니오</li>
            </ul>
            </td>
        </tr>
    </tbody>
    </table>
    <!--//Write-->    
    
    
    <div class="btn_wrap"> 
        <a class="btn btn1 rr" href="javascript:form_submit()">확인</a>
        <a href="sym_list" class="btn btn1 cc">목록보기</a>
    </div>
    </form>

</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    function form_submit() {

        var title = document.getElementById("title");       
        var start_date = document.getElementById("start_date"); 
        var end_dte = document.getElementById("end_dte"); 
        var reg_start_date = document.getElementById("reg_start_date"); 
        var reg_end_date = document.getElementById("reg_end_date"); 
        var update_start_date = document.getElementById("update_start_date");
        var update_end_date = document.getElementById("update_end_date");   
        var abs_start_date = document.getElementById("abs_start_date"); 
        var abs_end_date = document.getElementById("abs_end_date"); 
        var abs_update_start_date = document.getElementById("abs_update_start_date");
        var abs_update_end_date = document.getElementById("abs_update_end_date");   
        var place = document.getElementById("place");       
        var manager = document.getElementById("manager");     
        var tel = document.getElementById("tel");       
        var fax = document.getElementById("fax");       
        var email = document.getElementById("email");

        var intro = document.getElementById("intro").value;
  
        if (title.value == "") {
            alert("학술대회명을 입력해주세요");
            title.focus();
            return;
        }
        
        if (start_date.value == "") {
            alert("학술대회기간을 입력해주세요");
            start_date.focus();
            return;
        }
        
        if (end_date.value == "") {
            alert("학술대회기간을 입력해주세요");
            end_dte.focus();
            return;
        }
        
        if (reg_start_date.value == "") {
            alert("사전등록접수기간을 입력해주세요");
            reg_start_date.focus();
            return;
        }

        if (reg_end_date.value == "") {
            alert("사전등록접수기간을 입력해주세요");
            reg_end_date.focus();
            return;
        }
        
        if (update_start_date.value == "") {
            alert("사전등록수정기간을 입력해주세요");
            update_start_date.focus();
            return;
        }

        if (update_end_date.value == "") {
            alert("사전수정접수기간을 입력해주세요");
            update_end_date.focus();
            return;
        }
        
        if (abs_start_date.value == "") {
            alert("초록제출기간을 입력해주세요");
            abs_start_date.focus();
            return;
        }

        if (abs_end_date.value == "") {
            alert("초록제출기간을 입력해주세요");
            abs_end_date.focus();
            return;
        }


        if (abs_update_start_date.value == "") {
            alert("초록제출기간을 입력해주세요");
            abs_update_start_date.focus();
            return;
        }

        if (abs_update_end_date.value == "") {
            alert("초록제출기간을 입력해주세요");
            abs_update_end_date.focus();
            return;
        }
        
        if (place.value == "") {
            alert("장소를 입력해주세요");
            place.focus();
            return;
        }
        $('#sym_frm').submit();

    }

    var dates = $('#start_date, #end_date, #reg_start_date, #reg_end_date ,#update_start_date, #update_end_date, #abs_start_date, #abs_end_date, #abs_update_start_date, #abs_update_end_date').datepicker({
        showMonthAfterYear:true,
        inline: true,
        changeMonth: true,
        changeYear: true,
        dateFormat : 'yy-mm-dd',
        dayNamesMin:['일', '월', '화', '수', '목', '금', ' 토'],
        monthNames:['1월','2월','3월','4월','5월','6월','7 월','8월','9월','10월','11월','12월'],
        monthNamesShort:['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
        showButtonPanel: true, currentText: '오늘 ' , closeText: '닫기'
    });
</script>
</body>
</html>
