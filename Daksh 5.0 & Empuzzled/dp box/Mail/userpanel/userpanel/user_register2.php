<?php 
	include_once('../include/config.php');
	
	define('IN_PHPBB', true);
	$phpbb_root_path = "../forum/";
	$phpEx = "php";
	include($phpbb_root_path . 'common.' . $phpEx);
	include_once($phpbb_root_path . 'includes/functions.' . $phpEx);	
	include_once($phpbb_root_path . 'includes/functions_user.' . $phpEx);
	$user->session_begin();
	$auth->acl($user->data);
	$user->setup();
	
	
	$name=$_POST['fname']." ".$_POST['lname'];
	$username=$_POST['username'];
	$pwd=$_POST['pwd'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$branch=$_POST['branch'];
	$year=$_POST['year'];
	$coll=$_POST['coll'];
	if($coll=='nill')
		$coll=$_POST['txt_coll'];
		
	//Register the user for PHPBB
	$user_row = array(
						'username'              => $username,
						'user_password'         => phpbb_hash($pwd),
						'user_email'            => $email,
						'group_id'              => 2, // by default, the REGISTERED user group is id 2
						'user_timezone'         => (float)+5.5,
						'user_lang'             => "English",
						'user_type'             => USER_NORMAL,
						'user_ip'               => $user->ip,
						'user_regdate'          => time(),
						);
	$user_id = user_add($user_row); //User added to PHPBB
	if($user_id)
	{
		$query="insert into a_users values('".$user_id."','".$name."','".$contact."','".$branch."','".$year."','".$coll."')";
		$result=mysql_query($query);
		$othermodquery="insert into daksh_rating_users(username,firstname,password,role,firsttime,event_id) values('".$username."','".$name."','".$pwd."','voter','1','0')";
		$result1=mysql_query($othermodquery);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<?php include('../include/metainfo.php'); ?>
<title>Daksh 5.O :: Userpanel-Register</title>
<link href="../images/favico.ico" rel="shortcut icon" title="Daksh 2010" />
<link href="../CssJs/daksh.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../rss/rss.xml" rel="alternate" title="Daksh RSS Feed" type="application/rss+xml" />
<script src="../CssJs/jquery.js" type="text/javascript"></script>
<script src="CssJs/nojquery.js" type="text/javascript"></script>
<style type="text/css">
@import url('../css.css');
</style>
<style type="text/css">
.new {
	color: white;
}
.new ul li a {
	color: white;
	text-decoration: underline;
}
</style>
<script src="../js.js" type="text/javascript"></script>
<!--[if lte IE 6]>
<link href="CssJs/daksh-IE.css" media="screen" rel="stylesheet" type="text/css" />
<script src="CssJs/DD_belatedPNG_0.0.8a-min.js" type="text/javascript"></script>
<script src="CssJs/ie-fix.js" type="text/javascript"></script>
<![endif]-->
</head>

<body>

<!--<div id="upbar"></div>-->
<!-- Update Box -->
<div id="Update_button">
	U<br />
	p<br />
	d<br />
	a<br />
	t<br />
	e<br />
	s </div>
<div id="news" style="z-index: 1">
	<div class="new">
		<h1 style="margin: 0 auto">Updates</h1>
		<h2 style="padding-left: 20px;">Forum and Blog released</h2>
		<ul>
			<?php
			include("../Main/news.php");
		?>
		</ul>
	</div>
</div>
<!-- End Update Box -->
<!-- Like Box  -->
<div id="likebox_layer">
</div>
<!-- End Update Box-->
<!-- MenuBar -->
<div id="menu_dock" class="png menuZ bottombar">
</div>
<div id="menu_dock_rite">
</div>
<div id="socialize" style="position: fixed; left: 0%; top: 40%; background: #FFFFFF; width: 30px;">
	<a href="http://www.facebook.com/pages/Daksh-50/182651168430579" target="_blank">
	<img onmouseout="this.style.top='0px'" onmouseover="this.style.top='5px'" src="../images/socialize/fb2.png" style="position: relative" /></a>
	<a href="http://twitter.com/DAKSH_11" target="_blank">
	<img onmouseout="this.style.top='0px'" onmouseover="this.style.top='5px'" src="../images/socialize/tw1.png" style="position: relative" /></a>
	<a href="../rss/rss.xml" target="_blank">
	<img onmouseout="this.style.top='0px'" onmouseover="this.style.top='5px'" src="../images/socialize/rss2.png" style="position: relative" /></a>
</div>
<!-- End MenuBar -->
<img alt="DAKSH 5.O" src="../images/Dlogo.png" style="margin: 5px auto;" width="100%" />
<!-- Content Box -->
<div id="wrapper">
	<ul id="nav">
            	<li><a href="index.php">Login</a></li>
                <li><a href="user_register.php">Register</a></li>
                <li><a href="../forum/">Forum</a></li>
                <li><a href="../">Daksh Home</a></li>
	</ul>
	<div id="content">
	        	<h3>Daksh User Registration</h3>
              <br />
              <br />
              <?php 
                  if($result)
                  {
                  ?>
                      <p><b>You have been registered successfully.</b></p>
                      <br />
                      <a href="index.php">Login</a>
                  <?php	
                  }
                  else
                  {
                  ?>
                    <p>Sorry registration failed.</p>
                    <br />
                    <a href="user_register.php">Kindly try Again.</a>
                  <?php	
                  }
              ?>
	</div>
</div>
<!-- End Content Box -->
<!-- Tint -->
<!-- End Tint -->
<!-- End Like Box -->
<script src="../CssJs/main.js" type="text/javascript"></script>
<!-- Load Everything --><!--Loaded whatever required -->
</body>
</html>
