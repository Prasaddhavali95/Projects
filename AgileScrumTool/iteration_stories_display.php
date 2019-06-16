<?php
	include("config/config.php");
	session_start();
	$_SESSION['name'];
	$u_id=$_SESSION['id'];
	if(!isset($_SESSION['name']))
	{
		header("Location: index.php");
	}
	$iteration_id = $_REQUEST['iteration_id'];

	$sql_iteration_info = "select * from iteration where iteration_id = $iteration_id";
	$res_iteration_info = mysql_query($sql_iteration_info);
	$out_iteration_info = mysql_fetch_row($res_iteration_info);

	$sql = "select * from story s, story_iteration_assign sia 
				where s.story_id = sia.story_id and sia.iteration_id = $iteration_id";
	$res = mysql_query($sql) or die("can not execute query");

	/* Calculate the planned time */
	$total_time = 0;
	while ($out_planned = mysql_fetch_row($res)) {
		$total_time = $total_time + $out_planned[6];
	}
	
	$begin = new DateTime($out_iteration_info[4]);
	$end = new DateTime($out_iteration_info[5]);
	$interval = DateInterval::createFromDateString('1 day');
	$period = new DatePeriod($begin, $interval, $end);

	$date_array = array();
	$planned_array = array();
	$total_days = 0;
	foreach ( $period as $dt ){
		$date_array[] = "'" . $dt->format("d M") . "'";
		$total_days++;
	}
	$date_list = implode(",", $date_array);
	$per_day_work = $total_time / $total_days;

	$intermediate_time = $total_time;
	foreach ( $period as $dt ){
		$planned_array[] = $intermediate_time;
		$intermediate_time = $intermediate_time - $per_day_work;
	}
	$planned_work = implode(",", $planned_array);

	/* Calculate the actual time taken by the users */
	$sql = "select * from story s, story_iteration_assign sia 
				where s.story_id = sia.story_id and sia.iteration_id = $iteration_id and s.state = 'Done'
				order by s.end_date_time DESC";
	$res = mysql_query($sql) or die("can not execute query");
	$array_date_array = array();
	while ($out_second = mysql_fetch_row($res)) {
		$array_date_array[] = array(
				'start' => $out_second[9],
				'end' => $out_second[8]
			);
	}

	// echo "<pre>";
	// print_r($array_date_array);
	// echo "</pre>";

	/* Get the last date done work */
	$sql = "select * from story s, story_iteration_assign sia 
				where s.story_id = sia.story_id and sia.iteration_id = $iteration_id and s.state = 'Done'
				order by s.end_date_time DESC Limit 1";
	$res = mysql_query($sql) or die("can not execute query");
	$out_last_day = mysql_fetch_row($res);
	$last_day = $out_last_day[8];



	$begin = new DateTime($out_iteration_info[4]);
	$end = new DateTime($last_day);
	$interval = DateInterval::createFromDateString('1 day');
	$period = new DatePeriod($begin, $interval, $end);
	$count_hours = array();
	$count = 0;
	foreach ( $period as $dt ){
		$theDay = $dt->format("Y-m-d");
		$count_hours[$count] = 0;
		foreach ($array_date_array as $checkDay) {
			$start_date_check = date_create($checkDay['end']);
			$start_date_check_convert = date_format($start_date_check,"Y-m-d"); 
			if($start_date_check_convert == $theDay) {
				$daydiff = abs(round((strtotime($checkDay['start']) - strtotime($checkDay['end']))/(3600 * 24), 1));
				$count_hours[$count] = $count_hours[$count] + ($daydiff * 8);
			}
		}		
		$count++;
	}
	$actual_work = implode(",", $count_hours);

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
			        title: {
			            text: 'Burn Down Chart',
			            x: -20 //center
			        },
			        xAxis: {
			            categories: [<?php echo $date_list; ?>]
			        },
			        yAxis: {
			            title: {
			                text: 'Hours'
			            },
			            plotLines: [{
			                value: 0,
			                width: 1,
			                color: '#808080'
			            }]
			        },
			        tooltip: {
			            valueSuffix: ' Hrs'
			        },
			        series: [{
			            name: 'Expected Time',
			            data: [<?php echo $planned_work; ?>]
			        }, {
			            name: 'Time Taken',
			            data: [<?php echo $actual_work ?>]
			        }]
			    });
			});
		</script>	
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
						<li><a href="report.php"><b>Reporting</b></a></li>
					</ul>
				</div>	
			</div>
			<?php include "includes/menu_left.php";  ?>

			<div class="listproject">
				<table cellspacing="10" cellpadding="10">
					<tr>
						<td> Iteration Name </td>
						<td> : </td>
						<td> <?php echo $out_iteration_info[3]; ?> </td>
					</tr>
					<tr>
						<td> Iteration Start Date </td>
						<td> : </td>
						<td> <?php 
								$date = date_create($out_iteration_info[4]);
								echo date_format($date,"d M Y"); 
							?> 
						</td>
					</tr>
					<tr>
						<td> Iteration End Date </td>
						<td> : </td>
						<td> 
							<?php 
								$date = date_create($out_iteration_info[5]);
								echo date_format($date,"d M Y"); 
							?> 
						</td>
					</tr>
				</table>

				<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
				
				<h4> Story Lists </h4>
				<table border="0" cellpadding="5" cellspacing="8" class="pro_list_table">
					<tr>
						<th>Story</th>
						<th>State</th>
						<th>Story Hours</th>
						<th></th>
					</tr>
					<?php
						$sql = "select * from story s, story_iteration_assign sia 
									where s.story_id = sia.story_id and sia.iteration_id = $iteration_id";
						$res = mysql_query($sql) or die("can not execute query");
						while($out = mysql_fetch_row($res))
						{
							$story_id = $out[0];
							$u_id = $out[1];
							$project_id = $out[2];
							$project = $out[3];
							$story = $out[4];
							$state = $out[5];
							$story_point = $out[6];
							$edit_link = "editstory_fromiteration.php?edit_id=$story_id&iteration_id=$iteration_id";
					?>
					<tr>
						<td> <?php echo $story; ?> </td>				
						<td> <?php echo $state; ?> </td>	
						<td> <?php echo $story_point; ?> </td>	
						<td><a href="<?php echo $edit_link ?>"><font color="blue">Change State </font></a></td>
					</tr>
					<?php }?>
				</table>
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
	</form>
</html>