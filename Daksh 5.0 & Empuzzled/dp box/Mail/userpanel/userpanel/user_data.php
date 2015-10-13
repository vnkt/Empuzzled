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
<script type="text/javascript">
function coll_select()
{
	var coll=document.getElementById('coll').value;
	if(coll=='nill')
	{
		document.getElementById('default_coll').style['display']='none';	
		document.getElementById('alt_coll').style['display']='block';
	}
}
function alt_college()
{
	if(document.getElementById('txt_coll').value=='Your College Name')
		document.getElementById('txt_coll').value='';
}
function validate()
{
	if(document.getElementById('name').value=='')
	{
		document.getElementById('name_msg').innerHTML="required";
		return false;
	}
	else {
		if(document.getElementById('contact').value=='')
		{
			document.getElementById('contact_msg').innerHTML="required";
			return false;
		}
		else
			return true;
	}
	return false;	
}
</script>
</head>

<body>
<?php include('header.php'); ?>
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
        	<h3>Kindly enter the data again, sorry for inconvenience</h3>
              <form id="form1" name="form1" action="user_data2.php"  method="post">
                  <table>
                      <tr>
                          <td>Name</td>
                          <td><input type="text" class="dataIn" name="name" id="name"  /></td>
                          <td id="name_msg" class="error"></td>
                      </tr>
                      <tr>
                          <td>Contact</td>
                          <td><input type="text" id="contact" name="contact" class="dataIn" /></td>
                          <td class="error" id="contact_msg"></td>
                      </tr>
                      <tr>
                          <td>Branch</td>
                          <td>
                              <select id="branch" name="branch"  class="dataIn">
                                  <option>Bio-Technology</option>
                                  <option>Bio-Informatics</option>
                                  <option>Bio-Engineering</option>
                                  <option>CSE</option>
                                  <option>Chemical</option>
                                  <option>Civil</option>
                                  <option>ECE</option>   
                                  <option>EEE</option>   
                                  <option>EIE</option>
                                  <option>IT</option>
                                  <option>ICT</option>
                                  <option>Mechanical</option>
                                  <option>Mechatronics</option>
                                  <option>Nanotechnology</option>
                                  <option>Others</option>
                              </select>
                          </td>
                      </tr>
                      <tr>
                          <td>Year of study</td>
                          <td><select id="year" name="year"  class="dataIn">
                                  <option value="B.Tech-1st year">B.Tech-1st year</option>
                                  <option value="B.Tech-2nd year">B.Tech-2nd year</option>
                                  <option value="B.Tech-3rd year">B.Tech-3rd year</option>
                                  <option value="B.Tech-4th year">B.Tech-4th year</option>
                                  <option value="B.Tech-5th year">B.Tech-5th year</option>
                                  <option value="M.Tech-1st year">M.Tech-1st year</option>
                                  <option value="M.Tech-2nd year">M.Tech-2nd year</option>
                                  <option value="others">Others</option>
                              </select></td>
                      </tr>
                      <tr>
                          <td>College</td>
                          <td id="default_coll">
                              <select name="coll" id="coll"  class="dataIn" onchange="coll_select();">
                                  <?php include('coll.php'); ?>
                              </select>
                          </td>
                          <td id="alt_coll" style="display:none"><input type="text"  class="dataIn" name="txt_coll" id="txt_coll" value="Your College Name" onclick="alt_college();" /></td>
                      </tr>
                      <tr>
                          <td><input type="submit" id="submit" name="submit" value="Submit" onclick="return validate();" /></td>
                          <td><input type="reset" value="Reset" /></td>
                      </tr>
                  </table>
              </form>
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