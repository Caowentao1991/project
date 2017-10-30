<?php
if(isset($_SERVER['HTTP_HOST']))
{
    define('HTTP_HOST', $_SERVER['HTTP_HOST']);
}else{
    define('HTTP_HOST', '127.0.0.1');
}

define('GLOBAL_URL'  , 'http://'.HTTP_HOST.'/');

define('SITE_URL'  ,   GLOBAL_URL.'index.php/');

# 引用绝对路径PATH定义
define('ROOT'        , dirname(__FILE__).'/');
define('SHARED_PATH'   , ROOT.'shared/');
define('APPLI_PATH', ROOT.'application/');
define('SITE_PATH',ROOT.'site/');
define('ADMIN_PATH',ROOT.'application/admin/');
