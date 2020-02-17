<?php

include "../database/conection.php";

$conn = new Conection();
$link = $conn->getConection();

if (!$link) {
    printf("ERROR: ". mysqli_connect_errno());
    exit();
}
$query = "DELETE FROM equipos WHERE id = ?";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];

    if ($stmt = mysqli_prepare($link, $query)) {
        mysqli_stmt_bind_param($stmt, 'i', $id);
        echo "Success";
    }else{
        exit();
    }

    $res = mysqli_stmt_execute($stmt);

    echo json_encode($res);
}



// echo $id;