<?php

echo '<link rel="stylesheet" href="/CSS/style.css">';
echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />';

$groups = ["202401_MD_AFIV04_1", "202401_MD_AFIV04_10", "Grupo 1"]; // array ["202401_MD_AFIV04_1","202401_MD_AFIV04_10","Grupo 1"]
$fileCode = 1; // string (valor que se busca en el CSV), ejemplo "ACC-1"
$titlePage = "Actividad de Consolidación de Conocimiento N°2: OBJETIVO 4"; // string -- El nombre de la página, o en este caso, de la tarea. Ejemplo "Actividad de Consolidación de Conocimiento N°2: OBJETIVO 4"  **NO USAR**
$firstname = "Camilo"; // string -- MARIANA, JHENNYFER
$role = "student"; // string con tres valores posibles  "manager" "teacher" "student"

// Leer el archivo CSV una vez y almacenar la información en un array
$rutaArchivoCSV = "https://docs.google.com/spreadsheets/d/e/2PACX-1vRdl97qZGba8l61ifQ7Wv9mMPhUzU6ENeTFmRPE3IOzaKSe9tKyD_Dkf4vQcFfNnCTM02f8kyioGjj9/pub?gid=0&single=true&output=csv"; // Ruta del archivo CSV


//Primero se pregunta si hay grupos ya que si no hay no se podra hacer la busqueda (en los datos recibidos)
if (empty($groups)) {

    echo "<div id='msg-not-groups'>No hay grupos en los datos recibidos</div>";
} else {

    //Se lee el archivo CSV
    $archivoCSV = fopen($rutaArchivoCSV, "r");

    $data = array();


    //se genera un ciclo en donde en la variable $fila se extrae lo que se tomo del archivo
    while (($fila = fgetcsv($archivoCSV)) !== FALSE) {

        $data[$fila[0]] = $fila;
    }

    fclose($archivoCSV);


    echo "<div style='text-align: center; margin-top: 30px; '>";

    echo ucfirst("<h1> ¡Hola $firstname!</h1>");

    echo "</div>";


    //se hace un foreach para ubicar los grupos 
    foreach ($groups as $group) {
        


        
    }
}


echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>";


// echo "<div  class='loader' style='position: fixed;left: 0px;top: 0px;width: 100%;height: 100%;z-index: 9999;background: url('../img/merry.gif') 50% 50% no-repeat #bd302d;background-size: 100%;'></div>";

echo " <div class='loader' style='position: fixed;left: 0px;top: 0px;width: 100%;height: 100%;z-index: 9999;background:#fff; background-size: 100%;'><img src='/images/loading.gif'></div>";




echo "<script>

$(window).load(function () {
    $('.loader').fadeOut('slow');
});

</script>";
