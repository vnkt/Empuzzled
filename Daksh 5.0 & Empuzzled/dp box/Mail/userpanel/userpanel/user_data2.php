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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include('../include/metainfo.php'); ?>
<title>Daksh Userpanel :: Data Collection</title>
<link rel="shortcut icon" href="../images/favico.ico" title="Daksh 2010" />
<link rel="alternate" title="Daksh RSS Feed" href="../rss/rss.xml" type="application/rss+xml" />
<!--[if lte IE 6]>
	<link rel="stylesheet" href="../CssJs/daksh-IE.css" type="text/css" media="screen" />
    <script type="text/javascript" src="../CssJs/DD_belatedPNG_0.0.8a-min.js"></script>
	<script type="text/javascript" src="../CssJs/ie-fix.js"></script>
<![endif]-->
</head>

<body>
<div id="page">
	<div class="header png">
    	<div id="home-logo">
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
        </div>
    </div>
    <div class="middle png">
    	<div id="left-coloumn" style="text-align:left;">
        	<?php 
				$query="select name from a_users where user_id='".$user->data['user_id']."'";
				$result=mysql_query($query);
				if(mysql_num_rows($result)>0)
				{
			?>
				<script type="text/javascript">
                    location='user_home.php';
                </script>
			<?php	
				}
				  $name=$_POST['name'];
				  $contact=$_POST['contact'];
				  $branch=$_POST['branch'];
				  $year=$_POST['year'];
				  $coll=$_POST['coll'];
				  if($coll=='nill')
					  $coll=$_POST['txt_coll'];
				  $q="insert into a_users values('".$user->data['user_id']."','".$name."','".$contact."','".$branch."','".$year."','".$coll."')";
				  $r=mysql_query($q);
				  if($r)
					  echo "<p><b>Your data has been saved, Thank You.</b></p>";
				  else 
					  echo "<p><b>Process failed, Kindly try again.</b></p><br /><a href='user_data.php'>Try Again</a>";
			  ?>  
        </div>
        <div id="right-coloumn">
        	<ul id="usermenu">
            	<li><a href="user_home.php">Home</a></li>
                <li><a href="user_settings.php">Settings</a></li>
                <li><a href="events.php">Events</a></li>
                <li><a href="hospitality.php">Hospitality</a></li>
                <li><a href="upload.php">File Upload</a></li>
                <li><a href="../forum/">Forum</a></li>
                <li><a href="../">Daksh Home</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <div style="clear:both;height:10px;"></div>
    </div>
    <div class="bottom png"></div>
</div>
</body>
</html>
<?php
	}
	else
		redirect('index.php');
?>