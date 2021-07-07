<?php 
    require_once "PHP/conexion.php";
    $con = conectar();
    $mensajes = '';
    $clase = '';
    $color = '';
    $archivo_actual = basename($_SERVER['PHP_SELF']);

    
    if($archivo_actual === "audio.php"){
        $sentencia = "SELECT * FROM `productos` WHERE categoria = 'audio'";
    }elseif ($archivo_actual === "visualizarProductos.php") {
        $sentencia = "SELECT * FROM `productos`";
    }elseif ($archivo_actual === "computo.php") {
        $sentencia = "SELECT * FROM `productos` WHERE categoria = 'computo'";
    }elseif ($archivo_actual === "electrohogar.php") {
        $sentencia = "SELECT * FROM `productos` WHERE categoria = 'electrohogar'";
    }elseif($archivo_actual === "televisores.php"){
        $sentencia = "SELECT * FROM `productos` WHERE categoria = 'television'";
    }else{
        $sentencia = "SELECT * FROM `productos`";
    }


    function alerta($mensaje){
        global $mensajes, $clase, $color, $consulta, $sentencia;
        $mensajes = $mensaje;
        $clase = 'alerta';
        $color = 'red';
        $consulta = $sentencia;
    }
    function consultar($con, $newsentencia){
            $consulta = $newsentencia;
            $resultado = mysqli_query($con,$consulta);
            if(mysqli_num_rows($resultado) < 1){
                $mensaje = "No se han encontrado resultados";
                alerta($mensaje);
            }
    }

    if(isset($_POST['productos'])){
        $nombreProducto = $_POST['nombreProducto'];
        if($nombreProducto === ''){
            $mensaje = "Rellene todos los campos";
            alerta($mensaje, $sentencia);
        }else{
            $newsentencia = "SELECT * FROM `productos` WHERE nombre = '$nombreProducto'";
            consultar($con, $newsentencia);
        }
    }else{
        $consulta= $sentencia;
    }

    $resultado = mysqli_query($con,$consulta);
    mysqli_close($con);
