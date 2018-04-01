<?php

	include('../../conexionDB.php');

	function insertarGrupo($codigoUsuario, $nombreGrupo) {
		global $conexion;
		$sql = "INSERT INTO grupo(codigoUsuario, nombreGrupo) VALUES('$codigoUsuario', '$nombreGrupo')";
		mysqli_query($conexion, $sql);
	}

?>