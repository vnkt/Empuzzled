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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<?php include('../include/metainfo.php'); ?>
<title>Daksh 5.O :: Userpanel-Hospitality</title>
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
<script type="text/javascript">
function check()
{
	if(document.getElementById('gender').value!='-')
		return true;
	else
		document.getElementById('msg').innerHTML='Select your gender.';
	return (false);
}
</script>
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
            	<li><a href="user_home.php">Home</a></li>
                <li><a href="user_settings.php">Settings</a></li>
                <li><a href="events.php">Events</a></li>
                <li><a href="hospitality.php">Hospitality</a></li>
                <li><a href="upload.php">File Upload</a></li>
                <li><a href="../forum/">Forum</a></li>
                <li><a href="../">Daksh Home</a></li>
                <li><a href="logout.php">Logout</a></li>
	</ul>
	<div id="content">
	        	<?php  
				include_once('../include/config.php');
				include('check_userdata.php');
				$query="select name from a_users where user_id='".$user->data['user_id']."'";
				$result=mysql_query($query);
				if($result)
					if($row=mysql_fetch_object($result))
						$name=$row->name;
			?>
          	<div id="user">
            	Welcome <span id="username"><?php if(isset($name)) echo $name; else echo $user->data['username']; ?></span>
            </div>
            <?php
				if(isset($_GET['mode']) && $_GET['mode']=='sucess')
					echo "<p>You have been successfully registered.</p>";
				else
				if(isset($_POST['mode']) && $_POST['mode']=='agree')
				{
					$q="select name from a_hosp where user_id='".$user->data['user_id']."'";
					$r=mysql_query($q);
					if(mysql_num_rows($r)==0)
					{
			?>
				<form id="form2" name="form2" action="hos2.php" method="post">
                <p>Select your gender:</p>
                <table width="75%">
                	<tr>
                    	<td><b>Gender</b></td>
                        <td>
                        	<select id="gender" name="gender">
                            	<option value="-">-----</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </td>
                        <td id="msg" class="error"></td>
                    </tr>
                    <tr>
                    	<td><input type="submit" id="submit" onClick="return check();" value="submit" /></td>
                    </tr>
                </table>
                </form>
			<?php 
					}
					else
						echo "<p>You are already registered.</p>";
				}
				else
					echo "<p>You are trying to visit this page illegally.</p>";
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
<?php
	}
	else
		redirect('index.php');
?>
