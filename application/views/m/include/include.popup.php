<div class="main_popup_w">
    <!--팝업1-->
    <div class="main_popup box_sh">
        <div class="main_popup_con">
        <img src="/images/common/popup.png" />
        </div>
        <dl>
            <dt><span>오늘 하루 보지 않기</span></dt>
            <dd><a href="javascript:popup_hidden()"><span>창 닫기 <i class="i-close"></i></span></a></dd>
        </dl> 
    </div>
    <!--//팝업1-->
    <!--팝업2--
    <div class="main_popup box_sh">
        <div class="main_popup_con">
        모바일 팝업이 들어갑니다. 모바일 팝업의 경우 가로 크기는 300픽셀로 고정입니다. 관리자에서 위치값 및 크기값을 지정할 필요없습니다.
        </div>
        <dl>
            <dt><span>오늘 하루 보지 않기</span></dt>
            <dd><span>창 닫기 <i class="i-close"></i></span></dd>
        </dl> 
    </div>
    <!--//팝업2-->
</div>
<script type="text/javascript">
    function popup_hidden() {
        $('.main_popup_w').hide();
    }
</script>