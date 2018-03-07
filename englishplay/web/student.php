<?php 
	require ("../conexionDB.php");
	include("header.php");
?>

 <!DOCTYPE html>
 <html>
	 <body id="estudiante">
	 	<h3>Datos del estudiante</h3>
	 		
	 		<?php 

	 			session_start();
	 			$cod = $_SESSION["codEst"]; //recibe el codigo del estudiante que inició sesión.

	 			$resultados = mysqli_query($conexion, "SELECT * FROM estudiante WHERE codigoEstudiante = '$cod'");//datos del estudiante
				$consulta = mysqli_fetch_array($resultados);

				$resultados2 = mysqli_query($conexion, "SELECT * FROM personaje WHERE codigoEstudiante = '$cod'");// datos del personaje
				$consulta2 = mysqli_fetch_array($resultados2);

				$resultados3 = mysqli_query($conexion, "SELECT * FROM avance WHERE codigoEstudiante = '$cod'");//avance del jugador en el juego
				$consulta3 = mysqli_fetch_array($resultados3);

	 		?>
	 		<br>
	 			<h2>Nombre Estudiante:</h2>
	 				<p><?php echo $consulta['nombreEstudiante']?></p>
	 		<br>
	 			<h2>Nick Estudiante:</h2>
	 				<p><?php echo $consulta['nickEstudiante']?></p>
	 		<br>
	 			<h2>Oro del personaje:</h2>
	 				<p><?php echo $consulta2['oroPersonaje']?></p>
	 		<br>
	 			<h2>Nivel del personaje:</h2>
	 				<p><?php echo $consulta2['nivelPersonaje']?></p>
	 		<br>
	 			<h2>Mundo:</h2>
	 				<p><?php echo $consulta3['mundoAvance']?></p>
	 			

	 </body>
 </html>
<?php 

	include("footer.php");

 ?>