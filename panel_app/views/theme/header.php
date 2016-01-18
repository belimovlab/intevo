<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title><?php echo $title?></title>
    <link href="/panel_assets/css/normilize.css" rel="stylesheet" type="text/css"/>
    <link href="/panel_assets/css/common.css" rel="stylesheet" type="text/css"/>
    <link href="/panel_assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/panel_assets/css/component.css" rel="stylesheet" type="text/css"/>
    <?php foreach($css as $one):?>
        <?php if($one):?>
            <link href="/panel_assets/css/<?php echo $one?>.css" rel="stylesheet" type="text/css"/>
        <?php endif;?>
    <?php endforeach;?>
    <script src="/panel_assets/js/jquery-2.1.1.min.js"></script>
    <script src="/panel_assets/js/classie.js"></script>
    <script src="/panel_assets/js/modernizr-custom.js"></script>
    <script src="/panel_assets/js/Notiser.js"></script>
    <meta name="viewport" content="width=1200px">
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


</head>
<body>
    <header>
        <div class="logo">
            <a href="<?php echo base_url('/')?>"><i class="fa fa-gears"></i> Intevo.cms</a>
        </div>
        <div class="license">
            <a href="<?php echo base_url('/license')?>">Лицензия № 2015-012-005</a>
            <a href="<?php echo base_url('/settings')?>"><i class="fa fa-gears"></i></a>
            <a href="<?php echo base_url('/update')?>"><i class="fa fa-refresh"></i></a>
            <a href="<?php echo base_url('/mailbox')?>"><i class="fa fa-envelope"></i> <span class="badge_license">12</span></a>
            <a href="<?php echo base_url('/notification')?>"><i class="fa fa-exclamation-triangle"></i> <span class="badge_license">12</span></a>
        </div>
        <div class="logout">
            <a href="<?php echo base_url('/profile/logout')?>"><i class="fa fa-sign-out"></i> Выйти</a>
        </div>
    </header>
    <div class="full-notify"></div>
    <div class="main_wrapper">
        <div class="left_side">
            <ul class="menu_wrapper" id="menu_wrapper">
                <li class="nav_title">Навигация</li>
                <li class="menu <?php echo $menu_main_name == 'main' ? 'active' : '';?>"><a href="<?php echo base_url('/')?>"><i class="fa fa-home"></i> Рабочий стол</a></li>
                <li class="menu"><a href="#"><i class="fa fa-paper-plane"></i> Страницы</a></li>
                <li class="menu">
                    <a href="javascript:;"><i class="fa fa-suitcase"></i> Товары <span class="angle"><i  class="fa fa-angle-down arrow"></i></span></a>
                    <ul class="sub_menu">

                        <li><a class="sublinks" href="#"><i class="fa fa-plus"></i> Добавить товар</a></li>
                        <li><a class="sublinks" href="#"><i class="fa fa-tasks"></i> Категории</a></li>
                        <li><a class="sublinks" href="#"><i class="fa fa-tags"></i> Бренды</a></li>
                        <li><a class="sublinks" href="#"><i class="fa fa-filter"></i> Свойства</a></li>

                        
                    </ul>
                </li>
                <li class="menu"><a href="#"><i class="fa fa-shopping-cart"></i> Заказы <span class="badge">12</span></a></li>
                <li class="menu"><a href="#"><i class="fa fa-users"></i> Пользователи</a></li>
                <li class="menu <?php echo $menu_main_name == 'storage' ? 'active' : '';?>"><a href="<?php echo base_url('/storage')?>"><i class="fa fa-database"></i> Хранилище</a></li>
                <li class="nav_divider"></li>
                <li class="nav_title">Расширение</li>
                <li class="menu <?php echo $menu_main_name == 'plugins' ? 'active' : '';?>"><a href="<?php echo base_url('/plugins')?>"><i class="fa fa-plug"></i> Плагины</a></li>
                <li class="menu"><a href="#"><i class="fa fa-archive"></i> Модули</a></li>
                <li class="nav_divider"></li>
                <li class="nav_title">Система</li>
                <li class="menu"><a href="#"><i class="fa fa-refresh"></i> Обновление</a></li>
                <li class="menu"><a href="#"><i class="fa fa-gears"></i> Настройки</a></li>
                <li class="menu"><a href="#"><i class="fa fa-server"></i> Сервер</a></li>
                <li class="nav_divider"></li>
                <li class="nav_title">Профиль</li>
                <li class="menu"><a href="#"><i class="fa fa-user"></i> Мой аккаунт</a></li>
                <li class="menu"><a href="#"><i class="fa fa-money"></i> Баланс  <span class="badge_balance">1 045 020.00 <i class="fa fa-ruble"></i></span></a></li>
                <li class="menu"><a href="#"><i class="fa fa-support"></i> Тех. поддержка</a></li>
                <li class="menu"><a href="#"><i class="fa fa-sign-out"></i> Выйти</a></li>
            </ul>
        </div>
        <div class="right_side">
     