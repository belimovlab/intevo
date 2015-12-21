<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Панель администратора</title>
    <link href="/panel_assets/css/normilize.css" rel="stylesheet" type="text/css"/>
    <link href="/panel_assets/css/common.css" rel="stylesheet" type="text/css"/>
    <link href="/panel_assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/panel_assets/css/component.css" rel="stylesheet" type="text/css"/>
    <script src="/panel_assets/js/jquery-2.1.1.min.js"></script>
    <script src="/panel_assets/js/classie.js"></script>
    <meta name="viewport" content="width=1200px">
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


</head>
<body>
    <header>
        <div class="logo">
            <a href="#"><i class="fa fa-gears"></i> Intevo.cms</a>
        </div>
        <div class="license">
            <a href="#">Лицензия № 2015-012-005</a>
            <a href="#"><i class="fa fa-gears"></i></a>
            <a href="#"><i class="fa fa-refresh"></i></a>
            <a href="#"><i class="fa fa-envelope"></i> <span class="badge_license">12</span></a>
            <a href="#"><i class="fa fa-exclamation-triangle"></i> <span class="badge_license">12</span></a>
        </div>
        <div class="logout">
            <a href="<?php echo base_url('/profile/logout')?>"><i class="fa fa-sign-out"></i> Выйти</a>
        </div>
    </header>
    <div class="main_wrapper">
        <div class="left_side">
            <ul class="menu_wrapper" id="menu_wrapper">
                <li class="nav_title">Навигация</li>
                <li class="menu"><a href="#"><i class="fa fa-home"></i> Рабочий стол</a></li>
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
                <li class="menu"><a href="#"><i class="fa fa-database"></i> Хранилище</a></li>
                <li class="nav_divider"></li>
                <li class="nav_title">Расширение</li>
                <li class="menu"><a href="#"><i class="fa fa-plug"></i> Плагины</a></li>
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
                <li class="menu">
                    <a href="javascript:;"><i class="fa fa-suitcase"></i> Товары <span class="angle"><i  class="fa fa-angle-down arrow"></i></span></a>
                    <ul class="sub_menu">

                        <li><a class="sublinks" href="#"><i class="fa fa-plus"></i> Добавить товар</a></li>
                        <li><a class="sublinks" href="#"><i class="fa fa-tasks"></i> Категории</a></li>
                        <li><a class="sublinks" href="#"><i class="fa fa-tags"></i> Бренды</a></li>
                        <li><a class="sublinks" href="#"><i class="fa fa-filter"></i> Свойства</a></li>

                        
                    </ul>
                </li>
                <li class="menu"><a href="#"><i class="fa fa-sign-out"></i> Выйти</a></li>
            </ul>
        </div>
        <div class="right_side">
            <div class="page_header">
                <ul class="breadcrumb">
                    <li><a href="#">Рабочий стол </a></li>
                    <li class="active">Настройки </li>
                </ul>
            </div>
            <div class="page_wrapper">
                
                
                
                

                <div class="page">
                    <div class="page_title">Настройки сайта</div>
                    <div class="page_content">
                        <div class="grid_container">
                            <div class="grid_item_2">
                                <p>
                                    <label for="site_name">Название сайта</label>
                                    <input type="text" id="site_name" placeholder="Название магазина">
                                </p>
                            </div>
                            <div class="grid_item_2">
                                <p>
                                    <label for="site_name">Адрес почтовый</label>
                                    <input type="text" id="site_name" placeholder="Н-р: 644880, Россия, Омская обл., с. Азово, ул. Волжская, 21">
                                </p>
                            </div>
                            <div class="grid_item_4">
                                <p>
                                    <label for="site_name">Текстовый блок</label>
                                    <textarea type="text" id="site_name" placeholder="Н-р: 644880, Россия, Омская обл., с. Азово, ул. Волжская, 21"></textarea>
                                </p>
                            </div>
                        </div>
                        
                        <div class="grid_container">
                            <div class="grid_item_1">
                                <p>
                                    <label for="site_name">Название сайта</label>
                                    <input type="text" id="site_name" placeholder="Название магазина">
                                </p>
                            </div>
                            <div class="grid_item_3">
                                <p>
                                    <label for="site_name">Доставка</label>
                                    <input type="text" id="site_name" placeholder="Название магазина">
                                </p>
                            </div>
                        </div>
                         
                         

                    </div>
                </div>
                <div class="page">
                    <div class="page_title">Файловый менеджер</div>
                    <div class="page_content">
                        <div class="filemanager">
                            <p>
                                <a class="button button-primary button-small"><i class="fa fa-plus"></i> Добавить новую папку</a>
                                <a class="button button-action button-small"><i class="fa fa-upload"></i> Загрузить новый файл</a>
                                или 
                            </p>
                            <p style="margin: 30px 0px;">
                            <div id="dropzone"><form action="/upload" class="dropzone needsclick dz-clickable" id="demo-upload"><div class="dz-message needsclick">Перетащите файлы сюда</div></form></div>
                            </p>
                            <div style="clear: both;"></div>
                            <p>
                            <table class="simple">
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>Название</th>
                                        <th>Тип</th>
                                        <th>Размер</th>
                                        <th>Дата</th>
                                        <th>Операции</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><i class="fa fa-folder" style="color: #FFB300;"></i></td>
                                        <td><strong>Photography</strong></td>
                                        <td>Папка</td>
                                        <td>-</td>
                                        <td>09.12.2015</td>
                                        <td>
                                            <a href="#"><i class="fa fa-eye"></i></a>
                                            <a href="#"><i class="fa fa-link"></i></a>
                                            <a href="#"><i class="fa fa-trash"></i></a>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-folder" style="color: #FFB300;"></i></td>
                                        <td><strong>Images</strong></td>
                                        <td>Папка</td>
                                        <td>-</td>
                                        <td>05.12.2015</td>
                                        <td>
                                            <a href="#"><i class="fa fa-eye"></i></a>
                                            <a href="#"><i class="fa fa-link"></i></a>
                                            <a href="#"><i class="fa fa-trash"></i></a>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-folder" style="color: #FFB300;"></i></td>
                                        <td><strong>System</strong></td>
                                        <td>Папка</td>
                                        <td>-</td>
                                        <td>04.12.2015</td>
                                        <td>
                                            <a href="#"><i class="fa fa-eye"></i></a>
                                            <a href="#"><i class="fa fa-link"></i></a>
                                            <a href="#"><i class="fa fa-trash"></i></a>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-file-image-o"></i></td>
                                        <td><strong>logo.png</strong></td>
                                        <td>Файл</td>
                                        <td>100Kb</td>
                                        <td>09.12.2015</td>
                                        <td>
                                            <a href="#"><i class="fa fa-eye"></i></a>
                                            <a href="#"><i class="fa fa-link"></i></a>
                                            <a href="#"><i class="fa fa-trash"></i></a>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-file-pdf-o"></i></td>
                                        <td><strong>instructions.pdf</strong></td>
                                        <td>Файл</td>
                                        <td>100Kb</td>
                                        <td>09.12.2015</td>
                                        <td>
                                            <a href="#"><i class="fa fa-eye"></i></a>
                                            <a href="#"><i class="fa fa-link"></i></a>
                                            <a href="#"><i class="fa fa-trash"></i></a>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-file-excel-o"></i></td>
                                        <td><strong>stylsheed.xls</strong></td>
                                        <td>Файл</td>
                                        <td>100Kb</td>
                                        <td>09.12.2015</td>
                                        <td>
                                            <a href="#"><i class="fa fa-eye"></i></a>
                                            <a href="#"><i class="fa fa-link"></i></a>
                                            <a href="#"><i class="fa fa-trash"></i></a>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-file-text-o"></i></td>
                                        <td><strong>passwords.txt</strong></td>
                                        <td>Файл</td>
                                        <td>100Kb</td>
                                        <td>09.12.2015</td>
                                        <td>
                                            <a href="#"><i class="fa fa-eye"></i></a>
                                            <a href="#"><i class="fa fa-link"></i></a>
                                            <a href="#"><i class="fa fa-trash"></i></a>
                                            
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </p>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/panel_assets/js/app.js"></script>
</body>
</html>