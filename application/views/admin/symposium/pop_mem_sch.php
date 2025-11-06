<? include_once $_SERVER['DOCUMENT_ROOT']."/admin/include/include.header.php"; ?>
<body>

<div class="mem_pop mem_sch_pop">
	<h2>회원검색</h2>
    <div class="mp_con">
        <div class="mc_find">이름이나 아이디를 입력하세요.</div>
        <div class="mc_in"> 
            <input type="text" class="ipw" > 
            <a id="" class="btn btn1">검색하기</a> 
        </div>
        <!--검색어 입력후 나오는 검색 결과-->
        <div class="con">
        <p>선택할 아이디를 클릭하세요.</p>
        <table class="td1">
          <thead>
              <tr>
                <td>아이디</td>
                <td>이름</td>
                <td>소속</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>testid</td>
                <td>홍길순</td>
                <td>서울대학교</td>
              </tr>
              <tr>
                <td>testid</td>
                <td>홍길순</td>
                <td>서울대학교</td>
              </tr>
              </tbody>
            </table>
        </div>
        <!--//검색어 입력후 나오는 검색 결과-->
        
        <div class="mc_btn"> <a href="javascript:window.close()" class="btn btn1">닫기</a> </div>
    </div>
</div>

</body>
</html>
