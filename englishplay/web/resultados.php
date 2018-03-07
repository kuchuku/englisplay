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
		<h2>Congrats! You have completed the test </h2>

		<?php  
			$query ="SELECT * FROM pregunta WHERE test = 0 AND capitulo = 1";
		 	//Get result
		 	$results = mysqli_query($conexion,$query); 	
		 	$_SESSION['score'] = 0;

		 	while ($row = mysqli_fetch_array($results)) 
		 	{
		 	$idprg = $row['id'];
		 	$resp = $row['pregunta'];
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
		 		}
		 		echo "(",$idprg,") ",$resp;
		 		if ($correct_choice != $selected_choice) 
		 		{
				 	//answer is incorrect				 	
				 	echo '<br>'."tu respuesta: ".'<span style="background-color: #FF9C9E">'.$selected_choice.'</span>';
				 	echo '<br>'."respuesta correcta: ".'<span style="background-color: #ADFFB4">'.$correct_choice.'</span><br>';
		 		}		
		 		if ($correct_choice == $selected_choice) 
		 		{
				 	//answer is correct
				 	$_SESSION['score']++;
				 	echo '<br><p><span style="background-color: #ADFFB4">'.$selected_choice.'</span></p>';
		 		}	
		 	}
		 	
		?>	

		
		<a href="index.php" class="start">Continue</a>
		<p>Final Score: <?php echo $_SESSION['score']; ?></p>
		<p><span style="background-color: #FF9C9E"></span></p>
	


	</div>
</main>
</body>
</html>
<?php 
include("footer.php");
 ?>