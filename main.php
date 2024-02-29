<?php

echo '<link rel="stylesheet" href="CSS\style2.css">';
echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />';

$groups = ["202401_MD_AFIV04_1", "202401_MD_AFIV04_10"]; // Array de grupos
$fileCode = 1;
$fileCodeStr = strval($fileCode);
$titlePage = "Actividad de Consolidación de Conocimiento N°2: OBJETIVO 4";
$firstname = "Camilo";
$role = "student";
$rutaArchivoCSV = "https://docs.google.com/spreadsheets/d/e/2PACX-1vRdl97qZGba8l61ifQ7Wv9mMPhUzU6ENeTFmRPE3IOzaKSe9tKyD_Dkf4vQcFfNnCTM02f8kyioGjj9/pub?gid=0&single=true&output=csv"; // Ruta del archivo CSV

// Cargar el archivo CSV en un array
$csvData = [];
$archivoCSV = fopen($rutaArchivoCSV, "r");

while (($fila = fgetcsv($archivoCSV)) !== FALSE) {
    $csvData[] = $fila;
}
fclose($archivoCSV);

echo "<div id='container'>";

echo ucfirst("<h1> ¡Hola $firstname!</h1>");

echo "</div>";


echo "<div id='info-content'>Aquí estara tus actividades de consolidación para los siguientes grupos.</div>";



if (empty($groups)) {
    echo "<div id='msg-not-groups'>No hay grupos en los datos recibidos</div>";
} else {
    foreach ($groups as $group) {
        // Resetear variables en cada iteración
        $enlace = null;
        $profesor = null;
        foreach ($csvData as $fila) {
            //ENCONTRAMOS EL CODIGO DE EL GRUPO EN EL CSV
            if ($fila[0] === $group && $fila[1] === $fileCodeStr) {
                // ENCONTRAR EL ENLACE EN EL INDICE 3, Y EL PROFESOR EN EL INDICE 2
                $enlace = trim($fila[3]);
                $profesor =  $fila[2];

                break;
            }
        }
        if ($enlace !== null && $profesor !== null) {
            if (filter_var($enlace, FILTER_VALIDATE_URL)) {

                //container info
                echo "<div id='container-info'>";
                echo "<div id='info'>";


                //info teacher
                echo "<div id='text-info-teacher'>";
                echo "  <i class='fa-solid fa-user' id='icon-user'></i>
                <p id='p-teacher'>Profesor: <span id='name-teacher'>$profesor</span></p>";
                echo "</div>"; //div text-info-teacher


                //info activity
                echo "<div id='text-info-N-activity'>";
                echo " <i class='fa-solid fa-file-pen' id='icon-activity'></i>
                <p id='p-activity'>Numero ACC: <span id='N-activity'>$fileCode</span>
                </p>";
                echo "</div>"; //div text-info-N-activity

                //info group
                echo "<div id='text-info-group'><i class='fa-solid fa-users' id='icon-group'></i>
                <p id='p-group'>Grupo: <span id='N-group'>$group</span></p> </div>";//div text-info-group

                echo "</div>"; //div info


                echo "<div id='container-buttom-activity'>";
                echo " <a href='$enlace' id='buttom-activity'>Ver archivo</a>";
                echo "</div>";//div container-buttom-activity

                
                echo "</div>"; //div container-info


            } else { //si el enlace no es valido...
                echo "<div id='msg-invalid-link'>El enlace no es valido para la ACC del Grupo: $group </div><br><br><hr/>";
            }
        } else {
            echo "<div id='msg-indefinite-group'> No se encontró información para el grupo $group y la actividad número $fileCodeStr. </div> ";
        }
    }
}

echo "</div>";
