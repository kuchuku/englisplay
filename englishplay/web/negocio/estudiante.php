<?php
	require ("../datos/EstudiantesConsultas.php");
	include("header.php");

//Mostrar el personaje, seleccionado en el juego, por pantalla
	if ($consulta2['sexoPersonaje'] =='h') {//es hombre

		if ($consulta2['rolPersonaje'] == '0') {
			switch ($consulta2['skinGuerrero']) {
				case '1':
						$skin = "<img class=imag src=images/Guerrero1.png width=130 height=200 border=2px>";
					break;
				case '2':
						$skin = "<img class=imag src=images/Guerrero2.png width=130 height=200 border=2px>";
					break;
				case '3':
						$skin = "<img class=imag src=images/Guerrero3.png width=130 height=200 border=2px>";
					break;
				case '4':
						$skin = "<img class=imag src=images/Guerrero4.png width=130 height=200 border=2px>";
					break;
				case '5':
						$skin = "<img class=imag src=images/Guerrero5.png width=130 height=200 border=2px>";
					break;
				
				default:
						$skin = "<img class=imag src=images/Guerrero0.png width=140 height=200 border=2px>";
					break;
			}
		}else if ($consulta2['rolPersonaje'] == '1') {
			switch ($consulta2['skinMago']) {
				case '1':
						$skin = "<img class=imag src=images/Mago1.png width=130 height=200 border=2px>";
					break;
				case '2':
						$skin = "<img class=imag src=images/Mago2.png width=130 height=200 border=2px>";
					break;
				case '3':
						$skin = "<img class=imag src=images/Mago3.png width=130 height=200 border=2px>";
					break;
				case '4':
						$skin = "<img class=imag src=images/Mago4.png width=130 height=200 border=2px>";
					break;
				case '5':
						$skin = "<img class=imag src=images/Mago5.png width=130 height=200 border=2px>";
					break;
				
				default:
						$skin = "<img class=imag src=images/Mago0.png width=120 height=200 border=2px>";
					break;
			}
			
		}else{
			switch ($consulta2['skinArquero']) {
				case '1':
						$skin = "<img class=imag src=images/Arquero1.png width=150 height=200 border=2px>";
					break;
				case '2':
						$skin = "<img class=imag src=images/Arquero2.png width=150 height=200 border=2px>";
					break;
				case '3':
						$skin = "<img class=imag src=images/Arquero3.png width=150 height=200 border=2px>";
					break;
				case '4':
						$skin = "<img class=imag src=images/Arquero4.png width=150 height=200 border=2px>";
					break;
				case '5':
						$skin = "<img class=imag src=images/Arquero5.png width=150 height=200 border=2px>";
					break;
				
				default:
						$skin = "<img class=imag src=images/Arquero0.png width=140 height=200 border=2px>";
					break;
			}

		}
	}else{//es mujer

		if ($consulta2['rolPersonaje'] == '0') {
			switch ($consulta2['skinGuerrero']) {
				case '1':
						$skin = "<img class=imag src=images/Guerrera1.png width=160 height=230 border=2px>";
					break;
				case '2':
						$skin = "<img class=imag src=images/Guerrera2.png width=160 height=230 border=2px>";
					break;
				case '3':
						$skin = "<img class=imag src=images/Guerrera3.png width=160 height=230 border=2px>";
					break;
				case '4':
						$skin = "<img class=imag src=images/Guerrera4.png width=160 height=230 border=2px>";
					break;
				case '5':
						$skin = "<img class=imag src=images/Guerrera5.png width=160 height=230 border=2px>";
					break;
				
				default:
						$skin = "<img class=imag src=images/Guerrera0.png width=140 height=200 border=2px>";
					break;
			}
		}else if ($consulta2['rolPersonaje'] == '1') {
			switch ($consulta2['skinMago']) {
				case '1':
						$skin = "<img class=imag src=images/Maga1.png width=150 height=200 border=2px>";
					break;
				case '2':
						$skin = "<img class=imag src=images/Maga2.png width=150 height=200 border=2px>";
					break;
				case '3':
						$skin = "<img class=imag src=images/Maga3.png width=150 height=200 border=2px>";
					break;
				case '4':
						$skin = "<img class=imag src=images/Maga4.png width=150 height=200 border=2px>";
					break;
				case '5':
						$skin = "<img class=imag src=images/Maga5.png width=150 height=200 border=2px>";
					break;
				
				default:
						$skin = "<img class=imag src=images/Maga0.png width=130 height=200 border=2px>";
					break;
			}
			
		}else{
			switch ($consulta2['skinArquero']) {
				case '1':
						$skin = "<img class=imag src=images/Arquera1.png width=150 height=230 border=2px>";
					break;
				case '2':
						$skin = "<img class=imag src=images/Arquera2.png width=150 height=230 border=2px>";
					break;
				case '3':
						$skin = "<img class=imag src=images/Arquera3.png width=150 height=230 border=2px>";
					break;
				case '4':
						$skin = "<img class=imag src=images/Arquera4.png width=150 height=230 border=2px>";
					break;
				case '5':
						$skin = "<img class=imag src=images/Arquera5.png width=150 height=230 border=2px>";
					break;
				
				default:
						$skin = "<img class=imag src=images/Arquera0.png width=140 height=200 border=2px>";
					break;
			}

		}
	}

//Mosrar el mundo que tiene desbloqueado
	switch ($consulta3['mundoAvance']) {
		case '1':
				$imgMundo = "<img src=images/Mundo1.png width=250 height=250>";
				$nomMundo = "Village";
			break;
		case '2':
				$imgMundo = "<img src=images/Mundo2.png width=250 height=250>";
				$nomMundo = "Forest";
			break;
		case '3':
				$imgMundo = "<img src=images/Mundo3.png width=250 height=250>";
				$nomMundo = "Cave";
			break;
		case '4':
				$imgMundo = "<img src=images/Mundo4.png width=250 height=250>";
				$nomMundo = "Castle";
			break;
	}

//Gráfica en barra horizolntal que muestra el porcentaje del avance del juego
	$porciento = round(((($consulta4['mundoCheckpoint']+($consulta4['posXCheckpoint']/'10000'))*'100')/'4.0715'), 0);


//Mostrar en una tabla las compras realizadas por el estudiante
	while ($consulta5 = mysqli_fetch_array($resultados5)) {
		
		$compras = $consulta5['idObjeto'];

	 	switch ($compras) {
	 		case '1':
	 				$img = "<td><img src=images/Espada1.png width=80 height=180></td>";
	 			break;
	 		case '2':
	 				$img = "<td><img src=images/Espada2.png width=80 height=180></td>";
	 			break;
	 		case '3':
	 				$img = "<td><img src=images/Espada3.png width=80 height=180></td>";
	 			break;
	 		case '4':
	 				$img = "<td><img src=images/Espada4.png width=80 height=180></td>";
	 			break;
	 		case '5':
	 				$img = "<td><img src=images/Espada5.png width=80 height=180></td>";
	 			break;
	 		case '7':
	 				$img = "<td><img src=images/Cetro1.png width=130 height=130></td>";
	 			break;
	 		case '8':
	 				$img = "<td><img src=images/Cetro2.png width=130 height=130></td>";
	 			break;
	 		case '9':
	 				$img = "<td><img src=images/Cetro3.png width=130 height=130></td>";
	 			break;
	 		case '10':
	 				$img = "<td><img src=images/Cetro4.png width=130 height=130></td>";
	 			break;
	 		case '11':
	 				$img = "<td><img src=images/Cetro5.png width=130 height=130></td>";
	 			break;
	 		case '13':
	 				$img = "<td><img src=images/Arco1.png width=70 height=180></td>";
	 			break;
	 		case '14':
	 				$img = "<td><img src=images/Arco2.png width=70 height=180></td>";
	 			break;
	 		case '15':
	 				$img = "<td><img src=images/Arco3.png width=70 height=180></td>";
	 			break;
	 		case '16':
	 				$img = "<td><img src=images/Arco4.png width=70 height=180></td>";
	 			break;
	 		case '17':
	 				$img = "<td><img src=images/Arco5.png width=70 height=180></td>";
	 			break;
	 		case '19':
	 				$img = "<td><img src=images/SkinsGuerrero1.png width=120 height=200></td>";
	 			break;
	 		case '20':
	 				$img = "<td><img src=images/SkinsGuerrero2.png width=120 height=200></td>";
	 			break;
	 		case '21':
	 				$img = "<td><img src=images/SkinsGuerrero3.png width=120 height=200></td>";
	 			break;
	 		case '22':
	 				$img = "<td><img src=images/SkinsGuerrero4.png width=120 height=200></td>";
	 			break;
	 		case '23':
	 				$img = "<td><img src=images/SkinsGuerrero5.png width=120 height=200></td>";
	 			break;
	 		case '25':
	 				$img = "<td><img src=images/SkinMago1.png width=110 height=200></td>";
	 			break;
	 		case '26':
	 				$img = "<td><img src=images/SkinMago2.png width=110 height=200></td>";
	 			break;
	 		case '27':
	 				$img = "<td><img src=images/SkinMago3.png width=110 height=200></td>";
	 			break;
	 		case '28':
	 				$img = "<td><img src=images/SkinMago4.png width=110 height=200></td>";
	 			break;
	 		case '29':
	 				$img = "<td><img src=images/SkinMago5.png width=110 height=200></td>";
	 			break;
	 		case '31':
	 				$img = "<td><img src=images/SkinArquero1.png width=110 height=200></td>";
	 			break;
	 		case '32':
	 				$img = "<td><img src=images/SkinArquero2.png width=110 height=200></td>";
	 			break;
	 		case '33':
	 				$img = "<td><img src=images/SkinArquero3.png width=110 height=200></td>";
	 			break;
	 		case '34':
	 				$img = "<td><img src=images/SkinArquero4.png width=110 height=200></td>";
	 			break;
	 		case '35':
	 				$img = "<td><img src=images/SkinArquero5.png width=110 height=200></td>";
	 			break;
	 	}

	 	$table .= "$img";
	}

//Recorrer la tabla resultado desafios e imprimir el deasifio, la cantidad de preguntas que se le hicieron y la cantidad de respuestas correctas en el mundo Aldea.
	$table1 = '';
	while ($consulta6 = mysqli_fetch_array($resultados6)) {
			
	 	switch ($consulta6['desafio']) {
	 		case '1':
	 				$desA = "CorrectBox";
	 			break;
	 		case '2':
	 				$desA = "Combat";
	 			break;
	 		case '3':
	 				$desA = "Plataformas";
	 			break;
	 		case '4':
	 				$desA = "Electro Shock";
	 			break;
	 		case '5':
	 				$desA = "Enlazar";
	 			break;
	 		case '6':
	 				$desA = "Shooter";
	 			break;
	 		case '7':
	 				$desA = "Laser";
	 			break;
	 		case '8':
	 				$desA = "Camino Correcto";
	 			break;
	 	}
	 	$table1 .= "<tr>";
	 	$table1 .= "<td>$desA</td>";
	 	$table1 .= "<td>$consulta6[preguntas]</td>";
	 	$table1 .= "<td>$consulta6[correctas]</td>";
	 	$table1 .= "</tr>";
	}

//Recorrer la tabla resultado desafios e imprimir el deasifio, la cantidad de preguntas que se le hicieron y la cantidad de respuestas correctas en el mundo Bosque.			
	$table2 = '';
	while ($consulta7 = mysqli_fetch_array($resultados7)) {
		switch ($consulta7['desafio']) {
	 		case '1':
	 				$desB = "CorrectBox";
	 			break;
	 		case '2':
	 				$desB = "Combat";
	 			break;
	 		case '3':
	 				$desB = "Plataformas";
	 			break;
	 		case '4':
	 				$desB = "Electro Shock";
	 			break;
	 		case '5':
	 				$desB = "Enlazar";
	 			break;
	 		case '6':
	 				$desB = "Shooter";
	 			break;
	 		case '7':
	 				$desB = "Laser";
	 			break;
	 		case '8':
	 				$desB = "Camino Correcto";
	 			break;
	 	}
	 	$table2 .= "<tr>";
	 	$table2 .= "<td>$desB</td>";
	 	$table2 .= "<td>$consulta7[preguntas]</td>";
	 	$table2 .= "<td>$consulta7[correctas]</td>";
	 	$table2 .= "</tr>";
	}


//Recorrer la tabla resultado desafios e imprimir el deasifio, la cantidad de preguntas que se le hicieron y la cantidad de respuestas correctas en el mundo Cueva.			
	$table3 = '';	
	while ($consulta8 = mysqli_fetch_array($resultados8)) {
		switch ($consulta8['desafio']) {
	 		case '1':
	 				$desC = "CorrectBox";
	 			break;
	 		case '2':
	 				$desC = "Combat";
	 			break;
	 		case '3':
	 				$desC = "Plataformas";
	 			break;
	 		case '4':
	 				$desC = "Electro Shock";
	 			break;
	 		case '5':
	 				$desC = "Enlazar";
	 			break;
	 		case '6':
	 				$desC = "Shooter";
	 			break;
	 		case '7':
	 				$desC = "Laser";
	 			break;
	 		case '8':
	 				$desC = "Camino Correcto";
	 			break;
	 	}
	 	$table3 .= "<tr>";
	 	$table3 .= "<td>$desC</td>";
	 	$table3 .= "<td>$consulta8[preguntas]</td>";
	 	$table3 .= "<td>$consulta8[correctas]</td>";
	 	$table3 .= "</tr>";
	}


//Recorrer la tabla resultado desafios e imprimir el deasifio, la cantidad de preguntas que se le hicieron y la cantidad de respuestas correctas en el mundo Cueva.		
	$table4 = '';
	while ($consulta9 = mysqli_fetch_array($resultados9)) {
		switch ($consulta9['desafio']) {
	 		case '1':
	 				$desCa = "CorrectBox";
	 			break;
	 		case '2':
	 				$desCa = "Combat";
	 			break;
	 		case '3':
	 				$desCa = "Plataformas";
	 			break;
	 		case '4':
	 				$desCa = "Electro Shock";
	 			break;
	 		case '5':
	 				$desCa = "Enlazar";
	 			break;
	 		case '6':
	 				$desCa = "Shooter";
	 			break;
	 		case '7':
	 				$desCa = "Laser";
	 			break;
	 		case '8':
	 				$desCa = "Camino Correcto";
	 			break;
	 	}
	 	$table4 .= "<tr>";
	 	$table4 .= "<td>$desCa</td>";
	 	$table4 .= "<td>$consulta9[preguntas]</td>";
	 	$table4 .= "<td>$consulta9[correctas]</td>";
	 	$table4 .= "</tr>";
	}
?>