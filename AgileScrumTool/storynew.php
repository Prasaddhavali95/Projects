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
		<title>agile srcum tool :: create story </title>
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
		<script type="text/javascript" src="validation2.js"></script>
	</head>
	<form method="post" action="story_check.php" onsubmit="return validate()">
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
				<font color="#080404" size="3px"> <b> Create story </b> </font>

			</div>
						<tr>
							<th align="left" id="textid" > Project</th>
							
							<td>
								<select name="comboproject" id="comboproject">
								<option value="project" selected="selected">Not Selected</option>
								<?php

									$query="select name, project_id from project where user_id='$u_id';";
									$result=mysql_query($query);
									while($count=mysql_fetch_row($result))
									{
										$project_name=$count[0];
									?>
										<option value="<?php echo $count[1]; ?>"><?php echo $project_name; ?></option>
								<?php
									}

								?>
							</select>
							</td>

						</tr>
						<tr>
							<th align="left" id="textid" >Story</th>
							
							<td><input type="textbox"
										name="txtstory"
										id="txtstory"
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

						</tr>
						<tr>
							<th align="left" id="textid" >State</th>
							
							<td>
							<select name="combostate" id="combostate">
								<option>Not Started</option>
								<option>In Progress</option>
								<option>Done</option>
							</select>
							<div id="error2" class="error">
							</td>

						</tr>
						<tr>

							<th align="left" id="textid" >Hours Required</th>
							<td>

							<select name="combohrs" id="combohrs">
								<?php
									for ($i=1; $i <= 24; $i++) 
									{ 
										$Hours=$i;
									
								?>
								<option><?php echo $Hours ?></option>
								<?php
									}
								?>
							</select>
							</td>
						</tr>
						<tr>
							<th align="left" id="textid" >Story Point</th>
							<td>
							<select  name="cbostorypoint" id="cbostorypoint">
								<?php
									$fibo0=0;
									$fibo1=1;
									for ($i=0; $i < 10; $i++)
									{ 
										$fibo=$fibo0+$fibo1;
									?>
										<option>
											<?php
												echo $fibo;
											?>
										</option>
									<?php
										$fibo0=$fibo1;
										$fibo1=$fibo;
									}
								?>
								</select>
							</td>

						</tr>
					</table>
				</div>
				<div class="newprojectbuttonform">
					<input type="Reset" value="Cancel" id="newprojectbutton" /> &nbsp;
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