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
	if($user->data['username']=='Anonymous')
	{
		$username=$_POST['username'];
		$pass=$_POST['pass'];
		$auth->login($username,$pass) or die("You have exceeded maximum trial limit");
		if($user->data['username']=='Anonymous')
		{
			redirect('index.php?msg=error');	
		}
		else
		{
			redirect('user_home.php');
		}
	}
	else
	{
		echo "You are already logged in.<a href='user_home.php'>User Home</a>";
	}
?>