<?php
	session_start();
	$_SESSION['name'];
	if(!isset($_SESSION['name']))
	{
		header("Location: index.php");
	}

	include("config/config.php");

	$id = $_REQUEST['txtid'];
	$iteration_id = $_REQUEST['txtIterationID'];

	$project = $_REQUEST["comboproject"];
	$state = $_REQUEST["combostate"];

	if($state == "In Progress") {
		$start_date = date("Y-m-d h:i:s");
		$sql = "update story set state='$state', 
				start_date_time='$start_date' where story_id =$id";
	} else if($state == "Done") {
		$end_date_time = date("Y-m-d h:i:s");
		$sql = "update story set state='$state',
				end_date_time='$end_date_time' where story_id =$id";
	} else {
		$sql = "update story set state='$state' where story_id =$id";
	}

	$res = mysql_query($sql) or 
		die("cannot execute query");
	mysql_close();
	header("Location: iteration_stories_display.php?iteration_id=$iteration_id");
?>