<?php 
include("header.php");
require('../../conexionDB.php');
include("../negocio/sesion.php");
include("../negocio/pregunta.php");
?>
<?php 
	$num_test = $_POST['num_test'];
	$num_cap = $_POST['num_cap'];	
	$consulta = tipoExamen($num_test, $num_cap);

 ?>

<body>
	<section style="padding-top: 0rem; padding-bottom: 0rem; background-color: rgba(230,167,86,.9);">
	    <div class="container">
			<div class="row">
	          	<div class="col-xl-9 mx-auto">
	            	<div class="cta text-center rounded" style="background-color: rgba(255,255,255,.85);    position: relative;  padding: 3rem;  margin: .5rem;" > 
					<br>		
					<form method="post" class="formControl" action="resultados.php">
						<input type="hidden" name="exam" value="<?php echo $num_test ?>">
						<input type="hidden" name="cap" value="<?php echo $num_cap ?>">
					<?php 
					preguntasExamen($consulta);
		 			?>
		
					<br>
					<input type="submit" class="boton" value="Finish" style="display: block;text-align: center;width: 15%;margin: auto;color: #0c0c0c;background: #d49b51;" />
					<br>
				</form>
				</div>
			</div>
		</div>
    </div>
</section>
<?php 
include("footer.php");
 ?>