<?php 
	include ('../../conexionDB.php');

	$codigoEst = $_POST["codigo"];
	
	$consulta=mysqli_query($conexion,"SELECT codigoUsuario,contraseniaUsuario, tipoUsuario FROM usuario");
	//el mysql_fetch_array (9 devuelve los registros de la tabla usuarios)
	while($filas=mysqli_fetch_array($consulta)){

		$usuario=$filas['codigoUsuario'];
		$pass=$filas['contraseniaUsuario'];
		$tipoUsuario=$filas['tipoUsuario'];

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
			
			if ($tipoUsuario == 1) {
				$_SESSION["estudiante"] = false;
			}elseif($tipoUsuario == 0){
				$_SESSION["estudiante"] = true;
			}
			
			//Declaro mis variables de sesión
			$_SESSION["autenticado"] = true;
			$_SESSION["codEst"] = $codigoEst;	 			
			$_SESSION["usuario"] = $_POST['email'];
			header("Location: ../vista/index.php");
		}
	}			
 ?>






