<?php 
include("header.php");
require('../conexionDB.php');
include("php/sesion.php");
?>

	<body>
		<section style="padding-top: 0rem; padding-bottom: 0rem; background-color: rgba(230,167,86,.9);">
	    <div class="container">
			<div class="row">
	          	<div class="col-xl-9 mx-auto">
	            	<div class="cta text-center rounded" style="background-color: rgba(255,255,255,.85);    position: relative;  padding: 3rem;  margin: .5rem;" > 		
					<br>
				<h2 style="margin-bottom: 2rem;font-family: Raleway;    font-size: 2rem;">
	                <span style="display: block;font-size: 1rem; font-weight: 800;text-transform: uppercase;"">Congrats! You have completed the test</span>
	                <span style="display: block; font-size: 3rem;font-weight: 100;text-transform: uppercase;">Check your results</span>
	              </h2>	
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
				 	$num_pregunta;
				 	$num_pregunta++;
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
				 		<div style="text-align:left;"><?php		 		
				 		echo '<div >';
				 		echo '<span>'."(".$num_pregunta.")".'</span>'." ".'<span id="pregidform2">'.$preg.'</span>';
				 		?>
				 		<?php 
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
		<br><p style="display: block;font-size: 1rem;font-weight: 800;text-align: center;    color: #ab4d30;">Final Score: <?php echo $_SESSION['score']; ?></p>		
		<br>		
		<a type="submit" href="index.php" style="display: block;text-align: center;width: 15%;margin: auto;color: #0c0c0c;background: #d49b51;">Continue</a>
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
</div>
	</div>
</body>
</section>
<?php 
include("footer.php");
 ?>