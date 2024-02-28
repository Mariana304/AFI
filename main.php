<?php

$groups = "202401_MD_AFIV04_1"; // array ["202401_MD_AFIV04_1","202401_MD_AFIV04_10","Grupo 1"]
$fileCode = 2; // string (valor que se busca en el CSV), ejemplo "ACC-1"
$fileCodeStr = strval($fileCode);

$titlePage = "Actividad de Consolidación de Conocimiento N°2: OBJETIVO 4"; // string -- El nombre de la página, o en este caso, de la tarea. Ejemplo "Actividad de Consolidación de Conocimiento N°2: OBJETIVO 4"  **NO USAR**
$firstname = "Camilo"; // string -- MARIANA, JHENNYFER
$role = "student"; // string con tres valores posibles  "manager" "teacher" "student"


$rutaArchivoCSV = "data.csv"; // Ruta del archivo CSV

$archivoCSV = fopen($rutaArchivoCSV, "r");



while (($fila = fgetcsv($archivoCSV)) !== FALSE) {

    //ENCONTRAMOS EL CODIGO DE EL GRUPO EN EL CSV
    if ($fila[0] === $groups && $fila[1] === $fileCodeStr) {

        // ENCONTRAR EL ENLACE EN EL INDICE 3, Y EL PROFESOR EN EL INDICE 2
        $enlace = $fila[3];
        $profesor = $fila[2];

        break;
    }
}


fclose($archivoCSV);

echo"Aquí esta tu actividad de consolidación de conocimiento número $fileCodeStr, propuesta por el profesor $profesor, para el grupo $groups";

echo"<br>";

echo"<div style='margin-top: 10px;'>";


echo "<a style='background: linear-gradient(to right, #fe9a52, #ff8009); color: #fff; text-decoration: none; padding: 15px 20px; border-radius: 4px; font-size: 17px; font-weight: bolder; transition: all 0.3s ease-in-out;' href='$enlace' target='_blank'>Actividad de consolidacion</a>";


echo"</div>";

