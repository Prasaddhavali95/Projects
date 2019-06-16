<?php
	include("config/config.php");
	// $id = $_REQUEST['user_id'];
	session_start();
	$_SESSION['name'];
	$iteration_name = $_REQUEST["txtiterationname"];
	$project_id = $_REQUEST["comboproject"];
	$start_date = $_REQUEST["startdate"];
	$end_date = $_REQUEST["enddate"];
	$u_id = $_SESSION['id'];

	if(($iteration_name and $project_id and $start_date and $end_date)!=Null)
	{

		//$sql1="select email from root where email=$email;";
		$result1=mysql_query("select iteration_name from iteration where iteration_name='$iteration_name'");
		
		while($output=mysql_fetch_row($result1))
		{
			$iteration_name1=$output[0];
		}
		
		if ($iteration_name1==$iteration_name)
		{
		 	$Message2 = "This iteration name is exist";
			$encode2=base64_encode($Message2);
			$encode2_iteration_name=base64_encode($iteration_name);
			header("Location: iterationnew.php?msg2=$encode2&log=$encode2_iteration_name");
		}
		else 
		
		{
			$sql = "insert into iteration values('','$u_id','$project_id','$iteration_name','$start_date','$end_date');";
			mysql_query($sql);
			header("Location: iterationlist.php");
		}
	}


	// $sql = "insert into iteration values('','$u_id','$project_id','$iteration_name','$start_date','$end_date');";
	// mysql_query($sql);
	// header("Location: iterationlist.php");
?>