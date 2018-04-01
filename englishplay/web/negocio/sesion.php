<?php 
	session_start();
	/*se evalua que la sesion continue verificando una de las variables creadas en control.php, cuando esta ya no coincida con su valor inicial se redirije al archivo salir.php*/

	if (!$_SESSION["autenticado"]) {
		header("Location: salir.php");
	}

 ?>