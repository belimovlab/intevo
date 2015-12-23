<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Восстановление пароля</title>
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
                <div class="page_title">Восстановление пароля</div>
                <div class="page_content">
                    <?php if($error):?>
                    <p class="error">
                        <?php echo $error;?>
                    </p>
                    <?php endif;?>
                    <form action="<?php echo base_url('/profile/save_new_password')?>" method="POST">
                    <p>
                        <label for="password">Новый пароль</label>
                        <input type="password" id="password" name="password" placeholder="Введите новый пароль..." required>
                    </p>
                    <p>
                        <label for="re_password">Повторение пароля</label>
                        <input type="password" id="re_password" name="re_password" placeholder="Повторите новый пароль..." required="">
                    </p>
                    <input type="hidden" name="user_email" value="<?php echo $email;?>">
                    <input type="hidden" name="user_active_code" value="<?php echo $active_code;?>">
                    <p style="text-align: center;">
                        <button class="button button-primary button-small" type="submit">Сменить пароль</button>
                    </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="/panel_assets/js/html5_validator.js"></script>
</body>
</html>