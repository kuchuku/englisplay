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

$sql = "SELECT rolPersonaje, nivelPersonaje FROM personaje";
$resultado = mysqli_query($conexion, $sql);
while ($row = mysqli_fetch_assoc($resultado))
{

}

?>

<head>

</head>

<body>

</body>

<?php

include 'footer.php';

?>