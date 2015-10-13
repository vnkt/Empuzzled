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
<title>Daksh 2010 :: Empuzzled II</title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<style type="text/css">
img {
	width:200px;
}
p {
	text-align:center;	
	color:#454545;
	font-family:Verdana, Geneva, sans-serif;
}
</style>
</head>

<body>
 <?php
	$question=" ";	
		include_once("../config.php");
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

	?>

<div id="wrapper">

	<div id="header">
		<h1>&nbsp;</h1>
	</div>

	<div id="menu">
		<ul>
			<li><a href="./index.php">Home</a></li>
			<li><a class="active" href="./score.php">ScoreBoard</a></li>
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
					echo "<li style='text-align:center;'><a href='index.php?l=".($i+1)."'>".($i+1)."</a></li>";
				}
			?>
		</ul>
		<div id="sidebar-bottom">
			&nbsp;
		</div>
	</div>
   
	<div id="content">
		
        <div id="entry">
        <table id="scoretable" style="margin-left:120px;margin-top:10px; border:none;width:300px" >	
        <tbody>
        <tr><td><b>Rank</b></td><td><b>Level</b></td><td><b>UserName</b></td></tr>
        <?php 
				
		//Getting Scoreboard 
		if (!(isset($_GET['pagenum']))) 
		{ 
			$pagenum = 1; 
		}
		else
			$pagenum=$_GET['pagenum'];
		$score = "select username,level from phpb_users,emp_users where phpb_users.user_id=emp_users.user_id order by level desc,time ";
//		echo $score ;
		$scb=mysql_query($score);
		$rows = mysql_num_rows($scb);
		unset($scb);
		$page_rows = 25;
		$last = ceil($rows/$page_rows);
		if ($pagenum < 1)
		{
			$pagenum = 1;	
		}
		elseif ($pagenum > $last) 
		{ 
			$pagenum = $last; 
		}
		$max = 'limit ' .($pagenum - 1) * $page_rows .',' .$page_rows;
		$scb=mysql_query("select username,level from phpb_users,emp_users where phpb_users.user_id=emp_users.user_id order by level desc,time $max");
		
			$ii=mysql_num_rows($scb);
			for($u=0;$u<$ii;$u++)
			{
				if($jj=mysql_fetch_assoc($scb))
				{
					echo "<tr><td>".(($u+1)+(($pagenum-1)*$page_rows))."</td><td>".$jj['level']."</td><td>".$jj['username']."</td></tr>";
				}
			}
		?>
        </tbody>
        </table>
        <?php 
			echo "<p> -- Page $pagenum of $last -- </p>";
			echo "<p>";
			if ($pagenum == 1) 
			{
			}
			else 
			{
				echo "<a href='{$_SERVER['PHP_SELF']}?pagenum=1'> <<-First</a>";	
				echo " ";
				$previous = $pagenum-1;
				echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=$previous'> <-Previous</a> ";
			}
			echo " ---- ";
			if ($pagenum == $last) {}
			else
			{
				$next = $pagenum+1;
				echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=$next'>Next -></a> ";
				echo " ";
				echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=$last'>Last ->></a> ";
			}
			echo "</p>";
		?>
        </div>
	</div>

	<div id="footer">
		<div id="footer-valid">
			<a href="http://validator.w3.org/check/referer">xhtml</a> / <a href="http://www.daksh.sastra.edu/">Daksh 2010</a>
		</div>
	</div>

</div>

</body>
</html>
<?php
$_GET['l']=100;
	}
	else
		redirect('index.htm');
?>
