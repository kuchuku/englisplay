<?php

	$servidor		= 'localhost';
	$usuario		= 'root';
	$contrasenia	= '';
	$db				= 'englishplay';
	@$conexion		= new mysqli($servidor, $usuario, $contrasenia, $db);

	if(!$conexion->connect_errno) {
    	mysqli_set_charset($conexion,'utf8');
    }

?>