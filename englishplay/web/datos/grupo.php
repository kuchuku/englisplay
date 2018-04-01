<?php

	include('../../conexionDB.php');

	function insertarGrupo($codigoDocente, $nombreGrupo) {
		global $conexion;
		$sql = "INSERT INTO grupo(codigoDocente, nombreGrupo) VALUES('$codigoDocente', '$nombreGrupo')";
		mysqli_query($conexion, $sql);
	}

?>