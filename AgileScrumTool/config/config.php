<?php

    $place = "localhost"; 
	$username = "root";
	$password = "";

	mysql_connect($place, $username, $password)
		or die("Cannot Open the lock -_-");

	$database = "Login";

	mysql_select_db($database) 
		or die("Cannot Search the database ");

?>