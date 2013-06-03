<?php
defined('ROOT_PATH') or define('ROOT_PATH', dirname(__FILE__));
if (!is_file(ROOT_PATH . '/data/install.lock')) {
    header('Location: ./install.php');
    exit;
}
define('APP_DEBUG', TRUE);
define('APP_NAME', 'Admin');
define('APP_PATH', './Admin/');

require("ThinkPHP.php");
?>