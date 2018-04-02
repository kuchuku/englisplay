<?php 
	

//Recorrer la tabla resultado desafios y retornar los desafios segun el mundo, la cantidad de preguntas que se le hicieron y la cantidad de respuestas correctas en el mundo Aldea.	
	function ConsultarDatosDesafioMundos($codigoUsuario, $mundo){
		global $conexion;
		
		//porcentaje de juego completado (último checkPoint tocado).
		$resultados6 = mysqli_query($conexion, "SELECT * FROM resultadodesafio WHERE codigoEstudiante = '$codigoUsuario' and mundo = '$mundo'");
		return $resultados6;
	}

?>