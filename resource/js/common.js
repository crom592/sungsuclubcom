
$(function(){
    $('#reserve_name').on("propertychange change keyup paste input",function(){
        if($("input:checkbox[name='equal_name']").is(":checked")==true){
            $('#real_name').val($(this).val());
        }  
    });

    $('#equal_name').bind("click", function(){
        if($("input:checkbox[name='equal_name']").is(":checked")==true){
            $('#real_name').val($('#reserve_name').val());
        } else {
            $('#real_name').val('');
        }
    });
});

function inputNumberFormat(obj) { 
    obj.value = comma(uncomma(obj.value)); 
} 

function comma(str) { 
    str = String(str); 
    return str.replace(/(\d)(?=(?:\d{3})+(?!\d))/g, '$1,'); 
} 

function uncomma(str) { 
    str = String(str); 
    return str.replace(/[^\d]+/g, ''); 
}

function tr_over(obj, backgroundColor) {
    if(!backgroundColor || backgroundColor == null || backgroundColor == "") {
        backgroundColor = '#ffff99';
    }
    obj.style.backgroundColor = backgroundColor;

}

function tr_out(obj, backgroundColor) {
    if(!backgroundColor || backgroundColor == null || backgroundColor == "") {
        backgroundColor = '';
    }
    obj.style.backgroundColor = backgroundColor;

}
function td_over(obj, backgroundColor) {
    if(!backgroundColor || backgroundColor == null || backgroundColor == "") {
        backgroundColor = '#ffcc66';
    }
    obj.style.backgroundColor = backgroundColor;

}

function td_out(obj, backgroundColor) {
    if(!backgroundColor || backgroundColor == null || backgroundColor == "") {
        backgroundColor = '';
    }
    obj.style.backgroundColor = backgroundColor;

}

function do_sort(orderby) {
    var f = document.search_form;
    f.page.value = "";
    f.orderby.value = orderby;
    f.submit();
}

function toggle_checkbox(obj) {

    if(obj) {
        var tf = false;
        var src = (event) ? event.srcElement : null;
        tf = (src != null) ? src.checked : obj[0].checked;
        if(obj.length) {
            var len = obj.length;
            for(i=0; i<len; i++) obj[i].checked = tf;
        }
        else {
            obj.checked = tf;
        }
    }
}

function make_no_list() {
    var no_list = [];

    $("input[name='no[]']:checked").each(function(i) {
        no_list.push($(this).val());
    });

    return no_list;
}