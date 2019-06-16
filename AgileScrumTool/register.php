<?php
		if(isset($_GET['log']))
		{
			$log_email=base64_decode($_GET['log']);

		}
?>

<html>
	<head>
		<title>Agile Scrum Tool :: Register</title>
		<link rel="stylesheet" type="text/css" href="style/style.css">
		<script type="text/javascript" src="validation.js">

		</script>
		<style type="text/css">
		.error
		{
			color: red;
			text-align: left;
			font-size: 17px;
			font-family: Times New Roman;
		}
		</style>
		<script src="jquery-1.8.0.min.js">
		</script>
	</head>
		
		<body>
			<form method="post" action="register_check.php" onsubmit="return validate()">
			<div class="title">
				<font color="#ffffff" size="5px">  <b> Agile Scrum Tool(Project Management) </b>  </font>
			</div>
				<div class="bgbackground">
				<div class="register">
					<font color="#939798"> <h1> REGISTER </h1> </font>
				</div>
				<div class="registerform"> 
			
					<table border="0" cellspacing="6" cellpadding="6" align="center" >

						<tr>
							<th align="left" id="textid" > Name</th>
							<th>:</th>
							<td><input type="textbox"
										name="txtname"
										id="txtname"
										class="textreg" 
										size="40px"/>
										<div id="error" class="error">
							</td>

						</tr>
						<tr>
							<th align="left" id="textid" >Email</th>
							<th>:</th>
							<td><input type="textbox"
										name="txtemail"
										id="txtemail"
										class="textreg" 
										 size="40px" value="<?php
														if(isset($_GET['log']))
														{  echo $log_email;} ?>"/>
										<div id="error1" class="error">
										<msgerror> 
										<?php 
											if(isset($_GET['msg2']))
											 {
										?>
											<span >
												<center ><?php
												echo	$decode=base64_decode($_GET['msg2']);

												?></center>
											</sapn>
										<?php
									       }
										?></msgerror>
							</td>

						</tr>
						<tr>
							<th align="left" id="textid" >Password</th>
							<th>:</th>
							<td><input type="password"
										name="password"
										id="password" 
										class="textreg" 
										 size="40px"/>
										<div id="error2" class="error">
							</td>

						</tr>
						<tr>
							<th align="left" id="textid" >Confirm Password</th>
							<td>:</td>
							<td><input type="password"
										name="Confirmpassword" 
										id="Confirmpassword"
										class="textreg" 
										size="40px"/>
										<div id="error3" class="error">
							</td>

						</tr>
					</table>
				</div>
				<div class="registerbuttonform">
					<input type="Reset" value="Reset" id="registerbutton" /> &nbsp;
					<input type="SUBMIT"  value="Register" id="registerbutton" />
				</div>
			</div>
		</div>
			</form>
			<script>
				$(document).ready(function(){
				  $("#txtemail").click(function(){
				    $("msgerror").hide();
				  });
				});
		</script>
		<div class="footer">
					<p>Copyright &copy; Allrights Reserved</p>
				</div>
		</body>

</html>