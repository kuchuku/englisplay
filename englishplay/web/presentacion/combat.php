<?php

include 'header.php';

?>

<head>

	<script>

		var jsonDesafio;
		var desafio = "Combat";

		function cargarJson() {
			$.getJSON("../../juego/json/"+desafio+".json")
 			.done(function(json) {
 				jsonDesafio = json;
 				actualizarFormulario();
 			});
		}

		function actualizarFormulario() {
			var mundo = document.getElementById("mundo").value;
    		var ronda = document.getElementById("ronda").value;

    		document.getElementById("theme").value = jsonDesafio.allBattlesData[mundo-1].theme;
			document.getElementById("question").value = jsonDesafio.allBattlesData[mundo-1].questions[ronda-1].questionDescription;
			document.getElementById("phraseType").value = jsonDesafio.allBattlesData[mundo-1].questions[ronda-1].phraseType;
			document.getElementById("questionP1").value = jsonDesafio.allBattlesData[mundo-1].questions[ronda-1].questionPart1;
			document.getElementById("questionP2").value = jsonDesafio.allBattlesData[mundo-1].questions[ronda-1].questionPart2;
			document.getElementById("answer").value = jsonDesafio.allBattlesData[mundo-1].questions[ronda-1].answer;
			document.getElementById("contractions").value = jsonDesafio.allBattlesData[mundo-1].questions[ronda-1].contractions;

		}

		function guardarJson() {
			var mundo = document.getElementById("mundo").value;
    		var ronda = document.getElementById("ronda").value;

			jsonDesafio.allBattlesData[mundo-1].theme = document.getElementById("theme").value;
			jsonDesafio.allBattlesData[mundo-1].questions[ronda-1].questionDescription = document.getElementById("question").value;
			jsonDesafio.allBattlesData[mundo-1].questions[ronda-1].phraseType = document.getElementById("phraseType").value;
			jsonDesafio.allBattlesData[mundo-1].questions[ronda-1].questionPart1 = document.getElementById("questionP1").value;
			jsonDesafio.allBattlesData[mundo-1].questions[ronda-1].questionPart2 = document.getElementById("questionP2").value;
			jsonDesafio.allBattlesData[mundo-1].questions[ronda-1].answer = document.getElementById("answer").value;
			jsonDesafio.allBattlesData[mundo-1].questions[ronda-1].contractions = document.getElementById("contractions").value;

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
	</select>

	<select id="ronda" onchange="actualizarFormulario()">
 		<option value="1" selected="selected">Round 1
		<option value="2">Round 2
 		<option value="3">Round 3
  		<option value="4">Round 4
  		<option value="5">Round 5
	</select><br>

	Theme: <input type="text" id="theme" size="100"><br>
	Question: <input type="text" id="question" size="100"><br>
	Phrase Type: <select id="phraseType">
 		<option value="false">False
		<option value="true">True
	</select><br>
	Question Part 1: <input type="text" id="questionP1" size="50"><br>
	Question Part 2: <input type="text" id="questionP2" size="50"><br>
	Answer: <input type="text" id="answer"><br>
	Contractions: <select id="contractions">
 		<option value="false">False
		<option value="true">True
	</select><br>

	<button onclick="guardarJson()">Save Changes</button>

	<script>
		cargarJson();
	</script>

</body>

<?php

include 'footer.php';

?>