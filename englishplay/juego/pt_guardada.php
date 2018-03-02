<?php

	include '../conexionDB.php';

	$txtCodigo		= $_GET['txtCodigo'];
	
	if(!$conexion->connect_errno) {
		$sql 		= "SELECT mundoAvance, nivelAvance FROM avance WHERE codEstudiante = '$txtCodigo'";
		$resultado	= mysqli_query($conexion, $sql);

		if(mysqli_num_rows($resultado) == 1) {
			$row = mysqli_fetch_assoc($resultado);
			echo $row["mundoAvance"].'|'.$row["nivelAvance"];
		}else {
			echo 'noHayDatos';
		}
	}else {
		echo 'errorConexion';
	}

?>