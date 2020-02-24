<?php

include "../database/conection.php";

$conn = new Conection();
$link = $conn->getConection();

$query = "CALL insertLiga(?,?)";



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $comuna = $_POST['comuna'];

    // echo $nombre;

    if ($stmt = mysqli_prepare($link, $query)) {
        mysqli_stmt_bind_param($stmt, 'ss', $nombre, $comuna);
    } else {
        exit();
    }
    $res = mysqli_stmt_execute($stmt);

echo json_encode($nombre);
}

