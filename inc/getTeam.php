<?php

// include_once "../database/conection.php";
// include_once "/database/conection.php";

include "../database/conection.php";

$conn = new Conection();
$link = $conn->getConection();
$query = "CALL getTeams();";
// $query = "SELECT * FROM equipos ORDER BY posicion ASC;";
if ($result = mysqli_query($link, $query)) {
    $json = array();
    while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id' => $row['id'],
            'nombre' => $row['nombre'],
            'comuna' => $row['comuna'],
            'ciudad' => $row['localidad'],
            'posicion' => $row['posicion'],
            'puntos' => $row['puntos'],
            'gcontra' => $row['gcontra'],
            'gfavor' => $row['gfavor'],
            'dgoles' => $row['dgoles'],
            'nliga' => $row['nLiga']
        );
    }
} else {
    $json[] = array('mensaje' => 'Error al mostrar los datos');
}

echo json_encode($json);
