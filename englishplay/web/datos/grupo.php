<?php

	include('../../conexionDB.php');

	function insertarGrupo($codigoUsuario, $nombreGrupo) {
		global $conexion;
		$sql = "INSERT INTO grupo(codigoUsuario, nombreGrupo) VALUES('$codigoUsuario', '$nombreGrupo')";
		mysqli_query($conexion, $sql);
	}

	function consultarGruposPorUsuario($codigoUsuario) {
		global $conexion;
		$sql = "SELECT idGrupo, nombreGrupo FROM grupo WHERE codigoUsuario = '$codigoUsuario'";
		return mysqli_query($conexion, $sql);
	}

?>