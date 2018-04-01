<?php 
	
	function ConsultarMundoDesbloqueado($codigoUsuario){
		global $conexion;
		
		//Ultimo Mundo Desbloqueado
		$resultados3 = mysqli_query($conexion, "SELECT mundoAvance FROM avance WHERE codigoEstudiante = '$codigoUsuario'");
		$consulta3 = mysqli_fetch_array($resultados3);
		
		return $consulta3['mundoAvance'];
	}
	
	

?>