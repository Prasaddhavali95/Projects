<?php
	session_start();
	$_SESSION['name'];
	if(!isset($_SESSION['name']))
	{
		header("Location: index.php");
	}

	include("config/config.php");

	$id = $_REQUEST['txtid'];

	$name = $_REQUEST["txtproject"];
	$product = $_REQUEST["txtproduct"];
	$startdate = $_REQUEST["startdate"];
	$enddate = $_REQUEST['enddate'];

	$sql = "update project set name='$name',product='$product',start='$startdate',
               end='$enddate' where project_id =$id";

   $res = mysql_query($sql) or 
             die("cannot execute query");
   mysql_close();
	header("Location: projectlist.php");
?>