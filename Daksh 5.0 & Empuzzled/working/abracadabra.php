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
<html>
<head>
	<title>The End</title>
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
	<div style="width: 500px;">
		<h1>Congratulations</h1>
		<p>You've successfully completed Empuzzled :)</p>
		<p>Mail your details to "ideas@daksh.sastra.edu" to be included in the hall of fame </p>
	</div>
</body>
</html>
<?php
$_GET['l']=100;
	}
	else
		redirect('check.php');
?>