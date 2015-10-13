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
	
	if($user->data['username']=='Anonymous')
	{
		$username=$_POST['username'];
		$pass=$_POST['pass'];
		$auth->login($username,$pass) or die("You have exceeded maximum trial limit");
		if($user->data['username']=='Anonymous')
		{
			echo "Login failed - invalid details. The user name and password are same as Daksh user panel ";
			?>
			Click here to <a	href='index.php'> Try again</a>;
            <?php
		}
		else
		{
			echo "welcome ";
			echo $user->data['username'];
			
			include_once("../include/config.php");
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
			echo "one";
			echo $level;
			if($level == 1)
				header('Location: clgd.php');
	
			if($level == 2)
				header('Location: simple.php');

			if($level == 3)
				header('Location: amen.php');
		
			if($level == 4)
				header('Location: below.php');
		
			if($level == 5)
				header('Location: theN.php');
		
			if($level == 6)
				header('Location: darkness.php');

			if($level == 7)
				header('Location: vaciar.php');

			if($level == 8)
				header('Location: 15mins.php');

			if($level == 9)
				header('Location: andfall.php');

			if($level == 10)
				header('Location: oldone.php');

			if($level == 11)
				header('Location: masters.php');

			if($level == 12)
				header('Location: feared.php');

			if($level == 13)
				header('Location: cave.php');

			if($level == 14)
				header('Location: ten.php');

			if($level == 15)
				header('Location: wierd.php');

			if($level == 16)
				header('Location: sorry.php');

			if($level == 17)
				header('Location: forgo_mem.php');

			if($level == 18)
				header('Location: lucifer.php');

			if($level == 19)
				header('Location: red.php');

			if($level == 20)
				header('Location: dishum.php');

			if($level == 21)
				header('Location: blood.php');

			if($level == 22)
				header('Location: richie.php');

			if($level == 23)
				header('Location: precious.php');
			
			if($level == 24)
				header('Location: abracadabra.php');
			}
	}
	else
	{
		echo "You are already logged in as ";
		echo $user->data['username'];
		
		include_once("../include/config.php");
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
		
			echo "two";
			echo $level;
			if($level == 1)
				header('Location: clgd.php');
	
			if($level == 2)
				header('Location: simple.php');

			if($level == 3)
				header('Location: amen.php');
		
			if($level == 4)
				header('Location: below.php');
		
			if($level == 5)
				header('Location: theN.php');
		
			if($level == 6)
				header('Location: darkness.php');

			if($level == 7)
				header('Location: vaciar.php');

			if($level == 8)
				header('Location: 15mins.php');

			if($level == 9)
				header('Location: andfall.php');

			if($level == 10)
				header('Location: oldone.php');

			if($level == 11)
				header('Location: masters.php');

			if($level == 12)
				header('Location: feared.php');

			if($level == 13)
				header('Location: cave.php');

			if($level == 14)
				header('Location: ten.php');

			if($level == 15)
				header('Location: wierd.php');

			if($level == 16)
				header('Location: sorry.php');

			if($level == 17)
				header('Location: forgo_mem.php');

			if($level == 18)
				header('Location: lucifer.php');

			if($level == 19)
				header('Location: red.php');

			if($level == 20)
				header('Location: dishum.php');

			if($level == 21)
				header('Location: blood.php');

			if($level == 22)
				header('Location: richie.php');

			if($level == 23)
				header('Location: precious.php');
			
			if($level == 24)
				header('Location: abracadabra.php');
	}
?>