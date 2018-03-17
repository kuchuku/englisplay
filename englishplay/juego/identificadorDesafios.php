<?php

include '..\conexionDB.php';

$txtCodigo		= $_GET['txtCodigo'];
$txtMundo		= $_GET['txtMundo'];
$txtDesafio		= $_GET['txtDesafio'];
$txtPreguntas	= $_GET['txtPreguntas'];
$txtCorrectas	= $_GET['txtCorrectas'];

if(!$conexion->connect_errno)
{

	$sql = "SELECT mundo, desafio FROM resultadodesafio WHERE codigoEstudiante = '$txtCodigo' && mundo = '$txtMundo' && desafio = '$txtDesafio'";
	$resultado	= mysqli_query($conexion, $sql);	

	if ($resultado->num_rows == 0) 
	{
    	$sql = "INSERT INTO resultadodesafio (codigoEstudiante, mundo, desafio, preguntas, correctas) VALUES ('$txtCodigo', '$txtMundo', '$txtDesafio', '$txtPreguntas', '$txtCorrectas')";
	}else{

		$sql = "UPDATE resultadodesafio SET codigoEstudiante = '$txtCodigo', mundo ='$txtMundo', desafio = '$txtDesafio', preguntas = '$txtPreguntas', correctas = '$txtCorrectas' WHERE codigoEstudiante = '$txtCodigo' && mundo = '$txtMundo' && desafio = '$txtDesafio'";
	}
     

	$resultado = mysqli_query($conexion, $sql);

}
?>