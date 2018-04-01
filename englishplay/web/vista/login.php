<?php
error_reporting(E_ALL ^ E_NOTICE);
include("header.php");
isset($_POST["codigo"]);
	$email = $_POST["codigo"];
 ?>
 <section id="form">
 	<form class="contact_form" action="../controlador/control.php" method="post">
 		<ul>
 			<li>
 				<h2>Iniciar sesión</h2>
 			</li>
 			<h5>Código</h5>
 			<li>
 				<input type="number" name="codigo" placeholder="Código" value="<?php echo $email;?>" required/>
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
 		</ul>
 	</form>
 </section>
 <?php 
 include("footer.php");
  ?>