<?php
	include("config/config.php");
	// $id = $_REQUEST['user_id'];
	session_start();
	$project_id = $_REQUEST["comboproject"];
	$story = $_REQUEST["txtstory"];
	$state = $_REQUEST["combostate"];
	$hours = $_REQUEST["combohrs"];
	$story_point = $_REQUEST["cbostorypoint"];
	$u_id = $_SESSION['id'];

	$sql = "insert into story values('','$u_id','$project_id','','$story','$state','$hours','$story_point', '0000-00-00 00:00:00', '0000-00-00 00:00:00');";
	mysql_query($sql);
	header("Location: storylist.php");
?>