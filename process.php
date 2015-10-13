<?php include_once("analyticstracking.php") ?>
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

<?php
 		include_once("../include/config.php");
		$query="select teamname from a_teamname where event_id='51' and user_id='".$user->data['user_id']."'";
		$result=mysql_query($query);
		if(mysql_num_rows($result)==0)
		{
			$q1="insert into a_teamname values('".$user->data['username']."-".$user->data['user_id']."','51','".$user->data['user_id']."')";
			mysql_query($q1);
		}
		unset($query);
		
		
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
	?>
		
<?php
	if(isset($_POST['submit1']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "daksh" && $level < 2)
		{
			$upd="update emp_users set level=".(2).", time = now() where user_id=".$user->data['user_id'];		
			//echo $upd;
			mysql_query($upd);
			header('Location: simple.php');
		}
		else
			header('Location: clgd.php');
	}
	
	if(isset($_POST['submit2']))
	{
		$answer = strtolower($_POST['answer']);
				
		if($answer == "north" && $level < 4)
		{
			$upd="update emp_users set level=".(4).", time = now() where user_id=".$user->data['user_id'];		
			mysql_query($upd);
			header('Location: below.php');
		}
		else
			header('Location: amen.php');
	}
	
	if(isset($_POST['submit3']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "inception" && $level < 6)
		{
			$upd="update emp_users set level=".(6).", time = now() where user_id=".$user->data['user_id'];		
			mysql_query($upd);
			header('Location: darkness.php');
		}
		else
			header('Location: theN.php');
	}
	
	if(isset($_POST['submit4']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "empuzzling" && $level < 7)
		{
			$upd="update emp_users set level=".(7).", time = now() where user_id=".$user->data['user_id'];		
			mysql_query($upd);
			header('Location: vaciar.php');
		}
		else
			header('Location: darkness.php');
	}
	
	if(isset($_POST['google']))
	{
		$search = strtolower($_POST['search-text']);
		header('Location: http://www.google.com/#q='.$search);
	}
	if(isset($_POST['feelinglucky']) && $level < 8)
	{
		$upd="update emp_users set level=".(8).", time = now() where user_id=".$user->data['user_id'];		
		mysql_query($upd);
		header('Location: 15mins.php');
	}
	
	if(isset($_POST['submit5']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "pizza" && $level < 9)
		{
			$upd="update emp_users set level=".(9).", time = now() where user_id=".$user->data['user_id'];		
			mysql_query($upd);
			header('Location: andfall.php');
		}
		else
			header('Location: 15mins.php');
	}
	
	if(isset($_POST['submit6']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "andimuthu" && $level < 10)
		{
			$upd="update emp_users set level=".(10).", time = now() where user_id=".$user->data['user_id'];		
			mysql_query($upd);
			header('Location: oldone.php');
		}
		else
			header('Location: andfall.php');
	}

	if(isset($_POST['submit7']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "facebook" && $level < 11)
		{
			$upd="update emp_users set level=".(11).", time = now() where user_id=".$user->data['user_id'];		
			mysql_query($upd);
			header('Location: masters.php');
		}
		else
			header('Location: oldone.php');
	}

	if(isset($_POST['submit8']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "fedex" && $level < 12)
		{
			$upd="update emp_users set level=".(12).", time = now() where user_id=".$user->data['user_id'];		
			mysql_query($upd);
			header('Location: feared.php');
		}
		else
			header('Location: masters.php');
	}

	if(isset($_POST['submit9']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "julianassange" && $level < 13)
		{
			$upd="update emp_users set level=".(13).", time = now() where user_id=".$user->data['user_id'];		
			mysql_query($upd);
			header('Location: cave.php');
		}
		else
			header('Location: feared.php');
	}

	if(isset($_POST['submit10']))
	{
		$answer = strtolower($_POST['answer']);

		if($answer == "kamal" && $level < 15)
		{
			$upd="update emp_users set level=".(15).", time = now() where user_id=".$user->data['user_id'];		
			mysql_query($upd);
			header('Location: wierd.php');
		}
		else
			header('Location: stars.php');
	}

	if(isset($_POST['submit11']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "tyrannosaurusrex" && $level < 16)
		{
			$upd="update emp_users set level=".(16).", time = now() where user_id=".$user->data['user_id'];		
			mysql_query($upd);
			header('Location: sorry.php');
		}
		else
			header('Location: wierd.php');
	}

	if(isset($_POST['submit12']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "aprilfoolsday" && $level < 17 )
		{
			$upd="update emp_users set level=".(17).", time = now() where user_id=".$user->data['user_id'];		
			mysql_query($upd);
			header('Location: forgo_mem.php');
		}
		else
			header('Location: sorry.php');
	}

	if(isset($_POST['submit13']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "janetaylor" && $level < 18)
		{
			$upd="update emp_users set level=".(18).", time = now() where user_id=".$user->data['user_id'];		
			mysql_query($upd);
			header('Location: lucifer.php');
		}
		else
			header('Location: forgo_mem.php');
	}

	if(isset($_POST['submit14']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "larrypage" && $level < 19)
		{
			$upd="update emp_users set level=".(19).", time = now() where user_id=".$user->data['user_id'];		
			mysql_query($upd);
			header('Location: red.php');
		}
		else
			header('Location: lucifer.php');
	}

	if(isset($_POST['submit15']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "goldstar"  && $level < 20 )
		{
			$upd="update emp_users set level=".(20).", time = now() where user_id=".$user->data['user_id'];		
			mysql_query($upd);
			header('Location: dishum.php');
		}
		else
			header('Location: red.php');
	}

	if(isset($_POST['submit16']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "canon" && $level < 21)
		{
			$upd="update emp_users set level=".(21).", time = now() where user_id=".$user->data['user_id'];		
			mysql_query($upd);
			header('Location: blood.php');
		}
		else
			header('Location: dishum.php');
	}

	if(isset($_POST['submit17']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "dexter" && $level < 22)
		{
			$upd="update emp_users set level=".(22).", time = now() where user_id=".$user->data['user_id'];		
			mysql_query($upd);
			header('Location: richie.php');
		}
		else
			header('Location: blood.php');
	}

	if(isset($_POST['submit18']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "thegivingpledge" && $level < 23)
		{
			$upd="update emp_users set level=".(23).", time = now() where user_id=".$user->data['user_id'];		
			mysql_query($upd);
			header('Location: precious.php');
		}
		else
			header('Location: richie.php');
	}
	
	if(isset($_POST['submit19']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "diamond")
		{
			$upd="update emp_users set level=".(24).", time = now() where user_id=".$user->data['user_id'];		
			mysql_query($upd);
			header('Location: abracadabra.php');
		}
		else
			header('Location: precious.php');
	}
?>

<?php
$_GET['l']=100;
	}
	else
		redirect('index.php');
?>