<?php

	include '../conexionDB.php';

	$txtCodigo		= $_GET['txtCodigo'];
	$txtNick		= $_GET['txtNick'];
	$txtContrasenia	= $_GET['txtContrasenia'];

	if(!$conexion->connect_errno) {
		$sql 		= "SELECT nickEstudiante FROM estudiante WHERE codigoEstudiante = '$txtCodigo'";
		$resultado	= mysqli_query($conexion, $sql);

		if(mysqli_num_rows($resultado) == 1) {
			$row = mysqli_fetch_assoc($resultado);
			if($row["nickEstudiante"] == "") {
				mysqli_query($conexion, "UPDATE estudiante SET nickEstudiante = '$txtNick', contraseniaEstudiante = '$txtContrasenia' WHERE codigoEstudiante = '$txtCodigo'");
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