<? include_once $_SERVER['DOCUMENT_ROOT']."/admin/include/include.header.php"; ?>
<body class="ad_in">

<div class="board_list_wrap sym_reg_list">
    <h2 class="tit1">초록 등록현황 <u>각 학술대회별 초록에 대해 볼 수 있습니다.</u></h2>    
  	<h3 class="tit2"><?=$sym_title?$sym_title:$_GET['sym_title']?></h3>  
    
	<!--Search-->
    <ul class="sub_tab">
    	<li class="on"><a>제출된 초록 목록</a></li>
        <li><a>삭제된 초록 목록</a></li>
    </ul>
  <div class="mem_search">
    <table class="td2">
      <tr>
        <th>필드선택</th>
        <td class="field2">
            <ul>
                <li><p>접수(발표)번호</p><input type="text" class="ipw"></li>
                <li><p>접수자</p><input type="text" class="ipw"></li>
                <li><p>저자(이름)</p><input type="text" class="ipw"></li>
                <li><p>저자(성)</p><input type="text" class="ipw"></li>
                <li class="subject"><p>제목</p><input type="text" class="ipw"></li>
            </ul>
        </td>
      </tr>
      
        <tr>
          <th>발표방법 및 분야</th>
          <td>
              <ul class="radio">
                <li><input type="checkbox"> 포스터</li>
                <li><input type="checkbox"> 구두</li>
              </ul>
              연구분야
              <select class="ipw">
                <option selected="selected">전체</option>
                <option>패션마케팅</option>
                <option>의류소재시스템</option>
                <option>의류설계생산</option>
                <option>패션디자인</option>
                <option>한국ㆍ아시아복식</option>
            </select>
          </td>
        </tr>
        <tr>
          <th>날짜</th>
          <td>
            <select class="ipw">
                <option selected="selected">신청일</option>
                <option>납부일</option>
            </select>
            <ul class="select_date">
                <li><i class="i-calendar-check" title="날짜선택"></i><input type="text" class="ipw ipw1" > ~ </li>
                <li><i class="i-calendar-check" title="날짜선택"></i><input type="text" class="ipw ipw1" ></li>
            </ul>
        </td>
        </tr>
        <tr>
          <th>검색</th>
          <td>파일제출여부
          <select class="ipw ipw1">
                <option selected="selected">전체</option>
                <option>제출안함</option>
                <option>제출</option>
            </select>
          </td>
        </tr>
        <tr>
          <th>목록모양</th>
          <td>목록개수
            <input type="text" class="ipw ipw3" ></td>
        </tr>
    </table>
	<ul class="btn">
    	<li><a class="btn1">검색</a></li>
        <li><a class="btn1">초기화</a></li>
    </ul>
    </div>
    <!--//Search-->    
        
    <!--List-->
    <ul class="list_top">
        <li><a href="javascript:location.reload()" class="btn btn2">새로고침</a> <a class="btn btn2">엑셀로 다운받기</a></li>
        <li class="total">검색한 항목/전체 항목 :( <b>97</b> / 97 )</li>
    </ul>
	<table class="board_list td_c">
    <thead>
      <tr>
        <th><input type="checkbox"></th>
        <th>제출번호 <br>
        (코드)</th>
        <th>발표세션</th>
        <th>제목</th>
        <th>접수자</th>
        <th>발표번호<br>
        (발표시간)</th>
        <th>제출일</th>
        <th>초록파일</th>
        <th>상세보기</th>
      </tr>
    </thead>
    <tbody>
      <?

      foreach($list as $value):?>
    	<tr>
        <td class="bl_check"><input type="checkbox" ></td>
        <td class="bl_num">0106<br>
          (O)</td>
        <td>1119</td>
        <td class="bl_subject">이엄(耳掩)에 대한 연구</td>
        <td>홍길동</td>
        <td>0</td>
        <td class="bl_date">2021-10-12</td>
        <td>1</td>
        <td><a class="btn btn1" href="javascript:openPop('pop_abs?no=<?=$value['no']?>','1000','700','yes')">초록정보 상세</a></td>
      </tr>
      <?endforeach;?>
    </tbody>
    </table>
<!--//List-->
    
    <ul class="pagenation">
        <?php  if (count($list) > 0) {

         ?>
            <?php echo pagingView('/adm/symposium/abs_reg_list', $sPage, $_GET['page'], $ePage, $pageNum, $param)?>
        <?php } ?>

    </ul>  
    
    <div class="abs_bt_td">
    <table class="td1 td_c">
    <thead>
      <tr>
        <th>발표세션</th>
        <td>Oral</td>
        <td>Poster</td>
        <td>총계</td>
      </tr>
    </thead>
      <tr>
        <th>패션마케팅</th>
        <td>1</td>
        <td>29</td>
        <td>30</td>
      </tr>
      
      </tfoot>
    </table>
  </div>

</div>

</body>
</html>
