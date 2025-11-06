<? 
$PageNum="members";
$SubNum="break";
$Title="회원탈퇴";
include_once $_SERVER['DOCUMENT_ROOT']."/include/include._header.php"; ?>

<div class="break_wrap join_wrap">
	<div class="members_tit"><i class="i-warning"></i>회원 <b>탈퇴</b><u>회원 탈퇴 후 기존 아이디는 사용이 불가능하며, 다른 아이디로 재가입 가능합니다.</u></div>
    
    <table class="td1">
      <tbody>
          <tr>
            <th>비밀번호</th>
            <td><input class="ipw ipw1" type="password" /> <span class="tt">회원 비밀번호를 입력하여 주세요.</span></td>
          </tr>
          <tr>
            <th>탈퇴사유</th>
            <td>
            <textarea class="ipw ipw_tt"></textarea>
            </td>
          </tr>              
      </tbody>
    </table>
    
    <div class="btn_wrap"> 
        <a class="btn btn1 cc">회원 탈퇴하기</a> 
    </div>     
</div>

<? include_once $_SERVER['DOCUMENT_ROOT']."/include/include._footer.php"; ?>
