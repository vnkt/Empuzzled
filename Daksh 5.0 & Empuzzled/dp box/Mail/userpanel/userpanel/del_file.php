<?php 
	$folder="../D27CDB6E-AE6D-11cf-96B8-444553540000/";
	$filepath=$_REQUEST['file'];
	include_once('../include/config.php');
	if(file_exists($folder.$filepath))
	{
		$q="delete from a_files where filepath='".$filepath."'";
		mysql_query($q);
		unlink($folder.$filepath);
	}
?>
<script type="text/javascript">
	location="upload.php";
</script>