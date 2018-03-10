<?php 
	require ("../conexionDB.php");
	include("header.php");
?>

<?php
			
	session_start();
	//recibe el codigo del estudiante que inició sesión.
	$cod = $_SESSION["codEst"];

	//Datos del estudiante
	$resultados = mysqli_query($conexion, "SELECT * FROM estudiante WHERE codigoEstudiante = '$cod'");
	$consulta = mysqli_fetch_array($resultados);

	//Datos del personaje
	$resultados2 = mysqli_query($conexion, "SELECT * FROM personaje WHERE codigoEstudiante = '$cod'");
	$consulta2 = mysqli_fetch_array($resultados2);

	//Mostrar el personaje, seleccionado en el juego, por pantalla
		if ($consulta2['sexoPersonaje'] =='h') {//es hombre

				if ($consulta2['rolPersonaje'] == '0') {
					switch ($consulta2['skinGuerrero']) {
						case '1':
								$skin = "<td><img src=images/Guerrero1.png width=130 height=200></td>";
							break;
						case '2':
								$skin = "<td><img src=images/Guerrero2.png width=130 height=200></td>";
							break;
						case '3':
								$skin = "<td><img src=images/Guerrero3.png width=130 height=200></td>";
							break;
						case '4':
								$skin = "<td><img src=images/Guerrero4.png width=130 height=200></td>";
							break;
						case '5':
								$skin = "<td><img src=images/Guerrero5.png width=130 height=200></td>";
							break;
						
						default:
								$skin = "<td><img src=images/Guerrero0.png width=140 height=200></td>";
							break;
					}
				}else if ($consulta2['rolPersonaje'] == '1') {
					switch ($consulta2['skinMago']) {
						case '1':
								$skin = "<img src=images/Mago1.png width=130 height=200>";
							break;
						case '2':
								$skin = "<img src=images/Mago2.png width=130 height=200>";
							break;
						case '3':
								$skin = "<img src=images/Mago3.png width=130 height=200>";
							break;
						case '4':
								$skin = "<img src=images/Mago4.png width=130 height=200>";
							break;
						case '5':
								$skin = "<img src=images/Mago5.png width=130 height=200>";
							break;
						
						default:
								$skin = "<img src=images/Mago0.png width=120 height=200>";
							break;
					}
					
				}else{
					switch ($consulta2['skinArquero']) {
						case '1':
								$skin = "<img src=images/Arquero1.png width=150 height=200>";
							break;
						case '2':
								$skin = "<img src=images/Arquero2.png width=150 height=200>";
							break;
						case '3':
								$skin = "<img src=images/Arquero3.png width=150 height=200>";
							break;
						case '4':
								$skin = "<img src=images/Arquero4.png width=150 height=200>";
							break;
						case '5':
								$skin = "<img src=images/Arquero5.png width=150 height=200>";
							break;
						
						default:
								$skin = "<img src=images/Arquero0.png width=140 height=200>";
							break;
					}

				}
		}else{//es mujer

				if ($consulta2['rolPersonaje'] == '0') {
					switch ($consulta2['skinGuerrero']) {
						case '1':
								$skin = "<img src=images/Guerrera1.png width=160 height=230>";
							break;
						case '2':
								$skin = "<img src=images/Guerrera2.png width=160 height=230>";
							break;
						case '3':
								$skin = "<img src=images/Guerrera3.png width=160 height=230>";
							break;
						case '4':
								$skin = "<img src=images/Guerrera4.png width=160 height=230>";
							break;
						case '5':
								$skin = "<img src=images/Guerrera5.png width=160 height=230>";
							break;
						
						default:
								$skin = "<img src=images/Guerrera0.png width=140 height=200>";
							break;
					}
				}else if ($consulta2['rolPersonaje'] == '1') {
					switch ($consulta2['skinMago']) {
						case '1':
								$skin = "<img src=images/Maga1.png width=150 height=200>";
							break;
						case '2':
								$skin = "<img src=images/Maga2.png width=150 height=200>";
							break;
						case '3':
								$skin = "<img src=images/Maga3.png width=150 height=200>";
							break;
						case '4':
								$skin = "<img src=images/Maga4.png width=150 height=200>";
							break;
						case '5':
								$skin = "<img src=images/Maga5.png width=150 height=200>";
							break;
						
						default:
								$skin = "<img src=images/Maga0.png width=130 height=200>";
							break;
					}
					
				}else{
					switch ($consulta2['skinArquero']) {
						case '1':
								$skin = "<img src=images/Arquera1.png width=150 height=230>";
							break;
						case '2':
								$skin = "<img src=images/Arquera2.png width=150 height=230>";
							break;
						case '3':
								$skin = "<img src=images/Arquera3.png width=150 height=230>";
							break;
						case '4':
								$skin = "<img src=images/Arquera4.png width=150 height=230>";
							break;
						case '5':
								$skin = "<img src=images/Arquera5.png width=150 height=230>";
							break;
						
						default:
								$skin = "<img src=images/Arquera0.png width=140 height=200>";
							break;
					}

				}
		}

	//Mundo actual
	$resultados3 = mysqli_query($conexion, "SELECT * FROM avance WHERE codigoEstudiante = '$cod'");
	$consulta3 = mysqli_fetch_array($resultados3);
	switch ($consulta3['mundoAvance']) {
		case '1':
				$mundo = "<img src=images/Mundo1.png width=250 height=250>";
			break;
		case '2':
				$mundo = "<img src=images/Mundo2.png width=250 height=250>";
			break;
		case '3':
				$mundo = "<img src=images/Mundo3.png width=250 height=250>";
			break;
		case '4':
				$mundo = "<img src=images/Mundo4.png width=250 height=250>";
			break;
	}

	//porcentaje de juego completado (checkPoint).
	$resultados4 = mysqli_query($conexion, "SELECT mundoCheckpoint, posXCheckpoint FROM checkpoint WHERE codigoEstudiante = '$cod'");
	$consulta4 = mysqli_fetch_array($resultados4);
	$porciento = round(((($consulta4['mundoCheckpoint']+($consulta4['posXCheckpoint']/'10000'))*'100')/'4.0715'), 0);

	//Compras realizadas.
	$resultados5 = mysqli_query($conexion, "SELECT * FROM compra WHERE codigoEstudiante = '$cod'");

	//Recorrer la tabla compra e imprimir imagenes en una tabla por medio de echo.						
		while ($consulta5 = mysqli_fetch_array($resultados5)) {
			
			$compras = $consulta5['idObjeto'];

		 	switch ($compras) {
		 		case '1':
		 				$img = "<td><img src=images/Espada1.png width=80 height=180></td>";
		 			break;
		 		case '2':
		 				$img = "<td><img src=images/Espada2.png width=80 height=180></td>";
		 			break;
		 		case '3':
		 				$img = "<td><img src=images/Espada3.png width=80 height=180></td>";
		 			break;
		 		case '4':
		 				$img = "<td><img src=images/Espada4.png width=80 height=180></td>";
		 			break;
		 		case '5':
		 				$img = "<td><img src=images/Espada5.png width=80 height=180></td>";
		 			break;
		 		case '7':
		 				$img = "<td><img src=images/Cetro1.png width=130 height=130></td>";
		 			break;
		 		case '8':
		 				$img = "<td><img src=images/Cetro2.png width=130 height=130></td>";
		 			break;
		 		case '9':
		 				$img = "<td><img src=images/Cetro3.png width=130 height=130></td>";
		 			break;
		 		case '10':
		 				$img = "<td><img src=images/Cetro4.png width=130 height=130></td>";
		 			break;
		 		case '11':
		 				$img = "<td><img src=images/Cetro5.png width=130 height=130></td>";
		 			break;
		 		case '13':
		 				$img = "<td><img src=images/Arco1.png width=70 height=180></td>";
		 			break;
		 		case '14':
		 				$img = "<td><img src=images/Arco2.png width=70 height=180></td>";
		 			break;
		 		case '15':
		 				$img = "<td><img src=images/Arco3.png width=70 height=180></td>";
		 			break;
		 		case '16':
		 				$img = "<td><img src=images/Arco4.png width=70 height=180></td>";
		 			break;
		 		case '17':
		 				$img = "<td><img src=images/Arco5.png width=70 height=180></td>";
		 			break;
		 		case '19':
		 				$img = "<td><img src=images/SkinsGuerrero1.png width=120 height=200></td>";
		 			break;
		 		case '20':
		 				$img = "<td><img src=images/SkinsGuerrero2.png width=120 height=200></td>";
		 			break;
		 		case '21':
		 				$img = "<td><img src=images/SkinsGuerrero3.png width=120 height=200></td>";
		 			break;
		 		case '22':
		 				$img = "<td><img src=images/SkinsGuerrero4.png width=120 height=200></td>";
		 			break;
		 		case '23':
		 				$img = "<td><img src=images/SkinsGuerrero5.png width=120 height=200></td>";
		 			break;
		 		case '25':
		 				$img = "<td><img src=images/SkinMago1.png width=110 height=200></td>";
		 			break;
		 		case '26':
		 				$img = "<td><img src=images/SkinMago2.png width=110 height=200></td>";
		 			break;
		 		case '27':
		 				$img = "<td><img src=images/SkinMago3.png width=110 height=200></td>";
		 			break;
		 		case '28':
		 				$img = "<td><img src=images/SkinMago4.png width=110 height=200></td>";
		 			break;
		 		case '29':
		 				$img = "<td><img src=images/SkinMago5.png width=110 height=200></td>";
		 			break;
		 		case '31':
		 				$img = "<td><img src=images/SkinArquero1.png width=110 height=200></td>";
		 			break;
		 		case '32':
		 				$img = "<td><img src=images/SkinArquero2.png width=110 height=200></td>";
		 			break;
		 		case '33':
		 				$img = "<td><img src=images/SkinArquero3.png width=110 height=200></td>";
		 			break;
		 		case '34':
		 				$img = "<td><img src=images/SkinArquero4.png width=110 height=200></td>";
		 			break;
		 		case '35':
		 				$img = "<td><img src=images/SkinArquero5.png width=110 height=200></td>";
		 			break;
		 	}

		 	$table .= "<td border=1>$img</td>";
		}			

?>


 <!DOCTYPE html>
 <html>

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
		          	0: { color: '#66ED2F' },
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


 	</head>
	<body id="estudiante">
	 	
	 		<h3 align="center"> Bienvenido <?php echo $consulta['nickEstudiante'] ?></h3>

			<br>
	 			<h2>Personaje Seleccionado:</h2>
	 				<?php echo $skin ?>
			<br>
	 			<h2>Nivel del personaje:</h2>
	 				<p><?php echo $consulta2['nivelPersonaje']?></p>
	 		<br>
	 			<h2>Experiencia del personaje:</h2>
	 				<p><?php echo $consulta2['expPersonaje']?></p>
	 		<br>
	 			<h2>Oro obtenido:</h2>
	 				<p><?php echo $consulta2['oroPersonaje']?></p>
	 		<br>
	 			<h2>Mundo desbloqueado:</h2>
	 				<p><?php echo $mundo ?></p>
	 		<br>
	 			<h2>Avance del juego:</h2>
	 				<div id="barchart_material" style="width: 98%; height: 60px;"></div>
	 				
							
			<br>
				<h2>Compras realizadas:</h2>
					<table border="1">
					 	<?php echo $table?>				 	
					</table>
	 			

	 </body>
 </html>
<?php 
	include("footer.php");
?>