<?php

include "../database/conection.php";

$conn = new Conection();
$link = $conn->getConection();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $n = trim($_POST['nombre']);

    $query = "CALL searchTeams('" . $n . "')";

    if ($res = mysqli_query($link, $query)) {
        $json = array();
        while ($row = mysqli_fetch_array($res)) {
            $json[] = array(
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'ciudad' => $row['localidad'],
                'nLiga' => $row['nLiga'],
                'comuna' => $row['comuna'],
                'puntos' => $row['puntos'],
                'posicion' => $row['posicion'],
                'gcontra' =>$row['gcontra'],
                'gfavor' =>$row['gfavor'],
                'dgoles' => $row['dgoles']
            );
        }
    }

    echo json_encode($json);
}
