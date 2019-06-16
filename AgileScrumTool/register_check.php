<?php
	include("config/config.php");

	$name = $_REQUEST["txtname"];
	$email = $_REQUEST["txtemail"];
	$password = md5($_REQUEST["password"]);
	

	if(($name and $email and $password)!=Null)
	{

		//$sql1="select email from root where email=$email;";
		$result1=mysql_query("select user_name from user where user_name='$email'");
		
		while($output=mysql_fetch_row($result1))
		{
			$email_id=$output[0];
		}

		if ($email_id==$email)
		{
		 	$Message2 = "This email already exist try some other";
			$encode2=base64_encode($Message2);
			$encode2_email=base64_encode($email);
			header("Location: register.php?msg2=$encode2&log=$encode2_email");
		}
		else 
		{
			$user_type = "main";
			$sql="insert into user values('','$email','$password','$user_type','$name');";
			$result=mysql_query($sql);
			header("Location: index.php?flag=1");
		}
	}








	// $sql = "insert into user values('','$email','$password','$user_type','$name');";
	// $res = mysql_query($sql);
	// $count = mysql_num_rows($res);

	// $sql1="select * from user where user_name='$email'";
	// $res1=mysql_query($sql1);
	// $count=mysql_num_rows($res1);
	// if($count == 1)
	// {
	// 	header("Location: register.php?flag=1");
	// }else if($count == 0){
		
	// 	$sql2 = "insert into user values('$email');";
	// 	$res2 = mysql_query($sql2);
	// }	

	// header("Location: index.php?flag=1");
?>