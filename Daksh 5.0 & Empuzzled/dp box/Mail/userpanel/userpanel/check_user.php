<?php 
	include_once('../include/config.php');
	$username=$_REQUEST['username'];
	$username=strtolower($username);
	$query="SELECT user_id FROM phpb_users where username_clean='$username'";
	$result=mysql_query($query);
	if(mysql_num_rows($result)==0)
		echo "true";
	else
		echo "false";
?>