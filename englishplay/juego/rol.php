<?php

	include '../conexionDB.php';

	$txtCodigo		= $_GET['txtCodigo'];
	$txtSexo		= $_GET['txtSexo'];
	$txtRol			= $_GET['txtRol'];

	if(!$conexion->connect_errno) {

		$sql = "SELECT codigoEstudiante FROM personaje WHERE codigoEstudiante = '$txtCodigo'";
		$resultado	= mysqli_query($conexion, $sql);	

		if ($resultado->num_rows == 0) {
	    	$sql = "INSERT INTO personaje(codigoEstudiante, sexoPersonaje, rolPersonaje, expPersonaje, oroPersonaje, nivelPersonaje, skinGuerrero, skinMago, skinArquero, armaGuerrero, armaMago, armaArquero) VALUES ('$txtCodigo', '$txtSexo', '$txtRol', 0, 0, 1, 0, 0, 0, 0, 0, 0)";
		} else {
	    	$sql = "UPDATE personaje SET sexoPersonaje = '$txtSexo', rolPersonaje = '$txtRol', expPersonaje = 0, oroPersonaje = 0, nivelPersonaje = 1, 
	    	skinGuerrero = 0, skinMago = 0, skinArquero = 0, armaGuerrero = 0, armaMago = 0, armaArquero = 0
	    	WHERE codigoEstudiante = '$txtCodigo'";
		}

		mysqli_query($conexion, $sql);

	}else {
		echo 'errorConexion';
	}

?>