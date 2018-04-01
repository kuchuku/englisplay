<?php 
	include('../../conexionDB.php');

	function ConsultarNivelPersonaje($codigoUsuario){
		global $conexion;
		$resultados2 = mysqli_query($conexion, "SELECT nivelPersonaje FROM personaje WHERE codigoEstudiante = '$codigoUsuario'");
		$consulta2 = mysqli_fetch_array($resultados2);

		return $consulta2['nivelPersonaje'];

	}

	function ConsultarExperienciaPersonaje($codigoUsuario){
		global $conexion;
		$resultados2 = mysqli_query($conexion, "SELECT expPersonaje FROM personaje WHERE codigoEstudiante = '$codigoUsuario'");
		$consulta2 = mysqli_fetch_array($resultados2);

		return $consulta2['expPersonaje'];

	}

	function ConsultarOroPersonaje($codigoUsuario){
		global $conexion;
		$resultados2 = mysqli_query($conexion, "SELECT oroPersonaje FROM personaje WHERE codigoEstudiante = '$codigoUsuario'");
		$consulta2 = mysqli_fetch_array($resultados2);

		return $consulta2['oroPersonaje'];

	}

	function ConsultarSexoPersonaje($codigoUsuario){
		global $conexion;
		$resultados2 = mysqli_query($conexion, "SELECT sexoPersonaje FROM personaje WHERE codigoEstudiante = '$codigoUsuario'");
		$consulta2 = mysqli_fetch_array($resultados2);

		return $consulta2['sexoPersonaje'];

	}


	function ConsultarRolPersonaje($codigoUsuario){
		global $conexion;
		$resultados2 = mysqli_query($conexion, "SELECT rolPersonaje FROM personaje WHERE codigoEstudiante = '$codigoUsuario'");
		$consulta2 = mysqli_fetch_array($resultados2);

		return $consulta2['rolPersonaje'];

	}

	function ConsultarskinGuerrero($codigoUsuario){
		global $conexion;
		$resultados2 = mysqli_query($conexion, "SELECT skinGuerrero FROM personaje WHERE codigoEstudiante = '$codigoUsuario'");
		$consulta2 = mysqli_fetch_array($resultados2);

		return $consulta2['skinGuerrero'];

	}

	function ConsultarskinMago($codigoUsuario){
		global $conexion;
		$resultados2 = mysqli_query($conexion, "SELECT skinMago FROM personaje WHERE codigoEstudiante = '$codigoUsuario'");
		$consulta2 = mysqli_fetch_array($resultados2);

		return $consulta2['skinMago'];

	}

	function ConsultarskinArquero($codigoUsuario){
		global $conexion;
		$resultados2 = mysqli_query($conexion, "SELECT skinArquero FROM personaje WHERE codigoEstudiante = '$codigoUsuario'");
		$consulta2 = mysqli_fetch_array($resultados2);

		return $consulta2['skinArquero'];

	}





?>