function addLoadEvent(func) {
    var oldonload = window.onload;
    if (typeof window.onload != 'function') {
        window.onload = func;
    } else {
        window.onload = function () {
            oldonload();
            func();
        }
    }
}

function addClass(element, value) {
    if (!element.className) {
        element.className = value;
    } else {
        newClassName = element.className;
        newClassName += " ";
        newClassName += value;
        element.className = newClassName;
    }
}
function getElementsByClassName(n) {
    var classElements = [], allElements = document.getElementsByTagName('*');
    for (var i = 0; i < allElements.length; i++) {
        if (allElements[i].className == n) {
            classElements[classElements.length] = allElements[i];
        }
    }
    return classElements;
}
function itemClass() {
    var tagName = getElementsByClassName("item");
    for (var i = 0; i < tagName.length; i++) {
        if ((i - 1) % 3 == 0) {
            addClass(tagName[i], "itemc");
        }
    }
}

addLoadEvent(itemClass);


/*$(document).ready(function(){
 $("#login").bind("click",function(){
 var $content=$("#loginnext");
 if ($content.is(":visible")) {
 $content.fadeOut(500);
 } else{$content.fadeIn(500);}
 })
 });*/
$(function () {
    var a = $('#search').autocomplete({
        serviceUrl: 'service/autocomplete.ashx',
        minChars: 2,
        delimiter: /(,|;)\s*/, // regex or character
        maxHeight: 400,
        width: 300,
        zIndex: 9999,
        deferRequestBy: 0, //miliseconds
        params: { country: 'Yes' }, //aditional parameters
        noCache: false, //default is false, set to true to disable caching
// callback function:
        onSelect: function (value, data) {
            alert('You selected: ' + value + ', ' + data);
        },
// local autosugest options:
        lookup: ['January', 'February', 'March', 'April', 'May'] //local lookup values
    });
});
/*$(function(){
 var top=window.width;
 var left=window.height;
 $("loginmodal").
 }
 )*/

$(function () {
    var options = {
        beforeSubmit: function(formData, jqForm, options){
            $('#loginbtn').attr({"disabled":"disabled"});
            return true;
        },
        success: function(data){
            if(data.err == 0)
                window.location.reload();
            else{
                alert('用户名或密码错误');
                $('#loginbtn').removeAttr("disabled");
            }
        },
        dataType: 'json'
    }
    $('#login-form').ajaxForm(options);

    $('#login').leanModal({ top: 200, overlay: 0.45, closeButton: ".hidemodal" });
});

$(function () {
    $('#comment-in').click(function () {
        if ($('#i-comment').is(":visible")) {
            $('#i-comment').slideUp();
            return false;
        } else {
            $('#i-comment').slideDown();
            return false;
        }
        ;

    });
});
$(function () {
    for (var j = 1; j <= 3; j++) {
        for (i = 0; i < 5; i++) {

            before(j);
            change(j, i);
            after(j, i);


        }
    }
    function change(j, i) {
        $('.star-holder-' + j + '>.i-rate:eq(' + i + ')').mouseover(function () {
            $('.star-holder-' + j + '>a:lt(' + (i + 1) + ').i-rate').attr("class", "i-rate-hover");
        });
    }

    function after(j, i) {
        $('.star-holder-' + j + '>a:eq(' + i + ')').click(function () {
            $('.star-holder-' + j + '>a:lt(' + (i + 1) + ')').attr("class", "i-rate-hover-click");
            $('.star-holder-' + j + '>a:gt(' + i + ')').attr("class", "i-rate");
            count(j);
            return false;
        });
    }

    function before(i) {
        $('.star-holder-' + i).mouseout(function () {
            $('.star-holder-' + i + '>.i-rate-hover').attr("class", "i-rate");
        });
    }


});
function count(j) {
    var num = $('.star-holder-' + j + '>.i-rate-hover-click').length;
    $('.star-holder-' + j).attr("value", num);
}
$(function () {
    $(window).scroll(function () {  //只要窗口滚动,就触发下面代码
        var scrollt = document.documentElement.scrollTop + document.body.scrollTop; //获取滚动后的高度
        if (scrollt > 200) {  //判断滚动后高度超过200px,就显示
            $("#gotop").fadeIn(400); //淡出
        } else {
            $("#gotop").stop().fadeOut(400); //如果返回或者没有超过,就淡入.必须加上stop()停止之前动画,否则会出现闪动
        }
    });
    $("#gotop").click(function () { //当点击标签的时候,使用animate在200毫秒的时间内,滚到顶部
        $("html,body").animate({scrollTop: "0px"}, 200);
    });
});
