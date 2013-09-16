<div class="sidebar-nav">
    <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Dashboard</a>
    <ul id="dashboard-menu" class="nav nav-list collapse in">
        <li><a href="<?= base_url('administrator') ?>">首页</a></li>
        <li><a href="<?= base_url('administrator/dhlist') ?>">餐厅列表</a></li>
        <li class='active'><a href="<?= base_url('administrator/dhdetail') ?>">餐厅详情</a></li>
        <li><a href="media.html">Media</a></li>

    </ul>

    <a href="#accounts-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Account<span
            class="label label-info">+3</span></a>
    <ul id="accounts-menu" class="nav nav-list collapse">
        <li><a href="sign-in.html">Sign In</a></li>
        <li><a href="sign-up.html">Sign Up</a></li>
        <li><a href="reset-password.html">Reset Password</a></li>
    </ul>

    <a href="#error-menu" class="nav-header collapsed" data-toggle="collapse"><i class="icon-exclamation-sign"></i>Error
        Pages <i class="icon-chevron-up"></i></a>
    <ul id="error-menu" class="nav nav-list collapse">
        <li><a href="403.html">403 page</a></li>
        <li><a href="404.html">404 page</a></li>
        <li><a href="500.html">500 page</a></li>
        <li><a href="503.html">503 page</a></li>
    </ul>

    <a href="#legal-menu" class="nav-header" data-toggle="collapse"><i class="icon-legal"></i>Legal</a>
    <ul id="legal-menu" class="nav nav-list collapse">
        <li><a href="privacy-policy.html">Privacy Policy</a></li>
        <li><a href="terms-and-conditions.html">Terms and Conditions</a></li>
    </ul>

    <a href="help.html" class="nav-header"><i class="icon-question-sign"></i>Help</a>
    <a href="faq.html" class="nav-header"><i class="icon-comment"></i>Faq</a>
</div>


<div class="content">

    <div class="header">

        <h1 class="page-title">餐厅详情</h1>
    </div>

    <ul class="breadcrumb">
        <li><a href="#">首页</a> <span class="divider">/</span></li>
        <li><a href="#">餐厅列表</a><span class="divider">/</span></li>
        <li class="active">餐厅详情</li>
    </ul>

    <div class="container-fluid">
        <div class="row-fluid">
            <?php if (isset($error)): ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>
                        <?php if ($error != '添加成功，你可以开始添加新的餐厅' && $error != '修改成功')
                            echo '错误:';
                        else
                            echo '信息:'
                        ?>
                    </strong><?= $error ?>
                </div>
            <?php else: ?>
                <div class="btn-toolbar">
                    <button class="btn btn-primary" id='save-btn'><i class="icon-save"></i> 保存修改</button>
                    <a href="#myModal" data-toggle="modal" class="btn">删除</a>

                    <div class="btn-group">
                    </div>
                </div>
                <div class="well">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#home" data-toggle="tab">详情</a></li>
                        <li><a href="#other" data-toggle="tab">餐厅图片</a></li>
                        <li><a href="#cuisine" data-toggle="tab">餐厅菜品</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active in" id="home">
                            <form id="dhform" action="<?= base_url("administrator/dhmodify/$dhid") ?>" method="post"
                                  accept-charset="utf-8" enctype="multipart/form-data">
                                <label>餐厅名称</label>
                                <input type="text" value="<?= $dhdata['name'] ?>" class="input-xlarge" name="name">
                                <label>餐厅图片</label>
                                <?php if ($dhdata['image'] != null): ?>
                                    <img src="<?= base_url($dhdata['image']) ?>" class="img-polaroid"/>
                                <?php else: ?>
                                    <input type="file" name="userfile" class="input-large"/>
                                <?php endif ?>
                                <label>餐厅介绍</label>
                                <textarea rows="3" class="input-xlarge" name="intro"><?= $dhdata['intro'] ?></textarea>
                                <label>餐厅类型</label>
                                <input type="text" value="<?= $dhdata['type'] ?>" class="input-xlarge" name='type'>
                                <label>价位</label>
                                <input type="text" value="<?= $dhdata['price'] ?>" class="input-xlarge" name="price">
                                <label>餐厅星级</label>
                                <input type="text" value="<?= $dhdata['rate'] ?>" class="input-xlarge" name="rate">
                                <label>所在区域</label>
                                <input type="text" value="<?= $dhdata['area'] ?>" class="input-xlarge" name="area">
                                <label>详细地址</label>
                                <textarea rows="3" class="input-xlarge" name="map"><?= trim($dhdata['map']) ?></textarea>
                                <label>坐标(格式: 11111,22222)</label>
                                <input type="text" value="<?= $dhdata['position'] ?>" class="input-xlarge"
                                       name="position">
                                <label>联系电话</label>
                                <input type="text" value="<?= $dhdata['dial'] ?>" class="input-xlarge" name="dial">
                            </form>
                        </div>
                        <div class="tab-pane fade" id="other">
                            <form id="tab2">
                                <div id="image-upload">

                                </div>
                                <h3>餐厅图片上传</h3>

                                <div id="queue"></div>
                                <input id="file_upload" name="file_upload" type="file">
                            </form>
                        </div>
                        <div class="tab-pane fade" id="cuisine">
                            <div id="cuisine-upload">

                            </div>
                            <h3>菜品图片</h3>

                            <div id="queue"></div>
                            <input id="cuisine_upload" name="file_upload" type="file">

                            <form id="tab3" action="<?= base_url("administrator/modifycuisine/$dhid") ?>" method="post" accept-charset="utf-8">
                                <label>名称</label>
                                <input type="text" name="name" class="input-xlarge">
                                <label>介绍</label>
                                <textarea rows="3" class="input-xlarge" name="intro">
                                </textarea>
                                <label>图片</label>
                                <input type="text" id="cuisine-img" name="image" class="input-xlarge" value="">
                                <button type="submit">提交</button>
                            </form>
                        </div>
                    </div>

                </div>
            <?php endif ?>
            <div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">删除确认</h3>
                </div>
                <div class="modal-body">
                    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>你确定你要删除这家餐厅吗？</p>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
                    <button id="del-btn" class="btn btn-danger" data-dismiss="modal">删除</button>
                </div>
            </div>

            <script src="<?= base_url('js/jquery.uploadify.min.js') ?>" type="text/javascript"></script>

            <script type="text/javascript">
                $(function () {
                    $('#save-btn').click(function () {
                        $('#dhform').submit();
                    });
                    $('#del-btn').click(function () {
                        window.location.href = "<?=base_url("administrator/dhdel/$dhid")?>";
                    });
                });
            </script>

            <script type="text/javascript">
                $(function () {
                    $('#file_upload').uploadify({
                        'fileObjName': 'userfile',
                        'fileTypeExts': '*.png',
                        'fileTypeDesc': '图片文件',
                        'swf': '<?=base_url('img/uploadify.swf')?>',
                        'uploader': '<?=base_url('administrator/imgupload/'.$dhid.'/1')?>',
                        'onUploadSuccess': function (file, data, response) {
                            $('#image-upload').append('<img src="<?=base_url()?>' + data + '" width="460" height="280">');
                        }
                    });
                    $('#cuisine_upload').uploadify({
                        'fileObjName': 'userfile',
                        'fileTypeExts': '*.png',
                        'fileTypeDesc': '图片文件',
                        'swf': '<?=base_url('img/uploadify.swf')?>',
                        'uploader': '<?=base_url('administrator/imgupload/'.$dhid.'/2')?>',
                        'onUploadSuccess': function (file, data, response) {
                            $('#cuisine-upload').append('<img src="<?=base_url()?>' + data + '" width="460" height="280">');
                            $('#cuisine-img').val(data);
                        }
                    });
                });
            </script>