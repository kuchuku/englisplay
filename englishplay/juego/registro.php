<?php

	include '../conexionDB.php';

	$txtCodigo		= $_GET['txtCodigo'];

	$txtContrasenia	= $_GET['txtContrasenia'];

	$salt = "nAranjo_qUintero-zApata.bUeno@univaLLeEnglishPlay20183743cifradosha8342201318_caligean!!!";
	$txtContrasenia = $salt.$txtContrasenia;

	$txtContrasenia = hash('sha256', $txtContrasenia);

	$txtNick		= $_GET['txtNick'];

	if(!$conexion->connect_errno) {
		$sql 		= "SELECT contraseniaUsuario FROM usuario WHERE codigoUsuario = '$txtCodigo'";
		$resultado	= mysqli_query($conexion, $sql);

		if(mysqli_num_rows($resultado) == 1) {
			$row = mysqli_fetch_assoc($resultado);
			if($row["contraseniaUsuario"] == 0) {
				mysqli_query($conexion, "UPDATE usuario SET contraseniaUsuario = '$txtContrasenia' WHERE codigoUsuario = '$txtCodigo'");
				mysqli_query($conexion, "UPDATE estudiante SET nickEstudiante = '$txtNick' WHERE codigoUsuario = '$txtCodigo'");
				echo 'OK';
			}else {
				echo 'estudianteEstabaRegistrado';
			}
		}else {
			echo 'estudianteNoHabilitado';
		}
	}else {
		echo 'errorConexion';
	}

?>