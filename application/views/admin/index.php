<div class="sidebar-nav">
    <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Dashboard</a>
    <ul id="dashboard-menu" class="nav nav-list collapse in">
        <li class='active'><a href="<?=base_url('administrator')?>">首页</a></li>
        <li><a href="<?=base_url('administrator/dhlist')?>">餐厅列表</a></li>
        <li><a href="<?=base_url('administrator/dhdetail')?>">餐厅详情</a></li>
        <li><a href="media.html">Media</a></li>

    </ul>

    <a href="#accounts-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Account<span
            class="label label-info">+3</span></a>
    <ul id="accounts-menu" class="nav nav-list collapse">
        <li><a href="sign-in.html">登录</a></li>
        <li><a href="sign-up.html">用户列表</a></li>
        <li><a href="reset-password.html">用户详情</a></li>
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
        <h1 class="page-title">Dashboard</h1>
    </div>

    <ul class="breadcrumb">
        <li><a href="#">首页</a> <span class="divider">/</span></li>
        <li class="active">Dashboard</li>
    </ul>

    <div class="container-fluid">
        <div class="row-fluid">


            <div class="row-fluid">

                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>注意：</strong>请使用输入法的半角输入
                </div>

            </div>

            <div class="row-fluid">
                <div class="block span6">
                    <a href="#tablewidget" class="block-heading" data-toggle="collapse">餐厅列表</a>

                    <div id="tablewidget" class="block-body collapse in">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>餐厅名字</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($dhdata as $tr):?>
                            <tr>
                                <td><?=$tr['dhid']?></td>
                                <td><?=$tr['name']?></td>
                            </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                        <p><a href="<?=base_url('administrator/dhlist')?>">More...</a></p>
                    </div>
                </div>
                <div class="block span6">
                    <a href="#widget1container" class="block-heading" data-toggle="collapse">Collapsible </a>

                    <div id="widget1container" class="block-body collapse in">
                        <h2>Here's a Tip</h2>

                        <p>This template was developed with <a href="http://middlemanapp.com/"
                                                               target="_blank">Middleman</a> and includes .erb layouts
                            and views.</p>

                        <p>All of the views you see here (sign in, sign up, users, etc) are already split up so you
                            don't have to waste your time doing it yourself!</p>

                        <p>The layout.erb file includes the header, footer, and side navigation and all of the views are
                            broken out into their own files.</p>

                        <p>If you aren't using Ruby, there is also a set of plain HTML files for each page, just like
                            you would expect.</p>
                    </div>
                </div>
            </div>





