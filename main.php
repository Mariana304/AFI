<?php


// echo '<link rel="stylesheet" href="CSS\style2.css">';
echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />';

echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">';


$groups = ["202401_MD_AFIV06_1", "202401_MD_AFIV04_1", "202401_MD_AFIV05_8"]; // Array de grupos
$fileCode = "ACC-1";
// $titlePage = "Actividad de Consolidación de Conocimiento N°2: OBJETIVO 4";
$firstname = "Camilo";
$role = "student";
$rutaArchivoCSV = "https://docs.google.com/spreadsheets/d/e/2PACX-1vSCxlInmEvWck8lEeG-hf6TkZBeo71uguF9n-edUTggX6eRw44NqJrauEanYhLRbI36lQ6epaQj3CvB/pub?gid=1489901431&single=true&output=csv"; // Ruta del archivo CSV


// Cargar el archivo CSV en un array
$csvData = [];
$archivoCSV = fopen($rutaArchivoCSV, "r");
while (($fila = fgetcsv($archivoCSV)) !== FALSE) {
    $csvData[] = $fila;
}
fclose($archivoCSV);


if (empty($groups && $fileCode)) {

    echo " <div class='container-sm mt-3'>
    <div class='alert alert-danger text-center h4' role='alert'>
    ¡Vaya!, No hay información en los datos recibidos.
  </div></div>";
  
} else {


    echo "<div class='container-sm mt-3'>";
    echo "<div class='card border-0'>";
    echo "<div class='card-header border-0 bg-transparent text-center'>

<h1>¡Hola $firstname!</h1>
</div>";

    echo "<div class='border-bottom' style='font-size: 20px; font-weight: 500;border-top: none; text-align: center;'>
<p>Aquí estarán tus actividades de consolidación para los siguientes grupos. </p>
</div>";


    foreach ($groups as $group) {

        $codeGroup =  $group . "_" . $fileCode;

        $enlace = null;
        $profesor = null;
        foreach ($csvData as $fila) {


            //ENCONTRAMOS EL CODIGO DE EL GRUPO EN EL CSV
            if ($fila[0] === $codeGroup) {
                // ENCONTRAR EL ENLACE EN EL INDICE 1, Y EL PROFESOR EN EL INDICE 6 Y EL NUMERO DE LA ACC EN EL INDICE 3
                $enlace = trim($fila[1]);
                $profesor =  $fila[6];
                $consecutivo = $fila[3];

                break;
            }
        }

        if (filter_var($enlace, FILTER_VALIDATE_URL)) {
            //info
            echo "<div class='row d-flex align-items-center border-bottom'>
            <div class='card-body col-7'>
                    <blockquote class='blockquote mb-0'>
                        <div style='display: flex; margin-left: 20px;'>
                            <i class='fa-solid fa-user' style='margin-top: 3px; margin-right:10px;'></i>
                            <p style='font-size: 18px; font-weight: bold;'>Profesor: <span style='font-weight: 300;'>$profesor</span></p>
                        </div>
        
                        <div style='display: flex; margin-left: 20px;'>
                            <i class='fa-solid fa-file-pen' style='margin-top: 4px; margin-right:10px;'></i>
                            <p style='font-size: 18px; font-weight: bold;'>Numero ACC: <span style='font-weight: 300;'> $consecutivo</span>
                            </p>
                        </div>
                        
                        <div style='display: flex; margin-left: 20px;'>
                            <i class='fa-solid fa-users' style='margin-top: 4px; margin-right:10px;'></i>
                            <p style='font-size: 18px; font-weight: bold;'>Grupo: <span
                                    style='font-weight: 300;'>$group</span></p>
                        </div>

                        <!-- <footer class='blockquote-footer'>Someone famous in <cite title='Source Title'>Source
                                Title</cite>
                        </footer> -->
                        
                    </blockquote>
            </div>
            <div class='col-5 text-center'>
                
                <a href='$enlace' target='_blank' class='btn btn-info'>Ver Archivo</a>
            </div>
        </div> ";
        } else { //si el enlace no es valido...
            echo "<div class='mt-3 border-bottom' style='font-size: 20px; font-weight: 500;border-top: none; text-align: center;'>
        <p>El enlace no es valido para la ACC del Grupo: $group </p>
    </div>";
        }
    }
}

echo "</div>";
echo "</div>"; //div card
echo "</div>"; //div container-sm

echo "<script src='https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js'
integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj'
crossorigin='anonymous'></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js'
integrity='sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct'
crossorigin='anonymous'></script>";

echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>";

echo "
<div class='container-sm text-center mt-3'>
<div class='loader' style='position: fixed;left: 0px;top: 0px;width: 100%;height: 100%;z-index: 9999;background:#fff; background-size: 100%;'><img src='images\loading2.gif'></div>
</div>";

echo "<script>
$(window).load(function () {
    $('.loader').fadeOut('slow');
});
</script>";
