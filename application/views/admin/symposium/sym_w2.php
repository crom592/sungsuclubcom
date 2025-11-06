<? 
$SubNum="2";

?>
<body class="ad_in">

<div class="board_write_wrap sym_w">
	<!--임의로 페이지 나눔-->
  	<? include_once APPPATH."views/admin/include/include.sym_w.php"; ?>  
    <!--Write-->
    <div class="input_tit"><?=$sym['title']?></div>
	<table class="board_write sym_abs">    
    <tbody>
        <tr>
            <th>발표 방법 설정 <u>(이름:코드 형태<br>예시 포스터:P)</u></th>
            <td>
            <select class="ipw" size="2" name="abs_code1" id="abs_code1" onchange="changeSel(1, this.value)">
            <?foreach($abs_code[1] as $abs1):?>
            <option value="<?=$abs1?>"><?=substr($abs1,strpos($abs1,'::')+2);?></option>
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
            <option value="<?=$abs1?>"><?=substr($abs1,strpos($abs1,'::')+2);?></option>
            <?endforeach;?>
            </select>
            <div class="write">
                <input type="text" class="ipw" name="abs_code_name2" value='' id="abs_code_name2"> 
                <a class="btn btn1" href="javascript:addAbs(2)">추가</a>
                <a class="btn btn1" href="javascript:modAbs(2)">수정</a>
                <a class="btn btn2" href="javascript:delAbs(2)">삭제</a>
            </div>

          </td>
        </tr>
 
        <tr>
            <th>연구 기술 설정</th>
            <td>
            <select class="ipw" size="2" name="abs_code3" id="abs_code3" onchange="changeSel(3, this.value)">
            <?foreach($abs_code[3] as $abs1):?>
            <option value="<?=$abs1?>"><?=substr($abs1,strpos($abs1,'::')+2);?></option>
            <?endforeach;?>
            </select>
            <div class="write">
                <input type="text" class="ipw" name="abs_code_name3" value='' id="abs_code_name3"> 
                <a class="btn btn1" href="javascript:addAbs(3)">추가</a>
                <a class="btn btn1" href="javascript:modAbs(3)">수정</a>
                <a class="btn btn2" href="javascript:delAbs(3)">삭제</a>
            </div>
          </td>
        </tr>
        <tr>
            <th>연구 물질 설정</th>
            <td>
            <select class="ipw" size="2" name="abs_code4" id="abs_code4" onchange="changeSel(4, this.value)">
            <?foreach($abs_code[4] as $abs1):?>
            <option value="<?=$abs1?>"><?=substr($abs1,strpos($abs1,'::')+2);?></option>
            <?endforeach;?>
            </select>
            <div class="write">
                <input type="text" class="ipw" name="abs_code_name4" value='' id="abs_code_name4"> 
                <a class="btn btn1" href="javascript:addAbs(4)">추가</a>
                <a class="btn btn1" href="javascript:modAbs(4)">수정</a>
                <a class="btn btn2" href="javascript:delAbs(4)">삭제</a>
            </div>
          </td>
        </tr>
        <tr>
            <th>분과 심포지움</th>
            <td>
            <select class="ipw" size="2" name="abs_code5" id="abs_code5" onchange="changeSel(5, this.value)">
            <?foreach($abs_code[5] as $abs1):?>
            <option value="<?=$abs1?>"><?=substr($abs1,strpos($abs1,'::')+2);?></option>
            <?endforeach;?>
            </select>
            <div class="write">
                <input type="text" class="ipw" name="abs_code_name5" value='' id="abs_code_name5"> 
                <a class="btn btn1" href="javascript:addAbs(5)">추가</a>
                <a class="btn btn1" href="javascript:modAbs(5)">수정</a>
                <a class="btn btn2" href="javascript:delAbs(5)">삭제</a>
            </div>
          </td>
        </tr>
        <tr>
            <th>분과 포스터</th>
            <td>
            <select class="ipw" size="2" name="abs_code6" id="abs_code6" onchange="changeSel(6, this.value)">
            <?foreach($abs_code[6] as $abs1):?>
            <option value="<?=$abs1?>"><?=substr($abs1,strpos($abs1,'::')+2);?></option>
            <?endforeach;?>
            </select>
            <div class="write">
                <input type="text" class="ipw" name="abs_code_name6" value='' id="abs_code_name6"> 
                <a class="btn btn1" href="javascript:addAbs(6)">추가</a>
                <a class="btn btn1" href="javascript:modAbs(6)">수정</a>
                <a class="btn btn2" href="javascript:delAbs(6)">삭제</a>
            </div>
          </td>
        </tr>
        <!-- <tr>
            <th>접수 분야 설정</th>
            <td>
            <ul class="write2">
           	  <li><input type="text" class="ipw cate" value="접수분야"> <input type="text" class="ipw code" value="값"> <a class="btn btn1">수정</a> <a class="btn btn2">삭제</a></li>     
              <li><input type="text" class="ipw cate"> <input type="text" class="ipw code"> <a class="btn btn1">추가</a></li>             
            </ul>
          </td>
        </tr> -->
    </tbody>
    </table>
    <!--//Write-->  

</div>
<script>
    function goAjax(argc, val,gubun,no) {
        var idx;

        var ajax_data = {
          "no": no,
          "abs_code":argc,
          "abs_code_name":val,
          "gubun":gubun
        };
 
        $.ajax({
            url: "/ajax/symposium/setAbsData",
            type: 'POST',
            data: ajax_data,
            success: function (data) {
                idx = data;

                if(gubun=='add') {
                    if(idx) {
                        $('#abs_code'+argc).append("<option value='"+idx+'::'+val+"'>"+val+"</option>");
                        console.log(idx)
                    } else {
                        alert('추가중 오류가 발생했습니다.');
                    }
                }
               
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("정보를 받아오는 도중 에러가 발생하였습니다. 다시 시도해 주세요. \n" + textStatus + " : " + errorThrown);
                self.close();
            }
        });

        return idx;
    }
    function changeSel(gubun, val) {
        var text_arr = val.split('::');
        
        $('#abs_code_name'+gubun).val(text_arr[1]);
    }
    function addAbs(argc) {
        var text = $('#abs_code_name'+argc).val();
        var idx = goAjax(argc, text,'add',<?=$_GET['no']?>);
  
        if(text) {
            
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
        var tempVal = tempCodeName.val().split("::");
        var code = tempVal[0]+':'+codename;
        tempCodeName.val(code);
        tempCodeName.text(codename);
        goAjax(argc,codename,'up', tempVal[0]);
        $('#abs_code_name'+argc).val('');
    }
    function delAbs(argc) {

        var selectedIndex = $('#abs_code'+argc+' option').index($('#abs_code'+argc+' option:selected'));

        if (selectedIndex < 0) {
            alert("삭제할 내용을 선택해주세요.");
            return;
        }
        var tempVal = $('#abs_code'+argc+' option:eq('+selectedIndex+')').val().split(':');

        goAjax(argc,$('#abs_code_name'+argc).val(), 'del', tempVal[0]);

        $('#abs_code'+argc+' option:eq('+selectedIndex+')').remove();
        $('#abs_code_name'+argc).val('');

    }

    function form_submit() {
        var abs_code = '';

        for(var j = 1; j<=6; j++) {
            var size = $("#abs_code"+j+" option").size();
            abs_code = '';
            for(var i=0;i<size;i++) {
                abs_code += $("#abs_code"+j+" option:eq("+i+")").val()+"|";
            }
            $('#abs_code_hidden'+j).val(abs_code);
        }
    }
</script>
</body>
</html>
