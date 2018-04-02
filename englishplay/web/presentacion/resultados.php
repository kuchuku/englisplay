<?php 
include("header.php");
require('../../conexionDB.php');
include("../negocio/sesion.php");
include("../negocio/pregunta.php");
?>

	<body>
		<section style="padding-top: 0rem; padding-bottom: 0rem; background-color: rgba(230,167,86,.9);">
	    <div class="container">
			<div class="row">
	          	<div class="col-xl-9 mx-auto">
	            	<div class="cta text-center rounded" style="background-color: rgba(255,255,255,.85);    position: relative;  padding: 3rem;  margin: .5rem;" > 		
					<br>
				<h2 style="margin-bottom: 2rem;font-family: Raleway;    font-size: 2rem;">
	                <span style="display: block;font-size: 1rem; font-weight: 800;text-transform: uppercase;"">Congrats! You have completed the test</span>
	                <span style="display: block; font-size: 3rem;font-weight: 100;text-transform: uppercase;">Check your results</span>
	              </h2>	
				<br>
				<?php 
					$tipoExamen = $_POST['exam'];
					$capExamen = $_POST['cap'];
					questionsInBD($tipoExamen,$capExamen);				 		
				?>	</div>	

		
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    	<script type="text/javascript">
	      google.charts.load('current', {'packages':['corechart']});
	      google.charts.setOnLoadCallback(drawChart);

      	function drawChart() {

	        var data = google.visualization.arrayToDataTable([
	          ['Task', 'Hours per Day'],
	          ['Aciertos', <?php echo $_SESSION['score']; ?> ],
	          ['Fallos', <?php $fallos = 15 - $_SESSION['score']; echo $fallos; ?> ]
       		 ]);

	        var options = {
	          title: 'Resultados examen'
	        };
        	var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        	chart.draw(data, options);
      		}
      	</script>
		<div id="piechart"></div>
		<br><p style="display: block;font-size: 1rem;font-weight: 800;text-align: center;    color: #ab4d30;">Final Score: <?php echo $_SESSION['score']; ?></p>		
		<br>		
		<a type="submit" href="index.php" style="display: block;text-align: center;width: 15%;margin: auto;color: #0c0c0c;background: #d49b51;">Continue</a>
		<br>
	</div>
	</div>
	<?php 
		$score =  $_SESSION['score'];
		regExam($tipoExamen,$capExamen,$score);
	 ?>
</div>
	</div>
</body>
</section>
<?php 
include("footer.php");
 ?>