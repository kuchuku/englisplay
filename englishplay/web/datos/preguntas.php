<?php 
require('../../conexionDB.php');


function preguntasTest($num_test, $num_cap){
	global $conexion;
	$query ="SELECT id,pregunta,respuesta,elec1,elec2,test FROM pregunta WHERE test =".$num_test." AND capitulo =".$num_cap;
 	$consulta = mysqli_query($conexion,$query);
 	return $consulta;
 }

function pregBD($tipoExamen,$capExamen){
	global $conexion;
	$query ="SELECT * FROM pregunta WHERE test = ".$tipoExamen." AND capitulo = ".$capExamen;
	$questionsTest = mysqli_query($conexion,$query); 	
	return $questionsTest;
}
function checkAns($idprg){
	global $conexion;
	$query ="SELECT respuesta FROM preguntas WHERE id='$idprg'";
	$respuesta = mysqli_query($conexion,$query); 
}
function registrarScore($tipoExamen,$capExamen,$score){
	global $conexion;
	session_start();
		 		//recibe el codigo del estudiante que inició sesión.
	$cod = $_SESSION["codEst"];
	$sql=  mysqli_query($conexion,"SELECT nombreUsuario FROM usuario WHERE codigoUsuario = '$cod'");
	$consulta = mysqli_fetch_array($sql);	
	$nombre= $consulta[0];
	$sql2 = mysqli_query($conexion,"SELECT puntuacion FROM estadisticas WHERE codigoUsuario = '$cod' AND examen = '$tipoExamen' AND tema = '$capExamen'");
	if ($sql2->num_rows == 0) {
		$query= "INSERT INTO estadisticas (codEstudiante,nombreEstudiante,examen,tema,puntuacion) VALUES('".$cod."','".$nombre."','".$tipoExamen."','".$capExamen."','".$score."') ON DUPLICATE KEY UPDATE puntuacion = '$score'";	
	}
	$estadisticas=  mysqli_query($conexion,$query);
}
?>