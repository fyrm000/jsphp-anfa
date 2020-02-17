<?php

include "../database/conection.php";

$conn = new Conection();
$link = $conn->getConection();

$query = "CALL getLigas()";

if($res = mysqli_query($link, $query)){
    $json = array();
    while($row = mysqli_fetch_array($res)){
        $json[] = array(
            'idLiga' => $row['id'],
            'nombreLiga' => $row['nombre'],
            'comunaLiga' => $row['comuna']
        );
    }
}else{
    exit();
}

echo json_encode($json);