<?php

	include '..\conexionDB.php';

	$txtCodigo		= $_GET['txtCodigo'];

	if(!$conexion->connect_errno) {
		$sql 		= "SELECT sexoPersonaje, rolPersonaje, expPersonaje, oroPersonaje, nivelPersonaje, skinGuerrero, skinMago, skinArquero, armaGuerrero, armaMago, armaArquero FROM personaje WHERE codigoEstudiante = '$txtCodigo'";
		$resultado	= mysqli_query($conexion, $sql);

		if(mysqli_num_rows($resultado) == 1) {
			$row = mysqli_fetch_assoc($resultado);
			echo $row["sexoPersonaje"].'|'.$row["rolPersonaje"].'|'.$row["expPersonaje"].'|'.$row["oroPersonaje"].'|'.$row["nivelPersonaje"].'|'.$row["skinGuerrero"].'|'.$row["skinMago"].'|'.$row["skinArquero"].'|'.$row["armaGuerrero"].'|'.$row["armaMago"].'|'.$row["armaArquero"];
		}else{
			echo'sinPersonaje';
		}
	}else {
		echo 'errorConexion';
	}

?>