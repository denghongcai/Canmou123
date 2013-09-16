function lxfScroll(main,titleli,alt,speed){
    var lxfscroll = $(main);
    var ul = lxfscroll.find("ul");
    var li = lxfscroll.find("li");
    var tli = $(titleli);
    var alt = $(alt);
    var cutspeed = 350;//切换的速度
    var autospeed = speed;//自动播放的速度
    var n = 0;
    var imgwidth = li.find("img").attr("width");//获取图片高度
    var lilength = li.length;//获取图片数量
    var timer;
    li.eq(0).clone().appendTo(ul);
    /* 标题按钮事件 */
    function hoverscroll() {
        tli.mouseenter(function(){
            var index = tli.index($(this));
            var lipoint = index*imgwidth;
            var imgTitle = li.find("img").eq(index).attr("alt");
            alt.text(imgTitle);
            tli.removeClass("cur");
            $(this).addClass("cur");
            ul.stop(true,false).animate({"left":-lipoint+"px"},cutspeed);
        });
    };
    /* 自动轮换 */
    function autoroll() {
        /*最后一个回到第一个的时候*/
        if(n >= lilength+1) {tli.removeClass("cur").eq(0).addClass("cur"); ul.stop(true,false).css({left:"0px"});n = 1;};
        var lipoint = n*imgwidth;
        var imgTitle = li.find("img").eq(n).attr("alt");
        ul.stop(true,false).animate({"left":-lipoint+"px"},cutspeed);
        tli.removeClass("cur").eq(n).addClass("cur");
        if(n >= lilength){tli.removeClass("cur").eq(0).addClass("cur"); };
        alt.text(imgTitle);
        n++;
        timer = setTimeout(autoroll, autospeed);
        if(n >= lilength+1) {alt.text(li.find("img").eq(0).attr("alt"));};
            };
    /* 鼠标悬停即停止自动轮换 */
    function stoproll() {
        li.hover(function() {
            clearTimeout(timer);
            n = $(this).prevAll().length+1;
        }
        , function() {
            timer = setTimeout(autoroll, autospeed);
        });
        tli.hover(function() {
            clearTimeout(timer);
            n = $(this).prevAll().length+1;
        }
        , function() {
            timer = setTimeout(autoroll, autospeed);
        });
    };
    hoverscroll();
    autoroll();//启动自动播放功能
    stoproll();//启动鼠标悬停功能
};
$(function(){
    lxfScroll(".lxfscroll",".lxfscroll-title li",".lxfscroll-alt",2000);
});
