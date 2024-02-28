
<?php


echo '<link rel="stylesheet" href="/CSS/style.css">';
echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />';

$groups = ["202401_MD_AFIV04_1"]; // array ["202401_MD_AFIV04_1","202401_MD_AFIV04_10","Grupo 1"]
$fileCode = 1; // string (valor que se busca en el CSV), ejemplo "ACC-1"
$titlePage = "Actividad de Consolidación de Conocimiento N°2: OBJETIVO 4"; // string -- El nombre de la página, o en este caso, de la tarea. Ejemplo "Actividad de Consolidación de Conocimiento N°2: OBJETIVO 4"  **NO USAR**
$firstname = "Camilo"; // string -- MARIANA, JHENNYFER
$role = "student"; // string con tres valores posibles  "manager" "teacher" "student"

// Leer el archivo CSV una vez y almacenar la información en un array


//Primero se pregunta si hay grupos ya que si no hay no se podra hacer la busqueda (en los datos recibidos)
if (empty($groups)) {

    echo "<div id='msg-not-groups'>No hay grupos en los datos recibidos</div>";
} else {


    echo "<div style='text-align: center; margin-top: 30px; '>";

    echo ucfirst("<h1> ¡Hola $firstname!</h1>");

    echo "</div>";

    echo var_dump(getData());

    $pamela = array();










        if (isset($data[$group])){





            $teacher = $data[$group][2];
            //guarda en la variable $enlace el indice 3 de el array ya que ahi esta el enlace, y se le quita todos los espacios para poder ser verificado 
            $enlace = trim($data[$group][3]);
            $numeroActividad = $data[$group][1];



            if (empty($enlace)) { //se pregunta si no hay enlace 
                echo "<div id='msg-not-link'>No hay enlace para la ACC del Grupo: $group </div><br><br><hr/>";
            } else { // si hay enlace ...

                //se pregunta si el enlace es valido
                if (filter_var($enlace, FILTER_VALIDATE_URL)) {

        
                } else { //si el enlace no es valido...

                    echo "<div id='msg-invalid-link'>El enlace no es valido para la ACC del Grupo: . $group </div><br><br><hr/>";
                }
            }
        } else { //se busca grupo para todos los datos recibidos en el array de grupos, y si no hay grupos...


            echo "<div id='msg-indefinite-group'>Error: El grupo '$group' no se encuentra.</div><br><br><hr/>";
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



function getData() {

    $rutaArchivoCSV = "data.csv"; // Ruta del archivo CSV

    $archivoCSV = fopen($rutaArchivoCSV, "r");

    $data = array();

    //se genera un ciclo en donde en la variable $fila se extrae lo que se tomo del archivo
    while (($fila = fgetcsv($archivoCSV)) !== FALSE) {
        $data[$fila[0]] = $fila;
    }

    fclose($archivoCSV);

    return $data;
}


function getFileByGroup($data, $group, $fileCode) {

    foreach ($data as $row) {

        if( $row[0] === $group ) {

            echo var_dump($row) . "<hr>";
        }

    }

}