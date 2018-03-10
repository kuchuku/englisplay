<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Simple and continuous verb tenses</title>
	<link rel="stylesheet" href="css/StylePrincipal.css">
	<link rel="stylesheet" href="css/flexslider.css">
	<link rel="stylesheet" type="text/css" href="css/styleSlider.css" />
	<link rel="stylesheet" type="text/css" href="css/StyleFooter.css" />
	<link rel="stylesheet" type="text/css" href="css/StyleForm.css" />
	<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
	<script type=" text/javascript" src="js/modernizr.custom.28468.js"></script>
	<script src="js/jquery.flexslider-min.js"></script>

	<script>
		$(function () {
			var pul = $('#pull');
			menu = $('nav ul');
			menuHeight = menu.height();

			$(pull).on('click',function(e){
				e.preventDefault();
				menu.slideToggle();


			});
		});
	</script>
</head>
	<header>
		<nav id="menu">
		<ul>
			<li><a href="index.php" id ="logo">&nbsp;</a></li>
			<li><a href="index.php" id ="enlaces" class="inicio">Inicio</a></li>
			<li>
				<?php
					error_reporting(E_ALL ^ E_NOTICE);
					session_start();
					if($_SESSION["autenticado"]){
						echo "<a href='examen.php' id='enlaces'>Examen</a>";
						?>
					</li>
					<?php
					echo "<li><a id='enlaces' href='php/salir.php'>Salir</a></li>";
					}else{
						echo "<li><a id='enlaces' href='login.php'>Login</a></li>";
					}
				?>
			
			
		</ul>
		<a href="" id="pull">&nbsp;</a>
	</nav>
	</header>
