<?php
	session_start();
	include("config/config.php");
	$_SESSION['name'];
	if(!isset($_SESSION['name']))
	{
		header("Location: index.php");
	}
	$u_id=$_SESSION['id'];
?>
<html>
	<head>
		<title>agile srcum tool :: create team </title>
		<link rel="stylesheet" type="text/css" href="style/styledrop.css">
		<script type="text/javascript" src="accordation1.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />

		<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>
		<script type="text/javascript">
			window.onclick = function(){
				new JsDatePick({
					useMode:2,
					target:"inputField",
					dateFormat:"%d-%M-%Y"
					
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
		<script type="text/javascript" src="validation4.js"></script>
	</head>
	<form method="post" action="team_check.php" onsubmit="return validate()">
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
			
			<!-- Contenedor -->
			<ul id="accordion" class="accordion">
			  <li>
			    <div class="link">Project</div>
			    <ul class="submenu">
			      <li><a href="projectnew.php">New</a></li>
			      <li><a href="projectlist.php">List</a></li>
			    </ul>
			  </li>
			  <li>
			    <div class="link"><i class="fa fa-code"></i>Story<i class="fa fa-chevron-down"></i></div>
			    <ul class="submenu">
			      <li><a href="storynew.php">New</a></li>
			      <li><a href="storylist.php">List</a></li>
			    </ul>
			  </li>
			  <li>
			    <div class="link"><i class="fa fa-mobile"></i>Iteration<i class="fa fa-chevron-down"></i></div>
			    <ul class="submenu">
			      <li><a href="iterationnew.php">New</a></li>
			      <li><a href="iterationlist.php">List</a></li>
			    </ul>
			  </li>
			  <li>
			    <div class="link"><i class="fa fa-globe"></i>Team<i class="fa fa-chevron-down"></i></div>
			    <ul class="submenu">
			     <li><a href="teamnew.php">New</a></li>
			      <li><a href="teamlist.php">List</a></li>
			    </ul>
			  </li>
			</ul>

<div class="newproject"> 
			
					<table border="0" cellspacing="6" cellpadding="6" align="center" >
							<div class="title1">
				<font color="#080404" size="3px"> <b> Create team </b> </font>

			</div>
						<tr>
							<th align="left" id="textid" > Name</th>
							
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
							
							<td><input type="textbox"
										name="txtemail"
										id="txtemail"
										class="textreg" 
										 size="40px"/>
										<div id="error1" class="error">
										<?php 
											if(isset($_REQUEST['flag']))
											 {
										?>
											<span >
												<center >Email allready taken</center>
											</sapn>
										<?php
									       }
										?>
							</td>
							<tr>
							<th align="left" id="textid" >Password</th>
							
							<td><input type="password"
										name="txtpassword"
										id="txtpassword"
										class="textreg" 
										 size="40px"/>
										<div id="error2" class="error">
										
							</td>
						</tr>
						
					</table>
				</div>
				<div class="newprojectbuttonform">
					<input type="Reset" value="Clear" id="newprojectbutton" /> &nbsp;
					<input type="SUBMIT"  value="Create" id="newprojectbutton" />
				</div>

	<div class="footer1">
					<p>Copyright &copy; Allrights Reserved</p><a href="home.php">| Home |</a>
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
		</body>
	</form>
</html>