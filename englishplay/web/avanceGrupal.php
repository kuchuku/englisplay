<?php

include 'header.php';

//Leemos
$json = file_get_contents('../juego/json/Shooter.json');
$array = json_decode($json, true);

//Modificamos
$array[allRoundData][0][questions4][0][completeTrue]='hola';

//Creamos 
$json = json_encode($array);
file_put_contents('../juego/json/Shooter_test.json', $json);

?>

<head>

</head>

<body>

</body>

<?php

include 'footer.php';

?>