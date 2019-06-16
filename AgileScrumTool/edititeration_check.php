<?php
	session_start();
	$_SESSION['name'];
	if(!isset($_SESSION['name']))
	{
		header("Location: index.php");
	}

	include("config/config.php");

	$id = $_REQUEST['txtid'];

	$iterationname = $_REQUEST["txtiterationname"];
	$project = $_REQUEST["comboproject"];
	$startdate = $_REQUEST["startdate"];
	$enddate = $_REQUEST['enddate'];

	$sql = "update iteration set iterationname='$iterationname',project='$project',start='$startdate',
               end='$enddate' where iteration_id =$id";

   $res = mysql_query($sql) or 
             die("cannot execute query");
   mysql_close();
	header("Location: iterationlist.php");
?>