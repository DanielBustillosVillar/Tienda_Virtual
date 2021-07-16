<?php 
if($idUsuario == '' || $nombre == '' || $apellidos == '' || $direccion == '' || $usuario == '' || $clave == ''){
    $mensaje = 'Rellene todos los campos';
    $clase = 'alerta';
}else{
    return true;
}