<?php
	if(isset($_POST['submit1']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "daksh")
		{
			header('Location: simple.php');
		}
		else
			header('Location: clgd.php');
	}
	
	if(isset($_POST['submit2']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "north")
		{
			header('Location: below.php');
		}
		else
			header('Location: amen.php');
	}
	
	if(isset($_POST['submit3']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "inception")
		{
			header('Location: darkness.php');
		}
		else
			header('Location: theN.php');
	}
	
	if(isset($_POST['submit4']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "empuzzling")
		{
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
	if(isset($_POST['feelinglucky']))
	{
		header('Location: 15mins.php');
	}
	
	if(isset($_POST['submit5']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "pizza")
		{
			header('Location: andfall.php');
		}
		else
			header('Location: 15mins.php');
	}
	
	if(isset($_POST['submit6']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "andimuthu")
		{
			header('Location: oldone.php');
		}
		else
			header('Location: andfall.php');
	}

	if(isset($_POST['submit7']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "facebook")
		{
			header('Location: masters.php');
		}
		else
			header('Location: oldone.php');
	}

	if(isset($_POST['submit8']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "fedex")
		{
			header('Location: feared.php');
		}
		else
			header('Location: masters.php');
	}

	if(isset($_POST['submit9']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "julianassange")
		{
			header('Location: cave.php');
		}
		else
			header('Location: feared.php');
	}

	if(isset($_POST['submit10']))
	{
		$answer = strtolower($_POST['answer']);

		if($answer == "kamal")
		{
			header('Location: wierd.php');
		}
		else
			header('Location: stars.php');
	}

	if(isset($_POST['submit11']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "tyrannosaurusrex")
		{
			header('Location: sorry.php');
		}
		else
			header('Location: wierd.php');
	}

	if(isset($_POST['submit12']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "aprilfoolsday")
		{
			header('Location: forgo_mem.php');
		}
		else
			header('Location: sorry.php');
	}

	if(isset($_POST['submit13']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "janetaylor")
		{
			header('Location: lucifer.php');
		}
		else
			header('Location: forgo_mem.php');
	}

	if(isset($_POST['submit14']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "larrypage")
		{
			header('Location: red.php');
		}
		else
			header('Location: lucifer.php');
	}

	if(isset($_POST['submit15']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "goldstar")
		{
			header('Location: dishum.php');
		}
		else
			header('Location: red.php');
	}

	if(isset($_POST['submit16']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "canon")
		{
			header('Location: blood.php');
		}
		else
			header('Location: dishum.php');
	}

	if(isset($_POST['submit17']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "dexter")
		{
			header('Location: richie.php');
		}
		else
			header('Location: blood.php');
	}

	if(isset($_POST['submit18']))
	{
		$answer = strtolower($_POST['answer']);
		
		if($answer == "thegivingpledge")
		{
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
			header('Location: abracadabra.php');
		}
		else
			header('Location: precious.php');
	}

?>