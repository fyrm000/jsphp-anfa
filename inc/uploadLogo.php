<?php


include "../database/conection.php";

$conn = new Conection();
$link = $conn->getConection();



$carpeta = "img";

$file = $_FILES['file']['name'];
$id = $_POST['id'];

if (isset($_FILES['file']['type'])) {
    $extPermitidas = array('PNG', 'JPG', 'JPEG');
    $ruta = "img";
    $detail = explode('.', $_FILES['file']['name']);

    $extencion = end($detail);
    if ($_FILES['file']['type'] == 'image/png' || $_FILES['file']['type'] == "image/jpg" || $_FILES['file']['type'] == 'image/jpeg') {
        if (in_array($extencion, $extPermitidas)) {
            if ($_FILES['file']['error'] > 1) {
            } else {
                if (file_exists('img/' . $_FILES['file']['name'])) {
                } else {
                    $rutaTemporal = $_FILES['file']['tmp_name'];
                    $rutaFinal = "../img/" . date;
                    move_uploaded_file($rutaTemporal, $rutaFinal);
                    //TODO Arreglar consulta
                    $query = "UPDATE equipos SET img = ? WHERE id = ?";
                    if ($stmt = mysqli_prepare($link, $query)) {
                        mysqli_stmt_bind_param($stmt, 'si', $rutaFinal, $id);
                    } else {
                        exit();
                    }

                    $res = mysqli_stmt_execute($stmt);
                }
            }
        }
    }


    // echo json_encode($res);

    echo json_encode($rutaFinal);
}

// if(file_exists($carpeta) || @mkdir($carpeta)){
//     $origen = $_FILES[]
// }
