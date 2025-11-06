<? include_once $_SERVER['DOCUMENT_ROOT']."/admin/include/include.header.php"; ?>
<body class="ad_in">

<h2 class="tit1">기존회원 심사위원등록 <u>심사위원을 검색할 수 있습니다.</u></h2>
<div class="board_list_wrap members_w">
	
    
	<!--Search-->
    <div class="judge_search">
	<h3 class="tit2">회원 검색</h3>
    <table class="td2">
      <tr>
        <th>필드선택</th>
        <td class="field">
        <select class="ipw">
            <option value="membernumber">회원번호</option>
            <option selected="selected" value="name_k">이름(한글)</option>
            <option value="name_e_first">First Name</option>
            <option value="sex">성별</option>
            <option value="institution">소속</option>
            <option value="department">부서</option>
            <option value="title">직위</option>
            <option value="email">이메일</option>
            <option value="userDefine1_1">주요연구분야</option>
            <option value="ozip">직장우편번호</option>
            <option value="oaddress1">직장주소1</option>
            <option value="hzip">자택우편번호</option>
            <option value="haddress1">자택주소1</option>
            <option value="pzip">배달처우편번호</option>
            <option value="paddress1">배달처주소1</option>
        </select>    
        <input type="text" class="ipw"> 
        
        <select class="ipw">
            <option value="membernumber">회원번호</option>
            <option value="name_k">이름(한글)</option>
            <option value="name_e_first">First Name</option>
            <option value="sex">성별</option>
            <option selected="selected" value="institution">소속</option>
            <option value="department">부서</option>
            <option value="title">직위</option>
            <option value="email">이메일</option>
            <option value="userDefine1_1">주요연구분야</option>
            <option value="ozip">직장우편번호</option>
            <option value="oaddress1">직장주소1</option>
            <option value="hzip">자택우편번호</option>
            <option value="haddress1">자택주소1</option>
            <option value="pzip">배달처우편번호</option>
            <option value="paddress1">배달처주소1</option>
        </select>
        <input type="text" class="ipw"> 
        </td>
      </tr>
      <tr>
        <th>연구분야</th>
        <td><ul class="radio">
        	<li><input type="checkbox"> 패션디자인</li>
            <li><input type="checkbox">패션마케팅</li>
            <li><input type="checkbox">의류소재시스템</li>
            <li><input type="checkbox">의류설계생산</li>
            <li><input type="checkbox">한국아시아의복</li>
            <li><input type="checkbox">기타</li>
        </ul></td>
      </tr>
      <tr>
        <th>목록모양</th>
        <td>목록개수 <input type="text" class="ipw ipw3"> 개</td>
      </tr>
    </table>
    <ul class="btn">
    	<li><a class="btn1">검색</a></li>
        <li><a class="btn1">초기화</a></li>
    </ul>
    </div>
    <!--//Search-->

	<!--List-->
	<h3 class="tit2">회원 검색결과</h3>
    <ul class="list_top">
        <li><a class="btn btn2">엑셀다운로드</a></li>
        <li class="total">검색한 회원 수 : <b>4980</b>명 ( 1 / 498page )</li>
    </ul>
	<table class="board_list td_c">
    <thead>
      <tr>
        <th><input type="checkbox"></th>
        <th>아이디</th>
        <th>이름</th>
        <th>소속</th>
        <th>직위</th>
		<th>연구분야</th>
        <th>연락처</th>
        <th>수정날짜</th>
        <th>심사위원등록</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td class="bl_check"><input type="checkbox" ></td>
          <td class="bl_num">12345</td>
          <td class="bl_name"><a href="javascript:openPop('pop_modify.php','1000','700','yes')" >백구성</a></td>
          <td class="bl_name">한국의류학회</td>
          <td class="bl_name">교수</td>
          <td class="bl_name">기타</td>
          <td class="bl_name"></td>
          <td class="bl_date">2022-01-11</td>
          <td><a href="" class="btn btn1">등록</a></td>
        </tr>
		<tr>
          <td class="bl_check"><input type="checkbox" ></td>
          <td class="bl_num">system</td>
          <td class="bl_name"><a href="javascript:openPop('pop_modify.php','1000','700','yes')" >시스템</a></td>
          <td class="bl_name">한국의류학회</td>
          <td class="bl_name">교수</td>
          <td class="bl_name">기타</td>
          <td class="bl_name"></td>
          <td class="bl_date">2022-01-11</td>
          <td><a href="" class="btn btn1">등록</a></td>
        </tr>
		<tr>
          <td class="bl_check"><input type="checkbox" ></td>
          <td class="bl_num">eungyo2000</td>
          <td class="bl_name"><a href="javascript:openPop('pop_modify.php','1000','700','yes')" >정은교</a></td>
          <td class="bl_name">전남대학교</td>
          <td class="bl_name">교수</td>
          <td class="bl_name">기타</td>
          <td class="bl_name"></td>
          <td class="bl_date">2022-01-11</td>
          <td>심사위원</td>
        </tr>
		<tr>
          <td class="bl_check"><input type="checkbox" ></td>
          <td class="bl_num">jsh818</td>
          <td class="bl_name"><a href="javascript:openPop('pop_modify.php','1000','700','yes')" >조석호</a></td>
          <td class="bl_name">전남대학교</td>
          <td class="bl_name">교수</td>
          <td class="bl_name">기타</td>
          <td class="bl_name"></td>
          <td class="bl_date">2022-01-11</td>
          <td><a href="" class="btn btn1">등록</a></td>
        </tr>
		<tr>
          <td class="bl_check"><input type="checkbox" ></td>
          <td class="bl_num">test2</td>
          <td class="bl_name"><a href="javascript:openPop('pop_modify.php','1000','700','yes')"> 테스트2</a></td>
          <td class="bl_name">한국의류학회</td>
          <td class="bl_name">교수</td>
          <td class="bl_name">기타</td>
          <td class="bl_name"></td>
          <td class="bl_date">2022-01-11</td>
          <td>심사위원</td>
        </tr>
       
    </tbody>
    </table>
	<!--//List-->
    
    <ul class="pagenation">
   		<li class="ar"><i class="i-ar1"></i></li>
        <li class="ar"><i class="i-ar2"></i></li>
        <li class="num on">1</li>
        <li class="ar"><i class="i-ar3"></i></li>
        <li class="ar"><i class="i-ar4"></i></li>
    </ul> 
</div>

</body>
</html>
