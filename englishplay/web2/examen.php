<?php 
include("header.php");
require('../conexionDB.php');
include("php/sesion.php");

	// Get Total Questions
	$query = "SELECT * FROM pregunta";
	// Get result
	$results =  mysqli_query($conexion,$query);
	$total = $results->num_rows;

?>

<body id="andres">

<main>
	<div class="container">
		<br>
		<div class="container2">
		<br>
		<h2> EXAMEN DE CONOCIMIENTOS EN INGLÉS </h2><br>
		<h2>Prueba tus conocimientos</h2>
		<p id="eligetext"><strong>
			Cada examen contiene:</strong>
		</p>
		
		<ul id="cadatest">
			<li>Número de preguntas: <strong> <?php echo $total; ?></strong></li>
			<li>Tipo: selección múltiple única respuesta</li>
			<li>Tiempo estimado: <strong><?php echo $total * .5 ?> min</strong></li>
		<br>		
			<li><strong>Para realizar el examen:</strong> </li><br>
			<li>Selecciona el tipo de examen desees realizar:</li>
		</ul>
		<form method="post" class="formControl" action="preguntas.php">
 			<!--<input type="number" name="num_test" min="0" max="1" required/>
 			<ul id ="cadatest">
 				<li>Digita el capítulo del cual vas a examinarte (del 1 al 4)</li><br>
 			</ul>
 			<input type="number" name="num_cap" min="1" max="4" required/>-->
 			<select name="num_test">
 				<option  value="0">Inicial</option>
 				<option  value="1">Final</option>
 			</select>
 			<ul id="cadatest">
 				<li>Selecciona el tema del examen</li>
 			</ul>
 			<select name="num_cap">
 				<option  value="1">Tiempos simples y continuos</option>
 				<option  value="2">Tiempos perfectos y voz pasiva</option>
 				<option  value="3">Preposiciones</option>
 				<option  value="4">Comparativos y superlativos</option>
 			</select>
			<br>
 			<button type="submit" class="boton">Comenzar</button>
		</form>	
		<br>
		</div>
		<br>
	</div>
</main>
</body>
<?php 
include("footer.php");
 ?>