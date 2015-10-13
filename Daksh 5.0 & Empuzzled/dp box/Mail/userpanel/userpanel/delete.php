<?php 
	include('../include/config.php');
	$teamname=$_REQUEST['teamname'];
	$q1="delete from a_members where teamname='".$teamname."'";
	$q2="delete from a_teamname where teamname='".$teamname."'";
	mysql_query($q1);
	mysql_query($q2);
?>
<script type="text/javascript">
location="user_home.php";
</script>