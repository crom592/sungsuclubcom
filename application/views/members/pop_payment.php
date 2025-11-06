<? include_once $_SERVER['DOCUMENT_ROOT']."/include/include.header.php"; ?>
<body>

<div class="mem_pop pay_pop">
	<h2>한국의료학회 납부 시스템</h2>
    <div class="mp_con">
        <div class="mc_find"> 결제내역 선택 후 확인버튼을 누르면 결제를 하실 수 있습니다. <u>연회비는 회계년도를 기준으로 합니다. (회계년도는 1월~12월)</u></div>
        <div class="mc_in"> 
        	<select name="" class="ipw" >
                <option>결제내역을 선택하세요.</option>
                <option>게재료</option>
                <option>평의원 연회비</option>
                <option>정회원(교수) 연회비</option>
                <option>단체회원 연회비</option>
                <option>평생회원 회비</option>
                <option>정회원(일반) 연회비</option>
                <option>정회원(박사) 연회비</option>
                <option>정회원(석사) 연회비</option>
                <option>학회지 판매</option>
                <option>논문 투고료</option>
                <option>급행논문 투고료</option>
                <option>기타</option>
                <option>산학연포럼</option>
                <option>분과 워크샵(대학원생)</option>
                <option>분과 워크샵(교수, 일반)</option>
                <option>가입비 </option>
        	</select>
            
            <!--결제내역에서 게재료를 선택시 나옴-->
            <div class="inpage">
                <p>페이지 수와 급행 여부를 선택해주세요. <br />선택을 수정하시려면 결제내역 부터 다시 선택해야합니다.</p>
                <select class="ipw">
                    <option>페이지 수 선택</option>
                </select>
                <select class="ipw">
                    <option>급행여부 선택</option>
                    <option>선택안함 : 0</option>
                    <option>급행 : 200,000</option>
                </select>
            </div>
            <!--//결제내역에서 게재료를 선택시 나옴-->
            
            <input type="text" class="ipw" placeholder="30,000" > 
            <a id="" class="btn btn2">확인</a> 
        </div>
        <div class="mc_btn"> <a href="javascript:window.close()" class="btn btn1">닫기</a> </div>
    </div>
</div>

</body>
</html>
