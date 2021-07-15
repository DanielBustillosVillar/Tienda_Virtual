<?php
    include("conexion.php");
    $con = conectar();
    $idProducto = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $cantidad = $_POST["cantidad"];
    $descripcion = $_POST["descripcion"];
    $categoria = $_POST["categoria"];

    $insertar = "UPDATE `productos` SET `nombre` = '$nombre', `precio` = '$precio', `cantidad` = '$cantidad', `descripcion` = '$descripcion', `categoria` = '$categoria' WHERE `productos`.`idProducto` = '$idProducto'";

    $respuesta = mysqli_query($con, $insertar);
    if(!$respuesta){
        $nombre = 'Error';
        /* $mensaje = "Error no se puedo ingresar los datos"; */
        echo json_encode(mysqli_error($con));
    }else{
        /* echo "<script>alert('Productos modificado')</script>"; */
        $valor = 'Registrar';
        $idProducto = '';
        $nombre ='';
        $precio = '';
        $cantidad = '';
        $descripcion = '';
        $seleccionA = '';
        $seleccionC = '';
        $seleccionE = '';
        $seleccionT = '';
        $mensaje = '';
        
        echo json_encode('Producto modificado');
    }
    mysqli_close($con);

    ?>