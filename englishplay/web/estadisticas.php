<?php 
include("header.php");
require('../conexionDB.php');
include("php/sesion.php");
?>
	<body>
		<main>		
			<div class="container"><br>
				<div class="container2"><br>
					<h2 id="titulo">Los resultados de tus examenes</h2><br><br>
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
					 		$tema = "Tiempos simples y compuestos";
					
					 		break;
					 	case '2':
					 		$tema = "Tiempos perfectos y voz pasiva";
					 		break;
					 
					 	case '3':
				 			$tema = "Preposiciones";
					 		break;
					 	
					 	case '4':
					 		$tema = "Comparativos y Superlativos";
				 			break;	
				 	
					 	default:
					 		$tema = "no has realizado examen de algún tema";
					 		break;

					} ?>
					<h3 id="titulo2"><?php echo $tema; ?></h3>
					<table id="tablaPuntuacion" ">
					<tr>
						<th>Examen</th>
						<th>Aciertos</th>
						<th>Nota</th>
					</tr>					
					<?php while ($consulta = mysqli_fetch_array($resultado))  {
						//obteniendo el tipo de examen
					 if($consulta[2] == 0){
						$examen = "Inicial";
					} elseif ($consulta[2] == 1) {
						$examen = "Final";
					} ?>
					<tr>
					<?php $nota = $consulta[4] / 4 ?>						
						<td><?php echo $examen ?></td>
						<td><?php echo $consulta[4]?></td>
						<td><?php echo $nota?></td>
					</tr>
					<?php } ?>					
					 </table><br>
					 
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
		          ['Tema', 'Inicial', 'Final'],
		          ['T.Simples/Compuestos',  <?php echo $puntuexamen[0]; ?>, <?php echo $puntuexamen1[0]; ?>],
		          ['T.perfectos/Voz Pasiva',  <?php echo $puntuexamen2[0]; ?>, <?php echo $puntuexamen2f[0]; ?>],
		          ['Preposiciones',  <?php echo $puntuexamen3[0]; ?>, <?php echo $puntuexamen3f[0]; ?>],
		          ['Comparativos/Superlativos',  <?php echo $puntuexamen4[0]; ?>, <?php echo $puntuexamen4f[0]; ?>]
		        ]);

		        var options = {
		          chart: {
		            title: 'Resultado de examenes',
		          }
		        };

		        var chart = new google.charts.Bar(document.getElementById('piechart2'));

		        chart.draw(data, google.charts.Bar.convertOptions(options));
		      }
		    </script>
		    
		    <br><br><div id="piechart2"></div><br><br>
		     
					
				</div>
			</div>
		</main>
	</body>
<?php 
include("footer.php");
 ?>