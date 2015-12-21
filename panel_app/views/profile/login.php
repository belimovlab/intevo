<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Войти в панель управления</title>
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
            <a href="<?php echo base_url('/')?>"><i class="fa fa-gears"></i> Intevo.cms</a>
        </div>
        <div class="license">
        </div>
        <div class="logout">
            <a href="<?php echo base_url('/profile/login')?>"><i class="fa fa-sign-in"></i> Войти</a>
        </div>
    </header>
    <div class="main_wrapper">
        <div class="login">
            <div class="page">
                <div class="page_title">Войти в панель управления</div>
                <div class="page_content">
                    <?php if($error):?>
                    <p class="error">
                        <?php echo $error;?>
                    </p>
                    <?php endif;?>
                    <form action="<?php echo base_url('/profile/try_login')?>" method="POST">
                    <p>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Введите ваш Email..." required>
                    </p>
                    <p>
                        <label for="password">Пароль</label>
                        <input type="password" id="password" name="password" placeholder="Введите ваш пароль..." required="">
                    </p>
                    <p style="text-align: center;">
                        <button class="button button-primary button-small" type="submit">Войти в панель</button>
                    </p>
                    <p style="text-align: center;">
                        <a href="<?php echo base_url('/profile/forgot')?>">Забыли пароль?</a>
                    </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>