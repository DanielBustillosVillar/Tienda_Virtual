<?php 
require_once "conexion.php";
$con = conectar();
$idProducto = $_POST["idProducto"];
$eliminar = "DELETE FROM `productos` WHERE `productos`.`idProducto` = '$idProducto'";
$respuesta = mysqli_query($con,$eliminar);
$idProducto = '';

mysqli_close($con);
echo "<script>alert('Eliminado')</script>";
echo "<script>window.location.href = '../visualizarProductos.php'</script>";