<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="<?php echo base_url('styles/main.css')?>" type="text/css" rel="stylesheet"/>
    <?php if($type != 'form' || $type == 'content'):?>
        <link href="<?php echo base_url('styles/content.css')?>" type="text/css" rel="stylesheet"/>
    <?php else:?>
        <link href="<?php echo base_url('styles/form.css')?>" type="text/css" rel="stylesheet" />
    <?php endif;?>
    <link href="<?php echo base_url('styles/search.css')?>" type="text/css" rel="stylesheet"/>
    <title><?php echo $title ?></title>
</head>
<body>

    <div id="header-holder">
        <div id="header">
        <img src="<?php echo base_url('img/logo.jpg')?>" alt="餐谋网"/>

        <div id="city"><b>武汉</b></div>

        <?php if ($is_login != 1): ?>
            <a href="#loginform" class="flatbtn" id="login"><b>登录</b></a>
            <a href="<?php echo base_url('user/register')?>" class="flatbtn" id="register"><b>注册</b></a>
        <?php else: ?>
            <<a href="#" class="flatbtn" id="login"><b><?=$this->session->userdata('nickname')?></b></a>
            <a href="<?=base_url('user/logout')?>" class="flatbtn" id="login"><b>退出</b></a>
        <?php endif ?>

        <form action="">
            <input type="text" name="query" id="search"/>
            <input type="button" class="submit" value="餐谋一下"/>
        </form>
        </div>
    </div>
    <div id="wrapper">
    <div id="main">
        <?php if($type != 'form' && $type != 'content'): ?>
            <img src="<?php echo base_url('img/next1.jpg')?>" class="block"/>
            <ul id="nav">
                <li id="chosen"><strong>首页</strong></li>
                <li><a href="#"><strong>吃点啥</strong></a></li>
                <li><a href="#"><strong>尝尝鲜</strong></a></li>
                <li><a href="#"><strong>最新优惠</strong></a></li>
                <li><a href="<?=base_url('dininghall/dhhotrate')?>"><strong>餐谋热评榜</strong></a></li>
                <li><a href="#"><strong>参谋推荐</strong></a></li>
                <li><a href="#"><strong>我的优惠</strong></a></li>
            </ul>
        <?php else: ?>
            <ul id="nav-inline">
                <li><a href="<?php echo base_url()?>"><strong>首页</strong></a></li>
                <li><a href="#"><strong>吃点啥</strong></a></li>
                <li><a href="#"><strong>尝尝鲜</strong></a></li>
                <li><a href="#"><strong>最新优惠</strong></a></li>
                <li><a href="#"><strong>餐谋热评榜</strong></a></li>
                <li><a href="#"><strong>参谋推荐</strong></a></li>
                <li><a href="#"><strong>我的优惠</strong></a></li>
            </ul>
        <?php endif ?>

