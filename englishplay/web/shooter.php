<?php

include 'header.php';

?>

<head>

	<script>

		var jsonDesafio;
		var desafio = "Shooter";

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

    		if(ronda == 1) {
    		document.getElementById("sentence").value = jsonDesafio.allRoundData[mundo-1].questions1[0].sentence;
			document.getElementById("corectA").value = jsonDesafio.allRoundData[mundo-1].questions1[0].completeTrue;
			document.getElementById("wrongA1").value = jsonDesafio.allRoundData[mundo-1].questions1[0].completeFalse1;
			document.getElementById("wrongA2").value = jsonDesafio.allRoundData[mundo-1].questions1[0].completeFalse2;
			document.getElementById("wrongA3").value = jsonDesafio.allRoundData[mundo-1].questions1[0].completeFalse3;
			document.getElementById("wrongA4").value = jsonDesafio.allRoundData[mundo-1].questions1[0].completeFalse4;
			document.getElementById("wrongA5").value = jsonDesafio.allRoundData[mundo-1].questions1[0].completeFalse5;
			document.getElementById("wrongA6").value = jsonDesafio.allRoundData[mundo-1].questions1[0].completeFalse6;
			document.getElementById("wrongA7").value = jsonDesafio.allRoundData[mundo-1].questions1[0].completeFalse7;
			document.getElementById("wrongA8").value = jsonDesafio.allRoundData[mundo-1].questions1[0].completeFalse8;
			document.getElementById("wrongA9").value = jsonDesafio.allRoundData[mundo-1].questions1[0].completeFalse9;
    		}else if(ronda == 2) {
    		document.getElementById("sentence").value = jsonDesafio.allRoundData[mundo-1].questions2[0].sentence;
			document.getElementById("corectA").value = jsonDesafio.allRoundData[mundo-1].questions2[0].completeTrue;
			document.getElementById("wrongA1").value = jsonDesafio.allRoundData[mundo-1].questions2[0].completeFalse1;
			document.getElementById("wrongA2").value = jsonDesafio.allRoundData[mundo-1].questions2[0].completeFalse2;
			document.getElementById("wrongA3").value = jsonDesafio.allRoundData[mundo-1].questions2[0].completeFalse3;
			document.getElementById("wrongA4").value = jsonDesafio.allRoundData[mundo-1].questions2[0].completeFalse4;
			document.getElementById("wrongA5").value = jsonDesafio.allRoundData[mundo-1].questions2[0].completeFalse5;
			document.getElementById("wrongA6").value = jsonDesafio.allRoundData[mundo-1].questions2[0].completeFalse6;
			document.getElementById("wrongA7").value = jsonDesafio.allRoundData[mundo-1].questions2[0].completeFalse7;
			document.getElementById("wrongA8").value = jsonDesafio.allRoundData[mundo-1].questions2[0].completeFalse8;
			document.getElementById("wrongA9").value = jsonDesafio.allRoundData[mundo-1].questions2[0].completeFalse9;
    		}else if(ronda == 3) {
    		document.getElementById("sentence").value = jsonDesafio.allRoundData[mundo-1].questions3[0].sentence;
			document.getElementById("corectA").value = jsonDesafio.allRoundData[mundo-1].questions3[0].completeTrue;
			document.getElementById("wrongA1").value = jsonDesafio.allRoundData[mundo-1].questions3[0].completeFalse1;
			document.getElementById("wrongA2").value = jsonDesafio.allRoundData[mundo-1].questions3[0].completeFalse2;
			document.getElementById("wrongA3").value = jsonDesafio.allRoundData[mundo-1].questions3[0].completeFalse3;
			document.getElementById("wrongA4").value = jsonDesafio.allRoundData[mundo-1].questions3[0].completeFalse4;
			document.getElementById("wrongA5").value = jsonDesafio.allRoundData[mundo-1].questions3[0].completeFalse5;
			document.getElementById("wrongA6").value = jsonDesafio.allRoundData[mundo-1].questions3[0].completeFalse6;
			document.getElementById("wrongA7").value = jsonDesafio.allRoundData[mundo-1].questions3[0].completeFalse7;
			document.getElementById("wrongA8").value = jsonDesafio.allRoundData[mundo-1].questions3[0].completeFalse8;
			document.getElementById("wrongA9").value = jsonDesafio.allRoundData[mundo-1].questions3[0].completeFalse9;
    		}else if(ronda == 4) {
    		document.getElementById("sentence").value = jsonDesafio.allRoundData[mundo-1].questions4[0].sentence;
			document.getElementById("corectA").value = jsonDesafio.allRoundData[mundo-1].questions4[0].completeTrue;
			document.getElementById("wrongA1").value = jsonDesafio.allRoundData[mundo-1].questions4[0].completeFalse1;
			document.getElementById("wrongA2").value = jsonDesafio.allRoundData[mundo-1].questions4[0].completeFalse2;
			document.getElementById("wrongA3").value = jsonDesafio.allRoundData[mundo-1].questions4[0].completeFalse3;
			document.getElementById("wrongA4").value = jsonDesafio.allRoundData[mundo-1].questions4[0].completeFalse4;
			document.getElementById("wrongA5").value = jsonDesafio.allRoundData[mundo-1].questions4[0].completeFalse5;
			document.getElementById("wrongA6").value = jsonDesafio.allRoundData[mundo-1].questions4[0].completeFalse6;
			document.getElementById("wrongA7").value = jsonDesafio.allRoundData[mundo-1].questions4[0].completeFalse7;
			document.getElementById("wrongA8").value = jsonDesafio.allRoundData[mundo-1].questions4[0].completeFalse8;
			document.getElementById("wrongA9").value = jsonDesafio.allRoundData[mundo-1].questions4[0].completeFalse9;
    		}else if(ronda == 5) {
    		document.getElementById("sentence").value = jsonDesafio.allRoundData[mundo-1].questions5[0].sentence;
			document.getElementById("corectA").value = jsonDesafio.allRoundData[mundo-1].questions5[0].completeTrue;
			document.getElementById("wrongA1").value = jsonDesafio.allRoundData[mundo-1].questions5[0].completeFalse1;
			document.getElementById("wrongA2").value = jsonDesafio.allRoundData[mundo-1].questions5[0].completeFalse2;
			document.getElementById("wrongA3").value = jsonDesafio.allRoundData[mundo-1].questions5[0].completeFalse3;
			document.getElementById("wrongA4").value = jsonDesafio.allRoundData[mundo-1].questions5[0].completeFalse4;
			document.getElementById("wrongA5").value = jsonDesafio.allRoundData[mundo-1].questions5[0].completeFalse5;
			document.getElementById("wrongA6").value = jsonDesafio.allRoundData[mundo-1].questions5[0].completeFalse6;
			document.getElementById("wrongA7").value = jsonDesafio.allRoundData[mundo-1].questions5[0].completeFalse7;
			document.getElementById("wrongA8").value = jsonDesafio.allRoundData[mundo-1].questions5[0].completeFalse8;
			document.getElementById("wrongA9").value = jsonDesafio.allRoundData[mundo-1].questions5[0].completeFalse9;
    		}

			//jsonDesafio.allRoundData[2].questions1[0].sentence = "test test";
			//$.post("saveJson.php", {json : JSON.stringify(jsonDesafio), archivo : desafio+".json"});
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
 		<option value="1" selected="selected">Ronda 1
		<option value="2">Ronda 2
 		<option value="3">Ronda 3
  		<option value="4">Ronda 4
  		<option value="5">Ronda 5
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
		cargarJson();
	</script>

</body>

<?php

include 'footer.php';

?>