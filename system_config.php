<?php

    ini_set('display_errors', 0);
    if (version_compare(PHP_VERSION, '5.3', '>='))
    {
            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
    }
    else
    {
            error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
    }
    define(INSTALLED, 1);
    define(SITE_URL,'http://intevo.cms/');
    define(SITE_PANEL_URL,'http://intevo.cms/panel/');
    define(SITE_TITLE,'Intevo.CMS - Новейшая CMS');
    define(SITE_SET_SESS_PATH,'cache_sess');
    define(ENCRYPTION_KEY,'Super_secret_key_5203');
    define(DB_HOST,'localhost');
    define(DB_USER,'root');
    define(DB_PASSWORD,'pass');
    define(DB_NAME,'intevo');