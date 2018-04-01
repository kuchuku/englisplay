<?php

include 'header.php';

?>

<head>

	<script>

		var jsonDesafio;
		var desafio = "Enlazar";

		function cargarJson() {
			$.getJSON("../../juego/json/"+desafio+".json")
 			.done(function(json) {
 				jsonDesafio = json;
 				actualizarFormulario();
 			});
		}

		function actualizarFormulario() {
			var mundo = document.getElementById("mundo").value;

    		document.getElementById("phrase1").value = jsonDesafio.allRoundData[mundo-1].questions1[0].definition;
			document.getElementById("word1").value = jsonDesafio.allRoundData[mundo-1].questions1[0].word;
			document.getElementById("phrase2").value = jsonDesafio.allRoundData[mundo-1].questions1[1].definition;
			document.getElementById("word2").value = jsonDesafio.allRoundData[mundo-1].questions1[1].word;
			document.getElementById("phrase3").value = jsonDesafio.allRoundData[mundo-1].questions1[2].definition;
			document.getElementById("word3").value = jsonDesafio.allRoundData[mundo-1].questions1[2].word;
			document.getElementById("phrase4").value = jsonDesafio.allRoundData[mundo-1].questions1[3].definition;
			document.getElementById("word4").value = jsonDesafio.allRoundData[mundo-1].questions1[3].word;
			document.getElementById("phrase5").value = jsonDesafio.allRoundData[mundo-1].questions1[4].definition;
			document.getElementById("word5").value = jsonDesafio.allRoundData[mundo-1].questions1[4].word;

		}

		function guardarJson() {
			var mundo = document.getElementById("mundo").value;
    		var ronda = document.getElementById("ronda").value;

			jsonDesafio.allRoundData[mundo-1].questions1[0].definition = document.getElementById("phrase1").value;
			jsonDesafio.allRoundData[mundo-1].questions1[0].word = document.getElementById("word1").value;
			jsonDesafio.allRoundData[mundo-1].questions1[1].definition = document.getElementById("phrase2").value;
			jsonDesafio.allRoundData[mundo-1].questions1[1].word = document.getElementById("word2").value;
			jsonDesafio.allRoundData[mundo-1].questions1[2].definition = document.getElementById("phrase3").value;
			jsonDesafio.allRoundData[mundo-1].questions1[2].word = document.getElementById("word3").value;
			jsonDesafio.allRoundData[mundo-1].questions1[3].definition = document.getElementById("phrase4").value;
			jsonDesafio.allRoundData[mundo-1].questions1[3].word = document.getElementById("word4").value;
			jsonDesafio.allRoundData[mundo-1].questions1[4].definition = document.getElementById("phrase5").value;
			jsonDesafio.allRoundData[mundo-1].questions1[4].word = document.getElementById("word5").value;

			$.post("saveJson.php", {json : JSON.stringify(jsonDesafio), archivo : desafio+".json"});
			alert("Saved");
		} 

	</script>

</head>

<body>

	<select id="mundo" onchange="actualizarFormulario()">
 		<option value="1" selected="selected">Village
		<option value="2">Forest
 		<option value="3">Cave
  		<option value="4">Castle
	</select><br>

	Phrase 1: <input type="text" id="phrase1" size="80">
	Word 1: <input type="text" id="word1"><br>
	Phrase 2: <input type="text" id="phrase2" size="80">
	Word 2: <input type="text" id="word2"><br>
	Phrase 3: <input type="text" id="phrase3" size="80">
	Word 3: <input type="text" id="word3"><br>
	Phrase 4: <input type="text" id="phrase4" size="80">
	Word 4: <input type="text" id="word4"><br>
	Phrase 5: <input type="text" id="phrase5" size="80">
	Word 5: <input type="text" id="word5"><br>

	<button onclick="guardarJson()">Save Changes</button>

	<script>
		cargarJson();
	</script>

</body>

<?php

include 'footer.php';

?>