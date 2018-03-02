<?php

include '../conexionDB.php';

$txtCodigo		= $_GET['txtCodigo'];
$txtObjeto		= $_GET['txtObjeto'];

if(!$conexion->connect_errno)
{

	$sql = "SELECT idObjeto FROM compra WHERE codigoEstudiante = '$txtCodigo' && idObjeto = 'txtObjeto'";
	$resultado	= mysqli_query($conexion, $sql);	

	if ($resultado->num_rows == 0) 
	{
    $sql = "INSERT INTO compra (codigoEstudiante, idObjeto) VALUES ('$txtCodigo', '$txtObjeto')";
	}
     

	$resultado = mysqli_query($conexion, $sql);
}
?>