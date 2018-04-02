<?php

include 'header.php';

?>

<head>

	<script>

		var jsonDesafio;
		var desafio = "ElectroShock";

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
			document.getElementById("answer3").value = jsonDesafio.allRoundData[mundo-1].questions[ronda-1].answers[2].answerText;
			document.getElementById("answerBool3").value = jsonDesafio.allRoundData[mundo-1].questions[ronda-1].answers[2].isCorrect;
			document.getElementById("answer4").value = jsonDesafio.allRoundData[mundo-1].questions[ronda-1].answers[3].answerText;
			document.getElementById("answerBool4").value = jsonDesafio.allRoundData[mundo-1].questions[ronda-1].answers[3].isCorrect;
			document.getElementById("answer5").value = jsonDesafio.allRoundData[mundo-1].questions[ronda-1].answers[4].answerText;
			document.getElementById("answerBool5").value = jsonDesafio.allRoundData[mundo-1].questions[ronda-1].answers[4].isCorrect;
			document.getElementById("answer6").value = jsonDesafio.allRoundData[mundo-1].questions[ronda-1].answers[5].answerText;
			document.getElementById("answerBool6").value = jsonDesafio.allRoundData[mundo-1].questions[ronda-1].answers[5].isCorrect;

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
			jsonDesafio.allRoundData[mundo-1].questions[ronda-1].answers[2].answerText = document.getElementById("answer3").value;
			jsonDesafio.allRoundData[mundo-1].questions[ronda-1].answers[2].isCorrect = document.getElementById("answerBool3").value;
			jsonDesafio.allRoundData[mundo-1].questions[ronda-1].answers[3].answerText = document.getElementById("answer4").value;
			jsonDesafio.allRoundData[mundo-1].questions[ronda-1].answers[3].isCorrect = document.getElementById("answerBool4").value;
			jsonDesafio.allRoundData[mundo-1].questions[ronda-1].answers[4].answerText = document.getElementById("answer5").value;
			jsonDesafio.allRoundData[mundo-1].questions[ronda-1].answers[4].isCorrect = document.getElementById("answerBool5").value;
			jsonDesafio.allRoundData[mundo-1].questions[ronda-1].answers[5].answerText = document.getElementById("answer6").value;
			jsonDesafio.allRoundData[mundo-1].questions[ronda-1].answers[5].isCorrect = document.getElementById("answerBool6").value;

			$.post("../negocio/saveJson.php", {json : JSON.stringify(jsonDesafio), archivo : desafio+".json"});
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
				<h2 class="section-heading mb-5">
	            	<span class="section-heading-lower">Edit Electroshock</span>
	            </h2>
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
				Answer 3: <input type="text" id="answer3" size="40%">
				<select id="answerBool3">
			 		<option value="false">False
					<option value="true">True
				</select><br>
				Answer 4: <input type="text" id="answer4" size="40%">
				<select id="answerBool4">
			 		<option value="false">False
					<option value="true">True
				</select><br>
				Answer 5: <input type="text" id="answer5" size="40%">
				<select id="answerBool5">
			 		<option value="false">False
					<option value="true">True
				</select><br>
				Answer 6: <input type="text" id="answer6" size="40%">
				<select id="answerBool6">
			 		<option value="false">False
					<option value="true">True
				</select><br><br>

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