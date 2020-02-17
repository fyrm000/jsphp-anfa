<?php

include "../database/conection.php";

$conn = new Conection();
$link = $conn->getConection();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $comuna = $_POST['comuna'];
    $ciudad = $_POST['ciudad'];
    $posicion = $_POST['posicion'];
    $puntos = $_POST['puntos'];

    $query = "UPDATE equipos SET nombre = ?, comuna = ?, ciudad = ?, posicion = ?, puntos = ? WHERE id = ?";

    if($stmt = mysqli_prepare($link, $query)){
        mysqli_stmt_bind_param($stmt, 'sssiii', $nombre, $comuna, $ciudad, $posicion, $puntos, $id);
    }else{
        exit();
    }

    $res = mysqli_stmt_execute($stmt);

    echo json_encode($res);

}