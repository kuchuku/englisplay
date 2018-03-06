<?php

	include '..\conexionDB.php';

	$txtCodigo	= $_GET['txtCodigo'];

	if(!$conexion->connect_errno) {
		$sql = "DELETE FROM  checkpoint WHERE codigoEstudiante = '$txtCodigo'";
		$resultado	= mysqli_query($conexion, $sql);

	}else {
		echo 'errorConexion';
	}

?>