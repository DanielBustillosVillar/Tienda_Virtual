<?php 
    require_once "PHP/conexion.php";
    $con = conectar();
    $mensaje = '';
    $clase = '';
    $color = '';
    if(isset($_POST['submit'])){
        $nombreProducto = $_POST['nombreProducto'];
        if($nombreProducto === ''){
            $mensaje = 'Rellene todos los campos';
            
            $clase = 'alerta';
            $color = 'red';
            $consulta="SELECT * FROM `productos`";
        }else{
            $consulta="SELECT * FROM `productos` WHERE nombre = '$nombreProducto'";
            $resultado = mysqli_query($con,$consulta);
            if(mysqli_num_rows($resultado) < 1){
                $mensaje = 'No se encontraron resultados';
                $clase = 'alerta';
                $color = 'red';
                $consulta="SELECT * FROM `productos`";
            }
        }
    }else{
        $consulta="SELECT * FROM `productos`";
    }

    $resultado = mysqli_query($con,$consulta);
