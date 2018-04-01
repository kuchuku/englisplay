<?php 
include("../negocio/estudiante.php");
?>
<head>	
 			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		    <script type="text/javascript">
		      google.charts.load('current', {'packages':['bar']});
		      google.charts.setOnLoadCallback(drawChart);

		      function drawChart() {
		        var data = google.visualization.arrayToDataTable([
		          ['', '',''],
		          ['<?php echo $porciento."%" ?>', <?php echo $porciento; ?>, 100]
		        ]);

		        	var options = {
		          width: 700,
		          legend: { position: 'none' },
		          bars: 'horizontal', // Required for Material Bar Charts.
		          series: { 
		          	0: { color: '#DEB605' },//66ED2F
		          	1: { color: '#000000' }, 
		      		},
		          axes: {
		            x: {
		              0: { side: 'down'} // Top x-axis.
		            }
		          },
		          bars: 'horizontal'
		        };
		        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

		        chart.draw(data, google.charts.Bar.convertOptions(options));
		      }
		    </script>

		   <link rel="stylesheet" href="css/styleStudent.css">
</head>


<body id="estudiante">

	<section style="padding-top: 0rem; padding-bottom: 20px; background-color: rgba(230,167,86,.2);">
	 	<div class="container">
	 	
	 		<h1 class="titulito"> Welcome <?php echo $nick ?></h1>

			<br>
	 			<h2>Selected Character</h2>
	 				<p><?php echo $skin ?></p>
			<br>
	 			<h2>Character Level</h2>
	 				<p><?php echo $nivel ?></p>
	 		<br>
	 			<h2>Character Experience</h2>
	 				<p><?php echo $experiencia ?></p>
	 		<br>
	 			<h2>Gold Available</h2>
	 				<p><?php echo $oro ?></p>
	 		<br>
	 			<h2>Unlocked World</h2>
	 				<p><?php echo $nomMundo ?> </p><br>
	 				<p><?php echo $imgMundo ?> </p> 

	 		<br>
	 			<h2>Progress in the Game</h2>
	 				<p><div id="barchart_material" style="width: 98%; height: 60px;" align="center"></div></p>
	 		<br>
				<h2>Purchases</h2>
					<p><table id="compra" border="1" align="center">
						 	<?php echo $table?>				 	
						</table></p>
			<br>
				<h1 class="titulito">Challenges</h1>
					<h2>Village</h2>
						<p><table border="1" align="center">
								<tr>
									<th>Challenge</th>
									<th>Questions</th>
									<th>Correct answers</th>
								</tr>
							 	<?php echo $table1?>				 	
							</table></p>
					<h2>Forest</h2>
						<p><table border="1" align="center">
								<tr>
									<th>Challenge</th>
									<th>Questions</th>
									<th>Correct answers</th>
								</tr>
							 	<?php echo $table2?>				 	
							</table></p>
					<h2>Cave</h2>
						<p><table border="1" align="center">
								<tr>
									<th>Challenge</th>
									<th>Questions</th>
									<th>Correct answers</th>
								</tr>
							 	<?php echo $table3?>				 	
							</table></p>
					<h2>Castle</h2>
						<p><table border="1" align="center">
								<tr>
									<th>Challenge</th>
									<th>Questions</th>
									<th>Correct answers</th>
								</tr>
							 	<?php echo $table4?>				 	
							</table></p>
			</div>
	</section> 			

</body>
<!-- Fin HTML -->

<?php 
	include("footer.php");
?>