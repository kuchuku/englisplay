<?php
error_reporting(E_ALL ^ E_NOTICE);
include("header.php");
isset($_POST["codigo"]);
	$email = $_POST["codigo"];
 ?>
 <section id="form">
 	<form class="contact_form" action="php/control.php" method="post">
 		<ul>
 			<li>
 				<h2>Iniciar sesión</h2>
 			</li>
 			<h5>Código</h5>
 			<li>
 				<input type="number" name="codigo" placeholder="codigo" value="<?php echo $email;?>" required/>
 			</li>
 			<h5>Contraseña</h5>
 			<li>
 				<input type="password" name="password" placeholder="Password" required />
 			</li>
 			<?php 
 				if (isset($_POST["codigo"])) {
 					echo "Email o contraseña incorrectos";
 				}
 				
 			 ?>
 			 <li>
 			 	<input type="submit" class="submit" value="Iniciar"></input>
 			 </li>
 			 <a id="paginas1" href="javascript:window.history.back();">&laquo; Volver atrás</a>
 		</ul>
 	</form>
 </section>
 <?php 
 include("footer.php");
  ?>