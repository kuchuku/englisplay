<?php

	include 'conexionDB.php';

	$txtCodigo		= $_GET['txtCodigo'];

	if(!$conexion->connect_errno) {
		$sql 		= "SELECT mundoCheckpoint, nivelCheckpoint, posXCheckpoint, posYCheckpoint, saludCheckpoint, cajasMisionCheckpoint, cajaMision1, cajaMision2, cajaMision3, cajaMision4, cajaMision5, casaDesafio1, casaDesafio2, casaDesafio3, casaDesafio4, casaDesafio5, casaDesafio6, casaDesafio7, casaDesafio8 FROM checkpoint WHERE codigoEstudiante = '$txtCodigo'";
		$resultado	= mysqli_query($conexion, $sql);

		if(mysqli_num_rows($resultado) == 1) {
			$row = mysqli_fetch_assoc($resultado);
			echo $row["mundoCheckpoint"].'|'.$row["nivelCheckpoint"].'|'.$row["posXCheckpoint"].'|'.$row["posYCheckpoint"].'|'.$row["saludCheckpoint"].'|'.$row["cajasMisionCheckpoint"].'|'.$row["cajaMision1"].'|'.$row["cajaMision2"].'|'.$row["cajaMision3"].'|'.$row["cajaMision4"].'|'.$row["cajaMision5"].'|'.$row["casaDesafio1"].'|'.$row["casaDesafio2"].'|'.$row["casaDesafio3"].'|'.$row["casaDesafio4"].'|'.$row["casaDesafio5"].'|'.$row["casaDesafio6"].'|'.$row["casaDesafio7"].'|'.$row["casaDesafio8"];
		}else{
			echo 'sinCheckpoint';
		}
	}else {
		echo 'errorConexion';
	}

?>