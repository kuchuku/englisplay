<?php 
include("header.php");
require('../conexionDB.php');
include("php/sesion.php");
?>

<body id="andres">

<main>
	<div class="container">
		<br>
		<div class="container2">
		<br>
		<h2>Resultados de los estudiantes en las pruebas</h2>		
		
		<form method="post" class="formControl" action="verNotasEstudiante.php">
 			<ul id="cadatest">
 				<li>Selecciona el código del estudiante</li>
 			</ul> 			
 			<select name="num_cap">
 				<?php 
 					$query ="SELECT DISTINCT codEstudiante FROM estadisticas";
					$resultado = mysqli_query($conexion,$query);
					while ($row = mysqli_fetch_array($resultado))  {

 			 		?>
 				<option  value="<?php echo $row['codEstudiante']; ?>"><?php echo $row['codEstudiante']; ?></option>
 			
 			<?php } ?>
 			</select>
			<br>
 			<button type="submit" class="boton">Ver</button>
		</form>	
		<br>
		
		</div>
		<br>
	</div>
</main>
</body>
<?php 
include("footer.php");
 ?>