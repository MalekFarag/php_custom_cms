<?php
define('ABSPATH', __DIR__);
define('ADMIN_PATH', ABSPATH . '/admin');
define('ADMIN_SCRIPT_PATH', ADMIN_PATH . '/scripts');

ini_set('display_errors', 1);
session_start();

//database link
require_once ABSPATH.'/config/database.php';

//phpmailer
require_once ABSPATH.'/phpmailer/Exception.php';
require_once ABSPATH.'/phpmailer/OAuth.php';
require_once ABSPATH.'/phpmailer/PHPMailer.php';
require_once ABSPATH.'/phpmailer/POP3.php';
require_once ABSPATH.'/phpmailer/SMTP.php';

//admin stuff
require_once ADMIN_SCRIPT_PATH.'/read.php';
require_once ADMIN_SCRIPT_PATH.'/login.php';
require_once ADMIN_SCRIPT_PATH.'/functions.php';
require_once ADMIN_SCRIPT_PATH.'/user.php';
require_once ADMIN_SCRIPT_PATH.'/product.php';
