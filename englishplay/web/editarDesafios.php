<?php

include 'header.php';

//Leemos
$json = file_get_contents('../juego/json/Shooter.json');
$array = json_decode($json, true);

//Modificamos
$array[allRoundData][0][questions4][0][completeTrue]='hola';

//Guardamos
$json = json_encode($array);
file_put_contents('../juego/json/Shooter_test.json', $json);

?>

<head>

</head>

<body>

	<select id="mundo" onchange="actualizarFormulario()">
 		<option value="1">Village
		<option value="2">Forest
 		<option value="3">Cave
  		<option value="4">Castle
	</select>

	<script>
		
		function actualizarFormulario() {
    		var x = document.getElementById("mundo").value;
		}

	</script>

</body>

<?php

include 'footer.php';

?>