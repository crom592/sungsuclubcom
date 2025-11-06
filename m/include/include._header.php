<? include_once $_SERVER['DOCUMENT_ROOT']."/m/include/include.header.php"; ?>
<div id="wrap">
      <? include_once $_SERVER['DOCUMENT_ROOT']."/m/include/include.right.php"; ?>
    
    <!--Body-->
    <div id="body">
        <? if($PageNum != "main"){ ?>
        <!--Sub Menu-->
        <script>
        $(function(){
        
            $(".b_menu").hide();
            $("a.btn_smenu").click(function() {
                $(".b_menu").slideToggle(200);
            });     
        });
        </script>        
        <div id="body_top">
            <div id="body_tit">
                <div class="ar ll"><a href="javascript:history.go(-1);"><i class="i-angle-left-min"></i></a></div>
                <h3><?=$Title?></h3>
                <? if($SubNum != ""){ ?><div class="ar rr"><a class="btn_smenu"><i class="i-angle-down-min"></i></a></div><?}?>
            </div> 
            <div class="b_menu">
                <ul>
                  <? include_once $_SERVER['DOCUMENT_ROOT']."//m/include/include.topmenu.php"; ?>
                </ul>               
            </div>
        </div>
        <!--//Sub Menu-->
        <? }?>

        <!--Container-->
        <div id="contents" class="<? if($PageNum == "main"){ ?>wapge<? }?>"> 