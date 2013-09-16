<div class="sidebar-nav">
    <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Dashboard</a>
    <ul id="dashboard-menu" class="nav nav-list collapse in">
        <li><a href="<?=base_url('administrator')?>">首页</a></li>
        <li class='active'><a href="<?=base_url('administrator/dhlist')?>">餐厅列表</a></li>
        <li><a href="<?=base_url('administrator/dhdetail')?>">餐厅详情</a></li>
        <li><a href="media.html">Media</a></li>

    </ul>

    <a href="#accounts-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Account<span class="label label-info">+3</span></a>
    <ul id="accounts-menu" class="nav nav-list collapse">
        <li ><a href="sign-in.html">Sign In</a></li>
        <li ><a href="sign-up.html">Sign Up</a></li>
        <li ><a href="reset-password.html">Reset Password</a></li>
    </ul>

    <a href="#error-menu" class="nav-header collapsed" data-toggle="collapse"><i class="icon-exclamation-sign"></i>Error Pages <i class="icon-chevron-up"></i></a>
    <ul id="error-menu" class="nav nav-list collapse">
        <li ><a href="403.html">403 page</a></li>
        <li ><a href="404.html">404 page</a></li>
        <li ><a href="500.html">500 page</a></li>
        <li ><a href="503.html">503 page</a></li>
    </ul>

    <a href="#legal-menu" class="nav-header" data-toggle="collapse"><i class="icon-legal"></i>Legal</a>
    <ul id="legal-menu" class="nav nav-list collapse">
        <li ><a href="privacy-policy.html">Privacy Policy</a></li>
        <li ><a href="terms-and-conditions.html">Terms and Conditions</a></li>
    </ul>

    <a href="help.html" class="nav-header" ><i class="icon-question-sign"></i>Help</a>
    <a href="faq.html" class="nav-header" ><i class="icon-comment"></i>Faq</a>
</div>



<div class="content">

    <div class="header">

        <h1 class="page-title">餐厅列列表</h1>
    </div>

    <ul class="breadcrumb">
        <li><a href="#">首页</a> <span class="divider">/</span></li>
        <li class="active">餐厅列表</li>
    </ul>

    <div class="container-fluid">
        <div class="row-fluid">

            <div class="btn-toolbar">
                <a class="btn btn-primary" href="<?=base_url('administrator/dhdetail')?>"><i class="icon-plus"></i>添加餐厅</a>
                <button class="btn">测试</button>
                <div class="btn-group">
                </div>
            </div>
            <div class="well">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>餐厅名字</th>
                        <th>餐厅介绍</th>
                        <th>餐厅电话</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($dhdata as $item):?>
                    <tr>
                        <td><?=$item['dhid']?></td>
                        <td><?=$item['name']?></td>
                        <td><?=$item['intro']?></td>
                        <td><?=$item['dial']?></td>
                        <td>
                            <a href="<?=base_url('administrator/dhdetail/'.$item['dhid'])?>"><i class="icon-pencil"></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="pagination">
                <ul>
                    <?php for($i=0;$i<($pagenum/9);$i++):?>
                    <li><a href="<?=base_url("administrator/dhlist/$i")?>"><?=($i+1)?></a></li>
                    <?php endfor ?>
                </ul>
            </div>

            <div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">删除确认</h3>
                </div>
                <div class="modal-body">
                    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>你确定你要删除这家餐厅吗？</p>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
                    <button class="btn btn-danger" data-dismiss="modal">删除</button>
                </div>
            </div>


