<? include_once $_SERVER['DOCUMENT_ROOT']."/include/include.header.php"; ?>

<body id="main_bg">
    <div id="wrap">
        <!--Topmenu-->
        <? include_once $_SERVER['DOCUMENT_ROOT']."/include/include.topmenu.php"; ?>
        <!--//Topmenu-->
        
        <div id="sub_w" class="<? if($PageNum == "4" ||$PageNum == "5" || $PageNum == "7"|| $PageNum == "9"||$PageNum == "members" ) { ?>only1dp<? }?>">
            <div id="sub_visual">
                <div class="tit">
                     <?=$Title;?>
                    <u><?=$Contents?></u>
                </div>
            </div>
            <div id="sub_tab_w">
            <? include_once $_SERVER['DOCUMENT_ROOT']."/include/include.tab.php"; ?>
            </div>
        </div>
        
        <div id="container">