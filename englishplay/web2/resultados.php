<?php 
include("header.php");
require('../conexionDB.php');
include("php/sesion.php");
?>

	<body>
		<main>		
		<div class="container"><br>
		<div class="container2">
			<br>
		<h2 id="titulo">Congrats! You have completed the test </h2>
		<br>
		<?php  

			$query ="SELECT * FROM pregunta WHERE test = ".$_POST['exam']." AND capitulo = ".$_POST['cap'];
		 	//Get result
		 	$results = mysqli_query($conexion,$query); 	
		 	$_SESSION['score'] = 0;
		 	$total = $results->num_rows;

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
		 		echo '<div id= "formchoices">';
		 		echo '<span id="pregidform">'."(".$idprg.")".'</span>'." ".'<span id="pregidform2">'.$preg.'</span>';
		 		?>
		 		<?php 
		 		if ($correct_choice != $selected_choice) 
		 		{				 	
				 	//answer is incorrect				 	
				 	echo '<br><span id="pregidform">'."incorrecto! tu respuesta fue: ".'</span>'.'<span id="wrong">'.$selected_choice.'</span>'.'<br>';
				 	echo '<span id="pregidform">'." y la respuesta correcta es: ".'</span>'.'<span id="correct">'.$correct_choice.'</span>'.'<br><br>';
		 		}		
		 		if ($correct_choice == $selected_choice) 
		 		{
				 	//answer is correct
				 	$_SESSION['score']++;
				 	echo '<br><span id="pregidform">'."Felicidades acertaste! tu respuesta: ".'</span><span id="correct">'.$selected_choice.'</span>'." fue correcta".'<br><br>';
		 		}	
		 	}
		 echo '</div>';	
		?>	</div>		

		
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    	<script type="text/javascript">
	      google.charts.load('current', {'packages':['corechart']});
	      google.charts.setOnLoadCallback(drawChart);

      	function drawChart() {

	        var data = google.visualization.arrayToDataTable([
	          ['Task', 'Hours per Day'],
	          ['Aciertos', <?php echo $_SESSION['score']; ?> ],
	          ['Fallos', <?php $fallos = $total - $_SESSION['score']; echo $fallos; ?> ]
       		 ]);

	        var options = {
	          title: 'Resultados examen'
	        };
        	var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        	chart.draw(data, options);
      		}
      	</script>
		<div id="piechart"></div>
		<br><p id="score">Final Score: <?php echo $_SESSION['score']; ?></p>		
		<br>		
		<a href="index.php" class="boton">Continue</a>
		<br>
	</div>
	</div>
	<?php 
		session_start();
		 		//recibe el codigo del estudiante que inició sesión.
		$cod = $_SESSION["codEst"];
		$sql=  mysqli_query($conexion,"SELECT nombreUsuario FROM usuario WHERE codigoUsuario = '$cod'");	
		$consulta = mysqli_fetch_array($sql);	
		$nombre= $consulta[0];
		$query= "INSERT INTO estadisticas (codEstudiante,nombreEstudiante,examen,tema,puntuacion) VALUES('".$cod."','".$nombre."','".$_POST['exam']."','".$_POST['cap']."','".$_SESSION['score']."')";
		$estadisticas=  mysqli_query($conexion,$query);
	 ?>
</main>
</body>
<?php 
include("footer.php");
 ?>