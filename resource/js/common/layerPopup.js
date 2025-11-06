
function alerts(val){
	alert('현재는 뉴스레터가 발간되고 있지 않습니다. \r\n빠른 시일 내에 고객 여러분께 알찬 정보와 내용을 전달하기 위해\r노력하겠습니다. ');
}
 			var SLB_cnt = 0;
            function SLB_show(url, type)   
            {   
                var a = document.getElementById('SLB_film');   
                var b = document.getElementById('SLB_content');   
                var c = document.getElementById('SLB_loading');
                if(url) {   
                    a.style.top = 0;   
                    a.style.left = 0;   
                    a.style.display = "";   
                    a.style.height = document.body.scrollHeight + 'px';   
                    document.getElementById('SLB_loading').style.display = "block";   
                    SLB_setCenter(c,true);   
                    if(type == 'image') {   
                        b.innerHTML="<img src="layer_script/ + url + " class='SLB_center'onload='SLB_setCenter(this);' />";   
                        if(arguments[2]) a.onclick = function () { SLB_show() };   
                        if(arguments[3]) b.innerHTML += "<div class='SLB_caption'>"+ arguments[3] +"</div>";   
                    } else if (type == 'iframe') {
                        b.innerHTML="<iframe src=" + url + " width="+ arguments[2] +" height="+ arguments[3] +" class='SLB_center' marginwidth='0' marginheight='0' frameborder='0' vspace='0' hspace='0' onload='SLB_setCenter(this); 'ALLOWTRANSPARENCY='true'/></iframe>";
                        b.onclick = ''; 
                        b.firstChild.style.cursor = 'default';    
                    } else if (type='html'){   
                        b.innerHTML = url;   
                        SLB_setCenter(b.firstChild);   
                        if(arguments[2]) b.onclick = '';    
                    }
     	hideSelect();
                } else {   
                    a.onclick = '';   
                    a.style.display = "none";   
                    b.innerHTML = "";   
                    b.onclick = function () { SLB_show() };   
                    c.style.display = "none";   
	     showSelect();
	     SLB_cnt = 0;
                }   
            }



						function SLB_setCenter(obj) {   
                if (obj) {   
                    var h = window.innerHeight || self.innerHeight || document.body.clientHeight;   
                    var w = window.innerWidth || self.innerWidth || document.body.clientWidth;   
                    var l = (document.body.scrollLeft + ((w-(obj.width||parseInt(obj.style.width)||obj.offsetWidth))/2));   
                    var t = (document.documentElement.scrollTop + ((h-(obj.height||parseInt(obj.style.height)||obj.offsetHeight))/2));   
                    if((obj.width||parseInt(obj.style.width)||obj.offsetWidth) >= w) l = 0;   
                    if((obj.height||parseInt(obj.style.height)||obj.offsetHeight) >= h) t = document.documentElement.scrollTop;   
                    document.getElementById('SLB_content').style.left = l + "px";
     				if(SLB_cnt == 0) {  
                    	document.getElementById('SLB_content').style.top = t + "px"; 
      					if(document.getElementById('SLB_content').offsetHeight >= h) {
       						SLB_cnt ++;
      					}
     				}
                    obj.style.visibility = 'visible';   
                    if(obj.nextSibling && (obj.nextSibling.className =='SLB_close' || obj.nextSibling.className == 'SLB_caption')) {   
                        obj.nextSibling.style.display = 'block';
				      if(document.getElementById('SLB_content').offsetHeight < h) {
				       document.getElementById('SLB_content').style.top = parseInt(document.getElementById('SLB_content').style.top) - (obj.nextSibling.offsetHeight/2) + "px";
				      }
                    }   
                    if(!arguments[1]) {   
                        document.getElementById('SLB_loading').style.display = "none";
                    } else {
				      obj.style.left = l + "px";   
				      obj.style.top = t + "px";
                    }   
                }   
            }



						
   function hideSelect() {
    var windows = window.frames.length;
    var selects = document.getElementsByTagName("SELECT");
    for (i=0;i < selects.length ;i++ )
    {
     selects[i].style.visibility = "hidden";
    }

    if (windows > 0) {
     for(i=0; i < windows; i++) {
      try {
       var selects = window.frames[i].document.getElementsByTagName("SELECT");
       for (j=0;j<selects.length ;j++ )
       {
        selects[j].style.visibility = "hidden";
       }
      } catch (e) {}
     }
    }
   }

   function showSelect() {
    var windows = window.frames.length;
    var selects = document.getElementsByTagName("SELECT");
    for (i=0;i < selects.length ;i++ )
    {
     selects[i].style.visibility = "visible";
    }

    if (windows > 0) {
     for(i=0; i < windows; i++) {
      try {
       var selects = window.frames[i].document.getElementsByTagName("SELECT");
       for (j=0;j<selects.length ;j++ )
       {
        selects[j].style.visibility = "visible";  
       }
      } catch (e) {}
     }
    }
   }

            var prevOnScroll = window.onscroll;   
            window.onscroll = function () {   
                if(prevOnScroll != undefined) prevOnScroll();   
                document.getElementById('SLB_film').style.height = document.body.scrollHeight + 'px';   
                document.getElementById('SLB_film').style.width = document.body.scrollWidth + 'px';   
                SLB_setCenter(document.getElementById('SLB_content').firstChild);            
            }   
            var prevOnResize = window.onresize;      
            window.onresize = function () {   
                if(prevOnResize != undefined) prevOnResize();   
                document.getElementById('SLB_film').style.height = document.body.offsetHeight + 'px';   
                document.getElementById('SLB_film').style.width = document.body.offsetWidth + 'px';   
                SLB_setCenter(document.getElementById('SLB_content').firstChild);
            } 