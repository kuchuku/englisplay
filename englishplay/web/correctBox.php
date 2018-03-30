<?php

include 'header.php';

?>

<head>

	<script>

		var jsonDesafio;
		var desafio = "CorrectBox";

		function cargarJson() {
			$.getJSON("../juego/json/"+desafio+".json")
 			.done(function(json) {
 				jsonDesafio = json;
 				actualizarFormulario();
 			});
		}

		function actualizarFormulario() {
			var mundo = document.getElementById("mundo").value;
    		var ronda = document.getElementById("ronda").value;

    		
    		document.getElementById("theme").value = jsonDesafio.allLevelsData[mundo-1].theme;
			document.getElementById("question").value = jsonDesafio.allLevelsData[mundo-1].questions[ronda-1].questionText;
			document.getElementById("answer1").value = jsonDesafio.allLevelsData[mundo-1].questions[ronda-1].answers[0].answerText;
			document.getElementById("answer1Bool").value = jsonDesafio.allLevelsData[mundo-1].questions[ronda-1].answers[0].isCorrect;
			document.getElementById("answer2").value = jsonDesafio.allLevelsData[mundo-1].questions[ronda-1].answers[1].answerText;
			document.getElementById("answer2Bool").value = jsonDesafio.allLevelsData[mundo-1].questions[ronda-1].answers[1].isCorrect;
			document.getElementById("answer3").value = jsonDesafio.allLevelsData[mundo-1].questions[ronda-1].answers[2].answerText;
			document.getElementById("answer3Bool").value = jsonDesafio.allLevelsData[mundo-1].questions[ronda-1].answers[2].isCorrect;
    		
		}

		function guardarJson() {
			var mundo = document.getElementById("mundo").value;
    		var ronda = document.getElementById("ronda").value;

			jsonDesafio.allLevelsData[mundo-1].theme = document.getElementById("theme").value;
			jsonDesafio.allLevelsData[mundo-1].questions[ronda-1].questionText = document.getElementById("question").value;
			jsonDesafio.allLevelsData[mundo-1].questions[ronda-1].answers[0].answerText = document.getElementById("answer1").value;
			jsonDesafio.allLevelsData[mundo-1].questions[ronda-1].answers[0].isCorrect = document.getElementById("answer1Bool").value;
			jsonDesafio.allLevelsData[mundo-1].questions[ronda-1].answers[1].answerText = document.getElementById("answer2").value;
			jsonDesafio.allLevelsData[mundo-1].questions[ronda-1].answers[1].isCorrect = document.getElementById("answer2Bool").value;
			jsonDesafio.allLevelsData[mundo-1].questions[ronda-1].answers[2].answerText = document.getElementById("answer3").value;
			jsonDesafio.allLevelsData[mundo-1].questions[ronda-1].answers[2].isCorrect = document.getElementById("answer3Bool").value;

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
	Answer 1: <input type="text" id="answer1">
	<select id="answer1Bool">
 		<option value="false">False
		<option value="true">True
	</select><br>
	Answer 2: <input type="text" id="answer2">
	<select id="answer2Bool">
 		<option value="false">False
		<option value="true">True
	</select><br>
	Answer 3: <input type="text" id="answer3">
	<select id="answer3Bool">
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