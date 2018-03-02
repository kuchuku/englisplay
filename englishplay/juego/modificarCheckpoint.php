<?php

	include '../conexionDB.php';

	$txtCodigo			= $_GET['txtCodigo'];
	$txtMundo			= $_GET['txtMundo'];
	$txtNivel			= $_GET['txtNivel'];
	$txtPosX			= $_GET['txtPosX'];
	$txtPosY			= $_GET['txtPosY'];
	$txtSalud			= $_GET['txtSalud'];
	$txtCajasM			= $_GET['txtCajasM'];
	$txtCajaM1			= $_GET['txtCajaM1'];
	$txtCajaM2			= $_GET['txtCajaM2'];
	$txtCajaM3			= $_GET['txtCajaM3'];
	$txtCajaM4			= $_GET['txtCajaM4'];
	$txtCajaM5			= $_GET['txtCajaM5'];
	$txtCasaD1			= $_GET['txtCasaD1'];
	$txtCasaD2			= $_GET['txtCasaD2'];
	$txtCasaD3			= $_GET['txtCasaD3'];
	$txtCasaD4			= $_GET['txtCasaD4'];
	$txtCasaD5			= $_GET['txtCasaD5'];
	$txtCasaD6			= $_GET['txtCasaD6'];
	$txtCasaD7			= $_GET['txtCasaD7'];
	$txtCasaD8			= $_GET['txtCasaD8'];


	if(!$conexion->connect_errno) {
		$sql = "SELECT mundoCheckpoint FROM checkpoint WHERE codigoEstudiante = '$txtCodigo'";
		$resultado	= mysqli_query($conexion, $sql);

		if(mysqli_num_rows($resultado) == 1) {
			mysqli_query($conexion, "UPDATE checkpoint SET mundoCheckpoint = '$txtMundo', nivelCheckpoint = '$txtNivel', posXCheckpoint = '$txtPosX', posYCheckpoint = '$txtPosY', saludCheckpoint = '$txtSalud', cajasMisionCheckpoint = '$txtCajasM', cajaMision1 = '$txtCajaM1', cajaMision2 = '$txtCajaM2', cajaMision3 = '$txtCajaM3', cajaMision4 = '$txtCajaM4', cajaMision5 = '$txtCajaM5', casaDesafio1 = '$txtCasaD1', casaDesafio2 = '$txtCasaD2', casaDesafio3 = '$txtCasaD3', casaDesafio4 = '$txtCasaD4', casaDesafio5 = '$txtCasaD5', casaDesafio6 = '$txtCasaD6', casaDesafio7 = '$txtCasaD7', casaDesafio8 = '$txtCasaD8' WHERE codigoEstudiante = '$txtCodigo'");
		}elseif(mysqli_num_rows($resultado) == 0) {
			mysqli_query($conexion, "INSERT INTO checkpoint(codigoEstudiante, mundoCheckpoint, nivelCheckpoint, posXCheckpoint, posYCheckpoint, saludCheckpoint, cajasMisionCheckpoint, cajaMision1, cajaMision2, cajaMision3, cajaMision4, cajaMision5, casaDesafio1, casaDesafio2, casaDesafio3, casaDesafio4, casaDesafio5, casaDesafio6, casaDesafio7, casaDesafio8) VALUES ('$txtCodigo', '$txtMundo', '$txtNivel', '$txtPosX', '$txtPosY', '$txtSalud', '$txtCajasM', '$txtCajaM1', '$txtCajaM2', '$txtCajaM3', '$txtCajaM4', '$txtCajaM5', '$txtCasaD1', '$txtCasaD2', '$txtCasaD3', '$txtCasaD4', '$txtCasaD5', '$txtCasaD6', '$txtCasaD7', '$txtCasaD8')");
		}
	}else {
		echo 'errorConexion';
	}

?>