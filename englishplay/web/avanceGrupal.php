<?php

include 'header.php';

include '..\conexionDB.php';

$numPersonajes = 0;
$numPersonajesGuerrero = 0;
$numPersonajesMago = 0;
$numPersonajesArquero = 0;

$numNiveles1a5 = 0;
$numNiveles6a10 = 0;
$numNiveles11a15 = 0;
$numNiveles16a20 = 0;
$numNiveles21a25 = 0;
$numNiveles26a30 = 0;

$sql = "SELECT rolPersonaje, nivelPersonaje FROM personaje";
$resultado = mysqli_query($conexion, $sql);
while ($row = mysqli_fetch_assoc($resultado))
{

	//Contador personajes
	$numPersonajes++;

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

$

$numAvance1 = 0;
$numAvance2 = 0;
$numAvance3 = 0;
$numAvance4 = 0;

$sql = "SELECT mundoAvance FROM avance";
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

$sql = "SELECT preguntas, correctas FROM resultadoDesafio";
$resultado = mysqli_query($conexion, $sql);
while ($row = mysqli_fetch_assoc($resultado))
{
	$numPreguntas += $row[preguntas];
	$numCorrectas += $row[correctas];
}

?>

<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Guerrero', <?php echo $numPersonajesGuerrero ?>],
          ['Mago', <?php echo $numPersonajesArquero ?>],
          ['Arquero', <?php echo $numPersonajesMago ?>]
        ]);

        // Set chart options
        var options = {'title':'Personajes',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
  </body>
</html>

<?php

include 'footer.php';

?>