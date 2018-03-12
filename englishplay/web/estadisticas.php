<?php 
include("header.php");
require('../conexionDB.php');
include("php/sesion.php");
?>

<!DOCTYPE html>
<html>
	<link rel="stylesheet" type="text/css" href="css/preguntasForm.css" />
	<body>
		<main>		
			<div class="container"><br>
				<div class="container2">
					<br>
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
						<th>Puntuación</th>
					</tr>					
					<?php while ($consulta = mysqli_fetch_array($resultado))  {
						//obteniendo el tipo de examen
					 if($consulta[2] == 0){
						$examen = "Inicial";
					} elseif ($consulta[2] == 1) {
						$examen = "Final";
					} ?>
					<tr>						
						<td><?php echo $examen ?></td>
						<td><?php echo $consulta[4]?></td>
					</tr>
					<?php } ?>					
					 </table>
					 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			<?php  
		//Para el examen del capitulo 1
      		$query ="SELECT puntuacion FROM estadisticas WHERE codEstudiante =  '$cod' AND tema = 1";
		 	//Get result
			$resultado = mysqli_query($conexion,$query); 
			$consulta = mysqli_fetch_array($resultado);
		//Para el examen del capitulo 2
      		$query1 ="SELECT puntuacion FROM estadisticas WHERE codEstudiante =  '$cod' AND tema = 2";
		 	//Get result
			$resultado1 = mysqli_query($conexion,$query1); 
			$consulta1 = mysqli_fetch_array($resultado1);
		//Para el examen del capitulo 3
      		$query2 ="SELECT puntuacion FROM estadisticas WHERE codEstudiante =  '$cod' AND tema = 3";
		 	//Get result
			$resultado2 = mysqli_query($conexion,$query2); 
			$consulta2 = mysqli_fetch_array($resultado2);
				//Para el examen del capitulo 4
      		$query3 ="SELECT puntuacion FROM estadisticas WHERE codEstudiante =  '$cod' AND tema = 4";
		 	//Get result
			$resultado3 = mysqli_query($conexion,$query3); 
			$consulta3 = mysqli_fetch_array($resultado3);
	   ?>		 
		    <script type="text/javascript">
		      google.charts.load('current', {'packages':['bar']});
		      google.charts.setOnLoadCallback(drawChart);

		      
		      function drawChart() {
		        var data = google.visualization.arrayToDataTable([
		          ['Tema', 'Inicial', 'Final'],
		          ['T.Simples/Compuestos',  '<?php echo $consulta[0]; ?>', '<?php echo $consulta[1]; ?>'],
		          ['T.perfectos/Voz Pasiva',  '<?php echo $consulta1[0]; ?>', '<?php echo $consulta1[1]; ?>'],
		          ['Preposiciones',  '<?php echo $consulta2[0]; ?>', '<?php echo $consulta2[1]; ?>'],
		          ['Comparativos/Superlativos',  '<?php echo $consulta3[0]; ?>', '<?php echo $consulta3[1]; ?>']
		        ]);

		        var options = {
		          chart: {
		            title: 'Resultado de examenes',
		          }
		        };

		        var chart = new google.charts.Bar(document.getElementById('piechart'));

		        chart.draw(data, google.charts.Bar.convertOptions(options));
		      }
		    </script>
					 <?php
					}
					 ?>
					 <div id="piechart" style="width: 90%; height: 60%;"></div><br>
				</div>
			</div>
		</main>
	</body>
</html>




<?php 
include("footer.php");
 ?>