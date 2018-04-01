<?php

	include('../../conexionDB.php');

	function insertarEstudiante($codigoUsuario, $idGrupo) {
		global $conexion;
		$sql = "INSERT INTO estudiante(codigoUsuario, idGrupo) VALUES('$codigoUsuario', '$idGrupo')";
		mysqli_query($conexion, $sql);
	}

	function actualizarGrupoEstudiante($codigoUsuario, $idGrupo) {
		global $conexion;
		$sql = "UPDATE estudiante SET idGrupo = '$idGrupo' WHERE codigoUsuario = '$codigoUsuario'";
		mysqli_query($conexion, $sql);
	}

?>