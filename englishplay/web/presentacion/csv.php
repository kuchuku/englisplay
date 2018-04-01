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
			insertarEstudiante($content[1], $last_id);
			actualizarGrupoEstudiante($content[1], $last_id);
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