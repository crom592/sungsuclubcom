<? include_once $_SERVER['DOCUMENT_ROOT']."/admin/include/include.header.php"; ?>
<body class="ad_in">
<!--초록대회와 코딩이 동일-->
<div class="board_view_wrap">
  <h2 class="tit1">초록 인쇄 <u>각 학술대회별 초록을 인쇄할 수 있습니다.</u></h2>    
        
    <div class="pa">
    	<h3 class="tit2">초록 인쇄</h3>
        <table class="td1">
          <tbody>
            <tr>
              <th>출력 형식</th>
              <td>
              <ul class="radio">
              	<li><input type="radio" > 초록인쇄</li>
                <li><input type="radio" > Author Index</li>
                <li><input type="radio" > Author Index (한글)</li>
                <li><input type="radio" > Keyword Index</li>
              </ul>              
              </td>
            </tr>
            <tr>
              <th>발표 방법</th>
              <td>
              <ul class="radio">
              	<li><input type="checkbox" > 포스터</li>
                <li><input type="checkbox" > 구두발표</li>
                <li><input type="checkbox" > 심포지움</li>
              </ul>              
              </td>
            </tr> 
            <tr>
              <th>Category</th>
              <td>
              <select class="ipw ipw1">
                <option>전체</option>
              </select>
              </td>
            </tr> 
            <tr>
              <th>심표지움 분과</th>
              <td>
              <select class="ipw ipw1">
                <option>전체</option>
                <option>패션마케팅</option>
                <option>의류소재시스템</option>
                <option>의류설계생산</option>
                <option>패션디자인</option>
                <option>한국ㆍ아시아복식</option>
              </select>
              </td>
            </tr> 
            <tr>
              <th>포스터 분과 </th>
              <td>
              <select class="ipw ipw1">
                <option>전체</option>
                <option>패션마케팅</option>
                <option>의류소재시스템</option>
                <option>의류설계생산</option>
                <option>패션디자인</option>
                <option>한국ㆍ아시아복식</option>
              </select>
              </td>
            </tr>   
          </tbody>
        </table>
      </div>     
      
      <div class="btn_wrap"> 
          <a class="btn btn1 cc">인쇄하기</a>
      </div>
    </div>

</div>

</body>
</html>
