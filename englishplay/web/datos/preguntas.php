<?php 
require('../../conexionDB.php');

function preguntasTest($num_test, $num_cap){
	global $conexion;
	$query ="SELECT id,pregunta,respuesta,elec1,elec2,test FROM pregunta WHERE test =".$num_test." AND capitulo =".$num_cap;
		 	//Get result
 	$consulta = mysqli_query($conexion,$query);
 	return $consulta;
 }

?>