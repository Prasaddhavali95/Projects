<?php
	session_start();
	$_SESSION['name'];
	if(!isset($_SESSION['name']))
	{
		header("Location: index.php");
	}
	$u_id = $_SESSION['id'];

	include("config/config.php");

	// Get the people of main user_id
	$sql_team_main = "select * from linkuesr l, user u where l.user_linkid = u.user_id and l.user_id = $u_id";
	$result_team_main = mysql_query($sql_team_main) or die("Dead");

?>
<html>
	<head>
		<title>agile srcum tool :: List team </title>
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
					<h4> Team </h4>
					<table border="0" cellpadding="5" cellspacing="8" class="pro_list_table">
						<tr>
							<th>Name</th>
							<th>Email Id</th>
							<th>Delete</th>
							<th>Edit</th>
						</tr>
						<?php
							while($out = mysql_fetch_row($result_team_main))
							{
								$id= $out[2];
								$email = $out[4];
								$name = $out[7];
								$delete_link = "delete_team_list.php?delete_id=$id";
								$edit_link = "editteam.php?edit_id=$id";
						?>
						<tr>
							<td> <?php echo $name; ?> </td>
							<td> <?php echo $email; ?> </td>				
							<td><a href="<?php echo $delete_link; ?>"><font color="red">Delete </font></a></td>
						<td><a href="<?php echo $edit_link ?>"><font color="blue">Edit </font></a></td>
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