<?// include_once $_SERVER['DOCUMENT_ROOT']."/include/include.popup.php"; ?><!--팝업-->
<body id="main_bg">
    <div id="wrap">
        <!--Topmenu-->
        <? include_once APPPATH."views/include/include.topmenu.php"; ?>
        <!--//Topmenu-->

        <!--Main Container-->
        <!--방송-->
        <div class="mc1">
            <div class="cons">
                <div class="mc1_">
                    <h3 class="tit"><u><i class="i-tv"></i> 방송</u>국내 주야간 선물옵션<!--<b><i class="i-profile"></i> 진행 : 장성수 소장</b>--></h3>
                    <div class="pic"><span class="num" onclick="windowOpen('schedule_run', '/live/schedule_run', 800, 600, '');"><i class="i-group"></i> <?=$live['2']?$live['2']:'방송전';?></span><a  href="javascript:windowOpen('schedule_run', '/live/schedule_run', 800, 600, '');void(0);"><img src="images/main/1_01.jpg"></a></div>
                    <ul class="profile">
                        <h4 class="tit">코스피 200선물옵션 방송 </h4><!--최대 6줄까지만-->
                        <li>장성수 소장, 정실장 채팅</li>
                        <li>옵션비문에 의한  장 시작 전 전일 시장과 야간시장분석 </li>
                        <li>당일 매매 전략 및 대응 안내</li>
                        <li>졸업생 재교육 및 신규 교육안내 정실장 010-5066-9200</li>
                        <li>3월 6월 9월 12월 첫째 주 일요일 무료교육 전주교육장 10시-16시</li>
                    </ul>
                </div>
                <div class="mc1_">
                    <h3 class="tit"><u><i class="i-tv"></i> 방송</u>주간 위클리 옵션</h3>
                    <div class="pic"><span class="num" onclick="windowOpen('schedule_run2', '/live/schedule_run2', 800, 600, '');"><i class="i-group"></i> <?=$live['3']?$live['3']:'방송전';?></span><a  href="javascript:windowOpen('schedule_run2', '/live/schedule_run2', 800, 600, '');void(0);"><img src="images/main/1_02.jpg"></a></div>
                    <ul class="profile">
                        <h4 class="tit">위클리 옵션 대화방</h4>
                        <li>평일에는 3-4배 매주 목요일 옵션 만기일은 10배 이상의 시세가 분출하는 가격 이론을 배울 수 있는 옵션비문 제공 </li>
                        <li>死地에서 일어나 우주를 날아가는 인간의 탐욕 용암이 분출하듯 시세가 나는 위클리 옵션을 배우십시오  </li>
                        <li>3월, 6월, 9월, 12월 첫째 주 일요일 무료교육 전주교육장 10시-16시</li>
                    </ul>
                </div>
            </div>

            <div class="cons mc1_2">
            	<h3 class="tits">유튜브<!--a href="/utube/list" class="link"><i class="i-plus-min"></i></a--></h3>
                <a href="https://www.youtube.com/@성수클럽장성수소장" class="btn" target="_blank"><img src="../../images/main/1_yt.png?111"></a>
            </div>

        </div>
        <!--//방송-->
        
        
       
        
        <!--최근게시물-->
        <div class="mc4">
            <div class="cons mc4_1">
                <!--소통의 장-->
                <h3 class="tits">소통의 장<a href="/board/list?code=communication" class="link"><i class="i-plus-min"></i></a></h3>
                <ul class="list">
                    <?foreach($communication as $n):
                        $date = date('YmdHis');
                        $regDate = date("YmdHis", strtotime($n['reg_date']." +1 day"));
                        $reg_date = date("Y.m.d", strtotime($n['reg_date']));

                        $no = $n['no'];



                        $user_name = $n['user_name'];
                    ?>
                    <li><a href="/board/view?no=<?=$no?>&code=communication">
                        <?if($n['file_path']):
                            $imgChk = filecheck($n['file_path']);
                            if($imgChk){

                        ?>
                            <img src="<?=$n['file_path']?>">
                            <? }else{?>
                            <img src="images/board/pic1.png">
                            <?}?>
                        <?else:?>
                        <img src="images/board/pic1.png">
                        <?endif;?>
                        <ul>
                            <li class="tit"><?=$n['title']?></li>
                            <li class="name"><i class="i-profile"></i> <?=$n['user_type']==9?'성수클럽':$n['b_user_name']?></li>
                        </ul>
                    </a></li>
                    <?endforeach;?>
                </ul>
                <!--//소통의 장-->            
            </div>
            <div class="cons">
            	<div class="mc4_2">

                	<img src="/images/main/4_banner.png">

                </div>
                <!--동영상--
                <div class="mc4_2 m_list1">
                    <h3 class="tits">동영상<a href="/vod/list?code=vod" class="link"><i class="i-plus-min"></i></a></h3>
                    <?if($vod[0]):?>
                    <div class="detail"  onclick="movieopen(<?=$vod[0]['vod_no']?>)">
                        <div class="pic"><img src="<?=$vod[0]['file_path']?>"></div>
                        <div class="con">
                            <b><?=$vod[0]['vod_title']?> </b>
                            <p><?=$vod[0]['vod_content']?></p>
                        </div>
                    </div>
                    <?endif;?>
                    <ul class="lists">
                        <?
                        $i=0;
                        foreach($vod as $n):
                            if($i==0) {
                                $i++;
                                continue;
                            }
                            $date = date('YmdHis');
                            $regDate = date("YmdHis", strtotime($n['reg_date']." +1 day"));
                            $reg_date = date("Y.m.d", strtotime($n['reg_date']));

                            $no = $n['vod_no'];

                            
                        ?>
                        <li><a href="javascript:movieopen(<?=$no?>)"><p><?=$n['vod_title']?></p></a></li>
                       
                        <?endforeach;?>
                    </ul>                
                </div>
                <!--//동영상-->
                <!--증시현황-->
                <div class="mc4_2 m_list1">
                    <h3 class="tits">뉴욕증시</h3>
                    <ul class="pics">
                        <li><img src="https://api.wsj.net/api/kaavio/charts/gqplus/fpDJIA-big.gqplus?rand=235450027"></li>
                        <li><img src="https://api.wsj.net/api/kaavio/charts/gqplus/fpNASDAQ-big.gqplus?rand=235450027"></li>
                    </ul>
                </div>
                <!--//증시현황-->
            </div>
  
        <!--//최근게시물-->
        <!--//Main Container-->
        <script type="text/javascript">
            
        function movieopen(vod_no) {
            location.reload();
            url = "/vod/pop_live?vod_no="+vod_no
            aa = window.open(url,'a','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,top=10, left=5,width=720, height=700');
        }


        </script>
