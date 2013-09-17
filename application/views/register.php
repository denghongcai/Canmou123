<h4>用户注册</h4>
<form action='<?=base_url('user/register/post')?>' method='post' id='registerform'>
    <div class="regis">
        <label for="mailbox">邮箱：</label><input type="text" name="mail" id="mailbox"/>
        <span class='inline-tips'></span>
    </div>
    <div class="regis">
        <label for="username1">用户名：</label><input type="text" name="usrname" id="username1" autocomplete="off"/>
        <span class='inline-tips'></span>
    </div>
    <div class="regis">
        <label for="nickname">昵称：</label><input type="text" name="nickname" id="nickname" autocomplete="off"/>
        <span class='inline-tips'></span>
    </div>
    <div class="regis">
        <label for="password1">密码：</label><input type="password" name="passwd" id="password1" autocomplete="off"/>
        <span class='inline-tips'></span>
    </div>
    <div class="regis">
        <label for="repassword">确认密码：</label><input type="password" name="repasswd" id="repassword" autocomplete="off"/>
        <span class='inline-tips'></span>
    </div>
    <div class="regis">
        <label for="area">所在地区：</label>

        <select id="area">
            <?php
                $area = array('东校区', '西校区', '集贸', '东小门外', '南大门外'
                , '西小门外', '光谷', '光谷天地');
                for($i = 0;$i < count($area); $i++){
                    echo '<option value='.($i + 1).'>'.$area[$i].'</option>';
                }
            ?>
        </select>
        <span class='inline-tips'></span>
    </div>
    <div class="checkbox">
        <span class="taste">个人口味：</span>
        <input name="taste" type="checkbox" value="0" class="taste"/><label for="taste">清淡 </label>
        <input name="taste" type="checkbox" value="1" class="taste"/><label for="taste">麻辣 </label>
        <input name="taste" type="checkbox" value="2" class="taste"/><label for="taste">油腻 </label>
        <input name="taste" type="checkbox" value="3" class="taste"/><label for="taste">甜 </label>
    </div>
    <div class="checkbox">

        <input name="s" type="checkbox" value="" class="taste"/><label for"s">我已阅读同意餐谋网用户协议</label>
    </div>
    <div id="register-submit">
        <input type="submit" value="提交注册"/>

    </div>

</form>

</div>