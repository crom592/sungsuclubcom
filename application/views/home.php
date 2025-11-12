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
                    <h3 class="tit"><u><i class="i-tv"></i> 방송</u>선물 코스피 200옵션<!--<b><i class="i-profile"></i> 진행 : 장성수 소장</b>--></h3>
                    <div class="pic"><span class="num" onclick="windowOpen('schedule_run', '/live/schedule_run', 800, 600, '');"><i class="i-group"></i> <?=$live['2']?$live['2']:'방송전';?></span><a  href="javascript:windowOpen('schedule_run', '/live/schedule_run', 800, 600, '');void(0);"><img src="images/main/1_01.jpg"></a></div>
                    <ul class="profile">
                        <h4 class="tit">코스피 200 선물옵션 방송</h4><!--최대 6줄까지만-->
                        <li>옵션비문에 의한 전일 시장과 야간시장분석</li>
                        <li>당일 매매 전략 및 대응 안내</li>
                        <li>선물 진폭이 매일 15포인트 이상 확대되는 장에 8포인트 를 수익화합니다</li>
                    </ul>
                </div>
                <div class="mc1_">
                    <h3 class="tit"><u><i class="i-tv"></i> 방송</u>선물 위클리 옵션</h3>
                    <div class="pic"><span class="num" onclick="windowOpen('schedule_run2', '/live/schedule_run2', 800, 600, '');"><i class="i-group"></i> <?=$live['3']?$live['3']:'방송전';?></span><a  href="javascript:windowOpen('schedule_run2', '/live/schedule_run2', 800, 600, '');void(0);"><img src="images/main/1_02.jpg"></a></div>
                    <ul class="profile">
                        <h4 class="tit">위클리 옵션 대화방</h4>
                        <li>평일에는 3-4배 매주 월 목요일 옵션 만기일은</li>
                        <li>10배 이상의 시세가 분출하는 가격 이론을 배울 수 있는 옵션비문 제공</li>
                        <li>용암이 분출하듯 시세가 나는 위클리 옵션을 배우십시오</li>
                    </ul>
                </div>
            </div>

            <div class="cons mc1_2">
            	<h3 class="tits">유튜브<!--a href="/utube/list" class="link"><i class="i-plus-min"></i></a--></h3>
                <a href="https://www.youtube.com/@선물옵션성수클럽" class="btn" target="_blank"><img src="../../images/main/1_yt.png?111"></a>
            </div>

        </div>
        <!--//방송-->
        
        
       
        
        <!--최근게시물-->
        <div class="mc4">
            <!-- 소통의 장 섹션 숨김 처리 -->
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
