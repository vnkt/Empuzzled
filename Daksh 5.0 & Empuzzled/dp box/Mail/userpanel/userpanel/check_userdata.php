<?php 
	include_once('../include/config.php');
	$query="select name from a_users where user_id='".$user->data['user_id']."'";
	$result=mysql_query($query);
	if(mysql_num_rows($result)==0)
	{
	?>
	<script type="text/javascript">
    	location='user_data.php';
    </script>
	<?php	
	}
?>