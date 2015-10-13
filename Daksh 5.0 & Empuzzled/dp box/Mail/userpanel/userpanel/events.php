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
<title>Daksh 5.O :: Userpanel-Event Registration</title>
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
$(function(){
	var teamname=false;
	var allok=true;
	var max=1;
	var min=1;
	var count=1;
	$('#max').attr('value',max);
	$('#min').attr('value',min);
	document.getElementById('event').selectedIndex=0;
	$('#teamname').blur(function(){
		if($(this).val()=='')
		{
			$('#teamname_msg').html('required');	
			teamname=false;
		}
		else
		{
			$('#teamname_msg').html('');
			$.post('check_teamname.php',{'teamname':$(this).val()},function(data){
				if(data=="true")
				{
					$('#teamname_msg').html('<span style="color:green">Team Name is available</span>');
					teamname=true;
				}
				else
				{
					$('#teamname_msg').html('Team Name not available.');
					teamname=false;
				}
			});
		}
	});
	$('#event').change(function(){
		$('.added').remove();
		count=1;
		$('#submit_msg').html('');
		if($(this).val()!='-')
		{
			$.post('max_min.php?mode=max',{'event':$(this).val()},function(data1){
				max=data1;	
				$('#max').attr('value',max);
			});	
			$.post('max_min.php?mode=min',{'event':$(this).val()},function(data2){
				min=data2;	
				$('#min').attr('value',min);
			});	
		}
	});
	$('#add').click(function(){
		if(count<max)
		{
			$('#up').before("<tr class='added'><td>Member "+(count+1)+"</td><td><input type='text' class='dataIn' name='mem"+count+"'/></tr>");	
			$('#up').before("<tr class='added'><td>Email "+(count+1)+"</td><td><input type='text' class='dataIn' name='email"+count+"'/></tr>");
			$('#up').before("<tr class='added'><td>Contact "+(count+1)+"</td><td><input type='text' class='dataIn' name='contact"+count+"'/></tr>");
			count++;
		}
		else
			$('#submit_msg').html('Maximum Limit reached');
	});
	$('#form2').submit(function(){
		if($('#event').val()!='-')
		{
			if(teamname)
			{
				$('.dataIn').each(function(){
					if($(this).val()=='')
					{
						$('#submit_msg').html('All fields are required.');
						allok=false;
						return false;
					}
					else
						allok=true;
				});
				return allok;
			}
			else 
			{
				$('#submit_msg').html('Kindly fill the form completely.');
				return false;		
			}
		}
		return false;							
	});
});
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
            <h3>Register for events here</h3>
            <form id="form2" method="post" name="form2" action="events2.php">
                <table>
                    <tr>
                        <td>Event Name</td>
                        <td>
                            <select id="event" name="event" class="dataIn">
                                <option value="-">---------------</option>
                            <?php 
                                $q1="select event_id,event_name from a_events order by event_name";
                                $r1=mysql_query($q1);
                                if($r1)
                                {
                                    while($row1=mysql_fetch_object($r1))
                                    {
                                    ?>
                                    <option value="<?php echo $row1->event_id; ?>"><?php echo $row1->event_name; ?></option>
                                    <?php 	
                                    }
                                }
                            ?>
                            </select>
                        </td>
                        <td class="error" id="event_msg"></td>
                    </tr>
                    <tr>
                        <td>Minimum Participant</td>
                        <td><input type="text" class="dataIn" readonly="readonly" id="min" name="min" /></td>
                    </tr>
                    <tr>
                        <td>Maximum Participant</td>
                        <td><input type="text" class="dataIn" readonly="readonly" id="max" name="max" /></td>
                    </tr>
                    <tr>
                        <td>Team Name</td>
                        <td><input type="text" class="dataIn" id="teamname" name="teamname" /></td>
                        <td class="error" id="teamname_msg"></td>
                    </tr>
                    <tr id="up">
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><input type="submit" id="reg" name="reg" value="Register" /></td>
                        <td><input type="button" id="add" value="Add Member" /></td>
                        <td class="error" id="submit_msg"></td>
                    </tr>
                </table>
            </form>
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
