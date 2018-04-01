<?php

include 'header.php';

?>

<head>

	<script>

		var jsonDesafio;
		var desafio = "Shooter";

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
		}

		function guardarJson() {
			var mundo = document.getElementById("mundo").value;
    		var ronda = document.getElementById("ronda").value;

			if(ronda == 1) {
	    		jsonDesafio.allRoundData[mundo-1].questions1[0].sentence = document.getElementById("sentence").value;
				jsonDesafio.allRoundData[mundo-1].questions1[0].completeTrue = document.getElementById("corectA").value;
				jsonDesafio.allRoundData[mundo-1].questions1[0].completeFalse1 = document.getElementById("wrongA1").value;
				jsonDesafio.allRoundData[mundo-1].questions1[0].completeFalse2 = document.getElementById("wrongA2").value;
				jsonDesafio.allRoundData[mundo-1].questions1[0].completeFalse3 = document.getElementById("wrongA3").value;
				jsonDesafio.allRoundData[mundo-1].questions1[0].completeFalse4 = document.getElementById("wrongA4").value;
				jsonDesafio.allRoundData[mundo-1].questions1[0].completeFalse5 = document.getElementById("wrongA5").value;
				jsonDesafio.allRoundData[mundo-1].questions1[0].completeFalse6 = document.getElementById("wrongA6").value;
				jsonDesafio.allRoundData[mundo-1].questions1[0].completeFalse7 = document.getElementById("wrongA7").value;
				jsonDesafio.allRoundData[mundo-1].questions1[0].completeFalse8 = document.getElementById("wrongA8").value;
				jsonDesafio.allRoundData[mundo-1].questions1[0].completeFalse9 = document.getElementById("wrongA9").value;
    		}else if(ronda == 2) {
	    		jsonDesafio.allRoundData[mundo-1].questions2[0].sentence = document.getElementById("sentence").value;
				jsonDesafio.allRoundData[mundo-1].questions2[0].completeTrue = document.getElementById("corectA").value;
				jsonDesafio.allRoundData[mundo-1].questions2[0].completeFalse1 = document.getElementById("wrongA1").value;
				jsonDesafio.allRoundData[mundo-1].questions2[0].completeFalse2 = document.getElementById("wrongA2").value;
				jsonDesafio.allRoundData[mundo-1].questions2[0].completeFalse3 = document.getElementById("wrongA3").value;
				jsonDesafio.allRoundData[mundo-1].questions2[0].completeFalse4 = document.getElementById("wrongA4").value;
				jsonDesafio.allRoundData[mundo-1].questions2[0].completeFalse5 = document.getElementById("wrongA5").value;
				jsonDesafio.allRoundData[mundo-1].questions2[0].completeFalse6 = document.getElementById("wrongA6").value;
				jsonDesafio.allRoundData[mundo-1].questions2[0].completeFalse7 = document.getElementById("wrongA7").value;
				jsonDesafio.allRoundData[mundo-1].questions2[0].completeFalse8 = document.getElementById("wrongA8").value;
				jsonDesafio.allRoundData[mundo-1].questions2[0].completeFalse9 = document.getElementById("wrongA9").value;
    		}else if(ronda == 3) {
	    		jsonDesafio.allRoundData[mundo-1].questions3[0].sentence = document.getElementById("sentence").value;
				jsonDesafio.allRoundData[mundo-1].questions3[0].completeTrue = document.getElementById("corectA").value;
				jsonDesafio.allRoundData[mundo-1].questions3[0].completeFalse1 = document.getElementById("wrongA1").value;
				jsonDesafio.allRoundData[mundo-1].questions3[0].completeFalse2 = document.getElementById("wrongA2").value;
				jsonDesafio.allRoundData[mundo-1].questions3[0].completeFalse3 = document.getElementById("wrongA3").value;
				jsonDesafio.allRoundData[mundo-1].questions3[0].completeFalse4 = document.getElementById("wrongA4").value;
				jsonDesafio.allRoundData[mundo-1].questions3[0].completeFalse5 = document.getElementById("wrongA5").value;
				jsonDesafio.allRoundData[mundo-1].questions3[0].completeFalse6 = document.getElementById("wrongA6").value;
				jsonDesafio.allRoundData[mundo-1].questions3[0].completeFalse7 = document.getElementById("wrongA7").value;
				jsonDesafio.allRoundData[mundo-1].questions3[0].completeFalse8 = document.getElementById("wrongA8").value;
				jsonDesafio.allRoundData[mundo-1].questions3[0].completeFalse9 = document.getElementById("wrongA9").value;
    		}else if(ronda == 4) {
	    		jsonDesafio.allRoundData[mundo-1].questions4[0].sentence = document.getElementById("sentence").value;
				jsonDesafio.allRoundData[mundo-1].questions4[0].completeTrue = document.getElementById("corectA").value;
				jsonDesafio.allRoundData[mundo-1].questions4[0].completeFalse1 = document.getElementById("wrongA1").value;
				jsonDesafio.allRoundData[mundo-1].questions4[0].completeFalse2 = document.getElementById("wrongA2").value;
				jsonDesafio.allRoundData[mundo-1].questions4[0].completeFalse3 = document.getElementById("wrongA3").value;
				jsonDesafio.allRoundData[mundo-1].questions4[0].completeFalse4 = document.getElementById("wrongA4").value;
				jsonDesafio.allRoundData[mundo-1].questions4[0].completeFalse5 = document.getElementById("wrongA5").value;
				jsonDesafio.allRoundData[mundo-1].questions4[0].completeFalse6 = document.getElementById("wrongA6").value;
				jsonDesafio.allRoundData[mundo-1].questions4[0].completeFalse7 = document.getElementById("wrongA7").value;
				jsonDesafio.allRoundData[mundo-1].questions4[0].completeFalse8 = document.getElementById("wrongA8").value;
				jsonDesafio.allRoundData[mundo-1].questions4[0].completeFalse9 = document.getElementById("wrongA9").value;
    		}else if(ronda == 5) {
	  			jsonDesafio.allRoundData[mundo-1].questions5[0].sentence = document.getElementById("sentence").value;
				jsonDesafio.allRoundData[mundo-1].questions5[0].completeTrue = document.getElementById("corectA").value;
				jsonDesafio.allRoundData[mundo-1].questions5[0].completeFalse1 = document.getElementById("wrongA1").value;
				jsonDesafio.allRoundData[mundo-1].questions5[0].completeFalse2 = document.getElementById("wrongA2").value;
				jsonDesafio.allRoundData[mundo-1].questions5[0].completeFalse3 = document.getElementById("wrongA3").value;
				jsonDesafio.allRoundData[mundo-1].questions5[0].completeFalse4 = document.getElementById("wrongA4").value;
				jsonDesafio.allRoundData[mundo-1].questions5[0].completeFalse5 = document.getElementById("wrongA5").value;
				jsonDesafio.allRoundData[mundo-1].questions5[0].completeFalse6 = document.getElementById("wrongA6").value;
				jsonDesafio.allRoundData[mundo-1].questions5[0].completeFalse7 = document.getElementById("wrongA7").value;
				jsonDesafio.allRoundData[mundo-1].questions5[0].completeFalse8 = document.getElementById("wrongA8").value;
				jsonDesafio.allRoundData[mundo-1].questions5[0].completeFalse9 = document.getElementById("wrongA9").value;
    		}

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