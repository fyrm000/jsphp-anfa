<?php

include_once("../config/configDB.php");

class Conection{

    function getConection(){
        if ($link = mysqli_connect(HOST, USER, PASSWORD, DBNAME)) {
            mysqli_query($link, "SET NAMES 'utf8'");
            mysqli_set_charset($link, "utf8");
            return $link;
            echo "OK DB ".DBNAME;
        }else{
            die("ERROR AL CONECTARCSE A LA BASE DE DATOS: ".DBNAME);
        }
    }

    function closConection(){
        $close = mysqli_close($link);
        if (!close) {
            die("ERROR AL DESCONECTARSE A LA BASE DE DATOS: ".DBNAME);
        }
    }



}