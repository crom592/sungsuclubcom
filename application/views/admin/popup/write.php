<? include_once $_SERVER['DOCUMENT_ROOT']."/admin/include/include.header.php"; ?>
<body class="ad_in">

<div class="board_write_wrap">

	<!--Write-->
    <div class="input_tit">팝업 설정</div>
	<table class="board_write">    
    <tbody>
        <tr>
            <th>모드</th>
            <td>
            <ul class="radio">
            	<li><input type="radio" checked=""> PC</li>
                <li><input type="radio" > Mobile</li>
            </ul>
            <span class="tt tt_r">모바일의 경우 팝업의 위치 및 사이즈는 고정입니다.</span>
            </td>
        </tr>
        <tr>
            <th>팝업창 위치</th>
            <td>
            <ul class="radio">
                <li>좌로 부터 <input type="text" class="ipw ipw3" placeholder="좌측" > 픽셀</li>
                <li>위로 부터 <input type="text" class="ipw ipw3" placeholder="상단" > 픽셀</li>
             </ul>   
             </td>
        </tr>
        <tr>
            <th>팝업창 사이즈</th>
            <td>
            <ul class="radio">
                <li><input type="text" class="ipw ipw3" placeholder="가로" > 픽셀</li>
                <li><input type="text" class="ipw ipw3" placeholder="세로" > 픽셀</li>
             </ul>   
             </td>
        </tr>       
        <tr>
            <th>팝업기간</th>
            <td><!--달력 소스-->
            <ul class="select_date">
            	<li><i class="i-calendar-check" title="날짜선택"></i><input type="text" class="ipw ipw1" > ~ </li>
                <li><i class="i-calendar-check" title="날짜선택"></i><input type="text" class="ipw ipw1" ></li>
            </ul>
            </td>
        </tr>      
        <tr>
            <th>진행여부</th>
            <td>
            <ul class="radio">
            	<li><input type="radio" checked=""> 진행</li>
                <li><input type="radio" > 중지</li>
            </ul>
            </td>
        </tr> 
          <tr>
            <th>팝업창 타이틀</th>
            <td><input type="text" class="ipw ipw2" title="제목"></td>
        </tr> 
        <tr>
            <th>내용</th>
            <td><textarea class="ipw ipw_tt"></textarea></td>
        </tr>
    </tbody>
    </table>
    <!--//Write-->  
    
    <div class="btn_wrap"> 
        <a href="list.php" class="btn btn1 cc">확인</a>
        <a href="list.php" class="btn btn1 cc">목록보기</a>
    </div>

</div>


</body>
</html>
