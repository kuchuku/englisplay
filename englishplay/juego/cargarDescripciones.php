<?php

	include 'conexionDB.php';

	if(!$conexion->connect_errno) {
		$sql 		= "SELECT descripcionObjeto FROM objeto";
		$resultado	= mysqli_query($conexion, $sql);

		if(mysqli_num_rows($resultado) != 0) {
			$return = "";
			while ($row = mysqli_fetch_assoc($resultado)) {
				$return .= $row["descripcionObjeto"]."|";
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