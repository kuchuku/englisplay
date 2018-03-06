<?php

	include 'conexionDB.php';

	$txtCodigo		= $_GET['txtCodigo'];

	if(!$conexion->connect_errno) {
		$sql 		= "SELECT idObjeto FROM compra WHERE codigoEstudiante = '$txtCodigo'";
		$resultado	= mysqli_query($conexion, $sql);

		if(mysqli_num_rows($resultado) != 0) {
			$return = "";
			while ($row = mysqli_fetch_assoc($resultado)) {
				$return .= $row["idObjeto"]."|";
			}
			$return = rtrim($return, '|');
			echo $return;
		}else{
			echo'sinCompras';
		}
	}else {
		echo 'errorConexion';
	}

?>