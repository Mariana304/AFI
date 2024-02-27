
<?php


$groups = ["202401_MD_AFIV04_1", "202401_MD_AFIV04_10", "Grupo 1"]; // array ["202401_MD_AFIV04_1","202401_MD_AFIV04_10","Grupo 1"]
$fileCode = 1; // string (valor que se busca en el CSV), ejemplo "ACC-1"
$titlePage = "Actividad de Consolidación de Conocimiento N°2: OBJETIVO 4"; // string -- El nombre de la página, o en este caso, de la tarea. Ejemplo "Actividad de Consolidación de Conocimiento N°2: OBJETIVO 4"  **NO USAR**
$firstname = "Camilo"; // string -- MARIANA, JHENNYFER
$role = "student"; // string con tres valores posibles  "manager" "teacher" "student"

// Leer el archivo CSV una vez y almacenar la información en un array
$rutaArchivoCSV = "https://docs.google.com/spreadsheets/d/e/2PACX-1vRdl97qZGba8l61ifQ7Wv9mMPhUzU6ENeTFmRPE3IOzaKSe9tKyD_Dkf4vQcFfNnCTM02f8kyioGjj9/pub?gid=0&single=true&output=csv"; // Ruta del archivo CSV


//Primero se pregunta si hay grupos ya que si no hay no se podra hacer la busqueda

if (empty($groups)) { 
    echo "No hay grupos ";
} else {


    //Se lee el archivo CSV
    $archivoCSV = fopen($rutaArchivoCSV, "r");


    //Se almacena en un array 
    $data = array();



    //se genera un ciclo en donde en la variable $fila se extrae lo que se tomo del archivo
    while (($fila = fgetcsv($archivoCSV)) !== FALSE) {
        $data[$fila[0]] = $fila;

    }

    fclose($archivoCSV);

    echo ucfirst("<h1> ¡Hola $firstname!</h1>");



    //se hace un foreach para ubicar los grupos 
    foreach ($groups as $group) {


        //se pregunta si hay contenido en los grupos CSV
        if (isset($data[$group])) {


            //guarda en la variable $enlace el indice 3 de el array ya que ahi esta el enlace, y se le quita todos los espacios para poder ser verificado 
            $enlace = trim($data[$group][3]);


            //se pregunta si hay un enlace en el CSV, y si el enlace que hay es valido 
            if (isset($enlace) && filter_var($enlace, FILTER_VALIDATE_URL)) {
                echo "El enlace es válido y si hay un enlace el el archivo ";
                echo "<br>";
                echo "Enlace: " . $enlace;
                echo "<br> <br>";

                // Mostrar la información del grupo
                echo "<div style='...'>";
                echo "<div style='...'>";
                echo "Aquí esta tu actividad de consolidación de conocimiento para el grupo $group";
                echo "</div>";
                echo "<br>";
                echo "<div style='...'>";
                echo "<a style='...' href='$enlace' target='_blank'>Actividad de consolidacion</a>";
                echo "</div>";
                echo "</div>";
                echo ".<br><br>";
                echo "<hr/>";
            }


            //en caso de que no haya enlace o no sea valido el enlace
            else {

                echo "No es un enlace válido o no hay enlace ";
                echo "<br>";
                echo " Enlace: " . $enlace;
                echo ".<br><br>";
                echo "<hr/>";
            }
        } else {

            echo "no hay grupo";
            echo "<div style='color: red; font-weight: bold;'>";
            echo "Error: El grupo '$group' no se encuentra.";
            echo "</div>";
        }


    }
}
