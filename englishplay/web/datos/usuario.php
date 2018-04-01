<?php

	include('../../conexionDB.php');

	function insertarUsuario($codigoUsuario, $nombreUsuario, $tipoUsuario) {
		$sql = "INSERT INTO usuario(codigoUsuario, nombreUsuario, tipoUsuario) VALUES('$codigoUsuario', '$nombreUsuario', '$tipoUsuario')";
		mysqli_query($conexion, $sql);
	}

	function consultarUsuario(){
		$consulta=mysqli_query($conexion,"SELECT codigoUsuario,contraseniaUsuario, tipoUsuario FROM usuario");
		while($filas=mysqli_fetch_array($consulta)){

		$usuario=$filas['codigoUsuario'];
		$pass=$filas['contraseniaUsuario'];
		$tipoUsuario=$filas['tipoUsuario'];
	}

?>