<?php

include "../database/conection.php";

$conn = new Conection();
$link = $conn->getConection();

if (!$link) {
    printf("Error: " . mysqli_connect_errno());
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $comuna = $_POST['comuna'];
    $ciudad = $_POST['ciudad'];
    $posicion = $_POST['posicion'];
    $puntos = $_POST['puntos'];

    $query = "INSERT INTO equipos(nombre, comuna, ciudad, posicion, puntos) VALUES (?,?,?,?,?)";

    if ($stmt = mysqli_prepare($link, $query)) {
        mysqli_stmt_bind_param($stmt, 'sssii', $nombre, $comuna, $ciudad, $posicion, $puntos);
    } else {
        exit();
    }

    $res = mysqli_stmt_execute($stmt);

    echo json_encode($res);
}
