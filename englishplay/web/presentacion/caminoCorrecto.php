<?php

include 'header.php';

?>

<head>

	<script>

		var jsonVillage;
		var jsonForest;
		var jsonCave;
		var jsonCastle;

		function cargarJson() {

			$.getJSON("../../juego/json/Village.json")
 			.done(function(json) {
 				jsonVillage = json;
                actualizarFormulario();
 			});

 			$.getJSON("../../juego/json/Forest.json")
 			.done(function(json) {
 				jsonForest = json;
 			});

 			$.getJSON("../../juego/json/Cave.json")
 			.done(function(json) {
 				jsonCave = json;
 			});

 			$.getJSON("../../juego/json/Castle.json")
 			.done(function(json) {
 				jsonCastle = json;
 				
 			});
		}

		function actualizarFormulario() {
			var mundo = document.getElementById("mundo").value;
    		var ronda = document.getElementById("ronda").value;

    		if(mundo==1) {
    			document.getElementById("theme").value = jsonVillage.themeValues[ronda-1];
    			document.getElementById("spanish").value = jsonVillage.spanishValues[ronda-1];
    			document.getElementById("english").value = jsonVillage.englishValues[ronda-1];
    		}else if(mundo==2) {
    			document.getElementById("theme").value = jsonForest.themeValues[ronda-1];
    			document.getElementById("spanish").value = jsonForest.spanishValues[ronda-1];
    			document.getElementById("english").value = jsonForest.englishValues[ronda-1];
    		}else if(mundo==3) {
    			document.getElementById("theme").value = jsonCave.themeValues[ronda-1];
    			document.getElementById("spanish").value = jsonCave.spanishValues[ronda-1];
    			document.getElementById("english").value = jsonCave.englishValues[ronda-1];
    		}else if(mundo==4) {
    			document.getElementById("theme").value = jsonCastle.themeValues[ronda-1];
    			document.getElementById("spanish").value = jsonCastle.spanishValues[ronda-1];
    			document.getElementById("english").value = jsonCastle.englishValues[ronda-1];
    		}
    		
		}

		function guardarJson() {
			var mundo = document.getElementById("mundo").value;
    		var ronda = document.getElementById("ronda").value;

			if(mundo==1) {
    			jsonVillage.themeValues[ronda-1] = document.getElementById("theme").value;
    			jsonVillage.spanishValues[ronda-1] = document.getElementById("spanish").value;
    			jsonVillage.englishValues[ronda-1] = document.getElementById("english").value;
    		}else if(mundo==2) {
    			jsonForest.themeValues[ronda-1] = document.getElementById("theme").value;
    			jsonForest.spanishValues[ronda-1] = document.getElementById("spanish").value;
    			jsonForest.englishValues[ronda-1] = document.getElementById("english").value;
    		}else if(mundo==3) {
    			jsonCave.themeValues[ronda-1] = document.getElementById("theme").value;
    			jsonCave.spanishValues[ronda-1] = document.getElementById("spanish").value;
    			jsonCave.englishValues[ronda-1] = document.getElementById("english").value;
    		}else if(mundo==4) {
    			jsonCastle.themeValues[ronda-1] = document.getElementById("theme").value;
    			jsonCastle.spanishValues[ronda-1] = document.getElementById("spanish").value;
    			jsonCastle.englishValues[ronda-1] = document.getElementById("english").value;
    		}

			$.post("saveJson.php", {json : JSON.stringify(jsonVillage), archivo : "Village.json"});
			$.post("saveJson.php", {json : JSON.stringify(jsonForest), archivo : "Forest.json"});
			$.post("saveJson.php", {json : JSON.stringify(jsonCave), archivo : "Cave.json"});
			$.post("saveJson.php", {json : JSON.stringify(jsonCastle), archivo : "Castle.json"});
			
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

            	Theme: <input type="text" id="theme" size="100"><br>
            	Spanish: <input type="text" id="spanish" size="75"><br>
            	English: <input type="text" id="english" size="75"><br>
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