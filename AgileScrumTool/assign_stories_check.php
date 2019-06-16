<?php
	include("config/config.php");
	session_start();

	$project_id = $_REQUEST['txtProjectId'];
	$iteration_id = $_REQUEST['iteration'];
	$story_ids = $_REQUEST['txtCheckBox'];

	if($iteration_id == ""){
		header("Location: assign_stories.php?flag=1&project_id=$project_id");
		exit;
	} else if(count($story_ids) <= 0) {
		header("Location: assign_stories.php?flag=2&project_id=$project_id");
		exit;
	} else {
		foreach ($story_ids as $story) {
			$sql = "insert into story_iteration_assign values('', '$iteration_id', '$story', '$project_id')";
			mysql_query($sql);
		}
	}
	header("Location: projectlist.php");
?>