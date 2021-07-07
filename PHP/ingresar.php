<?php 
require_once('conexion.php');
$con = conectar();
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
        echo "<script>alert('Bienvenido')</script>";
        echo "<script>window.location.href = 'administrador.php'</script>";
    /* header("location:administrador.php"); */
    $_SESSION['admin'] = $usuario;
    }else{
        $msjAlerta = 'Usuario o contraseña invalido';
        $claseA = 'alerta';
    }
}else{
    $msjAlerta = 'Rellene todos los campos';
    $claseA = 'alerta';
}