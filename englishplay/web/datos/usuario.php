<?php

	include('../../conexionDB.php');

	function insertarUsuario(codigoUsuario, nombreUsuario) {
		$sql = "INSERT INTO usuario(codigoUsuario, nombreUsuario, tipoUsuario) VALUES('codigoUsuario', 'nombreUsuario', 0)";
		mysqli_query($conexion, $sql);
	}

?>