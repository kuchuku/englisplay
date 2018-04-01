<?php 
	require ("../../conexionDB.php");

	session_start();
//recibe el codigo del estudiante que inició sesión.
	$cod = $_SESSION["codEst"];

//Datos de la tabla estudiante estudiante
	$resultados = mysqli_query($conexion, "SELECT * FROM estudiante WHERE codigoUsuario = '$cod'");
	$consulta = mysqli_fetch_array($resultados);

//Datos del personaje seleccionado por el usuario
	$resultados2 = mysqli_query($conexion, "SELECT * FROM personaje WHERE codigoEstudiante = '$cod'");
	$consulta2 = mysqli_fetch_array($resultados2);


//Ultimo Mundo Desbloqueado
	$resultados3 = mysqli_query($conexion, "SELECT * FROM avance WHERE codigoEstudiante = '$cod'");
	$consulta3 = mysqli_fetch_array($resultados3);

//porcentaje de juego completado (último checkPoint tocado).
	$resultados4 = mysqli_query($conexion, "SELECT mundoCheckpoint, posXCheckpoint FROM checkpoint WHERE codigoEstudiante = '$cod'");
	$consulta4 = mysqli_fetch_array($resultados4);


//Compras realizadas por el estudiante, para cada rol.
	$resultados5 = mysqli_query($conexion, "SELECT * FROM compra WHERE codigoEstudiante = '$cod'");

//Desafios Realizados en el mundo Aldea.
	$resultados6 = mysqli_query($conexion, "SELECT * FROM resultadodesafio WHERE codigoEstudiante = '$cod' and mundo = '1'");

//Desafios Realizados en el mundo Bosque.
	$resultados7 = mysqli_query($conexion, "SELECT * FROM resultadodesafio WHERE codigoEstudiante = '$cod' and mundo = '2'");


//Desafios Realizados en el mundo Cueva.
	$resultados8 = mysqli_query($conexion, "SELECT * FROM resultadodesafio WHERE codigoEstudiante = '$cod' and mundo = '3'");


//Desafios Realizados en el mundo Castillo.
	$resultados9 = mysqli_query($conexion, "SELECT * FROM resultadodesafio WHERE codigoEstudiante = '$cod' and mundo = '4'");

?>
