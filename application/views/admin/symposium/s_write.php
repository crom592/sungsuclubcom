<? include_once $_SERVER['DOCUMENT_ROOT']."/admin/include/include.header.php"; ?>
<body class="ad_in">
<!--쓰기와 수정은 같은 페이지를 사용합니다.-->
<div class="board_write_wrap">

	<!--Write-->
    <div class="input_tit">게시물 작성</div>
	<table class="board_write">    
    <tbody>
        <tr>
            <th>공지여부</th>
            <td>
            <ul class="radio">
            	<li><input type="radio" > 공지글</li>
                <li><input type="radio" checked=""> 일반글</li>
            </ul>
            </td>
        </tr>
        <tr>
            <th>작성자</th>
            <td><input type="text" class="ipw ipw1" title="이름"></td>
        </tr>
        <tr>
            <th>비밀번호</th>
            <td><input type="password" class="ipw ipw1" title="비밀번호"></td>
        </tr>
        <tr>
            <th>조회수</th>
            <td><input type="text" class="ipw ipw1" title="조회수" value="0"> <span class="tt">반드시 숫자로만 입력</span></td>
        </tr>
        <tr>
            <th>등록일</th>
            <td><input type="text" class="ipw ipw1" title="등록일" value="2021-11-24 11:22:33"> <span class="tt">예) 2020-12-20 12:00:00</span></td>
        </tr>
        <tr>
            <th>출력순서</th>
            <td><input type="text" class="ipw ipw1" title="출력순서" value="0" > <span class="tt">숫자로만 입력해 주세요. 미 입력시 고유 인덱스로 자동등록됩니다. 예) 550</span></td>
        </tr>
        <tr>
            <th>외부링크</th>
            <td><input type="text" class="ipw ipw2" title="외부링크" > <span class="tt">http:// 포함 입력해야 하며 입력시 유저사이트에서 본문이 아닌 링크사이트가 열립니다.</span></td>
        </tr>
        <tr>
            <th>제목</th>
            <td><input type="text" class="ipw ipw2" title="제목"></td>
        </tr>
        <tr>
            <th>내용</th>
            <td><textarea class="ipw ipw_tt"></textarea></td>
        </tr>
        <tr>
            <th>첨부파일</th>
            <td>
              <ul class="bw_file">
              	<!--<li class="before"><a href="">기존파일.hwp</a> <span class="del btn btn1">기존파일 삭제</span></li> 수정페이지에서 기존 첨부파일이 있을경우-->
                <li><input type="file" class="ipw" /><span class="file_btn"><i class="i-plus"></i></span> <span class="file_btn"><i class="i-minus"></i></span></li>
            </ul> 
            </td>
        </tr>
    </tbody>
    </table>
    <!--//Write-->    
    
    
    <div class="btn_wrap"> 
        <a href="s_notice.php" class="btn btn1 cc">확인</a>
        <a href="s_notice.php" class="btn btn1 cc">목록보기</a>
    </div>

</div>


</body>
</html>
