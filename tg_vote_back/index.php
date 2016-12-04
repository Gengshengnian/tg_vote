<?php

//以下一行显示请先登录不乱吗 但是验证码出不来
//echo '<meta charset=utf-8 >';//"<meta charset='utf-8' >"

define('APP_DEBUG', true);//加一个调试模式 没有视图情况下直接echo报错
define('APP_PATH', './Application/');

require './ThinkPHP/ThinkPHP.php';
