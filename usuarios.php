<?php 
    session_start();
    if(!isset($_SESSION['admin'])){
        header("location:index.php");
    }else{
    $idUsuario = '';
    $nombre ='';
    $apellidos = '';
    $direccion = '';
    $usuario = '';
    $clave = '';
    $mensaje = '';
    $clase = '';
    $valor = 'Registrar';

    if(isset($_POST['modificar'])){
        require_once('PHP/conexion.php');
        $con = conectar();
        $idUsuario = $_POST["codigo"];
        $buscar = "SELECT * FROM `usuarios` WHERE idUsuario = '$idUsuario'";
        $respuesta = mysqli_query($con, $buscar);
        while ($filas = mysqli_fetch_assoc($respuesta)) {
            # code...
            $idUsuario = $filas['idUsuario'];
            $nombre = $filas['nombres'];
            $apellidos = $filas['apellidos'];
            $direccion = $filas['direccion'];
            $usuario = $filas['usuario'];
            $clave = $filas['clave'];
        }
        $valor = 'Modificar';
        mysqli_close($con);
    }

    if(isset($_POST['Registrar'])){
        require_once('PHP/conexion.php');
        $con = conectar();
        $idUsuario = $_POST["codigo"];
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $direccion = $_POST["direccion"];
        $usuario = $_POST["usuario"];
        $clave = $_POST["clave"];
		$retorno = include('PHP/validacionU.php');
        if($retorno === true){
        $insertar = "INSERT INTO usuarios (idUsuario, nombres, apellidos, direccion, usuario, clave) VALUES ('$idUsuario', '$nombre', '$apellidos', '$direccion', '$usuario','$clave')";
        $respuesta = mysqli_query($con, $insertar);
        mysqli_close($con);
		$idUsuario = '';
        $nombre ='';
        $apellidos = '';
        $direccion = '';
        $usuario = '';
        $clave = '';
        $mensaje = '';
        $clase = '';
		echo "<script>alert('Usuario registrado')</script>";
    }
        
    }

    if(isset($_POST['Modificar'])){
        require_once('PHP/conexion.php');
        $con = conectar();
        $idUsuario = $_POST["codigo"];
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $direccion = $_POST["direccion"];
        $usuario = $_POST["usuario"];
        $clave = $_POST["clave"];
		$retorno = include('PHP/validacionU.php');
		if($retorno === true){
        $insertar = "UPDATE `usuarios` SET `nombres` = '$nombre', `apellidos` = '$apellidos', `direccion` = '$direccion', `usuario` = '$usuario', `clave` = '$clave' WHERE `usuarios`.`idUsuario` = '$idUsuario'";
        $idUsuario = '';
        $respuesta = mysqli_query($con, $insertar);
        mysqli_close($con);
		$idUsuario = '';
        $nombre ='';
        $apellidos = '';
        $direccion = '';
        $usuario = '';
        $clave = '';
        $mensaje = '';
        $clase = '';
		echo "<script>alert('Usuario modificado')</script>";}else{ $valor = 'Modificar';}
    }
    if(isset($_POST['eliminar'])){
        require_once('PHP/conexion.php');
        $con = conectar();
        $idUsuario = $_POST['codigo'];
        $eliminar = "DELETE FROM `usuarios` WHERE `usuarios`.`idUsuario` = '$idUsuario'";
        $respuesta = mysqli_query($con,$eliminar);
        $idUsuario = '';
        echo "<script>alert('Usuario eliminado')</script>";
    }

    require_once "PHP/consultar.php";
	$con = conectar();
	$sentencia = "SELECT * FROM `usuarios`";
	$resultado = mysqli_query($con,$sentencia);
	mysqli_close($con);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagenes/logo.png"> 
    <title>Usuarios</title>
    <link rel="stylesheet" href="CSS/estilos.css">
</head>
<body>
    <header class="header">
        
        <figure class="header__menu">
            <img src="imagenes/menu.svg" alt="Menu" id="menu__movil">
        </figure>
        <figure class="header__logo">
            <a href="index.html">
                <img src="imagenes/logo.png" alt="Logo">
            </a>
        </figure>
        <figure class="header__logo shopping" id="btn-compras">
            <img src="imagenes/shopping_cart.svg" alt="Carrito de compras">
        </figure>
        <nav class="navegacion left" id="navegacion">
            <ul>
                <li><img src="imagenes/home.svg" alt="Inicio" class="navegacion__icono"><a href="index.html" class="link">Inicio</a></li>
                <li><img src="imagenes/television.svg" alt="Television" class="navegacion__icono"><a href="televisores.php" class="link">Televisores</a></li>
                <li><img src="imagenes/stereo.svg" alt="Audio" class="navegacion__icono"><a href="audio.php" class="link">Audio</a></li>
                <li><img src="imagenes/computer.svg" alt="Computo" class="navegacion__icono"><a href="computo.php" class="link">Computo</a></li>
                <li><img src="imagenes/homeless.svg" alt="Electrohogar" class="navegacion__icono"><a href="electrohogar.php" class="link">Electrohogar</a></li>
                <?php 
                if(!isset($_SESSION['admin'])){
                ?><li><img src="imagenes/user.svg" alt="Usuario" class="navegacion__icono"><a href="login.php" class="link">Ingresar</a></li>
                <?php
                }else{
                    ?> <li><img src="imagenes/user.svg" alt="Usuario" class="navegacion__icono"><a href="administrador.php" class="link">Administrar</a></li>
                    <li><img src="imagenes/user.svg" alt="Salir" class="navegacion__icono"><a href="PHP/salir.php" class="link">Salir</a></li>

                    <?php
                }
                ?>
            </ul>
        </nav>
    </header>
    <div class="div_Formulario contacto">
        <form class="formulario form_productos" id="formulario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <h2>Ingresar Usuario</h2>
            <input type="hidden" name="archivo_actual" value="<?php echo $archivo_actual; ?>">
            <input type="number" name="codigo" value="<?php echo $idUsuario; ?>" placeholder="Ingrese Id del usuario">
            <input type="text" name="nombre" value="<?php echo $nombre; ?>" placeholder="Ingrese nombre del usuario">
            <input type="text" name="apellidos" value="<?php echo $apellidos; ?>" placeholder="Ingrese apellidos del usuario">
            <input type="text" name="direccion" value="<?php echo $direccion; ?>" placeholder="Ingrese dirección del usuario">
            <input type="text" name="usuario" value="<?php echo $usuario; ?>" placeholder="Ingrese un usuario">
            <input type="password" name="clave" value="<?php echo $clave; ?>" placeholder="Ingrese una clave">
            <input type="hidden" name="valor" value="<?php echo $valor; ?>">
            <button type="submit" name="<?php echo $valor;?>" class="boton mg-b"><?php echo $valor?> usuario</button>
        </form>
    </div>
    <div id="alerta" class="<?php echo $clase?>">
        <p><?php echo $mensaje?></p>
    </div>
    <div class="compras productos" id="compras">
        <h2>USUARIOS</h2>
        <table>
            <thead class="table_thead">
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Dirección</th>
                    <th>Usuario</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            
            <?php while ($filas = mysqli_fetch_assoc($resultado)) {
				# code...
				?>
            <tbody class="table_tbody" id="tbody_carrito">
                <td><?php echo $filas['idUsuario']; ?></td>
                <td><?php echo $filas['nombres']; ?></td>
                <td><?php echo $filas['apellidos']; ?></td>
                <td><?php echo $filas['direccion']; ?></td>
                <td><?php echo $filas['usuario']; ?></td>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
				<td><input type="submit" name="modificar" class="boton" value="Modificar"></td>
				<td><input type="submit" name="eliminar" class="boton btn_delete" value="Eliminar"></td>
                <input type="hidden" name="codigo" value="<?php echo $filas['idUsuario']; ?>">
                </form>
            </tbody>
				<?php } ?> 
				<!-- Fin tarjeta -->
        </table>
    </div>
    <footer class="footer">
        <p>Copyright &copy; 2021 Daniel Bustillos Villar</p>
    </footer>
    <script src="JS/menu.js"></script>
</body>
</html>
    <?php 
}
?>