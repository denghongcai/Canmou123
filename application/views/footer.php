<div id="loginform" style="display:none">

    <form id="login-form" method="post" action="<?=base_url('user/login')?>">
        <h3><span>用户登录</span></h3>

        <div class="login-left">
            <div id="username">
                <label for="username"><b>用户名：</b></label>
                <input type="text" name="usrname" class="txtfield" tabindex="1">
            </div>
            <div id="password">
                <label for="password"><b>密&nbsp;&nbsp;&nbsp;码：</b></label>
                <input type="password" name="passwd" class="txtfield" tabindex="2">
            </div>
            <div class="center">
                <button type="submit" id="loginbtn" class="flatbtn-blu"
                                       tabindex="3">登录</button>

                <button id="close" class="hidemodal">关闭</button>
            </div>
        </div>
    </form>
    <div class="login-right">
        <div id="qq"></div>
        <div id="renren"></div>
    </div>

</div>

<div id="foot">
    <img src="<?= base_url('img/next2.jpg') ?>"/>

    <div>餐谋网<span>©</span>2013</div>
</div>
</div>
<a id="gotop" href="#">
    <span>▲</span>
</a>
<script type="text/javascript" src="<?php echo base_url('js/jquery-1.9.1.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.autocomplete-min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.leanModal.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.form.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/main.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/img.js') ?>"></script>
<?php if (strpos(uri_string(), 'dhdetail')): ?>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=5f52d75d69a3b671bdd81647c7cf9723"></script>
<script type="text/javascript">
    $(function () {
        var position = "<?=$position?>".split(",");
        var map = new BMap.Map("map");
        map.centerAndZoom(new BMap.Point(position[0], position[1]), 18);
        var marker = new BMap.Marker(new BMap.Point(position[0], position[1]));
        map.addOverlay(marker);
        marker.setAnimation(BMAP_ANIMATION_BOUNCE);
        map.addControl(new BMap.NavigationControl({anchor: BMAP_ANCHOR_TOP_LEFT, type: BMAP_NAVIGATION_CONTROL_ZOOM}));

        var options = {
            beforeSubmit: function(formData, jqForm, options){
                return true;
            },
            success: function(data){
                if(data.err == 0)
                    window.location.reload();
                else{
                    alert('评论失败');
                }
            },
            dataType: 'json'
        }
        $('#comment-dh').ajaxForm(options);
        $('#getcheap').click(function(){
            var phone = prompt("请输入你的手机号:");
            if((/^1[3|4|5|8][0-9]\d{4,8}$/.test(phone))){
                $.post("<?=base_url('sms/getcheap')?>", {'phone': phone}, function(result){
                    if(result.err == 1)
                        alert("您的优惠券将在1分钟内发送至您的手机，请耐心等待，如果超过1分钟仍然未收到短信请重新获取");
                    else if(result.err == 2)
                        alert("请登录");
                    else
                        alert("请不要在一分钟内多次获取优惠券");
                }, 'json');
            }
        });
    });
</script>
<?php endif ?>
<?php if (strpos(uri_string(), 'register')): ?>
    <script type="text/javascript">
        $('#registerform').submit(function (e) {
            e.preventDefault();
            var username = $("#username1").val();
            var nickname = $("#nickname").val();
            var password = $("#password1").val();
            var repassword = $('#repassword').val();
            var mail = $('#mailbox').val();
            var area = $('#area').val();
            $.ajax({
                type: "POST",
                url: "./register/post",
                dataType: "json",
                data: {"usrname": username, "nickname": nickname, "passwd": password, 'repasswd': repassword, "mail": mail},
                beforeSend: function () {
                    ;
                },
                success: function (json) {
                    if (json.err == 0) {
                        alert('注册成功');
                        location.assign('http://' + location.host + '/');
                    }
                    else {
                        $('.inline-tips').addClass('validata_err');
                        return false
                    }
                }
            });
        });
        $('#registerform input').keydown(function () {
            var username = $("#username1").val();
            var password = $("#password1").val();
            var repassword = $('#repassword').val();
            var mail = $('#mailbox').val();
            var area = $('#area').val();
            if (mail.length < 5) {
                $("#mailbox").siblings(".inline-tips").addClass('validata_err');
            }
            else {
                $("#mailbox").siblings(".inline-tips").removeClass('validata_err');
            }
            if (username.length < 3 || username.length > 20) {
                //$('#username1').after("<span class='validatefail'>用户名长度需要大于3小于20</span>");
                $("#username1").siblings(".inline-tips").addClass('validata_err');
            } else {
                $("#username1").siblings(".inline-tips").removeClass('validata_err');
            }
            if (password.length < 6 || password.length > 20 || password != repassword) {
                $("#password1").siblings(".inline-tips").addClass('validata_err');
            } else {
                $("#password1").siblings(".inline-tips").removeClass('validata_err');
            }
        });

    </script>
<?php endif ?>


</body>
</html>