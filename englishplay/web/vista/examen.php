<?php 
include("header.php");
require('../conexionDB.php');
include("php/sesion.php");
?>

<body>
	<section style="padding-top: 0rem; padding-bottom: 0rem; background-color: rgba(230,167,86,.9);">
	    <div class="container">
	        <div class="row">
	          <div class="col-xl-9 mx-auto">
	            <div class="cta text-center rounded" style="background-color: rgba(255,255,255,.85);    position: relative;  padding: 3rem;  margin: .5rem;" > 
	              <h2 class="section-heading mb-5">
	                <span class="section-heading-upper">Test your knowledge in English</span>
	                <span class="section-heading-lower">Each test contains</span>
	              </h2>
	              <ul class="list-unstyled list-hours mb-5 text-left mx-auto">
	                <li class="list-unstyled-item list-hours-item d-flex">
	                  Number of questions:
	                  <span class="ml-auto">15</span>
	                </li>
	                <li class="list-unstyled-item list-hours-item d-flex">
	                  Type: 
	                  <span class="ml-auto"> Multiple selection only response</span>
	                </li>
	                <li class="list-unstyled-item list-hours-item d-flex">
	                  Estimated time
	                  <span class="ml-auto">10 Min</span>
	                </li>
	              </ul>
	             

	              <div style="background-color: rgba(249, 240, 229); width: 50%; display: inline-block;  margin-bottom: .5rem;">
	              	 	                	
	                  <strong>To perform the test you should</strong>
	                  <p style="margin-bottom: 1rem;">
	                  <em>
	                  	<br>
	                  Select the type of exam desired
	                	</em>
	             	 </p> 
 						<form method="post" action="preguntas.php">	
	               	 			<select name="num_test" style="font-style: italic">
				 				<option  value="0">Initial</option>
				 				<option  value="1">Final</option>
				 			</select>
				 			<br><br>
				 			<p style="margin-bottom: 1rem;">
	                		<em>
				 				Select the test topic
				 			</em>
				 			</p> 
				 			<select name="num_cap" style="font-style: italic;">
				 				<option  value="1">Simple and continuous tenses</option>
				 				<option  value="2">Perfect verb tenses and passive voice</option>
				 				<option  value="3">Prepositions</option>
				 				<option  value="4">Comparative and sueprlative</option>
				 			</select>
							<br><br><br>
				 			<button type="submit" class="boton">Comenzar</button>
						</form>	

	              </div>
	                                  
	              <br>
	            </div>
	          </div>
	        </div>
	         			
			
	    </div> 

	</section>
	

</body>
<?php 
include("footer.php");
 ?>