<?php
	include("config/config.php");

	$id = $_REQUEST['edit_id'];
	$sql = "select * from story where story_id= $id";
	$res = mysql_query($sql) 
		or die("Cannot Execute Query");
	while ($out = mysql_fetch_row($res)) {
		$id = $out[0];
		$uid = $out[1];
		$pid = $out[2];
		$project = $out[3];
		$story = $out[4];
		$state = $out[5];
		$hrs = $out[6];
		$point = $out[7];
	}

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
	<form method="post" action="editstory_check.php" onsubmit="return validate()">
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
			
					<table border="0" cellspacing="6" cellpadding="6" align="center"  >
							<div class="title1">
				<font color="#080404" size="3px"> <b> Edit story </b> </font>

			</div>
						<tr>
							<th align="left" id="textid" > Project</th>
							
							<td>
								<select name="comboproject" id="comboproject" >
								<option value="<?php echo $project; ?>">Not Selected</option>
								<?php

									$query="select name, project_id from project where user_id='$u_id';";
									$result=mysql_query($query);
									while($count=mysql_fetch_row($result))
									{
										$project_name=$count[0];
										$the_project_id = $count[1];
									?>
										<option value="<?php echo $the_project_id; ?>"
												<?php if($pid == $the_project_id) echo "selected='selected'"; ?>>
											<?php echo $project_name; ?>
										</option>
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
										class="textreg" 
										value="<?php echo $story; ?>"
										 size="40px"/>
										<div id="error1" class="error">
										
							</td>

						</tr>
						<tr>
							<th align="left" id="textid" >State</th>
							
							<td>
							<select name="combostate" id="combostate">								
								<option <?php if($state == "Not Started") echo "selected='selected'"; ?>>
									Not Started
								</option>
								<option <?php if($state == "In Progress") echo "selected='selected'"; ?>>
									In Progress
								</option>
								<option <?php if($state == "Done") echo "selected='selected'"; ?>>
									Done
								</option>
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
									<option <?php if($hrs == $i) echo "selected='selected'"; ?>>
										<?php echo $Hours ?>
									</option>
								<?php
									}
								?>
							</select>
							</td>
						</tr>
						<tr>
							<th align="left" id="textid" >Story Point</th>
							<td>
							<select  name="cbostorypoint" id="cbostorypoint"  value="<?php echo $point; ?>">
								<?php
									$fibo0=0;
									$fibo1=1;
									for ($i=0; $i < 10; $i++)
									{ 
										$fibo=$fibo0+$fibo1;
									?>
										<option <?php if($point == $fibo) echo "selected='selected'"; ?>>
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
							<td><input type="hidden" name="txtid" id = "textid" value=<?php echo "$id";?> > </td>
						</tr>
					</table>
				</div>
				<div class="newprojectbuttonform">
					<input type="Reset" value="Cancel" id="newprojectbutton" /> &nbsp;
					<input type="SUBMIT"  value="Save" id="newprojectbutton" />
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

		</body>
	</form>
</html>