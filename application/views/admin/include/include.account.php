<h2 class="tit1">기본정보 관리 [결제항목]</h2>    
<dl class="acin_caution">
    <dt class="tit2">주의사항</dt>
    <ul class="list1">
        <li>청구 항목을 추가하거나 금액을 수정하는 경우 기존의 데이터는 그대로 보존되고 앞으로의 청구에 영향을 미치게 됩니다.</li>
        <li>이미 한번 이상 쓰인 청구 항목에 대해서는 삭제가 불가능합니다.</li>
    </ul>
</dl>
    
<ul class="sub_tab">
    <li class="<?=$SubNum == '0' ? 'on' : '' ?>"><a href="javascript:chkPayItems(0)">연회비</a></li>
    <li class="<?=$SubNum == '1' ? 'on' : '' ?>"><a href="javascript:chkPayItems(1)">게재료</a></li>
    <li class="<?=$SubNum == '2' ? 'on' : '' ?>"><a href="javascript:chkPayItems(2)">학회지판매비</a></li>
    <li class="<?=$SubNum == '3' ? 'on' : '' ?>"><a href="javascript:chkPayItems(3)">학술대회비</a></li>
    <li class="<?=$SubNum == '7' ? 'on' : '' ?>"><a href="javascript:chkPayItems(7)">논문투고료</a></li>
    <li class="<?=$SubNum == '10' ? 'on' : '' ?>"><a href="javascript:chkPayItems(10)">가입비</a></li>
    <li class="<?=$SubNum == '11' ? 'on' : '' ?>"><a href="javascript:chkPayItems(11)">기타회비</a></li>
    <li class="<?=$SubNum == '14' ? 'on' : '' ?>"><a href="javascript:chkPayItems(14)">워크샵비용</a></li>
    <li class="<?=$SubNum == '15' ? 'on' : '' ?>"><a href="javascript:chkPayItems(15)">포스터비용</a></li>
    <li class="<?=$SubNum == '16' ? 'on' : '' ?>"><a href="javascript:chkPayItems(16)">비회원결제</a></li>
</ul> 

<ul class="list_top">
    <li><a href="info_write" class="btn btn2">항목 추가</a></li>
</ul>