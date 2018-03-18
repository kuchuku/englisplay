<?php
	
	include("header.php");

?>

<head>
	
</head>

<body>
	<!-- El tipo de codificación de datos, enctype, DEBE especificarse como sigue -->
	<form enctype="multipart/form-data" action="php/csv.php" method="POST">
	    <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
	    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
	    <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
	    Enviar este fichero: <input name="csv" type="file" />
	    <input type="submit" value="Enviar fichero" />
	</form>

</body>

<?php

	include("footer.php");

?>