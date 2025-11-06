<? include_once $_SERVER['DOCUMENT_ROOT']."/include/include.header.php"; ?>
<body>

<div class="gallery_v_pop">
	<dl class="tit">
    	<dt><?=$view['title']?> </dt>
        <dd><?=date('Y-m-d', strtotime($view['reg_date']))?></dd>
    </dl>
	<div class="iframe_w">
    	<iframe src="<?=$view['link_url']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>	
    <a class="close" href="javascript:parent.SLB_show();">창닫기</a>
</div>
