<?php

include 'header.php';

include '../../conexionDB.php';

$idGrupo = $_POST["grupo"];

$numPersonajesGuerrero = 0;
$numPersonajesMago = 0;
$numPersonajesArquero = 0;

$numNiveles1a5 = 0;
$numNiveles6a10 = 0;
$numNiveles11a15 = 0;
$numNiveles16a20 = 0;
$numNiveles21a25 = 0;
$numNiveles26a30 = 0;

$sql = "SELECT rolPersonaje, nivelPersonaje FROM personaje, estudiante WHERE estudiante.idGrupo = '$idGrupo' AND estudiante.codigoUsuario = personaje.codigoEstudiante";
$resultado = mysqli_query($conexion, $sql);
while ($row = mysqli_fetch_assoc($resultado))
{

	//Contador roles
	if ($row[rolPersonaje] == 0)
	{
		$numPersonajesGuerrero++;
	}
	else if ($row[rolPersonaje] == 1)
	{
		$numPersonajesMago++;
	}
	else if ($row[rolPersonaje] == 2)
	{
		$numPersonajesArquero++;
	}

	//Contador niveles
	if ($row[nivelPersonaje] <= 5)
	{
		$numNiveles1a5++;
	}
	else if ($row[nivelPersonaje] <= 10)
	{
		$numNiveles6a10++;
	}
	else if ($row[nivelPersonaje] <= 15)
	{
		$numNiveles11a15++;
	}
	else if ($row[nivelPersonaje] <= 20)
	{
		$numNiveles16a20++;
	}
	else if ($row[nivelPersonaje] <= 25)
	{
		$numNiveles21a25++;
	}
	else if ($row[nivelPersonaje] <= 30)
	{
		$numNiveles26a30++;
	}
}

$numAvance1 = 0;
$numAvance2 = 0;
$numAvance3 = 0;
$numAvance4 = 0;

$sql = "SELECT mundoAvance FROM avance, estudiante WHERE estudiante.idGrupo = '$idGrupo' AND estudiante.codigoUsuario = avance.codigoEstudiante";
$resultado = mysqli_query($conexion, $sql);
while ($row = mysqli_fetch_assoc($resultado))
{
	
	//Contador avance
	if ($row[mundoAvance] == 1)
	{
		$numAvance1++;
	}
	else if ($row[mundoAvance] == 2)
	{
		$numAvance2++;
	}
	else if ($row[mundoAvance] == 3)
	{
		$numAvance3++;
	}
	else if ($row[mundoAvance] == 4)
	{
		$numAvance4++;
	}
}

$numPreguntas;
$numCorrectas;

$numPreguntasAldea;
$numCorrectasAldea;

$numPreguntasBosque;
$numCorrectasBosque;

$numPreguntasCueva;
$numCorrectasCueva;

$numPreguntasCastillo;
$numCorrectasCastillo;

$sql = "SELECT preguntas, correctas, mundo FROM resultadoDesafio, estudiante WHERE estudiante.idGrupo = '$idGrupo' AND estudiante.codigoUsuario = resultadoDesafio.codigoEstudiante";
$resultado = mysqli_query($conexion, $sql);
while ($row = mysqli_fetch_assoc($resultado))
{
	$numPreguntas += $row[preguntas];
	$numCorrectas += $row[correctas];

  if($row[mundo]==1){
    $numPreguntasAldea += $row[preguntas];
    $numCorrectasAldea += $row[correctas];
  }else if($row[mundo]==2){
    $numPreguntasBosque += $row[preguntas];
    $numCorrectasBosque += $row[correctas];
  }else if($row[mundo]==3){
    $numPreguntasCueva += $row[preguntas];
    $numCorrectasCueva += $row[correctas];
  }else if($row[mundo]==4){
    $numPreguntasCastillo += $row[preguntas];
    $numCorrectasCastillo += $row[correctas];
  }
}

$puntuacionInicialAldea;
$puntuacionInicialBosque;
$puntuacionInicialCueva;
$puntuacionInicialCastillo;

$estudiantesInicialAldea;
$estudiantesInicialBosque;
$estudiantesInicialCueva;
$estudiantesInicialCastillo;

$puntuacionFinalAldea;
$puntuacionFinalBosque;
$puntuacionFinalCueva;
$puntuacionFinalCastillo;

$estudiantesFinalAldea;
$estudiantesFinalBosque;
$estudiantesFinalCueva;
$estudiantesFinalCastillo;

$sql = "SELECT examen, tema, puntuacion FROM estadisticas, estudiante WHERE estudiante.idGrupo = '$idGrupo' AND estudiante.codigoUsuario = estadisticas.codEstudiante";
$resultado = mysqli_query($conexion, $sql);
while ($row = mysqli_fetch_assoc($resultado))
{
  if($row[examen]==0){
    if($row[tema]==1){
      $puntuacionInicialAldea += $row[puntuacion];
      $estudiantesInicialAldea += 1;
    }else if($row[tema]==2){
      $puntuacionInicialBosque += $row[puntuacion];
      $estudiantesInicialBosque += 1;
    }else if($row[tema]==3){
      $puntuacionInicialCueva += $row[puntuacion];
      $estudiantesInicialCueva += 1;
    }else if($row[tema]==4){
      $puntuacionInicialCastillo += $row[puntuacion];
      $estudiantesInicialCastillo += 1;
    }
  }else if($row[examen]==1){
    if($row[tema]==1){
      $puntuacionFinalAldea += $row[puntuacion];
      $estudiantesFinalAldea += 1;
    }else if($row[tema]==2){
      $puntuacionFinalBosque += $row[puntuacion];
      $estudiantesFinalBosque += 1;
    }else if($row[tema]==3){
      $puntuacionFinalCueva += $row[puntuacion];
      $estudiantesFinalCueva += 1;
    }else if($row[tema]==4){
      $puntuacionFinalCastillo += $row[puntuacion];
      $estudiantesFinalCastillo += 1;
    }
  }
}

?>

<html>
  <head>
  	<link rel="stylesheet" type="text/css" href="css/styleGroupStatistics.css">
    <!--Load the AJAX API-->
    <script type="text/javascript" src="js/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawCharts);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawCharts() {

        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Warrior', <?php echo $numPersonajesGuerrero ?>],
          ['Magician', <?php echo $numPersonajesArquero ?>],
          ['Archer', <?php echo $numPersonajesMago ?>]
        ]);
        // Set chart options
        var options = {'title':'Role',
                       'width':350,
                       'height':300,
                       'backgroundColor': 'transparent'};
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('divChart1'));
        chart.draw(data, options);

        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Level 1 to 5', <?php echo $numNiveles1a5 ?>],
          ['Level 6 to 10', <?php echo $numNiveles6a10 ?>],
          ['Level 11 to 15', <?php echo $numNiveles11a15 ?>],
          ['Level 16 to 20', <?php echo $numNiveles16a20 ?>],
          ['Level 21 to 25', <?php echo $numNiveles21a25 ?>],
          ['Level 26 to 30', <?php echo $numNiveles26a30 ?>]
        ]);
        // Set chart options
        var options = {'title':'Level',
                       'width':350,
                       'height':300,
                       'backgroundColor': 'transparent'};
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('divChart2'));
        chart.draw(data, options);

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Village', <?php echo $numAvance1 ?>],
          ['Forest', <?php echo $numAvance2 ?>],
          ['Cave', <?php echo $numAvance3 ?>],
          ['Castle', <?php echo $numAvance4 ?>]
        ]);
        // Set chart options
        var options = {'title':'Current World Unlocked',
                       'width':350,
                       'height':300,
                       'backgroundColor': 'transparent'};
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('divChart3'));
        chart.draw(data, options);

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Correct Answers', <?php echo $numCorrectas ?>],
          ['Wrong Answers', <?php echo $numPreguntas - $numCorrectas ?>]
        ]);
        // Set chart options
        var options = {'title':'All Challenges',
                       'width':350,
                       'height':300,
                       'backgroundColor': 'transparent'};
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('divChart4'));
        chart.draw(data, options);

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Correct Answers', <?php echo $numCorrectasAldea ?>],
          ['Wrong Answers', <?php echo $numPreguntasAldea - $numCorrectasAldea ?>]
        ]);
        // Set chart options
        var options = {'title':'Simple and Continous Times',
                       'width':350,
                       'height':300,
                       'backgroundColor': 'transparent'};
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('divChart5'));
        chart.draw(data, options);

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Correct Answers', <?php echo $numCorrectasBosque ?>],
          ['Wrong Answers', <?php echo $numPreguntasBosque - $numCorrectasBosque ?>]
        ]);
        // Set chart options
        var options = {'title':'Perfect Times and Passive Voice',
                       'width':350,
                       'height':300,
                       'backgroundColor': 'transparent'};
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('divChart6'));
        chart.draw(data, options);

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Correct Answers', <?php echo $numCorrectasCueva ?>],
          ['Wrong Answers', <?php echo $numPreguntasCueva - $numCorrectasCueva ?>]
        ]);
        // Set chart options
        var options = {'title':'Prepositions and Linking Words',
                       'width':350,
                       'height':300,
                       'backgroundColor': 'transparent'};
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('divChart7'));
        chart.draw(data, options);

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Correct Answers', <?php echo $numCorrectasCastillo ?>],
          ['Wrong Answers', <?php echo $numPreguntasCastillo - $numCorrectasCastillo ?>]
        ]);
        // Set chart options
        var options = {'title':'Adjectives and Superlatives',
                       'width':350,
                       'height':300,
                       'backgroundColor': 'transparent'};
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('divChart8'));
        chart.draw(data, options);

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Score');
        data.addRows([
          ['Village Average Score', <?php echo $puntuacionInicialAldea / $estudiantesInicialAldea ?>],
          ['Forest Average Score', <?php echo $puntuacionInicialBosque / $estudiantesInicialBosque ?>],
          ['Cave Average Score', <?php echo $puntuacionInicialCueva / $estudiantesInicialCueva ?>],
          ['Castle Average Score', <?php echo $puntuacionInicialCastillo / $estudiantesInicialCastillo ?>]
        ]);
        // Set chart options
        var options = {'title':'Initial Exam',
                       'width':350,
                       'height':300,
                       'backgroundColor': 'transparent',
                       'legend': { position: "none" }};
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('divChart9'));
        chart.draw(data, options);

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Score');
        data.addRows([
          ['Village Average Score', <?php echo $puntuacionFinalAldea / $estudiantesFinalAldea ?>],
          ['Forest Average Score', <?php echo $puntuacionFinalBosque / $estudiantesFinalBosque ?>],
          ['Cave Average Score', <?php echo $puntuacionFinalCueva / $estudiantesFinalCueva ?>],
          ['Castle Average Score', <?php echo $puntuacionFinalCastillo / $estudiantesFinalCastillo ?>]
        ]);
        // Set chart options
        var options = {'title':'Final Exam',
                       'width':350,
                       'height':300,
                       'backgroundColor': 'transparent',
                       'legend': { position: "none" }};
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('divChart10'));
        chart.draw(data, options);

      }
    </script>
  </head>

  <body>
    <section style="padding-top: 0rem; padding-bottom: 0rem; background-color: rgba(230,167,86,.9);">
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <div class="cta text-center rounded" id="contenedor" style="background-color: rgba(255,255,255,.85);    position: relative;  padding: 3rem;  margin: .5rem;" > 
              	<div id="divChart1" class="divInterno"></div>
              	<div id="divChart2" class="divInterno"></div>
                <div id="divChart3" class="divInterno"></div>
                <div id="divChart4" class="divInterno"></div>
                <div id="divChart5" class="divInterno"></div>
                <div id="divChart6" class="divInterno"></div>
                <div id="divChart7" class="divInterno"></div>
                <div id="divChart8" class="divInterno"></div>
                <div id="divChart9" class="divInterno"></div>
                <div id="divChart10" class="divInterno"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>

<?php

include 'footer.php';

?>