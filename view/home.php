<?php 
	include_once '../controller/index_controller.php';
	if(isset($_GET['id'])){
		$user_id = $_GET['id'];
	}else{
		$user_id = 0;
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<script type="text/javascript" src="https://www.amcharts.com/lib/amcharts.js"></script>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div class="container">
		<div class="row" style="margin-top: 15%;">
			<div class="col-sm-4">
				<?php		
					$student_details = get_students_details();
					foreach ($student_details as $key => $student_detail) {
						echo "<a href='home.php?id=".$student_detail['id']."'>".$student_detail['student_name']."</a><br/><br/>";
					}
				?>
			</div>
			<div class="col-sm-8">
			<?php if($user_id!=0){ 

				$student_mark = get_student_mark($user_id);
				if($student_mark != "empty"){
					$maths = $student_mark[0]['maths'];
					$physics = $student_mark[0]['physics'];
					$chemistry = $student_mark[0]['chemistry'];
				}else{
					
					echo "Mark has not entered yet";
				}
			?>

			<script type="text/javascript">
					var chart;
					var legend;

					var chartData = [{
					    country: "Maths",
					    value: <?php echo $maths; ?>},
					{
					    country: "Physics",
					    value: <?php echo $physics; ?>},
					{
					    country: "Che",
					    value: <?php echo $chemistry; ?>}];

					AmCharts.ready(function() {
					    // PIE CHART
					    chart = new AmCharts.AmPieChart();
					    chart.dataProvider = chartData;
					    chart.titleField = "country";
					    chart.valueField = "value";
					    chart.outlineColor = "";
					    chart.outlineAlpha = 0.8;
					    chart.outlineThickness = 2;
					    // this makes the chart 3D
					    chart.depth3D = 20;
					    chart.angle = 30;

					    // WRITE
					    chart.write("chartdiv");
				});
				<?php } ?>

			</script>











				<?php if($user_id!=0){ ?>
				<div id="chartdiv"></div>
				<?php }else{ ?>
					<p>Please Select a Student to view chart</p>
				<?php } ?>
			</div>
		</div>
	</div>
</body>
</html>