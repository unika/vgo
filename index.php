<?php
defined('ROOT_PATH') or define('ROOT_PATH', dirname(__FILE__));
if (!is_file(ROOT_PATH . '/data/install.lock')) {
	header('Location: ./install.php');
	exit ;
}
define('APP_DEBUG', TRUE);
define("SHOW_MSG_ERROR", TRUE);
define("SHOW_PAGE_TRACE", TRUE);
define('APP_NAME', 'Home');
define('APP_PATH', './Home/');
require ("ThinkPHP.php");
?>