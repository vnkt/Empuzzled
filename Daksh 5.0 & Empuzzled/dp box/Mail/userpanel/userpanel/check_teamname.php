<?php 
	$teamname=$_REQUEST['teamname'];
	include_once('../include/config.php');
	$query="select teamname from a_teamname where teamname='".$teamname."'";
	$result=mysql_query($query);
	if($result)
	{
		if(mysql_num_rows($result)>0)
			echo "false";
		else
			echo "true";
	}
?>