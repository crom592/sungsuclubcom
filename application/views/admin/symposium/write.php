<? include_once $_SERVER['DOCUMENT_ROOT']."/admin/include/include.header.php"; ?>
<body class="ad_in">

<h2 class="tit1">학술대회 생성</h2>
<div class="board_view_wrap sym_w">	
    <form name="sym_frm" id="sym_frm" method="post" action="/ajax/symposium/save">
    <input type="hidden" name="abs_code_hidden1" id="abs_code_hidden1" value=''>
    <input type="hidden" name="abs_code_hidden2" id="abs_code_hidden2" value=''>
    <input type="hidden" name="abs_code_hidden3" id="abs_code_hidden3" value=''>
    <input type="hidden" name="abs_code_hidden4" id="abs_code_hidden4" value=''>
    <input type="hidden" name="abs_code_hidden5" id="abs_code_hidden5" value=''>
    <input type="hidden" name="abs_code_hidden6" id="abs_code_hidden6" value=''>
    <div class="pa2">
      <h3 class="tit2">학술대회 정보</h3>
        <table class="board_write">    
        <tbody>
            <tr>
                <th>학술대회명</th>
                <td><input type="text" class="ipw ipw2" name="title" id="title" value="<?=$sym['title']?>"></td>
            </tr>
            <tr>
                <th>학술대회 소개</th>
                <td><textarea  class="ipw ipw_tt" name="intro" id="intro" value="<?=$sym['intro']?>"></textarea></td>
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
        </tbody>
        </table>
    </div>    
    
    <div class="pa">
      <h3 class="tit2">초록 제출 정보</h3>

        <table class="board_write sym_abs">    
        <tbody>
            <tr>
                <th>발표 분야 설정</th>
                <td class="info">
                <select class="ipw" name="drop_sym_list" id="drop_sym_list" onchange="sel(this.value)">
                    <?foreach($sym_others as $value):?>
                    <option value="<?=$value['no']?>"><?=$value['title'];?></option>
                    <?endforeach;?>
                </select>
                <p>위에서 선택한 학술대회의 발표 분야 정보를 가져와 현재 학술대회의 발표 정보를 맞춥니다.<b>학술대회 생성 후 수정할 수도 있습니다.</b></p>
                </td>
            </tr>
            <tr>
                <th>발표 방법 설정 <u>(이름:코드 형태<br>예시 포스터:P)</u></th>
                <td>

                <select class="ipw" size="2" name="abs_code1" id="abs_code1" onchange="changeSel(1, this.value)">
                <?foreach($abs_code[1] as $abs1):?>
                <option value="<?=$abs1?>"><?=$abs1?></option>
                <?endforeach;?>
                </select>
                <div class="write">
                    <input type="text" class="ipw" name="abs_code_name1" value='' id="abs_code_name1"> 
                    <a class="btn btn1" href="javascript:addAbs(1)">추가</a>
                    <a class="btn btn1" href="javascript:modAbs(1)">수정</a>
                    <a class="btn btn2" href="javascript:delAbs(1)">삭제</a>
                </div>
              </td>
            </tr>
            <tr>
                <th>발표 장비 설정</th>
                <td>
                <select class="ipw" size="2" name="abs_code2" id="abs_code2" onchange="changeSel(2, this.value)">
                <?foreach($abs_code[2] as $abs1):?>
                <option value="<?=$abs1?>"><?=$abs1?></option>
                <?endforeach;?>
                <div class="write">
                    <input type="text" class="ipw" name="abs_code_name2" value='' id="abs_code_name2"> 
                    <a class="btn btn1" href="javascript:addAbs(2)">추가</a>
                    <a class="btn btn1" href="javascript:modAbs(2)">수정</a>
                    <a class="btn btn2" href="javascript:delAbs(2)">삭제</a>
                </div>
              </td>
            </tr>
        </tbody>
        </table>
    </div>
    
    <div class="btn_wrap"> 
      <a class="btn btn1 rr" href="javascript:form_submit()">확인</a>
    </div>

    </form>

</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    function addAbs(argc) {
        var text = $('#abs_code_name'+argc).val();
        if(text) {
            $('#abs_code'+argc).append("<option value='"+text+"'>"+text+"</option>");
        } else {
            alert('설정명을 입력해주세요!');
        }
        $('#abs_code_name'+argc).val('');
    }

    function modAbs(argc) {

        var selectedIndex = $('#abs_code'+argc+' option').index($('#abs_code'+argc+' option:selected'));
        var codename = $('#abs_code_name'+argc).val();
        var tempCodeName = $('#abs_code'+argc+' option:selected');

        if (selectedIndex < 0) {
            alert("수정할 내용을 선택해주세요.");
            return;
        }
        
        if (codename == "") {

            alert("설정명을 입력해주세요.");
            $('#abs_code_name'+argc).focus();
            return;
        }
        tempCodeName.val(codename);
        tempCodeName.text(codename);
        $('#abs_code_name'+argc).val('');
    }
    function delAbs(argc) {

        var selectedIndex = $('#abs_code'+argc+' option').index($('#abs_code'+argc+' option:selected'));

        if (selectedIndex < 0) {
            alert("삭제할 내용을 선택해주세요.");
            return;
        }

        $('#abs_code'+argc+' option:eq('+selectedIndex+')').remove();
        $('#abs_code_name'+argc).val('');
    }
    function sel(val) {
        var ajax_data = {
          "no": val
        };

        $.ajax({
            url: "/ajax/symposium/getAbsData",
            type: 'GET',
            data: ajax_data,
            success: function (data) {
                var parse_str = JSON.parse(data);

                for(var j = 1; j<=6; j++) {
                    if(parse_str[j].length>0) {
                        $('#abs_code'+j+' option').remove();

                        for(var i = 0; i < parse_str[j].length; i++) {
                            $('#abs_code'+j).append("<option value='"+parse_str[j][i]+"'>"+parse_str[j][i]+"</option>");
                        }
                    }
                }
                return false;
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("정보를 받아오는 도중 에러가 발생하였습니다. 다시 시도해 주세요. \n" + textStatus + " : " + errorThrown);
                self.close();
            }
        });
    }

    function changeSel(gubun, val) {
        $('#abs_code_name'+gubun).val(val);
    }
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

        var abs_code = '';

        for(var j = 1; j<=6; j++) {
            var size = $("#abs_code"+j+" option").size();
            abs_code = '';
            for(var i=0;i<size;i++) {
                abs_code += $("#abs_code"+j+" option:eq("+i+")").val()+"|";
            }
            $('#abs_code_hidden'+j).val(abs_code);
        }

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
