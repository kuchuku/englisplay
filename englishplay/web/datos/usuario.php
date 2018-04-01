<?php

	include('../../conexionDB.php');

	function insertarUsuario($codigoUsuario, $nombreUsuario, $tipoUsuario) {
		global $conexion;
		$sql = "INSERT INTO usuario(codigoUsuario, nombreUsuario, tipoUsuario) VALUES('$codigoUsuario', '$nombreUsuario', '$tipoUsuario')";
		mysqli_query($conexion, $sql);
	}

	function consultarUsuario(){
		global $conexion;
		$consulta = mysqli_query($conexion,"SELECT codigoUsuario,contraseniaUsuario, tipoUsuario FROM usuario");
		return $consulta;
	}

?>