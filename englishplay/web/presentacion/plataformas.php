<?php

include 'header.php';

?>

<head>

	<script>

		var jsonDesafio;
		var desafio = "Plataformas";

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

    		document.getElementById("theme").value = jsonDesafio.allRoundData[mundo-1].theme;
			document.getElementById("question").value = jsonDesafio.allRoundData[mundo-1].questions[ronda-1].questionText;
			document.getElementById("answer1").value = jsonDesafio.allRoundData[mundo-1].questions[ronda-1].answers[0].answerText;
			document.getElementById("answerBool1").value = jsonDesafio.allRoundData[mundo-1].questions[ronda-1].answers[0].isCorrect;
			document.getElementById("answer2").value = jsonDesafio.allRoundData[mundo-1].questions[ronda-1].answers[1].answerText;
			document.getElementById("answerBool2").value = jsonDesafio.allRoundData[mundo-1].questions[ronda-1].answers[1].isCorrect;

		}

		function guardarJson() {
			var mundo = document.getElementById("mundo").value;
    		var ronda = document.getElementById("ronda").value;

			jsonDesafio.allRoundData[mundo-1].theme = document.getElementById("theme").value;
			jsonDesafio.allRoundData[mundo-1].questions[ronda-1].questionText = document.getElementById("question").value;
			jsonDesafio.allRoundData[mundo-1].questions[ronda-1].answers[0].answerText = document.getElementById("answer1").value;
			jsonDesafio.allRoundData[mundo-1].questions[ronda-1].answers[0].isCorrect = document.getElementById("answerBool1").value;
			jsonDesafio.allRoundData[mundo-1].questions[ronda-1].answers[1].answerText = document.getElementById("answer2").value;
			jsonDesafio.allRoundData[mundo-1].questions[ronda-1].answers[1].isCorrect = document.getElementById("answerBool2").value;

			$.post("saveJson.php", {json : JSON.stringify(jsonDesafio), archivo : desafio+".json"});
			alert("Saved");
		}   

	</script>

</head>

<body>
	<section style="padding-top: 0rem; padding-bottom: 0rem; background-color: rgba(230,167,86,.9);">
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <div class="cta text-center rounded" style="background-color: rgba(255,255,255,.85);    position: relative;  padding: 3rem;  margin: .5rem;" > 
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

				Theme: <input type="text" id="theme" size="80%"><br>
				Question: <input type="text" id="question" size="80%"><br>
				Answer 1: <input type="text" id="answer1" size="40%">
				<select id="answerBool1">
			 		<option value="false">False
					<option value="true">True
				</select><br>
				Answer 2: <input type="text" id="answer2" size="40%">
				<select id="answerBool2">
			 		<option value="false">False
					<option value="true">True
				</select><br>

				<button onclick="guardarJson()">Save Changes</button>
	 		</div>
          </div>
        </div>
      </div>
    </section>

	<script>
		cargarJson();
	</script>

</body>

<?php

include 'footer.php';

?>