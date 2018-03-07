<?php 
	include ('../../conexionDB.php');

	$codigoEst = $_POST["codigo"];
	
	$consulta=mysqli_query($conexion,"SELECT codigoEstudiante,contraseniaEstudiante FROM estudiante");
	//el mysql_fetch_array (9 devuelve los registros de la tabla usuarios)
	while($filas=mysqli_fetch_array($consulta)){

		$usuario=$filas['codigoEstudiante'];
		$pass=$filas['contraseniaEstudiante'];

	if ($email=$_POST['codigo']!==$usuario || $password=$_POST['password']!==$pass) {
		$email=$_POST['codigo'];
		?>
		<form name="formulario" method="post" action="../login.php">
			<input type="hidden" name="codigo" value="<?php echo $email; ?>">
		</form>
		<script type="text/javascript">
			//Redireccionar con el formulario creado
			document.formulario.submit();
		</script>
		<?php
	}else{
			session_start();
			//Declaro mis variables de sesión
			$_SESSION["autenticado"] = true;
			$_SESSION["codEst"] = $codigoEst;	 			
			$_SESSION["usuario"] = $_POST['email'];

			header("Location: ../index.php");
		}
	}			
 ?>






