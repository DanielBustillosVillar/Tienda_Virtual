<?php
    function conectar(){
        $server = "localhost:3306";
        $user = "root";
        $pass = "root";
        $db = "tienda";

        $con = mysqli_connect($server, $user, $pass) or die ("Error en la conexion ".mysqli_connect_error());
        mysqli_select_db($con, $db);

        return $con;
    }