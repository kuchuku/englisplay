<?php 
require('../../conexionDB.php');
include('../datos/preguntas.php');

function tipoExamen($num_test, $num_cap){
	$eleccionExamen = preguntasTest ($num_test, $num_cap);
	return $eleccionExamen;
}

function preguntasExamen($consulta){
	while ($row = mysqli_fetch_array($consulta))  {
					 	$idPregunta = $row["id"];
					 	$textoPregunta = $row["pregunta"];
					 	$num_pregunta;		 	
					 	$ans_array = array($row['elec1'], $row['elec2'], $row['respuesta']); 
					 	shuffle($ans_array);
					 	$num_pregunta++;
					 ?>
					<?php echo '</p>
						<div class="preguntas_text" align="justify"> 			
						<label name="preguntaText">'."(".$num_pregunta.") ".$textoPregunta.'</label>
						</div>
						<ul class="choices">
							<li class="list-unstyled-item list-hours-item d-flex"><input name="choice'.$idPregunta.'" type="radio"  style="margin:0px;" value="'.$ans_array[0].'" required/>'.$ans_array[0].'</li>
							<li class="list-unstyled-item list-hours-item d-flex"><input name="choice'.$idPregunta.'" type="radio" style="margin:0px;" value="'.$ans_array[1].'"/>'.$ans_array[1].'</li>
							<li class="list-unstyled-item list-hours-item d-flex"><input name="choice'.$idPregunta.'" type="radio" style="margin:0px;" value="'.$ans_array[2].'"/>'.$ans_array[2].'</li> 
						</ul><br>	
						';	
					} 
}

?>