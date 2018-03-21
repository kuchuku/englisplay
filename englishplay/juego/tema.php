<?php

	include '../conexionDB.php';

	$txtIdTema = $_GET['txtIdTema'];

	if(!$conexion->connect_errno) {
		$sql 		= "SELECT contenido FROM tema WHERE idTema = '$txtIdTema'";
		$resultado	= mysqli_query($conexion, $sql);

		if(mysqli_num_rows($resultado) == 1) {
			$row = mysqli_fetch_assoc($resultado);
			echo $row["contenido"];
		}

	}else {
		echo 'errorConexion';
	}

?>