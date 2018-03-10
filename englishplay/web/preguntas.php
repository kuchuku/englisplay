<?php 
include("header.php");
require('../conexionDB.php');
include("php/sesion.php");
?>
<?php 
	$num_test = $_POST['num_test'];
	$num_cap = $_POST['num_cap'];
		$query ="SELECT id,pregunta,respuesta,elec1,elec2,test FROM pregunta WHERE test =".$num_test." AND capitulo =".$num_cap;
		 	//Get result
		 	$consulta = mysqli_query($conexion,$query);	
		


 ?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/preguntasForm.css" />
<body>
<main>
	<div class="container">	
		<div class="container2">
		<br>		
		<form method="post" class="formControl" action="resultados.php">
			<input type="hidden" name="exam" value="<?php echo $num_test ?>">
			<input type="hidden" name="cap" value="<?php echo $num_cap ?>">
		<?php while ($row = mysqli_fetch_array($consulta))  {
		 	$idPregunta = $row["id"];
		 	$textoPregunta = $row["pregunta"];
		 	$num_pregunta;		 	
		 	$ans_array = array($row['elec1'], $row['elec2'], $row['respuesta']); 
		 	shuffle($ans_array);
		 	$num_pregunta++;
		 ?>
	
		<p class="question">
		<?php echo '</p>
			<div class="preguntas_text" align="justify"> 			
			<label name="preguntaText">'."(".$idPregunta.") ".$textoPregunta.'</label>
			</div>
			<ul class="choices">
				<li><input name="choice'.$idPregunta.'" type="radio" value="'.$ans_array[0].'" required/>'.$ans_array[0].'</li>
				<li><input name="choice'.$idPregunta.'" type="radio" value="'.$ans_array[1].'"/>'.$ans_array[1].'</li>
				<li><input name="choice'.$idPregunta.'" type="radio" value="'.$ans_array[2].'"/>'.$ans_array[2].'</li> 
			</ul><br>	
			';	
		} 
		 ?>
		
		<br>
		<input type="submit" class="boton" value="Finalizar" />
		<br>
	</form>
	</div>
	</div>
</main>
</body>
</html>
<?php 
include("footer.php");
 ?>