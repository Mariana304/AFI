<?php

$groups = ["202401_MD_AFIV04_1", "202401_MD_AFIV04_10", "202401_MD_AFIV04_11"]; // Array de grupos
$fileCode = 1;
$fileCodeStr = strval($fileCode);
$titlePage = "Actividad de Consolidación de Conocimiento N°2: OBJETIVO 4";
$firstname = "Camilo";
$role = "student";
$rutaArchivoCSV = "https://docs.google.com/spreadsheets/d/e/2PACX-1vRdl97qZGba8l61ifQ7Wv9mMPhUzU6ENeTFmRPE3IOzaKSe9tKyD_Dkf4vQcFfNnCTM02f8kyioGjj9/pub?gid=0&single=true&output=csv"; // URL del archivo CSV



if (empty($groups)) {

    echo "<div id='msg-not-groups'>No hay grupos en los datos recibidos</div>";

} else {

    foreach ($groups as $group) {
        // Resetear variables en cada iteración
        $enlace = null;
        $profesor = null;

        $archivoCSV = fopen($rutaArchivoCSV, "r");

        while (($fila = fgetcsv($archivoCSV)) !== FALSE) {
            //ENCONTRAMOS EL CODIGO DE EL GRUPO EN EL CSV
            if ($fila[0] === $group && $fila[1] === $fileCodeStr) {
                // ENCONTRAR EL ENLACE EN EL INDICE 3, Y EL PROFESOR EN EL INDICE 2
                $enlace = trim($fila[3]);
                $profesor = $fila[2];
                break;
            }
        }

        fclose($archivoCSV);

        if ($enlace !== null && $profesor !== null) {

            if (filter_var($enlace, FILTER_VALIDATE_URL)) {

                echo "Aquí está tu actividad de consolidación de conocimiento número $fileCodeStr, propuesta por el profesor $profesor, para el grupo $group";
                echo $enlace;
                echo "<br>";
                echo "<br>";
                echo "<div style='margin-top: 10px;'>";
                echo "<a style='background: linear-gradient(to right, #fe9a52, #ff8009); color: #fff; text-decoration: none; padding: 15px 20px; border-radius: 4px; font-size: 17px; font-weight: bolder; transition: all 0.3s ease-in-out;' href='$enlace' target='_blank'>Actividad de consolidación</a>";
                echo "</div>";
                echo "<br>";
                echo "<br>";

            } else { //si el enlace no es valido...

                echo "<div id='msg-invalid-link'>El enlace no es valido para la ACC del Grupo: . $group </div><br><br><hr/>";
            }
        } else {
            echo "No se encontró información para el grupo $group y la actividad número $fileCodeStr.";
        }
    }
}
