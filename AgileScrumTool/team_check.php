<?php
	include("config/config.php");
	// $id = $_REQUEST['user_id'];
	session_start();
	$member_name = $_REQUEST["txtname"];
	$email = $_REQUEST["txtemail"];
	$password =md5( $_REQUEST["txtpassword"]);
	$user_type = "sub";	
	$u_id=$_SESSION['id'];

	// insert the user first
	$sql = "insert into user values('','$email','$password','$user_type','$member_name');";
	mysql_query($sql);

	// get the last inserted user's id
	$id = mysql_insert_id();

	// insert the data in the userlink table
	$sql_link = "insert into linkuesr values('', '$u_id', '$id');";
	mysql_query($sql_link);

	header("Location: teamlist.php");
?>