<?php

	include("header.php");

	include '../../conexionDB.php';

	$codigo = $_SESSION["codEst"];
	$grupo = $_POST["group"];

	$tmpName = $_FILES['csv']['tmp_name'];
	$file = fopen($tmpName, 'r');

	if($file != null) {
		$sql = "INSERT INTO grupo(docente, nombreGrupo) VALUES('$codigo', '$grupo')";
		mysqli_query($conexion, $sql);
	}

	$last_id = mysqli_insert_id($conexion);

	$i = 0;

	while (!feof($file))
	{
		$i++;

		@$content = array_map('utf8_encode', fgetcsv($file, 0, ';'));

		if ($i >= 5 && $content[0] != '')
		{
			
			$sql	= "INSERT INTO usuario(codigoUsuario, nombreUsuario, tipoUsuario) VALUES('$content[1]', '$content[2]', 0)";
			mysqli_query($conexion, $sql);
			$sql 	= "INSERT INTO estudiante(codigoUsuario, idGrupo) VALUES('$content[1]', 1)";
			mysqli_query($conexion, $sql);
			$sql 	= "UPDATE estudiante SET idGrupo = '$last_id' WHERE codigoUsuario = '$content[1]'";
			mysqli_query($conexion, $sql);
		}
	}

?>

<head>
	
</head>

<body>
	
	CSV Cargado correctamente

</body>

<?php

	include("footer.php");

?>