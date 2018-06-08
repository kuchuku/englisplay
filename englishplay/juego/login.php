<?php

	include '../conexionDB.php';

	$txtCodigo		= $_GET['txtCodigo'];
	
	$txtContrasenia	= $_GET['txtContrasenia'];

	$salt = "nAranjo_qUintero-zApata.bUeno@univaLLeEnglishPlay20183743cifradosha8342201318_caligean!!!";
	$txtContrasenia = $salt.$txtContrasenia;

	$txtContrasenia = hash('sha256', $txtContrasenia);

	if(!$conexion->connect_errno) {
		$sql 		= "SELECT nombreUsuario FROM usuario WHERE codigoUsuario = '$txtCodigo' AND contraseniaUsuario = '$txtContrasenia'";
		$resultado	= mysqli_query($conexion, $sql);

		if(mysqli_num_rows($resultado) == 1) {
			$row = mysqli_fetch_assoc($resultado);
			$nombreUsuario = $row["nombreUsuario"];

			$sql	= "SELECT nickEstudiante FROM estudiante WHERE codigoUsuario = '$txtCodigo'";
			$resultado	= mysqli_query($conexion, $sql);
			$row = mysqli_fetch_assoc($resultado);

			echo $nombreUsuario.'|'.$row["nickEstudiante"];
		}else {
			echo 'datosIncorrectos';
		}
	}else {
		echo 'errorConexion';
	}

?>