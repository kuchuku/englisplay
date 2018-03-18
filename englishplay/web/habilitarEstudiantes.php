<?php
	
	include '..\conexionDB.php';
	include("header.php");

	$file = fopen('listado_de_clase_750101M.csv', 'r');

	$i = 0;

	while (!feof($file))
	{
		$i++;

		@$content = array_map('utf8_encode', fgetcsv($file, 0, ';'));

		if ($i >= 5 && $content[0] != '')
		{
			
			$sql 		= "INSERT INTO usuario(codigoUsuario, nombreUsuario, tipoUsuario) VALUES('$content[1]', '$content[2]', 0)";
			mysqli_query($conexion, $sql);
			$sql 		= "INSERT INTO estudiante(codigoUsuario, idGrupo) VALUES('$content[1]', 50)";
			mysqli_query($conexion, $sql);
		}
	}

	include("footer.php");

?>

<head>
	
</head>

<body>
	
</body>