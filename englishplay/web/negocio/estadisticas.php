<?php 
require('../../conexionDB.php');
include('../datos/estadistica.php');

function studentData($cod,$i){
	$sentencia = sqlDatosEstudiante($cod,$i);
	return $sentencia;
}

function obtenerTema($i){
	switch ($i) {

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
	 		$tema = "Comparative and superlative";
 			break;	
 	
	 	default:
	 		$tema = "no has realizado examen de algún tema";
	 		break;

	}
	return $tema; 
}

function obtenerResultados($resultado){
	while ($consulta = mysqli_fetch_array($resultado))  {

		if($consulta[2] == 0){
			$examen = "Initial";

		} elseif ($consulta[2] == 1) {
			$examen = "Final";
		}
		$nota = $consulta[4] / 3;
		echo '<tr style="color: #000;">		 					
			<td style="color: #000; border-bottom: 1px solid #eee;"> '.$examen.' </td>
			<td style="color: #000;border-bottom: 1px solid #eee;"> '.$consulta[4],"/15".'</td>
			<td style="color: #000;border-bottom: 1px solid #eee;"> '.$nota.'</td>
		</tr>';
		}
}

function initialVillage($cod){
	$scoreIniVill = iniVillage($cod);
	return $scoreIniVill;
}
function finalVillage($cod){
	$scoreFinalVill = finVillage($cod);
	return $scoreFinalVill;
}
function initialForest($cod){
	$scoreIniForest = iniForest($cod);
	return $scoreIniForest;
}
function finalForest($cod){
	$scoreFinalForest = finForest($cod);
	return $scoreFinalForest;
}
function initialCave($cod){
	$scoreIniCave = iniCave($cod);
	return $scoreIniCave;
}
function finalCave($cod){
	$scoreFinalCave = finCave($cod);
	return $scoreFinalCave;
}
function initialCastle($cod){
	$scoreIniCastle = iniCastle($cod);
	return $scoreIniCastle;
}
function finalCastle($cod){
	$scoreFinalCastle = finCastle($cod);
	return $scoreFinalCastle;
}
?>