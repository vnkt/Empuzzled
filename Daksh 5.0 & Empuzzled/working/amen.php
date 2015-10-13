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
	
	include_once("../include/config.php");
	$qu="select level from emp_users where user_id=".$user->data['user_id'];
		$res = mysql_query($qu);
		if(mysql_num_rows($res))
		{
			if($row=mysql_fetch_assoc($res))
			{
				$level=$row['level'];
			}
		}	
	
	if($user->data['username']!='Anonymous')
	{

?>
<html>
<head>
	<title>Where ?</title>
	<link rel="stylesheet" type="text/css" href="default.css" />
</head>
<body>
	<?php include_once("analyticstracking.php") ?>
	<div id="logo">
        <div id="logo_text">
          <h1><a href="index.tml">Empuzzled @ Daksh 5.0</a></h1>
		</div>
	</div>
	<div id="menubar">
        <ul id="menu">
          <li><a href="score.php">Score table</a></li>
         <li><a href="logout.php">Log out [ <?php echo $user->data['username'] ?> ] </a></li>
        </ul>
    </div>
	<center>
		<br/>
		<p><img src="abcd.jpg"  alt="" /></p>
	</center>
	<br>
	<form id="answer-form" action="process.php" method="post">
		<input type="text" name="answer" /> <input type="submit" value="submit" name="submit2" />
	</form>
</body>
</html>
<?php
$_GET['l']=100;
	}
	else
		redirect('check.php');
?>