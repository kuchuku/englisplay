<?php 
require('../../conexionDB.php');

function sqlDatosEstudiante($cod,$i){
	global $conexion;
	$query ="SELECT * FROM estadisticas WHERE codEstudiante =  '$cod' AND tema = '$i'";
	$resultado = mysqli_query($conexion,$query);
	return $resultado;
}
function iniVillage($cod){
	global $conexion;
	$query ="SELECT puntuacion FROM estadisticas WHERE codEstudiante =  '$cod' AND tema = 1 AND examen = 0";
	$resultado = mysqli_query($conexion,$query); 
	$puntuexamen = mysqli_fetch_array($resultado);
	$scoreInitialVillage = $puntuexamen[0];
	if($scoreInitialVillage == null){
		$scoreInitialVillage = 0;
	}
	return $scoreInitialVillage;
}
function finVillage($cod){
	global $conexion;
	$query1 ="SELECT puntuacion FROM estadisticas WHERE codEstudiante =  '$cod' AND tema = 1 AND examen = 1";
	$resultado1 = mysqli_query($conexion,$query1); 
	$puntuexamen1 = mysqli_fetch_array($resultado1);
	$scoreFinalVillage = $puntuexamen1[0];
	if($scoreFinalVillage == null){
		$scoreFinalVillage = 0;
	}
	return $scoreFinalVillage;
}
function iniForest($cod){
	global $conexion;
	$query2 ="SELECT puntuacion FROM estadisticas WHERE codEstudiante =  '$cod' AND tema = 2 AND examen = 0";
	$resultado2 = mysqli_query($conexion,$query2); 
	$puntuexamen2 = mysqli_fetch_array($resultado2);
	$scoreInitialForest = $puntuexamen2[0];
	if($scoreInitialForest == null){
		$scoreInitialForest = 0;
	}
	return $scoreInitialForest;
}
function finForest($cod){
	global $conexion;
	$query3 ="SELECT puntuacion FROM estadisticas WHERE codEstudiante =  '$cod' AND tema = 2 AND examen = 1";
	$resultado3 = mysqli_query($conexion,$query3); 
	$puntuexamen3 = mysqli_fetch_array($resultado3);
	$scoreFinalForest = $puntuexamen3[0];
	if($scoreFinalForest == null){
		$scoreFinalForest = 0;
	}
	return $scoreFinalForest;
}
function iniCave($cod){
	global $conexion;
	$query4 ="SELECT puntuacion FROM estadisticas WHERE codEstudiante =  '$cod' AND tema = 3 AND examen = 0";
	$resultado4 = mysqli_query($conexion,$query4); 
	$puntuexamen4 = mysqli_fetch_array($resultado4);
	$scoreInitialCave = $puntuexamen4[0];
	if($scoreInitialCave == null){
		$scoreInitialCave = 0;
	}
	return $scoreInitialCave;
}
function finCave($cod){
	global $conexion;
	$query5 ="SELECT puntuacion FROM estadisticas WHERE codEstudiante =  '$cod' AND tema = 3 AND examen = 1";
	$resultado5 = mysqli_query($conexion,$query5); 
	$puntuexamen5 = mysqli_fetch_array($resultado5);
	$scoreFinalCave = $puntuexamen5[0];
	if($scoreFinalCave == null){
		$scoreFinalCave = 0;
	}
	return $scoreFinalCave;
}
function iniCastle($cod){
	global $conexion;
	$query6 ="SELECT puntuacion FROM estadisticas WHERE codEstudiante =  '$cod' AND tema = 4 AND examen = 0";
	$resultado6 = mysqli_query($conexion,$query6); 
	$puntuexamen6 = mysqli_fetch_array($resultado6);
	$scoreInitialCastle = $puntuexamen6[0];
	if($scoreInitialCastle == null){
		$scoreInitialCastle = 0;
	}
	return $scoreInitialCastle;
}
function finCastle($cod){
	global $conexion;
	$query7 ="SELECT puntuacion FROM estadisticas WHERE codEstudiante =  '$cod' AND tema = 4 AND examen = 1";
	$resultado7 = mysqli_query($conexion,$query7); 
	$puntuexamen7 = mysqli_fetch_array($resultado7);
	$scoreFinalCastle = $puntuexamen7[0];
	if($scoreFinalCastle == null){
		$scoreFinalCastle = 0;
	}
	return $scoreFinalCastle;
}
?>