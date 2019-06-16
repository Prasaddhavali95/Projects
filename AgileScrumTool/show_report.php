<?php
	include("config/config.php");
	session_start();
	$u_id=$_SESSION['id'];
	if(!isset($_SESSION['name']))
	{
		header("Location: index.php");
	}

	$project_id = $_REQUEST['txtProject'];
	$sql_stories = "select * from story where project_id = $project_id";
	$res_stories = mysql_query($sql_stories);
	$stories = array();
	$hours = array();
	$states = array();
	$total_hours = 0;
	while ($out_stories = mysql_fetch_row($res_stories)) {
		$stories[] = $out_stories[4];
		$hours[] = $out_stories[6];
		$total_hours = $total_hours + $out_stories[6];
		$states[] = $out_stories[5];
	}

	$story_percentage_array = array();
	$display_in_graph = array();
	$count = 0;
	$hours_done = 0;
	$hours_not_done = 0;
	$total_stories_done = 0;
	$total_stories_not_done = 0;
	foreach ($hours as $hour) {
		$story_percentage_array[] = array(
				$stories[$count],
				($hour / $total_hours) * 100
			);
		if($states[$count] == "Done") {
			$hours_done = $hours_done + $hour;
			$total_stories_done++;
		}
		else{
			$hours_not_done = $hours_not_done + $hour;
			$total_stories_not_done++;
		}
		$count++;
	}
	$total_done_percentage = ($hours_done / $total_hours) * 100;
	$total_notdone_percentage = ($hours_not_done / $total_hours) * 100;
?>
<html>
	<head>
		<title>agile srcum tool :: List story </title>
		<link rel="stylesheet" type="text/css" href="style/styledrop.css">
		<script src="accordation.js"></script> 
		<script src="js/highcharts.js"></script>
		<script type="text/javascript">
			$(function () {
			    $('#container').highcharts({
			        chart: {
			            plotBackgroundColor: null,
			            plotBorderWidth: null,
			            plotShadow: false
			        },
			        title: {
			            text: 'Firefly Status'
			        },
			        tooltip: {
			            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			        },
			        plotOptions: {
			            pie: {
			                allowPointSelect: true,
			                cursor: 'pointer',
			                dataLabels: {
			                    enabled: true,
			                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
			                    style: {
			                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
			                    }
			                }
			            }
			        },
			        series: [{
			            type: 'pie',
			            data: [
			            	<?php 
			            		foreach ($story_percentage_array as $story) {
			            			echo "['" . $story[0] . "'," . $story[1] ."],";
			            		}
			            	?>
			            ]
			        }]
			    });
			});
		</script>	
	</head>
		<body>
			<div class="title">
				<font color="#ffffff" size="5px"> <b> Agile Scrum Tool(Project Management) </b> </font>
			</div>
			<div class = "right"> Welcome <?php echo $_SESSION['name']?>|<a href = "logout.php">Logout</a></div>
			<div class="bgbackground">
				<div class="wrapper border_class">

				<div class="menu">
					<ul class="type" >
						<li><a href="report.php"><b>Reporting</b></a></li>
					</ul>
				</div>
			</div>
			<?php include "includes/menu_left.php";  ?>

			<div class="listproject">
			<h4> Report of Projects </h4>
				<?php 
					$sql_projects = "select * from project";
					$res_projects = mysql_query($sql_projects);
				?>
				<div>
					<form action="show_report.php" method="post">
						Select Project whose Report needs to be shown :
						<select name="txtProject">
							<?php 
								while ($out_projects = mysql_fetch_row($res_projects)) {
							?>
								<option value="<?php echo $out_projects[0]; ?>"> <?php echo $out_projects[2]; ?></option>
							<?php
								}

							?>
						</select>
						<input type="submit" value="Show Report" />
					</form>
				</div>

				<div style="float: left; margin-right: 40px;">
					<h5> Total Done Stories </h5> 
					<h2 style="text-align: center;"> <?php echo $total_stories_done; ?> </h2>
				</div>				
				<div style="float: left; margin-right: 40px;">
					<h5> Total Remaining Stories </h5> 
					<h2 style="text-align: center;"> <?php echo $total_stories_not_done; ?> </h2>
				</div>
				<div style="float: left; margin-right: 40px;">
					<h5> Remaining Hours of Work </h5> 
					<h2 style="text-align: center;"> <?php echo $hours_not_done; ?>Hrs </h2>
				</div>	
				<div style="float: left; margin-right: 40px;">
					<h5> Total Percentage Completed </h5> 
					<h2 style="text-align: center;"> <?php echo round($total_done_percentage); ?>% </h2>
				</div>					
				<div style="clear: both;"></div>				
				<div>
					<div id="container" style="min-width: 800px; height: 400px; margin: 0 auto"></div>
				</div>
			</div>

	<div class="footer">
					<p>Copyright &copy; Allrights Reserved</p> <a href="home.php">| Home |</a> 
				</div>
</div>
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