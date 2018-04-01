<?php 
include("header.php");
require('../../conexionDB.php');
include("../controlador/sesion.php");
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
						$query ="SELECT * FROM estadisticas WHERE codEstudiante =  '$cod' AND tema = '$i'";
					 	//Get result
						$resultado = mysqli_query($conexion,$query); 		
					 ?>
					 <?php switch ($i) {

						case '1':
					 		$tema = "Simple and continuous tenses";
					
					 		break;
					 	case '2':
					 		$tema = "Perfect verb tenses and passive voice";
					 		break;
					 
					 	case '3':
				 			$tema = "Prepositions";
					 		break;
					 	
					 	case '4':
					 		$tema = "Comparative and sueprlative";
				 			break;	
				 	
					 	default:
					 		$tema = "no has realizado examen de algún tema";
					 		break;

					} ?>
					<h3 id="titulo2"><?php echo $tema; ?></h3><br>
					<table id="tablaPuntuacion" style=" border-collapse: separate;border-spacing: 10px;    background: #f3c385;color: #131313;border: 1px solid #000;border-radius: 15px;display: inline-block;">
					<tr ">
						<th style="border-bottom: 1px solid #eee;">Test</th>
						<th style="border-bottom: 1px solid #eee;">Correct Answers</th>
						<th style="border-bottom: 1px solid #eee;">Note</th>
					</tr>					
					<?php while ($consulta = mysqli_fetch_array($resultado))  {
						//obteniendo el tipo de examen
					 if($consulta[2] == 0){
						$examen = "Initial";
					} elseif ($consulta[2] == 1) {
						$examen = "Final";
					} ?>
					<tr style="color: #000;">
					<?php $nota = $consulta[4] / 4 ?>						
						<td style="color: #000; border-bottom: 1px solid #eee;"><?php echo $examen ?></td>
						<td style="color: #000;border-bottom: 1px solid #eee;"><?php echo $consulta[4],"/15"?></td>
						<td style="color: #000;border-bottom: 1px solid #eee;"><?php echo $nota?></td>
					</tr>
					<?php } ?>					
					 </table><br><br><br>
					 
			<?php

		//Para el examen 0 del capitulo 1
      		$query ="SELECT puntuacion FROM estadisticas WHERE codEstudiante =  '$cod' AND tema = 1 AND examen = 0";
			$resultado = mysqli_query($conexion,$query); 
			$puntuexamen = mysqli_fetch_array($resultado);

		//Para el examen 1 del capitulo 1
      		$query1 ="SELECT puntuacion FROM estadisticas WHERE codEstudiante =  '$cod' AND tema = 1 AND examen = 1";
			$resultado1 = mysqli_query($conexion,$query1); 
			$puntuexamen1 = mysqli_fetch_array($resultado1);	

		//Para el examen 0 del capitulo 2
      		$query2 ="SELECT puntuacion FROM estadisticas WHERE codEstudiante =  '$cod' AND examen = 0 AND tema = 2";
			$resultado2 = mysqli_query($conexion,$query2); 
			$puntuexamen2 = mysqli_fetch_array($resultado2);

		//Para el examen 1 del capitulo 2
      		$query2f ="SELECT puntuacion FROM estadisticas WHERE codEstudiante =  '$cod' AND tema = 2 AND examen = 1";
			$resultado2f = mysqli_query($conexion,$query2f); 
			$puntuexamen2f = mysqli_fetch_array($resultado2f);

		//Para el examen 0 del capitulo 3
      		$query3 ="SELECT puntuacion FROM estadisticas WHERE codEstudiante =  '$cod' AND tema = 3 AND examen = 0";
			$resultado3 = mysqli_query($conexion,$query3); 
			$puntuexamen3 = mysqli_fetch_array($resultado3);
		//Para el examen 1 del capitulo 3
			$query3F ="SELECT puntuacion FROM estadisticas WHERE codEstudiante =  '$cod' AND tema = 3 AND examen = 1";
		 	//Get result
			$resultado3F = mysqli_query($conexion,$query3F); 
			$puntuexamen3f = mysqli_fetch_array($resultado3F);
		//Para el examen 0 del capitulo 4
      		$query4 ="SELECT puntuacion FROM estadisticas WHERE codEstudiante =  '$cod' AND tema = 4 AND examen = 0";
		 	//Get result
			$resultado4 = mysqli_query($conexion,$query4); 
			$puntuexamen4 = mysqli_fetch_array($resultado4);
		//Para el examen 1 del capitulo 4
      		$query4f ="SELECT puntuacion FROM estadisticas WHERE codEstudiante =  '$cod' AND tema = 4 AND examen = 1";
		 	//Get result
			$resultado4f = mysqli_query($conexion,$query4f); 
			$puntuexamen4f = mysqli_fetch_array($resultado4f);
	   ?>	<?php
					}
					 ?>	 
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		    <script type="text/javascript">
		      google.charts.load('current', {'packages':['bar']});
		      google.charts.setOnLoadCallback(drawChart);
		      
		      function drawChart() {
		        var data = google.visualization.arrayToDataTable([
		          ['Theme', 'Initial', 'Final'],
		          ['Simple T/Continuous T',  <?php echo $puntuexamen[0]; ?>, <?php echo $puntuexamen1[0]; ?>],
		          ['Perfect T/Passive V',  <?php echo $puntuexamen2[0]; ?>, <?php echo $puntuexamen2f[0]; ?>],
		          ['Prepositions',  <?php echo $puntuexamen3[0]; ?>, <?php echo $puntuexamen3f[0]; ?>],
		          ['Comparative/Superlative',  <?php echo $puntuexamen4[0]; ?>, <?php echo $puntuexamen4f[0]; ?>]
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