<?php

 	$delete_id = $_REQUEST['delete_id'];
    $place = "localhost"; 
	$username = "root";
	$password = "";

	include("config/config.php");

	$sql = " delete from iteration where iteration_id =$delete_id";

	 mysql_query($sql); 

	mysql_close();
	header("Location: iterationlist.php");
?>
