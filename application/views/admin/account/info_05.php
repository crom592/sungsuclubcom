<? 
$SubNum="5";
include_once $_SERVER['DOCUMENT_ROOT']."/admin/include/include.header.php"; ?>
<body class="ad_in">

<div class="acin_list">      
	<? include_once $_SERVER['DOCUMENT_ROOT']."/admin/include/include.account.php"; ?>        
	<table class="board_list td_c">
    <thead>
      <tr>
        <th>결제항목</th>
        <th>회원분류</th>
        <th>현재 결제금액</th>
        <th>수정할 결제금액</th>
        <th>수정</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td class="ach_tit"><input type="text" class="ipw" value="논문 투고료"></td>
          <td class="ach_type">평생회원</td>
          <td class="ach_h">100,000 원</td>
          <td class="ach_m"><input type="text" class="ipw" value="100000"></td>
          <td class="btn"><a class="btn btn1">수정</a></td>
        </tr>
        <tr>
          <td class="ach_tit"><input type="text" class="ipw" value="급행논문 투고료"></td>
          <td class="ach_type">평생회원</td>
          <td class="ach_h">200,000 원</td>
          <td class="ach_m"><input type="text" class="ipw" value="200000"></td>
          <td class="btn"><a class="btn btn1">수정</a></td>
        </tr>
        <tr>
          <td class="ach_tit"><input type="text" class="ipw"></td>
          <td class="ach_type"></td>
          <td class="ach_h"></td>
          <td class="ach_m"><input type="text" class="ipw"></td>
          <td class="btn"><a class="btn btn1">수정</a></td>
        </tr>
    </tbody>
    </table>
  
</div>

</body>
</html>
