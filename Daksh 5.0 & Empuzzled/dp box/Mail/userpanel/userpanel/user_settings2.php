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
		include('../include/config.php');
		$name=$_REQUEST['name'];
		$contact=$_REQUEST['contact'];
		$branch=$_REQUEST['branch'];
		$year=$_REQUEST['year'];
		$coll=$_REQUEST['coll'];
		$query="update a_users set `name`='".$name."',`contact`='".$contact."',`branch`='".$branch."',`year`='".$year."',`coll`='".$coll."' where user_id='".$user->data['user_id']."'";
		mysql_query($query);
		?>
		<script type="text/javascript">
        	location="user_settings.php?msg=success";
        </script>
		<?php
	}
	else
		redirect('index.php');
?>