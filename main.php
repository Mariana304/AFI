<?php

$groups = ["202401_MD_AFIV04_1", "202401_MD_AFIV04_10"]; // Array de grupos
$fileCode = 2;
$fileCodeStr = strval($fileCode);
$titlePage = "Actividad de Consolidación de Conocimiento N°2: OBJETIVO 4";
$firstname = "Camilo";
$role = "student";
$rutaArchivoCSV = "data.csv"; // Ruta del archivo CSV

$archivoCSV = fopen($rutaArchivoCSV, "r");

foreach ($groups as $group) {
    // Resetear variables en cada iteración
    $enlace = null;
    $profesor = null;

    while (($fila = fgetcsv($archivoCSV)) !== FALSE) {
        //ENCONTRAMOS EL CODIGO DE EL GRUPO EN EL CSV
        if ($fila[0] === $group && $fila[1] === $fileCodeStr) {
            // ENCONTRAR EL ENLACE EN EL INDICE 3, Y EL PROFESOR EN EL INDICE 2
            $enlace = $fila[3];
            $profesor = $fila[2];
            break;
        }
    }

    // Resetear el puntero del archivo CSV al inicio
    fseek($archivoCSV, 0);

    if ($enlace !== null && $profesor !== null) {
        echo "Aquí está tu actividad de consolidación de conocimiento número $fileCodeStr, propuesta por el profesor $profesor, para el grupo $group";
        echo "<br>";
        echo "<div style='margin-top: 10px;'>";
        echo "<a style='background: linear-gradient(to right, #fe9a52, #ff8009); color: #fff; text-decoration: none; padding: 15px 20px; border-radius: 4px; font-size: 17px; font-weight: bolder; transition: all 0.3s ease-in-out;' href='$enlace' target='_blank'>Actividad de consolidación</a>";
        echo "</div>";
    } else {
        echo "No se encontró información para el grupo $group y la actividad número $fileCodeStr.";
    }
}

fclose($archivoCSV);

