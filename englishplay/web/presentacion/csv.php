<?php

	include '../datos/grupo.php';
	include '../datos/usuario.php';

	session_start();

	$codigo = $_SESSION["codEst"];
	$grupo = $_POST["group"];

	$tmpName = $_FILES['csv']['tmp_name'];
	$file = fopen($tmpName, 'r');

	if($file != null) {
		insertarGrupo($codigo, $grupo);
	}

	$last_id = mysqli_insert_id($conexion);

	$i = 0;

	while (!feof($file))
	{
		$i++;

		@$content = array_map('utf8_encode', fgetcsv($file, 0, ';'));

		if ($i >= 5 && $content[0] != '')
		{
			insertarUsuario($content[1], $content[2], 0);
			//$sql 	= "INSERT INTO estudiante(codigoUsuario, idGrupo) VALUES('$content[1]', 1)";
			//mysqli_query($conexion, $sql);
			//$sql 	= "UPDATE estudiante SET idGrupo = '$last_id' WHERE codigoUsuario = '$content[1]'";
			//mysqli_query($conexion, $sql);
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