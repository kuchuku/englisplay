<?php

	include('header.php');

	include '../datos/grupo.php';
	include '../datos/usuario.php';
	include '../datos/estudiante.php';

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
	<section style="padding-top: 0rem; padding-bottom: 0rem; background-color: rgba(230,167,86,.9);">
		<div class="container">
			<div class="row">
				<div class="col-xl-9 mx-auto">
		            <div class="cta text-center rounded" style="background-color: rgba(255,255,255,.85);    position: relative;  padding: 3rem;  margin: .5rem; height: 400px;" > 
						CSV Cargado correctamente
					</div>
				</div>
			</div>
		</div>
	</section>

</body>

<?php

	include('footer.php');

?>