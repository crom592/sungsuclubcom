
<body class="popw abs_pop">
	<ul class="top">
    	<li class="name"><?=$sym['user_name']?> (<?=$sym['fk_user_no']?$user_type[$sym['user_type']]:'비회원';?>)</li>
        <li class="info"><i class="i-flag"></i> <?=$sym['company_name']?></li>
        <li class="email"><i class="i-mail"></i> <?=$sym['user_email']?></a></li>
        <a href="javascript:window.close()" class="close"><i class="i-close"></i></a>
    </ul>
    <div class="con">
    	<h2 class="tit tit1">
            <i class="i-user-plus"></i> <?=$sym_title?> 초록
            <div class="btn"><a class="btn2" href="javascript:delAbs(<?=$_GET['no']?>)">초록삭제</a></div>
        </h2>
        <ul class="sub_tab">
        	<li><a href="pop_abs?no=<?=$_GET['no']?>">초록정보 상세보기</a></li>
            <li class="on"><a href="pop_abs_modify?no=<?=$_GET['no']?>">초록정보 수정하기</a></li>
        </ul>
        <!--Contents-->
        <div class="join_wrap">
            
          <!--Join input-->
          <div class="pa2">
            <div class="input_tit">초록정보</div>
            <table class="td1 mb50">
              <tbody>
                <tr>
                  <th>발표방법</th>
                  <td>
                    <select class="ipw ipw1" name="division" id="division">
                        
                    </select>
                  </td>
                </tr>
                <tr>
                  <th>발표분야</th>
                  <td>
                    <select class="ipw ipw1">
                        <option>패션마케팅</option>
                        <option>의류소재시스템</option>
                        <option>의류설계생산</option>
                        <option>패션디자인</option>
                        <option selected="selected">한국ㆍ아시아복식</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <th>발표시간</th>
                  <td><input type="text" class="ipw ipw1"></td>
                </tr>
                <tr>
                  <th>발표번호</th>
                  <td><input type="text" class="ipw ipw3"> <input type="text" class="ipw ipw3" value="0"> <span class="tt">발표 번호중 뒷부분은 숫자 형태여야 합니다. 예) AB - 15</span></td>
                </tr>
                <tr>
                  <th>제목</th>
                  <td><input type="text" class="ipw ipw2"></td>
                </tr>
                <tr>
                  <th>발표자<a href="javascript:openPop('pop_mem_sch.php','500','400','yes')" class="btn btn1">저자 추가</a></th>
                  <td class="author">
                  
                  <table class="td_in">
                  <thead>
                      <tr>
                        <td>이름</td>
                        <td>소속</td>
                        <td>이메일</td>
                        <td>관리</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input type="text" class="ipw"></td>
                        <td><input type="text" class="ipw"></td>
                        <td><input type="text" class="ipw"></td>
                        <td><a class="btn btn1">삭제</a></td>
                      </tr>
                      <tr>
                        <td><input type="text" class="ipw"></td>
                        <td><input type="text" class="ipw"></td>
                        <td><input type="text" class="ipw"></td>
                        <td><a class="btn btn1">삭제</a></td>
                      </tr>
                      </tbody>
                    </table>
                  
                  </td>
                </tr>
                <tr>
                  <th>공동저자<a href="javascript:openPop('pop_mem_sch.php','500','400','yes')" class="btn btn1">저자 추가</a></th>
                  <td class="author"><table class="td_in">
                    <thead>
                      <tr>
                        <td>이름</td>
                        <td>소속</td>
                        <td>이메일</td>
                        <td>관리</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input type="text" class="ipw"></td>
                        <td><input type="text" class="ipw"></td>
                        <td><input type="text" class="ipw"></td>
                        <td><a class="btn btn1">삭제</a></td>
                      </tr>
                      <tr>
                        <td><input type="text" class="ipw"></td>
                        <td><input type="text" class="ipw"></td>
                        <td><input type="text" class="ipw"></td>
                        <td><a class="btn btn1">삭제</a></td>
                      </tr>
                    </tbody>
                  </table></td>
                </tr>
                <tr>
                    <th>첨부파일</th>
                    <td>
                    <ul class="bw_file">
                        <li class="before"><a href="">기존파일.hwp</a> <span class="del btn btn1">기존파일 삭제</span></li>
                        <li><input type="file" class="ipw" /><span class="file_btn"><i class="i-plus"></i></span> <span class="file_btn"><i class="i-minus"></i></span></li>
                    </ul>            
                    </td>
                </tr>           
              </tbody>
            </table>
          </div>
          <!--//Join input-->
          <!--Join input-->
          <div class="pa">
            <div class="input_tit">초록 접수자 정보</div>
            <table class="td1">
              <tbody>
                <tr>
                  <th>한글성명</th>
                  <td><input type="text" class="ipw ipw1"></td>
                </tr>
                <tr>
                  <th>소속</th>
                  <td><input type="text" class="ipw ipw1"></td>
                </tr>
                <tr>
                  <th>연락처</th>
                  <td><input type="text" class="ipw ipw1"></td>
                </tr>
                <tr>
                  <th>휴대폰번호</th>
                  <td><input type="text" class="ipw ipw1"></td>
                </tr>
                <tr>
                  <th>이메일주소</th>
                  <td class="email"><input type="text" class="ipw ipw1"> <span class="tt">이메일 주소는 초록수정시 사용됩니다.</span>
                  <p class="tt_r">모든 연락은 접수자에게 통보되므로 회원정보에서 반드시 현재 사용 중이신 휴대전화번호와 메일을 확인하여 주시기 바랍니다.</p>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!--//Join input-->
          
          <div class="btn_wrap"> 
              <a class="btn btn1 cc">수정완료</a>
          </div>
        </div>
        <!--Contents-->
    </div>
</body>
</html>
