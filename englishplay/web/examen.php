<?php 
include("header.php");
require('../conexionDB.php');
include("php/sesion.php");
?>
<?php 
	// Get Total Questions
	$query = "SELECT * FROM pregunta";
	// Get result
	$results =  mysqli_query($conexion,$query);
	$total = $results->num_rows;

 ?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/preguntasForm.css" />
<body id="andres">

<main>
	<div class="container">
		<br>
		<h1> EXAMEN DE CONOCIMIENTOS EN INGLÉS </h1>
		<h2>Prueba tus conocimientos</h2>
		<p id="eligetext">
			Por favor digita el examen que deseas realizar, cada examen cuenta con:
		</p>
		<ul id="cadatest">
			<li><strong>Número de preguntas: </strong><?php echo $total; ?></li>
			<li><strong>Tipo: </strong>Elección múltiple única respuesta</li>
			<li><strong>Tiempo estimado: </strong><?php echo $total * .5 ?> min</li>
		</ul>
		<br><br>
		<a href="preguntas.php" class="boton">Comenzar</a>
		<br>
	</div>
</main>
</body>
</html>
<?php 
include("footer.php");
 ?>