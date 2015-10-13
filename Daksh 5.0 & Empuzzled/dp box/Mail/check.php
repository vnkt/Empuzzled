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
			?>
			<script type="text/javascript">
            	location='reg.htm';
            </script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
            	location='index.php';
            </script>
			<?php
		}
	}
	else
	{
		echo "You are already logged in.<a href='index.php'>User Home</a>";
	}
?>