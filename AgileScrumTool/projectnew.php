<?php
	session_start();
	$_SESSION['name'];
	if(!isset($_SESSION['name']))
	{
		header("Location: index.php");
	}

	if(isset($_GET['log']))
	{
		$log__pro_name=base64_decode($_GET['log']);

	}


?>
<html>
	<head>
		<title>agile srcum tool :: create project </title>
		<link rel="stylesheet" type="text/css" href="style/styledrop.css">
		<script type="text/javascript" src="accordation1.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />

		<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>
		<script type="text/javascript">
			window.onclick = function(){
				new JsDatePick({
					useMode:2,
					target:"inputField",
					dateFormat:"%Y-%m-%d"
					
				});

				new JsDatePick({
					useMode:2,
					target:"enddate",
					dateFormat:"%Y-%m-%d"
					
				});
			};
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
		<script type="text/javascript" src="validation1.js"></script>

		<script src="jquery-1.8.0.min.js">
		</script>
	</head>
	<form method="post" action="project_check.php" onsubmit="return validate()">
		<body>
			<div class="title">
				<font color="#ffffff" size="5px"> <b> Agile Scrum Tool(Project Management) </b> </font>
			</div>
			<div class = "right"> Welcome <?php echo $_SESSION['name']?>|<a href = "logout.php">Logout</a></div>
			<div class="bgbackground">
				<div class="wrapper border_class">


				<div class="menu">
					<ul class="type" >
					
						<li ><a href="#"><b>  My Work </b></a></li>
						<li><a href="#"><b>Reporting</b></a></li>
					</ul>
				</div>	
			</div>
			
			<?php include "includes/menu_left.php";  ?>

			<div class="newproject"> 
			
					<table border="0" cellspacing="6" cellpadding="6" align="center" >
							<div class="title1">
				<font color="#080404" size="3px"> <b> Create Project </b> </font>

				</div>
						<tr>
							<th align="left" id="textid" > Name</th>
							
							<td><input type="textbox"
										name="txtproject"
										id="txtproject"
										class="textreg" 
										size="40px" value="<?php
														if(isset($_GET['log']))
														{  echo $log__pro_name;} ?>"/>
										<div id="error" class="error">
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
										</div>
							</td>

						</tr>
						<tr>
							<th align="left" id="textid" >Product</th>
							
							<td><input type="textbox"
										name="txtproduct"
										id="txtproduct"
										class="textreg" 
										 size="40px"/>
										<div id="error1" class="error"></div>
										
							</td>

						</tr>
						<tr>
							<th align="left" id="textid" >Start Date</th>
							
							<td><input type="textbox"
										name="startdate"
										id="inputField" 
										class="textreg" 
										 size="40px"/>
										<div id="error2" class="error"></div>
							</td>

						</tr>
						<tr>
							<th align="left" id="textid" >End Date</th>
							<td><input type="textbox"
										name="enddate" 
										id="enddate"
										class="textreg" 
										size="40px"/>
										<div id="error3" class="error"></div>
							</td>

						</tr>
					</table>
				</div>
				<div class="newprojectbuttonform">
					<input type="Reset" value="Cancel" id="newprojectbutton" /> &nbsp;
					<input type="SUBMIT"  value="Create" id="newprojectbutton" />
				</div>

	<div class="footer1">
		  Copyright &copy; 2014 All Right Reserved.	  <a href="home.php">| Home |</a> 

				</div>
</div>



		<script src="accordation.js"></script> 
		<script>
		$(function() {
			var Accordion = function(el, multiple) {
				this.el = el || {};
				this.multiple = multiple || false;

				// Variables privadas
				var links = this.el.find('.link');
				// Evento
				links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
			}

			Accordion.prototype.dropdown = function(e) {
				var $el = e.data.el;
					$this = $(this),
					$next = $this.next();

				$next.slideToggle();
				$this.parent().toggleClass('open');

				if (!e.data.multiple) {
					$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
				};
			}	

			var accordion = new Accordion($('#accordion'), false);
		});
		</script>
		<script>
				$(document).ready(function(){
				  $("#txtproject").click(function(){
				    $("msgerror").hide();
				  });
				});
		</script>
		</body>
	</form>
</html>