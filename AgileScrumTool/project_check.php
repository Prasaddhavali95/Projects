<?php
	include("config/config.php");
	// $id = $_REQUEST['user_id'];
	session_start();
	$name = $_REQUEST["txtproject"];
	$product = $_REQUEST["txtproduct"];
	$start = $_REQUEST["startdate"];
	$end = $_REQUEST["enddate"];
	$u_id=$_SESSION['id'];



if(($name and $product and $start and $end)!=Null)
	{

		//$sql1="select email from root where email=$email;";
		$result1=mysql_query("select name from project where name='$name'");
		
		while($output=mysql_fetch_row($result1))
		{
			$project_name=$output[0];
		}

		if ($project_name==$name)
		{
		 	$Message2 = "This project is exist";
			$encode2=base64_encode($Message2);
			$encode2_name=base64_encode($name);
			header("Location: projectnew.php?msg2=$encode2&log=$encode2_name");
		}
		else 
		{
			$sql = "insert into project values('','$u_id','$name','$product','$start','$end');";
			mysql_query($sql);
			header("Location: projectlist.php");
		}
	}

	// $sql = "insert into project values('','$u_id','$name','$product','$start','$end');";
	// mysql_query($sql);
	// header("Location: projectlist.php");
?>