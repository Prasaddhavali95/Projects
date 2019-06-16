<?php
	include("config/config.php");

	$id = $_REQUEST['edit_id'];
	$sql = "select * from project where project_id = $id";
	$res = mysql_query($sql) 
		or die("Cannot Execute Query");
	while ($out = mysql_fetch_row($res)) {
		$id = $out[0];
		$uid = $out[1];
		$name = $out[2];
		$product = $out[3];
		$startdate = $out[4];
		$enddate = $out[5];
	}

	session_start();
	$_SESSION['name'];
	if(!isset($_SESSION['name']))
	{
		header("Location: index.php");
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
	</head>
	<form method="post" action="editproject_check.php">
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
				<font color="#080404" size="3px"> <b> Edit Project </b> </font>

			</div>
						<tr>
							<th align="left" id="textid" > Name</th>
							
							<td><input type="textbox"
										name="txtproject"
										class="textreg" 
										value="<?php echo $name; ?>" />
							</td>

						</tr>
						<tr>
							<th align="left" id="textid" >Product</th>
							
							<td><input type="textbox"
										name="txtproduct"										
										class="textreg" 
										value="<?php echo $product; ?>" /> 
										
							</td>

						</tr>
						<tr>
							<th align="left" id="textid" >Start Date</th>
							
							<td><input type="textbox"
										name="startdate"
										id="inputField" 
										class="textreg" 
										value="<?php echo $startdate; ?>" />
							</td>

						</tr>
						<tr>
							<th align="left" id="textid" >End Date</th>
							<td><input type="textbox"
										name="enddate" 
										id="enddate"
										class="textreg" 
										value="<?php echo $enddate; ?>" />
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
					<p>Copyright &copy; Allrights Reserved</p>
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