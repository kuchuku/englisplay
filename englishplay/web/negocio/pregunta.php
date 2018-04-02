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
function questionsInBD($tipoExamen, $capExamen){
	$pregExamen = pregBD ($tipoExamen, $capExamen);
	checkAnswers($pregExamen);
}
function checkAnswers($pregExamen){
	$results = $pregExamen;
	$total = $results->num_rows;
	$_SESSION['score'] = 0;	
	while ($row = mysqli_fetch_array($results)) 
	 	{
	 	$idprg = $row['id'];
	 	$preg = $row['pregunta'];
	 	$selected_choice = $_POST['choice'.$row['id']]; 	
	 	$num_pregunta;
	 	$num_pregunta++;
	    	if (!isset($_SESSION['score'])) {
				$_SESSION['score'] = 0;
			}
	    	if ($_POST) 
	    	{	    			
	    		checkAns($idprg);
	 			$correct_choice = $row ['respuesta'];
	 		}
	 		echo '<div style="text-align:left;">';		 		
	 		echo '<div >';
	 		echo '<span>'."(".$num_pregunta.")".'</span>'." ".'<span id="pregidform2">'.$preg.'</span>';
	 		if ($correct_choice != $selected_choice) 
	 		{				 	
			 	//answer is incorrect				 	
			 	echo '<br><span style="margin-left:2rem;">'."Wrong! your answer was : ".'</span>'.'<span style="color:#dc3545;">'.$selected_choice.'</span>'.'<br>';
			 	echo '<span style="margin-left:2rem;">'." The correct answer is : ".'</span>'.'<span style="color:#28a745;">'.$correct_choice.'</span>'.'<br><br>';
	 		}		
	 		if ($correct_choice == $selected_choice) 
	 		{
			 	//answer is correct
			 	$_SESSION['score']++;
			 	echo '<br><span style="margin-left:2rem;">'."Congratulations! Your answer: ".'</span><span style="color:#28a745;">'.$selected_choice.'</span>'." is correct".'<br><br>';
	 		}	
	 	}
	 echo '</div>';	
}
function regExam($tipoExamen, $capExamen,$score){
	registrarScore($tipoExamen,$capExamen,$score);
}
?>