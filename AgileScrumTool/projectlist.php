<?php
	include("config/config.php");
	session_start();

	$u_id=$_SESSION['id'];

	$sql = "select * from project where user_id='$u_id';";
	$res = mysql_query($sql) or die("can not execute query");

	
	$_SESSION['name'];
	if(!isset($_SESSION['name']))
	{
		header("Location: index.php");
	}

	
?>
<html>
	<head>
		<title>agile srcum tool :: List project </title>
		<link rel="stylesheet" type="text/css" href="style/styledrop.css">
		<script type="text/javascript" src="accordation1.js"></script>
	</head>
	<form method="post" action="index_check.php">
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
			<div class="listproject">
				<h4> Projects </h4>
				<table border="0" cellpadding="5" cellspacing="8" class="pro_list_table">
					
					<tr>
						<!-- <th>ID</th>
						<th>USER_ID</th> -->
						<th>Project Name</th>
						<th>Product Name</th>
						<th>Start Date</th>
						<th>End Date</th>
						<th>Edit</th>
						<th>Delete</th>
						<th>Assign Stories</th>
					</tr>
					<?php
						while($out = mysql_fetch_row($res))
						{
							$id = $out[0];
							$u_id = $out[1];
							$name = $out[2];
							$product = $out[3];
							$startdate = $out[4];
							$enddate = $out[5];
							$delete_link = "delete_project_list.php?delete_id=$id";
							$edit_link = "editproject.php?edit_id=$id";
							$assign_stories = "assign_stories.php?project_id=$id";
					?>
					<tr>
						<td> <?php echo $name; ?> </td>
						<td> <?php echo $product; ?> </td>				
						<td> <?php echo $startdate; ?> </td>	
						<td> <?php echo $enddate; ?> </td>	
						<td><a href="<?php echo $delete_link; ?>"><font color="red">Delete </font></a></td>
						<td><a href="<?php echo $edit_link ?>"><font color="blue">Edit </font></a></td>
						<td><a href="<?php echo $assign_stories ?>"><font color="blue">Assign Stories</font></a></td>
					</tr>
					<?php }?>
				</table>
			</div>
	<div class="footer">
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

		</body>
	</form>
</html>