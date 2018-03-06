<?php

	include 'conexionDB.php';

	$txtCodigo			= $_GET['txtCodigo'];
	$txtRol				= $_GET['txtRol'];
	$txtExp				= $_GET['txtExp'];
	$txtOro				= $_GET['txtOro'];
	$txtNivel			= $_GET['txtNivel'];
	$txtSkinGuerrero	= $_GET['txtSkinGuerrero'];
	$txtSkinMago		= $_GET['txtSkinMago'];
	$txtSkinArquero		= $_GET['txtSkinArquero'];
	$txtArmaGuerrero	= $_GET['txtArmaGuerrero'];
	$txtArmaMago		= $_GET['txtArmaMago'];
	$txtArmaArquero		= $_GET['txtArmaArquero'];

	if(!$conexion->connect_errno) {
		mysqli_query($conexion, "UPDATE personaje SET rolPersonaje = '$txtRol', expPersonaje = '$txtExp', oroPersonaje = '$txtOro', nivelPersonaje = '$txtNivel', skinGuerrero = '$txtSkinGuerrero', skinMago = '$txtSkinMago', skinArquero = '$txtSkinArquero', armaGuerrero = '$txtArmaGuerrero', armaMago = '$txtArmaMago', armaArquero = '$txtArmaArquero' WHERE codigoEstudiante = '$txtCodigo'");
		echo 'OK';
	}else {
		echo 'errorConexion';
	}

?>