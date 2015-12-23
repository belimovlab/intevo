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
                    <?php if($success):?>
                    <p class="success">
                        <?php echo $success;?>
                    </p>
                    <?php endif;?>
                    <form action="<?php echo base_url('/profile/try_forgot')?>" method="POST">
                    <p>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Введите ваш Email..." required>
                        <span class="sub_input">На указанный Email придет уведомление с инструкцией для смены пароля.</span>
                    </p>

                    <p style="text-align: center;">
                        <button class="button button-highlight button-small" type="submit">Выслать новый пароль</button>
                    </p>
                    <p style="text-align: center;">
                        <a href="<?php echo base_url('/profile/login')?>"> Я помню пароль</a>
                    </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>