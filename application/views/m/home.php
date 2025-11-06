<? 
$PageNum="main";
include_once APPPATH."views/m/include/include._header.php"; ?>
<?//include_once APPPATH."views/m/include/include.popup.php"; ?>
<div id="main_wrap">
    <div class="mc1">
        <div class="cons">
            <div class="mc1_">
                <h3 class="tit"><u><i class="i-tv"></i> 방송</u>국내 주야간 선물옵션</h3>
                <div class="pic"><span class="num"><i class="i-group"></i> <?=$live['2']?$live['2']:'방송전';?></span>

                <a href="javascript:windowOpen('schedule_run', '/live/schedule_run', '', '', '');void(0);"><img src="/images/main/1_01.jpg"></a>

            </div>
            </div>
            <div class="mc1_">
                <h3 class="tit"><u><i class="i-tv"></i> 방송</u>주간 위클리 옵션</h3>
                <div class="pic"><span class="num"><i class="i-group"></i> <?=$live['3']?$live['3']:'방송전';?></span>

                <a  href="javascript:windowOpen('schedule_run2', '/live/schedule_run2', '', '', '');void(0);"><img src="/images/main/1_02.jpg"></a>

            </div>
        </div> 
        <!--유튜브 배너-->
        <div class="cons mc1_2 m_bbs">
        	<dt class="tits">유튜브<!--a href="/utube/list" class="link"><i class="i-plus-min"></i></a--></dt>
            <a href="https://www.youtube.com/@성수클럽장성수소장" class="btn" target="_blank"><img src="/m/images/main/1_yt.png?111"></a>
        </div>  

    </div>
    
    <div class="mc2">
        <dl class="m_bbs">
            <dt>시황 및 매매분석<a href="/board/list?code=huntaek" class="link"><i class="i-plus-min"></i></a></dt>
            <ul class="list">
                <?foreach($huntaek as $n):
                    $date = date('YmdHis');
                    $regDate = date("YmdHis", strtotime($n['reg_date']." +1 day"));
                    $reg_date = date("m.d", strtotime($n['reg_date']));

                    $no = $n['no'];

                    
                ?>
                <li><a href="/board/view?no=<?=$no?>&code=huntaek"><span class="tit"><?=$n['title']?></span><span class="date"><?=$reg_date?></span></a></li>
               
                <?endforeach;?>
          
            </ul>
        </dl>
        <dl class="m_bbs">
            <dt>명일투자+변곡의 창<a href="/board/list?code=tomorrow" class="link"><i class="i-plus-min"></i></a></dt>
            <ul class="list">
                <?foreach($tomorrow as $n):
                            $date = date('YmdHis');
                    $regDate = date("YmdHis", strtotime($n['reg_date']." +1 day"));
                    $reg_date = date("m.d", strtotime($n['reg_date']));

                    $no = $n['no'];

                    
                ?>
                <li><a href="/board/view?no=<?=$no?>&code=tomorrow"><span class="tit"><?=$n['title']?></span><span class="date"><?=$reg_date?></span></a></li>
               
                <?endforeach;?>
            </ul>
        </dl>
        <div class="mc2_">
            <ul class="tab">
                <li id="tab1" class="<?=$_GET['code']=='corner'|| $_GET['code']==''?'on':'';?>" onclick="viewHomeTab(1)">진서리 코너</li>
                <li id="tab2" class="<?=$_GET['code']=='future'?'on':'';?>" onclick="viewHomeTab(2)">선물옵션분석표</li>
                <li id="tab3" class="<?=$_GET['code']=='trading'?'on':'';?>" onclick="viewHomeTab(3)">회원매매일지</li>
            </ul>
            <dl class="m_bbs" id="corner">
                <ul class="list">
                <?foreach($corner as $n):
                    $date = date('YmdHis');
                    $regDate = date("YmdHis", strtotime($n['reg_date']." +1 day"));
                    $reg_date = date("m.d", strtotime($n['reg_date']));

                    $no = $n['no'];

                    
                ?>
                <li><a href="/board/view?no=<?=$no?>&code=corner"><span class="tit"><?=$n['title']?></span><span class="date"><?=$reg_date?></span></a></li>
               
                <?endforeach;?>
                </ul>
                <a href="/board/list?code=corner" class="more">VIEW MORE</a>
            </dl>
            <dl class="m_bbs" id="future" style="display:none">
                <ul class="list">
                <?foreach($future as $n):
                    $date = date('YmdHis');
                    $regDate = date("YmdHis", strtotime($n['reg_date']." +1 day"));
                    $reg_date = date("m.d", strtotime($n['reg_date']));

                    $no = $n['no'];

                    
                ?>
                <li><a href="/board/view?no=<?=$no?>&code=future"><span class="tit"><?=$n['title']?></span><span class="date"><?=$reg_date?></span></a></li>
               
                <?endforeach;?>
                </ul>
                <a href="/board/list?code=future" class="more">VIEW MORE</a>
            </dl>
            <dl class="m_bbs" id="trading" style="display:none">
                <ul class="list">
                <?foreach($trading as $n):
                    $date = date('YmdHis');
                    $regDate = date("YmdHis", strtotime($n['reg_date']." +1 day"));
                    $reg_date = date("m.d", strtotime($n['reg_date']));

                    $no = $n['no'];

                    
                ?>
                <li><a href="/board/view?no=<?=$no?>&code=trading"><span class="tit"><?=$n['title']?></span><span class="date"><?=$reg_date?></span></a></li>
               
                <?endforeach;?>
                </ul>
                <a href="/board/list?code=trading" class="more">VIEW MORE</a>
            </dl>
        </div>
    </div>
    
    <ul class="mc3">
        <li><a href="/m/guide/guide01.php"><img src="images/main/3_01.png" /><p>교육프로그램</p></a></li>
        <li><a href="/board/list?code=review"><img src="images/main/3_02.png" /><p>교육생후기</p></a></li>
        <li><a href="/board/list?code=notice"><img src="images/main/3_03.png" /><p>공지사항</p></a></li>
        <li><a href="/board/list?code=qna"><img src="images/main/3_04.png" /><p>산행+강연회안내</p></a></li>
    </ul>
    
    <div class="mc4">
        <dl class="m_bbs">
            <dt>소통의 장<a href="/board/list?code=communication" class="link"><i class="i-plus-min"></i></a></dt>
            <ul class="pics">
            <?
            $i = 1;
            foreach($communication as $n):
                $date = date('YmdHis');
                $regDate = date("YmdHis", strtotime($n['reg_date']." +1 day"));
                $reg_date = date("Y.m.d", strtotime($n['reg_date']));

                $no = $n['no'];

                $user_name = $n['user_name'];
            ?>
            
                <li>
                    <a href="/board/view?no=<?=$no?>&code=communication">
                    <?if($n['file_path']):
                        $imgChk = filecheck($n['file_path']);
                        if($imgChk){

                    ?>
                        <div class="pic"><img src="<?=$n['file_path']?>"></div>
                        <? }else{?>
                        <div class="pic"><img src="images/board/pic1.png"></div>
                        <?}?>
                    <?else:?>
                    <div class="pic"><img src="images/board/pic1.png"></div>
                    <?endif;?>
                        <p class="tit"><?=$n['title']?></p>
                    </a>
                </li>
            
            <?
            if($i%2==0) echo "</ul><ul class='pics'>";
                $i++;
            endforeach;?>
        </ul>
        </dl>
    </div>
    
    <div class="mc5">
        <a href="/m/company/company01.php"><img src="/m/images/main/5_01.png" /><b>회사소개 바로가기</b></a>
    </div>
    
    <div class="mc6_banner">
    	<!--팝업-- 4_banner.png 배너 이미지를 클릭하면 main_popup_w 라는 레이어 팝업이 뜹니다
    	<div class="main_popup_w">
            <div class="main_popup box_sh">
            	<dl>
                    <dt><span>제목이 들어갑니다. 제목이 들어갑니다.제목이 들어갑니다.제목이 들어갑니다.</span></dt>
                    <dd><span>닫기 <i class="i-close"></i></span></dd>
                </dl> 
                <div class="main_popup_con">
                    모바일 팝업이 들어갑니다. 모바일 팝업의 경우 가로 크기는 300픽셀로 고정입니다. 관리자에서 위치값 및 크기값을 지정할 필요없습니다.
                </div>
            </div>
            
        </div>
        <!--//팝업-->
       <img src="/images/main/4_banner.png">
    </div>
    
    <div class="mc6">
    	<!--동영상--
        <dl class="m_bbs">
            <dt>동영상<a href="/vod/list?code=vod" class="link"><i class="i-plus-min"></i></a></dt>
            <ul class="pics">
            <?
            $i = 1;
            foreach($vod as $n):
                $date = date('YmdHis');
                $regDate = date("YmdHis", strtotime($n['reg_date']." +1 day"));
                $reg_date = date("Y.m.d", strtotime($n['reg_date']));

                $no = $n['no'];

                $user_name = $n['user_name'];
            ?>
            
                <li>
                    <a href="eliveh://personal3.turing.co.kr/RecordFile/Channel/<?=$n['goods_futz_filename']?>">
                    <?if($n['file_path']):
                        $imgChk = filecheck($n['file_path']);
                        if($imgChk){

                    ?>
                        <div class="pic"><img src="<?=$n['file_path']?>"></div>
                        <? }else{?>
                        <div class="pic"><img src="images/board/pic1.png"></div>
                        <?}?>
                    <?else:?>
                    <div class="pic"><img src="images/board/pic1.png"></div>
                    <?endif;?>
                        <p class="tit"><?=$n['title']?></p>
                    </a>
                </li>
            
            <?
            if($i%2==0) echo "</ul><ul class='pics'>";
                $i++;
            endforeach;?>
        </ul>
        </dl>
        <!--//동영상-->
        <dl class="m_bbs">
            <dt>뉴욕증시</dt>
            <ul class="gr">
                <li><img src="https://api.wsj.net/api/kaavio/charts/gqplus/fpDJIA-big.gqplus?rand=235450027"></li>
                <li><img src="https://api.wsj.net/api/kaavio/charts/gqplus/fpNASDAQ-big.gqplus?rand=235450027"></li>
            </ul>
        </dl>
    </div>
    
   
</div>

<script type="text/javascript">
    function viewHomeTab(argc) {
        if(argc==1) {
            $('#corner').show();
            $('#future').hide();
            $('#trading').hide();
            $("#tab1").removeClass("on");
            $("#tab2").removeClass("on");
            $("#tab3").removeClass("on");
            $("#tab1").addClass("on");

        } else if(argc==2) {
            $('#corner').hide();
            $('#future').show();
            $('#trading').hide();
            $("#tab1").removeClass("on");
            $("#tab2").removeClass("on");
            $("#tab3").removeClass("on");
            $("#tab2").addClass("on");
        } else if(argc==3) {
            $('#corner').hide();
            $('#future').hide();
            $('#trading').show();
            $("#tab1").removeClass("on");
            $("#tab2").removeClass("on");
            $("#tab3").removeClass("on");
            $("#tab3").addClass("on");

        }
    }
    viewHomeTab(1);

    function windowOpen(name, url, window_width, window_height, option) {
    var window_left = (screen.width - window_width)/2;      //�덈룄�곗쓽 �꾩튂
    var window_top = (screen.height - window_height-100)/2; //�덈룄�곗쓽 �꾩튂
    var windowFeatures = "width=" + window_width + ",height=" + window_height + ",top=" + window_top + ",left=" + window_left + "," + option;

    /*toolbar[=yes|no]|[=1|0]
    location[=yes|no]|[=1|0]
    directories[=yes|no]|[=1|0]
    status[=yes|no]|[=1|0]
    menubar[=yes|no]|[=1|0]
    scrollbars[=yes|no]|[=1|0]
    resizable[=yes|no]|[=1|0]
    width=pixels
    height=pixels
    toolbar=no,location=no,directories=no,status=no,
    menubar=no,scrollbars=yes,resizable=yes,*/

    var win =  window.open(url, name, windowFeatures);

    win.focus();

    return win;
}
</script>
