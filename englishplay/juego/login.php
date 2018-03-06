<?php

	include '..\conexionDB.php';

	$txtCodigo		= $_GET['txtCodigo'];
	$txtContrasenia	= $_GET['txtContrasenia'];

	if(!$conexion->connect_errno) {
		$sql 		= "SELECT nombreEstudiante, nickEstudiante FROM estudiante WHERE codigoEstudiante = '$txtCodigo' AND contraseniaEstudiante = '$txtContrasenia'";
		$resultado	= mysqli_query($conexion, $sql);

		if(mysqli_num_rows($resultado) == 1) {
			$row = mysqli_fetch_assoc($resultado);
			echo $row["nombreEstudiante"].'|'.$row["nickEstudiante"];
		}else {
			echo 'datosIncorrectos';
		}
	}else {
		echo 'errorConexion';
	}

?>