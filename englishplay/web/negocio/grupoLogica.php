<?php

	include('../datos/grupo.php');

	function generarListadoGrupos($codigoUsuario) {
		global $conexion;
		$resultado = consultarGruposPorUsuario($codigoUsuario);
		$html = '';
		while ($row = mysqli_fetch_assoc($resultado)) {
			$html = $html.'<option value="'.$row[idGrupo].'">'.$row[nombreGrupo].'';
		}
		return $html;
	}

?>