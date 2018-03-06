<?php

	include '..\conexionDB.php';

	$txtCodigo		= $_GET['txtCodigo'];
	$txtMundo		= $_GET['txtMundo'];
	$txtNivel		= $_GET['txtNivel'];

	if(!$conexion->connect_errno) {
		$sql = "SELECT mundoAvance FROM avance WHERE codigoEstudiante = '$txtCodigo'";
		$resultado	= mysqli_query($conexion, $sql);

		if(mysqli_num_rows($resultado) == 1) {
			mysqli_query($conexion, "UPDATE avance SET mundoAvance = '$txtMundo', nivelAvance = '$txtNivel' WHERE codigoEstudiante = '$txtCodigo'");
		}else{
			mysqli_query($conexion, "INSERT INTO avance(codigoEstudiante, mundoAvance, nivelAvance) VALUES('$txtCodigo', '$txtMundo', '$txtNivel')");
		}
	}else {
		echo 'errorConexion';
	}

?>