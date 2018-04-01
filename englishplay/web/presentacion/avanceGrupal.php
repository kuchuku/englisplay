<?php

include 'header.php';

include '../../conexionDB.php';

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

        // Create the data table.
        var dataPersonajes = new google.visualization.DataTable();
        dataPersonajes.addColumn('string', 'Topping');
        dataPersonajes.addColumn('number', 'Slices');
        dataPersonajes.addRows([
          ['Guerrero', <?php echo $numPersonajesGuerrero ?>],
          ['Mago', <?php echo $numPersonajesArquero ?>],
          ['Arquero', <?php echo $numPersonajesMago ?>]
        ]);

        // Set chart options
        var optionsPersonajes = {'title':'Personajes',
                       'width':350,
                       'height':300,
                       'backgroundColor': 'transparent'};

        // Instantiate and draw our chart, passing in some options.
        var chartPersonajes = new google.visualization.PieChart(document.getElementById('chart1_div'));
        chartPersonajes.draw(dataPersonajes, optionsPersonajes);

        // Create the data table.
        var dataNiveles = new google.visualization.DataTable();
        dataNiveles.addColumn('string', 'Topping');
        dataNiveles.addColumn('number', 'Slices');
        dataNiveles.addRows([
          ['Nivel 1 a 5', <?php echo $numNiveles1a5 ?>],
          ['Nivel 6 a 10', <?php echo $numNiveles6a10 ?>],
          ['Nivel 11 a 15', <?php echo $numNiveles11a15 ?>],
          ['Nivel 16 a 20', <?php echo $numNiveles16a20 ?>],
          ['Nivel 21 a 25', <?php echo $numNiveles21a25 ?>],
          ['Nivel 26 a 30', <?php echo $numNiveles26a30 ?>]
        ]);

        // Set chart options
        var optionsNiveles = {'title':'Niveles',
                       'width':350,
                       'height':300,
                       'backgroundColor': 'transparent'};

        // Instantiate and draw our chart, passing in some options.
        var chartNiveles = new google.visualization.PieChart(document.getElementById('chart2_div'));
        chartNiveles.draw(dataNiveles, optionsNiveles);

        // Create the data table.
        var dataNiveles = new google.visualization.DataTable();
        dataNiveles.addColumn('string', 'Topping');
        dataNiveles.addColumn('number', 'Slices');
        dataNiveles.addRows([
          ['Village', <?php echo $numAvance1 ?>],
          ['Forest', <?php echo $numAvance2 ?>],
          ['Cave', <?php echo $numAvance3 ?>],
          ['Castle', <?php echo $numAvance4 ?>]
        ]);

        // Set chart options
        var optionsNiveles = {'title':'Avance',
                       'width':350,
                       'height':300,
                       'backgroundColor': 'transparent'};

        // Instantiate and draw our chart, passing in some options.
        var chartNiveles = new google.visualization.PieChart(document.getElementById('chart3_div'));
        chartNiveles.draw(dataNiveles, optionsNiveles);

        // Create the data table.
        var dataNiveles = new google.visualization.DataTable();
        dataNiveles.addColumn('string', 'Topping');
        dataNiveles.addColumn('number', 'Slices');
        dataNiveles.addRows([
          ['Village', <?php echo $numAvance1 ?>],
          ['Forest', <?php echo $numAvance2 ?>],
          ['Cave', <?php echo $numAvance3 ?>],
          ['Castle', <?php echo $numAvance4 ?>]
        ]);

        // Set chart options
        var optionsNiveles = {'title':'Avance',
                       'width':350,
                       'height':300,
                       'backgroundColor': 'transparent'};

        // Instantiate and draw our chart, passing in some options.
        var chartNiveles = new google.visualization.PieChart(document.getElementById('chart4_div'));
        chartNiveles.draw(dataNiveles, optionsNiveles);

      }
    </script>
  </head>

  <body>
    <section style="padding-top: 0rem; padding-bottom: 0rem; background-color: rgba(230,167,86,.9);">
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <div class="cta text-center rounded" id="contenedor" style="background-color: rgba(255,255,255,.85);    position: relative;  padding: 3rem;  margin: .5rem;" > 
              	<div id="chart1_div" class="divInterno"></div>
              	<div id="chart2_div" class="divInterno"></div>
                <div id="chart3_div" class="divInterno"></div>
                <div id="chart4_div" class="divInterno"></div>
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