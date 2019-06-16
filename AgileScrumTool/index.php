<html>
	<head>
		<title>Agile Scrum Tool :: Home</title>
		<link rel="stylesheet" type="text/css" href="style/style.css">
	</head>
		<form method="post" action="index_check.php">
		<body>
			<div class="title">
				<font color="#FFFFFF" size="5px"> <b> Agile Scrum Tool(Project Management) </b>  </font>
			</div>
			<div class="bgbackground">
				<div class="text">
					<?php
						if(isset($_REQUEST['flag']))
						{
							$flag = $_REQUEST['flag'];
							if($flag == 1)
							echo "Regestration Successfull...!! Login here";	
						}	
					?>

				</div>
				<div class = "img">
					<img src="img/cycle.jpg">
				</div>
				
				<div class="login">
					<font color="#939798"> <h1> LOGIN </h1> </font>
				</div>
				
				<div class="textid1">
					<?php 
						if(isset($_REQUEST['flag_invalid']))
						 {
					?>
						<span >
							<center >Invalid username or password</center>
						</sapn>
					<?php
				       }
					?>
				</div>
				
				<div class="form"> 
					
					E-mail
					<input type="text" class="textboxid" name="txtuname"  size="40px" />
					<br/><br/>
					Password
					<input type="password" class="textboxid" name="password"  size="40px" />
					<br/><br/><br/>
					<input type="submit" id="loginbutton" value="Login"  ></input> 
				</div>
				<div class="registerlog">
				<a href="register.php">
					
							Register here
					
				</a>
				</div>
				<div class="footer">
					<p>Copyright &copy; Allrights Reserved</p>
				</div>

			</div>
		</body>
</form>
</html>