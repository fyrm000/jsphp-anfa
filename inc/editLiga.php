<?php

include "../database/conection.php";

$conn = new Conection();
$link = $conn->getConection();

$query = "CALL updateLiga(?,?,?)";

if($_SERVER['REQUEST_METHOD']==='POST'){
    

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $comuna = $_POST['comuna'];

    // echo $id, $nombre, $comuna;

    if($stmt = mysqli_prepare($link, $query)){
        mysqli_stmt_bind_param($stmt, 'iss', $id, $nombre, $comuna);
    }else{
        die('Error en la consulta...');
    }

    echo json_encode(mysqli_stmt_execute($stmt));
}