<?php
	session_start();
	$_SESSION['name'];
	if(!isset($_SESSION['name']))
	{
		header("Location: index.php");
	}

	include("config/config.php");

	$id = $_REQUEST['txtid'];

	$project = $_REQUEST["comboproject"];
	$story = $_REQUEST["txtstory"];
	$state = $_REQUEST["combostate"];
	$hours = $_REQUEST["combohrs"];
	$storypoint = $_REQUEST['cbostorypoint'];

	if($state == "In Progress") {
		$start_date = date("Y-m-d h:i:s");
		$sql = "update story set project='$project',name='$story',state='$state',hours='$hrs',
		              story_point='$storypoint', start_date_time='$start_date' where story_id =$id";
	} else if($state == "Done") {
		$end_date_time = date("Y-m-d h:i:s");
		$sql = "update story set project='$project',name='$story',state='$state',hours='$hrs',
		              story_point='$storypoint', end_date_time='$end_date_time' where story_id =$id";
	} else {
		$sql = "update story set project='$project',name='$story',state='$state',hours='$hrs',
		              story_point='$storypoint' where story_id =$id";
	}

	$res = mysql_query($sql) or 
		die("cannot execute query");
	mysql_close();
	header("Location: storylist.php");
?>