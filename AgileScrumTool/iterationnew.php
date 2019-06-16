<?php
	session_start();
	include("config/config.php");
	$_SESSION['name'];
	if(!isset($_SESSION['name']))
	{
		header("Location: index.php");
	}
	$u_id=$_SESSION['id'];

	if(isset($_GET['log']))
		{
			$log__itt_name=base64_decode($_GET['log']);

		}



?>
<html>
	<head>
		<title>agile srcum tool :: create iteration </title>
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
					target:"inputField_enddate",
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
		<script type="text/javascript" src="validation3.js"></script>

		<script src="jquery-1.8.0.min.js">
		</script>
	</head>
	<form method="post" action="iteration_check.php" onsubmit="return validate()">
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
				<font color="#080404" size="3px"> <b> Create iteration </b> </font>

			</div>
						<tr>
							<th align="left" id="textid" >Iteration Name</th>
							
							<td><input type="textbox"
										name="txtiterationname"
										id="txtiterationname"
										class="textreg" 
										size="40px" value="<?php
														if(isset($_GET['log']))
														{  echo $log__itt_name;} ?>"/>
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
							<th align="left" id="textid" >Project</th>
							
							<td><select name="comboproject" id="comboproject">
								<option>Not Selected</option>
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
							<th align="left" id="textid" >Start Date</th>
							
							<td><input type="startdate"
										name="startdate"
										id="inputField" 
										class="textreg" 
										 size="40px"/>
										<div id="error2" class="error"></div>
							</td>

						</tr>
						<tr>
							<th align="left" id="textid" >End Date</th>
							<td><input type="enddate"
										name="enddate" 
										id="inputField_enddate"
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
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-36251023-1']);
		  _gaq.push(['_setDomainName', 'jqueryscript.net']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>	
		<script>
				$(document).ready(function(){
				  $("#txtiterationname").click(function(){
				    $("msgerror").hide();
				  });
				});
		</script>
		</body>
	</form>
</html>