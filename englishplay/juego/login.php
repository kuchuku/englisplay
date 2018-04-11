<?php

	include '../conexionDB.php';

	$txtCodigo		= $_GET['txtCodigo'];
	
	$txtContrasenia	= $_GET['txtContrasenia'];
	$txtContrasenia = md5($txtContrasenia);

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