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
<title>Daksh 5.O :: Userpanel-Edit Settings</title>
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
function validate()
{
	var name=document.getElementById('name').value;
	if(name=='')
		document.getElementById('name_msg').innerHTML='required';
	else
	{
		document.getElementById('name_msg').innerHTML='';
		if(document.getElementById('contact').value=='')
			document.getElementById('contact_msg').innerHTML='required';	
		else
		{
			document.getElementById('contact_msg').innerHTML='';
			if(document.getElementById('branch').value=='')
				document.getElementById('branch_msg').innerHTML='required';
			else
			{
				document.getElementById('branch_msg').innerHTML='';
				if(document.getElementById('year').value=='')
					document.getElementById('year_msg').innerHTML='required';
				else
				{
					document.getElementById('year_msg').innerHTML='';
					if(document.getElementById('coll').value=='')
						document.getElementById('coll_msg').innerHTML='required'
					else
						return true;
				}
			}
		}
	}
	return false;
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
            <p><a href="../forum/ucp.php?i=profile&mode=reg_details">Click here</a> to change you email and password.</p>
        	<?php 
				if(isset($_GET['msg']) && $_GET['msg']=='success')
					echo "<p>Your profile has been updated successfully.</p>";
				$q="select name,contact,branch,year,coll from a_users where user_id='".$user->data['user_id']."'";
				$r=mysql_query($q);
				if(mysql_num_rows($r))
				{
				if($row=mysql_fetch_assoc($r))
				{
			?>
        	<h3>Update your Profile:</h3>
        	<form id="form1" name="form1" action="user_settings2.php" method="post">
            	<table width="75%">
                	<tr>
                    	<td><b>Name</b></td>
                        <td><input type="text" class="dataIn" name="name" id="name" value="<?php echo $row['name']; ?>" /></td>
                        <td class="error" id="name_msg"></td>
                    </tr>
                    <tr>
                    	<td><b>Contact</b></td>
                        <td><input type="text" class="dataIn" name="contact" id="contact" value="<?php echo $row['contact']; ?>" /></td>
                        <td class="error" id="contact_msg"></td>
                    </tr>
                    <tr>
                    	<td><b>Branch</b></td>
                        <td><input type="text" class="dataIn" name="branch" id="branch" value="<?php echo $row['branch']; ?>" /></td>
                        <td class="error" id="branch_msg"></td>
                    </tr>
                    <tr>
                    	<td><b>Year</b></td>
                        <td><input type="text" class="dataIn" name="year" id="year" value="<?php echo $row['year']; ?>" /></td>
                        <td class="error" id="year_msg"></td>
                    </tr>
                    <tr>
                    	<td><b>College</b></td>
                        <td><input type="text" class="dataIn" name="coll" id="coll" value="<?php echo $row['coll']; ?>" /></td>
                        <td class="error" id="coll_msg"></td>
                    </tr>
                    <tr>
                    	<td><input type="submit" id="submit" name="submit" value="Submit" onclick="return validate();" /></td>
                        <td><input type="reset" value="Reset" /></td>
                    </tr>
                </table>
            </form>
            <?php 
				}
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
<?php
	}
	else
		redirect('index.php');
?>
