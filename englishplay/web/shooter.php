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

	<script>
		
		function actualizarFormulario() {
    		var mundo = document.getElementById("mundo").value;
    		if(mundo == 1){
    			document.getElementById("sentence").value = "<?php echo $array[allRoundData][0][questions1][0][sentence]; ?>";
    		}
		}

	</script>

	<select id="mundo">
 		<option value="1" selected="selected">Village
		<option value="2">Forest
 		<option value="3">Cave
  		<option value="4">Castle
	</select><br>

	Sentence: <input type="text" id="sentence" size="100"><br>
	Correct Answer: <input type="text" id="corectA"><br>
	Wrong Answer: <input type="text" id="wrongA1"><br>
	Wrong Answer: <input type="text" id="wrongA2"><br>
	Wrong Answer: <input type="text" id="wrongA3"><br>
	Wrong Answer: <input type="text" id="wrongA4"><br>
	Wrong Answer: <input type="text" id="wrongA5"><br>
	Wrong Answer: <input type="text" id="wrongA6"><br>
	Wrong Answer: <input type="text" id="wrongA7"><br>
	Wrong Answer: <input type="text" id="wrongA8"><br>
	Wrong Answer: <input type="text" id="wrongA9"><br>

	<script>
		actualizarFormulario();
	</script>

</body>

<?php

include 'footer.php';

?>