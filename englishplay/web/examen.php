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
		<h1> EXAMEN DE CONOCIMIENTOS EN INGLÉS </h1>
	</div>
	<div class="container">
		<h2>Test your PHP Knowledge</h2>
		<p>
			This is a multiple quiz to test your knowledge of PHP
		</p>
		<ul>
			<li><strong>Number of Questions: </strong><?php echo $total; ?></li>
			<li><strong>Type: </strong>Multiple Choice</li>
			<li><strong>Estimated Time: </strong><?php echo $total * .5 ?> min</li>
		</ul>
		<a href="preguntas.php" class="start">Start Quiz</a>
	</div>
</main>
</body>
</html>
<?php 
include("footer.php");
 ?>