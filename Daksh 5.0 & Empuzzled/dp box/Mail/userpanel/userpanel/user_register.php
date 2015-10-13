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
	if($user->data['username']=='Anonymous')
	{
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
<script type="text/javascript">
$(function(){
	var fname=false;
	var lname=false;
	var username=false;
	var pwd=false;
	var email=false;
	var contact=false;
	$('#fname').blur(function(){
		if($(this).val()=='')
		{
			$('#fname_msg').html('required');
			fname=false;
		}
		else
		{
			$('#fname_msg').html('');
			fname=true;
		}
	});
	$('#lname').blur(function(){
		if($(this).val()=='')
		{
			$('#lname_msg').html('required');
			lname=false;
		}
		else
		{
			$('#lname_msg').html('');
			lname=true;
		}
	});
	$('#username').blur(function(){
		if($(this).val()=='')
		{
			$('#username_msg').html('required');
			username=false;
		}
		else
		{
			$.post('check_user.php',{'username':$(this).val()},function(data){
				//alert(data);
				if(data=='true')
				{
					username=true;
					$('#username_msg').html('<span style="color:#07fa46"><b>Username is available.</b></span>');
				}
				else
				{
					username=false;
					$('#username_msg').html('Username not available.');
				}
			});	
		}
	});
	
	$('#pwd').blur(function(){
		if($(this).val()=='')
			$('#pwd_msg').html('required');
		else
			if($(this).val().length<6)
				$('#pwd_msg').html('Password must be 6 chars long.');
			else
				$('#pwd_msg').html('');
	});
	$('#r_pwd').blur(function(){
		if($(this).val()=='')
			$('#r_pwd_msg').html('required');
		else
		{
			if($(this).val()==$('#pwd').val() && $(this).val().length>=6)
			{
				$('#r_pwd_msg').html('');
				pwd=true;
			}
			else
			{
				$('#r_pwd_msg').html('Password not matched.');	
				pwd=false;
			}
		}
	});
	$('#contact').blur(function(){
		if($(this).val()!='')
		{
			contact=true;
			$('#contact_msg').html('');
		}
		else
		{
			contact=false;
			$('#contact_msg').html('required');
		}
	});
	$('#email').blur(function(){
		if($(this).val()=='')
		{
			email=false;
			$('#email_msg').html('required');
		}
		else{
			var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
			if(reg.test($(this).val())==false)
			{
				$('#email_msg').html('Invalid email ID.');
				email=false;
			}
			else
			{
				$('#email_msg').html('');	
				email=true;
			}
		}
	});
	$('#form1').submit(function(){
		if(fname && lname && username && pwd && email && contact)
			return true;
		else
		{
			$('#submit_msg').html('Kindly Fill the form completely');
			return false;	
		}
	});
	$('#coll').change(function(){
		if($(this).val()=='nill')
		{
			$('#default_coll').hide();
			$('#alt_coll').fadeIn();
		}
	});
	$('#txt_coll').click(function(){
		if($(this).val()=='Your College Name')
			$(this).attr('value','')
	});
	/*$('#not_coll').click(function(){
		$(this).hide();
		$('#default_coll').hide();
		$('#alt_coll').fadeIn();
	});*/
});
</script>
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
              <form id="form1" name="form1" action="user_register2.php" method="post">
                  <table class="uRegister">
                      <tr>
                          <td>First Name</td>
                          <td><input type="text" id="fname" name="fname" class="dataIn" /></td>
                          <td class="error" id="fname_msg"></td>
                      </tr>
                      <tr>
                          <td>Last Name</td>
                          <td><input type="text" id="lname" name="lname" class="dataIn" /></td>
                          <td class="error" id="lname_msg"></td>
                      </tr>
                      <tr>
                          <td>Username</td>
                          <td><input type="text" id="username" name="username" class="dataIn" /></td>
                          <td class="error" id="username_msg"></td>
                      </tr>
                      <tr>
                          <td>Password</td>
                          <td><input type="password" id="pwd" name="pwd" class="dataIn" /></td>
                          <td class="error" id="pwd_msg"></td>
                      </tr>
                      <tr>
                          <td>Confirm Password</td>
                          <td><input type="password" id="r_pwd" name="r_pwd" class="dataIn"/></td>
                          <td class="error" id="r_pwd_msg"></td>
                      </tr>
                      <tr>
                          <td>Email</td>
                          <td><input type="text" id="email" name="email"  class="dataIn" /></td>
                          <td class="error" id="email_msg"></td>
                      </tr>
                      <tr>
                          <td>Contact</td>
                          <td><input type="text" id="contact" name="contact"  class="dataIn"/></td>
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
                          <td class="error" id="branch_msg"></td>
                      </tr>
                      <tr>
                          <td>Year of Study</td>
                          <td>
                              <select id="year" name="year"  class="dataIn">
                                  <option value="B.Tech-1st year">B.Tech-1st year</option>
                                  <option value="B.Tech-2nd year">B.Tech-2nd year</option>
                                  <option value="B.Tech-3rd year">B.Tech-3rd year</option>
                                  <option value="B.Tech-4th year">B.Tech-4th year</option>
                                  <option value="B.Tech-5th year">B.Tech-5th year</option>
                                  <option value="M.Tech-1st year">M.Tech-1st year</option>
                                  <option value="M.Tech-2nd year">M.Tech-2nd year</option>
                                  <option value="others">Others</option>
                              </select>
                          </td>
                      </tr>
                      <tr>
                          <td>College</td>
                          <td id="default_coll">
                              <select name="coll" id="coll"  class="dataIn">
                                  <?php include('coll.php'); ?>
                              </select>
                          </td>
                          <td id="alt_coll" style="display:none"><input type="text"  class="dataIn" name="txt_coll" id="txt_coll" value="Your College Name" /></td>
                      </tr>
                      <tr>
                          <td><input type="submit" id="submit" name="submit" value="Register" /></td>
                          <td><input type="reset" value="Reset" /></td>
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
		redirect('user_home.php');
?>