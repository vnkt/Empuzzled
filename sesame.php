<?php 	
	define('IN_PHPBB', true);
	$phpbb_root_path = "../forum/";
	$phpEx = "php";
	include($phpbb_root_path . 'common.' . $phpEx);
	include_once($phpbb_root_path . 'includes/functions.' . $phpEx);	
	include_once($phpbb_root_path . 'includes/functions_user.' . $phpEx);
	$user->session_begin();
	$auth->acl($user->data);
	$user->setup();
	if($user->data['username']!='Anonymous')
	{
?>
<?php include_once("analyticstracking.php") ?>
<?php
	include_once("../include/config.php");
	$upd="update emp_users set level=".(14).", time = now() where user_id=".$user->data['user_id'];
	mysql_query($upd);
	header('Location: 10.php');
?>
<?php
$_GET['l']=100;
	}
	else
		redirect('check.php');
?>