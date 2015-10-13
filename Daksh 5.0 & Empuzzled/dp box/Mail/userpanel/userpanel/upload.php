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
<title>Daksh 5.O :: Userpanel-Files</title>
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
<script type="text/javascript">
function filedel(filepath)
{
	var decide=confirm("Do you want to delete this uploaded file?");
	if(decide)
	{
		return true;
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
            <?php 
				$q="select teamname from a_teamname where user_id='".$user->data['user_id']."' and event_id in (15,17)";
				$r=mysql_query($q);
				if(mysql_num_rows($r))
				{
			?>
					<ul>
                    	<li>Maximum file upload size is 5 MB.</li>
                        <li>Only ZIP and RAR files are allowed for uploading.</li>
                        <li>The participation of contestent will be rejected, if file contains malicious softwares.</li>
                        <li>If multiple files are uploaded, the latest one will be consider for event participation.</li>
                    </ul>
                    <h3>Upload File</h3>
                    <form action="fileUpload.php" method="post" name="form1" id="form1" enctype="multipart/form-data">
                    	<table>
                        	<tr>
                            	<td>Teamname:</td>
                                <td><select id="teamname" name="teamname" class="dataIn">
                                <?php 
									while($row=mysql_fetch_assoc($r))
									{
										echo "<option>".$row['teamname']."</option>";	
									}
								?>
                                </select></td>
                            </tr>
                            <tr>
                            	<td>
                                	Select File
                                	<input name="MAX_FILE_SIZE" value="5120000" type="hidden" />
                                </td>
                                <td><input type="file" id="upload" name="upload" accept="application/x-zip-compressed" /></td>
                            </tr>
                            <tr>
                            	<td><input type="submit" id="submit" name="submit" value="Upload" /></td>
                            </tr>
                        </table>
                    </form>
			<?php
				}
				else echo "<p>File Upload is available for event liveWIRE, Web-Sense only, and you have not registered for these events.</p>";
				$qr="select event_id,teamname,filepath from a_files where user_id='".$user->data['user_id']."'";
				$rr=mysql_query($qr);
				if(mysql_num_rows($rr))
				{
				?>
				<h3>Manage Uploaded files.</h3>
                <table width="100%" align="center" style="color:white">
                	<tr>
                    	<th>Sl No</th>
                        <th>Teamname</th>
                        <th>Event Name</th>
                        <th>File Name</th>
                        <th>Operations</th>
                    </tr>
                    <?php 
						$i=0;
						while($r=mysql_fetch_assoc($rr))
						{
							$event="select event_name from a_events where event_id='".$r['event_id']."'";
							$r_event=mysql_query($event);
							if($f_event=mysql_fetch_assoc($r_event))
								$event_name=$f_event['event_name'];
							$arr=explode("_",$r['filepath']);
							?>
							<tr>
                            	<td><?php echo ++$i; ?></td>
                                <td><?php echo $r['teamname']; ?></td>
                                <td><?php echo $event_name; ?></td>
                                <td><?php echo $arr[2]; ?></td>
                                <td><a href="del_file.php?file=<?php echo $r['filepath']; ?>" onclick="return filedel('<?php echo $r['filepath']; ?>');"><img src="../images/delete.png" title="delete" alt="delete" border="0" /></a></td>
                            </tr>
							<?php
						}
					?>
                </table>
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
<?php
	}
	else
		redirect('index.php');
?>
