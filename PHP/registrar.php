<?php
    include("conexion.php");
    $con = conectar();

    $codigo = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $cantidad = $_POST["cantidad"];
    $descripcion = $_POST["descripcion"];
    $categoria = $_POST["categoria"];

    if($_FILES["imagen"]){
        $nombre_archivo = basename($_FILES["imagen"]["name"]);
        $nombre_imagen = date("m-d-y"). "-" . date("H-i-s"). "-" .$nombre_archivo;
        $ruta = "../imagenes/".$nombre_imagen;
        $src = "imagenes/".$nombre_imagen;
        $subirarchivo = move_uploaded_file($_FILES["imagen"]["tmp_name"],$ruta);
        if($subirarchivo){
            $insertar = "INSERT INTO productos (idProducto, nombre, precio, cantidad, descripcion, categoria, imagen) VALUES ('$codigo', '$nombre', '$precio', '$cantidad', '$descripcion', '$categoria', '$src')";
        }else{
            echo json_encode('Error subir archivo');
        }
    }else{
        echo json_encode(('Error imagen'));
    }


    $resultado = mysqli_query($con, $insertar);

    if(!$resultado){
        echo json_encode('Error no se puedo ingresar los datos: '.mysqli_error($con));
    }else{
        echo json_encode('Producto registrado en la base de datos');
    }
    mysqli_close($con);