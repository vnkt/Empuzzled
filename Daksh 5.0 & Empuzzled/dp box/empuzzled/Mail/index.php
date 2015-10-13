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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="../images/favicon.ico" />
<title>Daksh 2010 :: Empuzzled II</title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<style type="text/css">
img {
	width:200px;
}

</style>
</head>

<body>

 <?php
 	
	$question=" ";	
		include_once("../config.php");
		$query="select teamname from a_teamname where event_id='51' and user_id='".$user->data['user_id']."'";
		$result=mysql_query($query);
		if(mysql_num_rows($result)==0)
		{
			$q1="insert into a_teamname values('".$user->data['username']."-".$user->data['user_id']."','51','".$user->data['user_id']."')";
			mysql_query($q1);
		}
		unset($query);
		
		
		//Getting level 
		$qu="select level from emp_users where user_id=".$user->data['user_id'];
		$res = mysql_query($qu);
		if(mysql_num_rows($res))
		{
			if($row=mysql_fetch_assoc($res))
			{
				$level=$row['level'];
			}
		}	
		
		if(!$level)
		{
			$user_ins="insert into emp_users(user_id,level) values(".$user->data['user_id'].",1)";
			$level=1;
			mysql_query($user_ins);
		}
		$org_level=$level;
		if($_GET['l'])
		{
			if($_GET['l']<$level)
			{
				$level=$_GET['l'];
			}
		}
		
		//Answer Checking ... 
		$ans="select ans from empuzzled2 where qno=".$level;
		$ans2=mysql_query($ans);
		$anser=mysql_fetch_assoc($ans2);
		$answer=strtolower($anser['ans']);		
		if($_POST['ans']==$answer)
		{
			if($level==$org_level)
			{
				$upd="update emp_users set level=".($level+1).", time = now() where user_id=".$user->data['user_id'];		
//				echo $upd;
				mysql_query($upd);
				$level=$level+1;
				$org_level=$level;
			}
			else
			{
				$kk="0";
			}
		}
			
	
		
		//End 

		
		$ques="select * from empuzzled2 where qno=".$level ;
		$q=mysql_query($ques);
		if(mysql_num_rows($q))
		{
			if($qq=mysql_fetch_assoc($q))
			{
				$question=$qq['ques'];
				$img1=$qq['img1'];
				$img2=$qq['img2'];						
				$img3=$qq['img3'];						
				$img4=$qq['img4'];	
				$no = $qq['qno'];
			}
		}									  

	?>

<div id="wrapper">

	<div id="header">
		<h1>&nbsp;</h1>
	</div>

	<div id="menu">
		<ul>
			<li><a class="active" href="./index.php">Home</a></li>
			<li><a href="./score.php">ScoreBoard</a></li>
			<li><a href="../forum/viewforum.php?f=23">Forum</a></li>
			<li><a href="../index.php">Daksh-Home</a></li>
			<li><a href="./logout.php">Logout</a></li>
		</ul>
	</div>

	<div id="sidebar">
		<div id="feed">
			<a class="feed-button" href="#">&nbsp;</a>
		</div>
		<ul>
        	<?php
				$tt=$org_level-5;
				if($tt<0)
				$tt=0;
				for($i=$tt;$i<$org_level;$i++)
				{
					echo "<li style='text-align:center'><a href='index.php?l=".($i+1)."'>".($i+1)."</a></li>";
				}
			?>
		</ul>

		<div id="sidebar-bottom">
			&nbsp;
		</div>
	</div>
   
	<div id="content">
		<div class="entry">
			<div class="entry-title">Question no. <?php echo $no;?></div>
			<div class="date">&nbsp;</div>
			<p><?php echo $question; ?></p>			
            <?php if($img1) {			?>
            <table>

            <tr>
            	<td><img alt="image1" src="./ques/<?php echo $img1 ;?>.jpg"/></td>
                <?php if($img2){ ?>
	            <td><img alt="image2" src="./ques/<?php echo $img2 ;?>.jpg"/></td>
				<?php } ?>
            </tr>
            <tr>
            	 <?php if($img3){ ?>
            	<td><img alt="image3" src="./ques/<?php echo $img3 ;?>.jpg"/></td>                
                 <?php } ?>
                 <?php if($img4){ ?>
	            <td><img alt="image4" src="./ques/<?php echo $img4 ;?>.jpg"/></td>
                <?php } ?>
            </tr>
            </table>
            <?php } ?>
		</div>              
        <div class="ansk">        
        <form action="" method="post">
			<table cellspacing="10px">       
            <?php if($kk=="0") { ?> 
            <tr><td>Wrong Answer</td></tr>
            <?php } ?>
        	<tr><td><b>Answer</b></td><td><input type="text" name="ans" /></td></tr>
            <tr><td><input type="submit" value="submit"/></td><td><input type="reset" /></td></tr>
            </table>
        </form>
        </div>
	</div>

	<div id="footer">
		<div id="footer-valid">
			<a href="http://validator.w3.org/check/referer">xhtml</a> / <a href="http://www.daksh.sastra.edu/">Daksh 2010</a>
		</div>
	</div>

</div>
<!--Google analytics -->
<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
	try {
		var pageTracker = _gat._getTracker("UA-12512690-1");
		pageTracker._trackPageview();
	} catch(err) {}
</script>
<!-- Google analytics ends here -->


</body>
</html>
<?php
$_GET['l']=100;
	}
	else
		redirect('reg.htm');
?>
