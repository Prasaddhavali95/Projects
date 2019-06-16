<?php
	include("config/config.php");
	session_start();
	$_SESSION['name'];
	$u_id=$_SESSION['id'];
	if(!isset($_SESSION['name']))
	{
		header("Location: index.php");
	}

	$sql = "select * from story where user_id='$u_id';";
	$res = mysql_query($sql) or die("can not execute query");

?>
<html>
	<head>
		<title>agile srcum tool :: List story </title>
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
				<h4> Story Lists </h4>
				<table border="0" cellpadding="5" cellspacing="8" class="pro_list_table">
					<tr>
						<th>Story</th>
						<th>State</th>
						<th>Hours required</th>
						<th>Story Point</th>
						<th></th>
						<th></th>
					</tr>
					<?php
						while($out = mysql_fetch_row($res))
						{
							$story_id = $out[0];
							$u_id = $out[1];
							$project_id = $out[2];
							$project = $out[3];
							$story = $out[4];
							$state = $out[5];
							$hrs = $out[6];
							$story_point = $out[7];
							
							$delete_link = "delete_story_list.php?delete_id=$story_id";
							$edit_link = "editstory.php?edit_id=$story_id";
						
					?>
					<tr>
						<td> <?php echo $story; ?> </td>				
						<td> <?php echo $state; ?> </td>	
						<td> <?php echo $hrs; ?> </td>	
						<td> <?php echo $story_point; ?> </td>	
						<td><a href="<?php echo $delete_link; ?>"><font color="red" >Delete </font></a></td>
						<td><a href="<?php echo $edit_link ?>"><font color="blue" >Edit </font></a></td>
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
		</body>
	</form>
</html>