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
		$user->session_kill();
		$user->session_begin();	
	}
?>
<script type="text/javascript">
	location="index.php";
</script>
<html>
<img src="../images/ajax-loader(1).gif" />
</html>