<?php

include_once("../config/configDB.php");

class Conection
{

    function getConection()
    {
        if ($link = mysqli_connect(HOST, USER, PASSWORD, DBNAME)) {
            mysqli_query($link, "SET NAMES 'utf8'");
            mysqli_set_charset($link, "utf8");
            // echo "OK DB ".DBNAME;
            return $link;
        } else {
            die("ERROR AL CONECTARCSE A LA BASE DE DATOS: " . DBNAME);
        }
    }

    function closConection()
    {
        global $link;
        $close = mysqli_close($link);
        if (!$close) {
            die("ERROR AL DESCONECTARSE A LA BASE DE DATOS: " . DBNAME);
        }
    }
}

// $conn = new Conection();
// $link = $conn->getConection();

// echo $link;
