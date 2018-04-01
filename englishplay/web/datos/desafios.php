<?php 
	

//Recorrer la tabla resultado desafios e imprimir el deasifio, la cantidad de preguntas que se le hicieron y la cantidad de respuestas correctas en el mundo Aldea.	
	function ConsultarDatosDesafioMundoAldea($codigoUsuario){
		global $conexion;
		
		//porcentaje de juego completado (último checkPoint tocado).
		$resultados6 = mysqli_query($conexion, "SELECT * FROM resultadodesafio WHERE codigoEstudiante = '$codigoUsuario' and mundo = '1'");
		return $resultados6;
	}

//Recorrer la tabla resultado desafios e imprimir el deasifio, la cantidad de preguntas que se le hicieron y la cantidad de respuestas correctas en el mundo Bosque.	
	function ConsultarDatosDesafioMundoBosque($codigoUsuario){
		global $conexion;
		
		//porcentaje de juego completado (último checkPoint tocado).
		$resultados7 = mysqli_query($conexion, "SELECT * FROM resultadodesafio WHERE codigoEstudiante = '$codigoUsuario' and mundo = '2'");
		return $resultados7;
	}

//Recorrer la tabla resultado desafios e imprimir el deasifio, la cantidad de preguntas que se le hicieron y la cantidad de respuestas correctas en el mundo Cueva.	
	function ConsultarDatosDesafioMundoCueva($codigoUsuario){
		global $conexion;
		
		//porcentaje de juego completado (último checkPoint tocado).
		$resultados8 = mysqli_query($conexion, "SELECT * FROM resultadodesafio WHERE codigoEstudiante = '$codigoUsuario' and mundo = '3'");
		return $resultados8;
	}

//Recorrer la tabla resultado desafios e imprimir el deasifio, la cantidad de preguntas que se le hicieron y la cantidad de respuestas correctas en el mundo Castillo.	
	function ConsultarDatosDesafioMundoCastillo($codigoUsuario){
		global $conexion;
		
		//porcentaje de juego completado (último checkPoint tocado).
		$resultados9 = mysqli_query($conexion, "SELECT * FROM resultadodesafio WHERE codigoEstudiante = '$codigoUsuario' and mundo = '4'");
		return $resultados9;
	}


?>