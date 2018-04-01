<?php

	function ConsultarCompras($codigoUsuario){
		global $conexion;
		
		//Compras realizadas por el estudiante, para cada rol.
		$resultados5 = mysqli_query($conexion, "SELECT idObjeto FROM compra WHERE codigoEstudiante = '$codigoUsuario'");
		return $resultados5;
	}

 ?>