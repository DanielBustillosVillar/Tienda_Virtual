<?php
    include("conexion.php");
    $con = conectar();
    session_start();
    $archivo_actual = $_POST["archivo_actual"];

    if($archivo_actual === "ingresarProductos.php"){

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
    }elseif($archivo_actual === "login.html"){
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        if(!empty($usuario) && !empty($password)){
            $buscar = "SELECT * FROM `usuarios` WHERE usuario ='".$usuario."' AND clave='".$password."'";
            $respuesta = mysqli_query($con, $buscar);
            $ingreso = mysqli_fetch_array($respuesta);
            if($ingreso){
                if(!empty($_POST['remember'])){
                    setcookie("member_login", $usuario, time()+(10*365*24*60*60));
                    setcookie("password", $usuario, time()+(10*365*24*60*60));
                    $_SESSION['admin'] = $usuario;
                }else{
                    if(isset($_COOKIE['member_login'])){
                        setcookie("member_login","");
                        $_SESSION['admin'] = $usuario;
                    }
                    if(isset($_COOKIE['password'])){
                        setcookie("password","");
                        $_SESSION['admin'] = $usuario;
                    }
                }
                $_SESSION['admin'] = $usuario;
                echo json_encode(('Bienvenido'));
            /* header("location:administrador.php"); */
            }else{
                echo json_encode(('Usuario o contraseña invalido'));
            }
        }else{
            echo json_encode(('Rellene todos los campos'));
        }
    }

    mysqli_close($con);