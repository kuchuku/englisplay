<?php

	include('../../conexionDB.php');

	function insertarUsuario(codigoUsuario, nombreUsuario, tipoUsuario) {
		$sql = "INSERT INTO usuario(codigoUsuario, nombreUsuario, tipoUsuario) VALUES('codigoUsuario', 'nombreUsuario', 'tipoUsuario')";
		mysqli_query($conexion, $sql);
	}

?>