<!DOCTYPE html>
<html lang="en">
<head>

	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EnglishPlay</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="vendor/bootstrap/css/styleForm.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/business-casual.min.css" rel="stylesheet">
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
	<script type=" text/javascript" src="js/modernizr.custom.28468.js"></script>
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

  <header>
	 <h1 class="site-heading text-center text-white d-none d-lg-block">
      <span class="site-heading-upper text-primary mb-3">Learn while enjoying</span>
      <span class="site-heading-lower">EnglishPlay</span>
    </h1>


	<nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
      <div class="container">
        <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
         <div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav mx-auto">	
		<li class='nav-item px-lg-4'><a href="index.php" id ="enlaces" class='nav-link text-uppercase text-expanded'>Home</a></li>		
				<?php
					error_reporting(E_ALL ^ E_NOTICE);
					session_start();

					if($_SESSION["autenticado"] & $_SESSION["estudiante"]){

						echo "<li class='nav-item px-lg-4'><a class='nav-link text-uppercase text-expanded' href='examen.php'>Exam</a></li>";
						echo "<li class='nav-item px-lg-4'><a class='nav-link text-uppercase text-expanded' href='student.php'>Student</a></li>";
						echo "<li class='nav-item px-lg-4'><a class='nav-link text-uppercase text-expanded' href='estadisticas.php'>Results</a></li>";
						?>
					<?php
					echo "<li class='nav-item px-lg-4'><a class='nav-link text-uppercase text-expanded' href='php/salir.php'>Sing Out</a></li>";
					}
					//EL ELSE IF ES LO DEL PROFESOR
					elseif ($_SESSION["autenticado"] & !$_SESSION["estudiante"]) {
						echo "<li class='nav-item px-lg-4'><a class='nav-link text-uppercase text-expanded' href='php/salir.php'>Sing Out</a></li>";
					}


					else{
						echo "<li class='nav-item px-lg-4'><a class='nav-link text-uppercase text-expanded'  href='login.php'>Login</a></li>";
					}
				?>
				</ul>
			</div>
		</div>		
	</nav>
	</header>
	  </head>