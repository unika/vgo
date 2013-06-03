<?php
defined('ROOT_PATH') or define('ROOT_PATH', dirname(__FILE__));
if (is_file(ROOT_PATH . '/data/Install.lock')) {
	header('Location: ./Index.php');
	exit ;
}
define('APP_NAME', 'Install');
define('APP_PATH', './Install/');
require ("ThinkPHP.php");
