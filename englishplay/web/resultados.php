<?php 
include("header.php");
require('../conexionDB.php');
include("php/sesion.php");
?>


<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/preguntasForm.css" />
<body>

<main>
	<div class="container">
		<div class="container2">
		<h2 id="titulo">Congrats! You have completed the test </h2>
		<br>
		<?php  
			$query ="SELECT * FROM pregunta WHERE test = 0 AND capitulo = 1";
		 	//Get result
		 	$results = mysqli_query($conexion,$query); 	
		 	$_SESSION['score'] = 0;

		 	while ($row = mysqli_fetch_array($results)) 
		 	{
		 	$idprg = $row['id'];
		 	$preg = $row['pregunta'];
		 	$selected_choice = $_POST['choice'.$row['id']]; 	
		 	
		    	if (!isset($_SESSION['score'])) {
					$_SESSION['score'] = 0;
				}

		    	if ($_POST) 
		    	{	    			
				 	//Obtener la respuesta correcta
				 	$query ="SELECT respuesta FROM preguntas WHERE id='$questionID'";
				 	//Get result
				 	$respuesta = mysqli_query($conexion,$query); 
		 			$correct_choice = $row ['respuesta'];
		 		}?>
		 		<div id=comprobar><?php
		 		echo '<span id="pregidform">'."(".$idprg.")".'</span>'." ".'<span id="pregidform2">'.$preg.'</span>';
		 		?></div>
		 		<?php 
		 		echo '<div id= "formchoices">';
		 		if ($correct_choice != $selected_choice) 
		 		{				 	
				 	//answer is incorrect				 	
				 	echo "tu respuesta: ".'<span id="wrong">'.$selected_choice.'</span>'.'<br>';
				 	echo "respuesta correcta: ".'<span id="correct">'.$correct_choice.'</span>'.'<br><br>';
		 		}		
		 		if ($correct_choice == $selected_choice) 
		 		{
				 	//answer is correct
				 	$_SESSION['score']++;
				 	echo "Felicidades acertaste! tu respuesta: ".'<span id="correct">'.$selected_choice.'</span>'." fue correcta".'<br><br>';
		 		}	
		 	}
		 echo '</div>';	
		?>			
		<br><br>	
		<p id="score">Final Score: <?php echo $_SESSION['score']; ?></p>
		<a href="index.php" class="boton">Continue</a>
		<br><br>
	</div>
	</div>
	<br>
</main>
</body>
</html>
<?php 
include("footer.php");
 ?>