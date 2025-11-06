<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script type="text/javascript" src="//code.jquery.com/jquery.min.js"></script>


<script type="text/javascript">
var url="https://jss9200.bstorm.co.kr/"
function getList(){
    
    $.ajax({
        type: 'POST',
        url: url+"write_room_api",
        crossDomain: true,
        data: $("#crossForm").serialize(),
        dataType: 'text',
        contentType:'application/x-www-form-urlencoded',
        success: function(data) {

            var jdata=JSON.parse(data) //api요청 결괏값
        
            $("#result").append(JSON.stringify(jdata));
            if(jdata.result=="ok"){
            //적절한 데이터 처리 후 
            
                goRoom(jdata.r_id);
            }
        },
        error: function (responseData, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });

}

function goRoom(roomNo){
    $("#r_id").val(roomNo);
    var form=document.crossForm;
    form.action=url+"cross_login";
    form.submit();
}
</script>

</head>

<body>


        <form name="crossForm" id="crossForm" method="post">
            <input type="hidden" name="cross_id" value="ab2801"/>
            <input type="hidden" name="cross_name" value="장성수"/>
            <input type="hidden" name="cross_job" value="0"/><!-- 선생님:0,학생:1 -->
            <input type="hidden" name="cross_lang" value="kor"/><!-- 한글:kor, 영어:eng -->
            <input type="hidden" name="r_limit_cnt" value="10"/>
            <input type="hidden" name="r_id" id="r_id" value=""/>
            <button type="button" onClick="goRoom(3)">GO</button>
        </form>
<div id="result"></div>
</body>
</html>
