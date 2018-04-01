<?php
	
	include("header.php");

?>

<head>
	
</head>

<body>
	<section style="padding-top: 0rem; padding-bottom: 0rem; background-color: rgba(230,167,86,.9);">
		<div class="container">
			<div class="row">
				<div class="col-xl-9 mx-auto">
		            <div class="cta text-center rounded" style="background-color: rgba(255,255,255,.85);    position: relative;  padding: 3rem;  margin: .5rem;" > 
						<!-- El tipo de codificación de datos, enctype, DEBE especificarse como sigue -->
						<form enctype="multipart/form-data" action="csv.php" method="POST">
							Group Name: <input type="text" name="group" size="40"><br><br><br><br>
						    <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
						    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
						    <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
						    <input name="csv" type="file" /><br>
						   	<strong>Only CSV format is accepted.</strong><br><br><br><br>
						    <input type="submit" value="Load Group" />
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>

<?php

	include("footer.php");

?>