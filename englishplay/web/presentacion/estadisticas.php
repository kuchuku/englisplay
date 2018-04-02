<?php 
include("header.php");
require('../../conexionDB.php');
include("../negocio/sesion.php");
include("../negocio/estadisticas.php");
?>
	<body>
		<section style="padding-top: 0rem; padding-bottom: 0rem; background-color: rgba(230,167,86,.9);">
	    <div class="container">
			<div class="row">
	          	<div class="col-xl-9 mx-auto">
	            	<div class="cta text-center rounded" style="background-color: rgba(255,255,255,.85);    position: relative;  padding: 3rem;  margin: .5rem;" > 		
					<br>
					<h2 style="margin-bottom: 2rem;font-family: Raleway;    font-size: 2rem;">
	                <span style="display: block;font-size: 1rem; font-weight: 800;text-transform: uppercase;"">You can now see all your scores </span>
	                <span style="display: block; font-size: 3rem;font-weight: 100;text-transform: uppercase;">In each test</span>
	              	</h2>	
					<?php 
						session_start();
						//recibe el codigo del estudiante que inició sesión.
						$cod = $_SESSION["codEst"];
						for ($i = 1; $i<= 4; $i++) {
						//obteber la información de los exámenes realizados por el estudiante
						$resultado = studentData($cod,$i); 		
					    $tema = obtenerTema($i);
					   ?>
					<h3 id="titulo2"><?php echo $tema; ?></h3><br>
					<table id="tablaPuntuacion" style=" border-collapse: separate;border-spacing: 10px;    background: #f3c385;color: #131313;border: 1px solid #000;border-radius: 15px;display: inline-block;">
					<tr ">
						<th style="border-bottom: 1px solid #eee;">Test</th>
						<th style="border-bottom: 1px solid #eee;">Correct Answers</th>
						<th style="border-bottom: 1px solid #eee;">Note</th>
					</tr>					
					<?php obtenerResultados($resultado);?>					
					 </table><br><br><br>
					 
			<?php
			//llamamos a los métodos para obtener las notas de los exámenes x mundo		
	      		$scoreInitialVillage = initialVillage($cod);
	      		$scoreFinalVillage = finalVillage($cod);
	      		$scoreInitialForest = initialForest($cod);		
	      		$scoreFinalForest = finalForest($cod);
	      		$scoreInitialCave = initialCave($cod);		
				$scoreFinalCave = finalCave($cod);	
	      		$scoreInitialCastle = initialCastle($cod);
	      		$scoreFinalCastle = finalCastle($cod);	
	  		}
			?>	 
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		    <script type="text/javascript">
		      google.charts.load('current', {'packages':['bar']});
		      google.charts.setOnLoadCallback(drawChart);
		      
		      function drawChart() {
		        var data = google.visualization.arrayToDataTable([
		          ['Theme', 'Initial', 'Final'],
		          ['Simple T/Continuous T',  <?php echo $scoreInitialVillage; ?>, <?php echo $scoreFinalVillage; ?>],
		          ['Perfect T/Passive V',  <?php echo $scoreInitialForest; ?>, <?php echo $scoreFinalForest; ?>],
		          ['Prepositions',  <?php echo $scoreInitialCave; ?>, <?php echo $scoreFinalCave; ?>],
		          ['Comparative/Superlative',  <?php echo $scoreInitialCastle; ?>, <?php echo $scoreFinalCastle; ?>]
		        ]);

		        var options = {
		          chart: {
		            title: 'Exam Results',
		          }
		        };

		        var chart = new google.charts.Bar(document.getElementById('piechart2'));

		        chart.draw(data, google.charts.Bar.convertOptions(options));
		      }
		    </script>
		    
		    <br><br><div id="piechart2"></div><br><br>
		     
					
				</div>
			</div>
		</div>
	</div>
</section>
	</body>
<?php 
include("footer.php");
 ?>