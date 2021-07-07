<?php
session_start();
if(isset($_SESSION['admin'])){
	header("location:index.html");
}else{
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagenes/logo.png"> 
    <title>Danis</title>
    <link rel="stylesheet" href="CSS/estilos.css">
</head>
<body class="fondo">
    <figure class="login_logo">
        <a href="index.html"><img src="imagenes/logo.png" alt="Logo"></a>
    </figure>
    <form class="formulario" id="formulario">
        <input type="hidden" value="login.html" name="archivo_actual">
        <input type="text" placeholder="Usuario" class="usuario" name="usuario">
        <input type="password" placeholder="Contraseña" class="password" name="password">
        <button class="boton" id="login">Ingresar</button>
    </form>
    <div id="alerta"></div>
    <script src="JS/validarFormulario.js"></script>
</body>
</html>
    <?php 
}
?>