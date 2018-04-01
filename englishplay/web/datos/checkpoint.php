<?php 

	function ConsultarMundoCheckpoint($codigoUsuario){
		global $conexion;
		
		//porcentaje de juego completado (último checkPoint tocado).
		$resultados4 = mysqli_query($conexion, "SELECT mundoCheckpoint FROM checkpoint WHERE codigoEstudiante = '$codigoUsuario'");
		$consulta4 = mysqli_fetch_array($resultados4);
		
		return $consulta4['mundoCheckpoint'];
	}

	function ConsultarPosicionCheckpoint($codigoUsuario){
		global $conexion;
		
		//porcentaje de juego completado (último checkPoint tocado).
		$resultados4 = mysqli_query($conexion, "SELECT posXCheckpoint FROM checkpoint WHERE codigoEstudiante = '$codigoUsuario'");
		$consulta4 = mysqli_fetch_array($resultados4);
		
		return $consulta4['posXCheckpoint'];
	}



 ?>