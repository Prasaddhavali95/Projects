<?php
	include("config/config.php");
	session_start();
	$_SESSION['name'];
	$u_id=$_SESSION['id'];
	if(!isset($_SESSION['name']))
	{
		header("Location: index.php");
	}
	$project_id = $_REQUEST['project_id'];
	$sql = "select * from story where project_id='$project_id';";
	$res = mysql_query($sql) 
		or die("can not execute query");

?>
<html>
	<head>
		<title>agile srcum tool :: List story </title>
		<link rel="stylesheet" type="text/css" href="style/styledrop.css">
		<link rel="stylesheet" type="text/css" href="style/style.css">
		<script type="text/javascript" src="accordation1.js"></script>
	</head>
	<body>
		<div class="title">
			<font color="#ffffff" size="5px"> <b> Agile Scrum Tool(Project Management) </b> </font>
		</div>
		<div class = "right"> Welcome <?php echo $_SESSION['name']?>|<a href = "logout.php">Logout</a></div>
		<div class="bgbackground">
			<div class="wrapper border_class">
				<div class="menu">
					<ul class="type">
						<li ><a href="#"><b>  My Work </b></a></li>
						<li><a href="#"><b>Reporting</b></a></li>
					</ul>
				</div>	
			</div>
		<?php include "includes/menu_left.php";  ?>

		<div class="listproject">
			<form method="post" action="assign_stories_check.php">				
				<?php if(isset($_REQUEST['flag']) && $_REQUEST['flag'] == 1) { ?>
					<p class="error"> Please select the Iteration. </p>
				<?php } ?>
				<?php if(isset($_REQUEST['flag']) && $_REQUEST['flag'] == 2) { ?>
					<p class="error"> Please select stroies for iteration. </p>
				<?php } ?>					
				<h4> Select Iteration </h4>
				<?php
					$sql_iteration = "select * from iteration where project_id='$project_id';";
					$res_iteration = mysql_query($sql_iteration) 
						or die("can not execute query");
				?>
				<select name="iteration" id="comboproject">
					<option value="">Not Selected</option>
					<?php
						while($out_iteration = mysql_fetch_row($res_iteration))
						{
							$iteration_id = $out_iteration[0];
							$iteration_name = $out_iteration[3];
						?>
							<option value="<?php echo $iteration_id; ?>"><?php echo $iteration_name; ?></option>
					<?php
						}
					?>
				</select>			
				<h4> Select Stories </h4>
				<table border="0" cellpadding="5" cellspacing="8" class="pro_list_table">
					<tr>
						<th></th>
						<th>Story</th>
						<th>State</th>
						<th>Story Point</th>
					</tr>
					<?php if(mysql_num_rows($res) > 0){ ?>
						<?php
							while($out = mysql_fetch_row($res))
							{
								$story_id = $out[0];
								$u_id = $out[1];
								$project_id = $out[2];
								$project = $out[3];
								$story = $out[4];
								$state = $out[5];
								$story_point = $out[6];
							
						?>
						<tr>
							<td> 
								<input type="checkbox" name="txtCheckBox[]" value="<?php echo $story_id; ?>" /> 
							</td>
							<td> <?php echo $story; ?> </td>				
							<td> <?php echo $state; ?> </td>	
							<td> <?php echo $story_point; ?> </td>	
						</tr>
						<?php }?>
					<?php } else {
							?>
								<tr>
									<td colspan="3">
										<p> No Stories created for this project. </p>
										<a href="storynew.php"> 
											<font color="blue">Click here to create </font> 
										</a>
									</td>
								</tr>								
							<?php
						} ?>
				</table>
				<input type="hidden" value="<?php echo $project_id; ?>" name="txtProjectId">
				<input type="submit" value="Assign Stories" class="button_design" />				
			</form>
		</div>
<div class="footer">
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
	</body>
</html>