<?php 
	include_once('../include/config.php');
	$event_id=$_REQUEST['event'];
	if(isset($_REQUEST['mode']) && $_REQUEST['mode']=='max')
	{
		$q="select max from a_events where event_id='$event_id'";
		$r=mysql_query($q);
		if($r)
			if($row=mysql_fetch_assoc($r))
				echo $row['max'];
	}
	else
	{
		$q="select min from a_events where event_id='$event_id'";
		$r=mysql_query($q);
		if($r)
			if($row=mysql_fetch_assoc($r))
				echo $row['min'];
	}
?>