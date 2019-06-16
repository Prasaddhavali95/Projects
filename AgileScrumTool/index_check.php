<?php

	include("config/config.php");
	$username = $_REQUEST["txtuname"];
	$password = md5($_REQUEST["password"]);

	$sql = "select * from user where user_name='$username' and password ='$password'";

	$res = mysql_query($sql)
		or die(" cannot execute the querry ");

	$count = mysql_num_rows($res);
	
	if($count == 0)
	{
		// uname password wrong
		header("Location: index.php?flag_invalid=0");
	}else if($count == 1){		
		session_start();
		$out = mysql_fetch_row($res);
		$_SESSION['name'] = $username;
		$_SESSION['type'] = $out[3];

		if($out[3] == "sub"){
			echo $sql_user = "select * from linkuesr where user_linkid = $out[0]";
			$res_user = mysql_query($sql_user);
			while ($out_user = mysql_fetch_row($res_user)) {
				$user_sub_id = $out_user[1];
			}
			$_SESSION['id'] = $user_sub_id;
		} else {
			$_SESSION['id'] = $out[0];
		}

		header("Location: home.php");
	}
?>