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

$sql = "SELECT preguntas, correctas FROM resultadoDesafio, estudiante WHERE estudiante.idGrupo = '$idGrupo' AND estudiante.codigoUsuario = resultadoDesafio.codigoEstudiante";
$resultado = mysqli_query($conexion, $sql);
while ($row = mysqli_fetch_assoc($resultado))
{
	$numPreguntas += $row[preguntas];
	$numCorrectas += $row[correctas];
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
        var options = {'title':'Current World',
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