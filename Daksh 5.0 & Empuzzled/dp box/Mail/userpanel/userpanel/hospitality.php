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
function disagree()
{
	alert("You can't proceed without agreement.");	
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
	<div id="content" style="color:silver">
	        	<?php  
				include_once('../include/config.php');
				include('check_userdata.php');
				$query="select name from a_users where user_id='".$user->data['user_id']."'";
				$result=mysql_query($query);
				if($result)
					if($row=mysql_fetch_object($result))
						$name=$row->name;
			?>
          	<div id="user" style="font-size:medium">
            	Welcome <span id="username"><?php if(isset($name)) echo $name; else echo $user->data['username']; ?></span>
            </div>
            <?php 
				$q="select coll from a_users where user_id='".$user->data['user_id']."'";
				$r=mysql_query($q);
				if(mysql_num_rows($r))
				{
					if($row=mysql_fetch_assoc($r))
					{
						$coll=$row['coll'];
						if($coll!='SASTRA University, Thanjavur.')
						{
							?>
							<h2>Welcome to the phenomenon that is <b>DAKSH</b></h2>
							<h3>Terms and Conditions:</h3>
                            <ul>
                            	<li>Food and accomodation will be provided.</li>
                                <li>You will be accomodated at SASTRA premises  from 5 pm on 24th february to 8 pm on 27th february 2011.</li>
                                <li>The cost of food and accomodation is Rs. 350/- (which is to be paid at the PR desk upon entering SASTRA campus on "First Come First Serve" basis).</li>
                                <li style="color:green"><b>Whether you stay one day or the full three days the amount to be paid is Rs 350 only.</b></li>
                                <li>&nbsp;</li>
                                <li style="color:green"><b>Trichy Waypoint</b></li>
									<li>There are daily buses/trains to Trichy from Chennai/Bangalore/Coimbatore/Madurai/Hyderabad/Vizag.</li>
									<li>From anywhere in Tamil Nadu and Bangalore there are buses leaving to Trichy in the morning/noon/evening/night.</li>
									<li>Chennai-Trichy : 5Hrs</li>
									<li>Bangalore-Trichy : 6 - 7Hrs</li>
									<li>Coimbatore/Madurai-Trichy : 4 - 5 Hrs</li>
								<li>&nbsp;</li>
								<li style="color:green"><b>From Trichy</b></li>
									<li>there are buses that leave to SASTRA every 5 minutes.</li>
									<li>Trichy-SASTRA : 50min</li>
								<li>&nbsp;</li>
								<li style="color:green"><b>Thanjavur Waypoint</b></li>
									<li>There are daily buses/trains to Thanjavur from Chennai/Bangalore/Coimbatore/Madurai</li>
									<li>There are buses leaving to Thanjavur in the morning/noon/evening/night.</li>
									<li>Chennai-Thanjavur : 6Hrs</li>
									<li>Bangalore-Thanjavur : 7 - 8 Hrs</li>
									<li>Coimbatore/Madurai-Thanjavur : 4 Hrs</li>
								<li>&nbsp;</li>
								<li style="color:green"><b>From Thanjavur new bus stand</b></li>
									<li>there are buses that leave to SASTRA every 5 minutes.</li>
									<li>Thanjavur-SASTRA : 15 min</li>
								<li>&nbsp;</li>
								<li>A <b>mobile application</b> for java-enabled phones will be put for download very soon for your assistance</li>
								<li>&nbsp;</li>
								<li style="color:green"><b>Contact Details:</b></li>
									<li>Prashanth S [+91 98402 79670]</li>
									<li>Niranjana Devi [+91 90950 58379]</li>
                            </ul>
                            <form id="form1" name="form1" method="post" action="hos.php">
                            	<input type="hidden" name="mode" value="agree" />
                            	<input type="submit" id="accept" name="accept" value="Register !"/>
                            	<!--<input type="button" id="dis" name="dis" value="Disagree" onclick="disagree();" />-->
                            </form>
							<?php 
						}
						else
							echo "<p>Hospitality is not for SASTRA University students.</p>";
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
