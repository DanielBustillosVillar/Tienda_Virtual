<?php 
	require_once "PHP/consultar.php";
	$con = conectar();
	$sentencia = "SELECT * FROM `productos`";
	$resultado = mysqli_query($con,$sentencia);
	mysqli_close($con);
    $archivo_actual = basename($_SERVER['PHP_SELF']);
    session_start();
    if(!isset($_SESSION['admin'])){
        header("location:index.php");
    }else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagenes/logo.png"> 
    <title>Ingresar productos</title>
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
                    ?> <li><img src="imagenes/user.svg" alt="Usuario" class="navegacion__icono"><a href="administrador.html" class="link">Administrar</a></li>
                    <li><img src="imagenes/user.svg" alt="Salir" class="navegacion__icono"><a href="PHP/salir.php" class="link">Salir</a></li>

                    <?php
                }
                ?>
            </ul>
        </nav>
    </header>
    <div class="div_Formulario contacto">
        <form class="formulario form_productos" id="formulario">
            <h2>Ingresar Productos</h2>
            <input type="hidden" name="archivo_actual" value="<?php echo $archivo_actual; ?>">
            <input type="number" name="codigo" placeholder="Ingrese codigo del producto">
            <input type="text" name="nombre" placeholder="Ingrese nombre del producto">
            <input type="text" name="precio" placeholder="Ingrese precio del producto">
            <input type="number" name="cantidad" placeholder="Ingrese cantidad del producto">
            <input type="text" name="descripcion" placeholder="Ingrese descripcion del producto">
            <select name="categoria" id="categoria">
                <option selected hidden>Seleccione una categoria</option>
                <option value="television">Televisión</option>
                <option value="audio">Audio</option>
                <option value="computo">Computo</option>
                <option value="electrohogar">Electrohogar</option>
            </select>
            <label for="imagen_producto">Elegir imagen del producto</label>
            <input type="file" name="imagen" id="imagen_producto" placeholder="Ingrese imagen del producto">
            <button class="boton mg-b" id="boton">Registrar producto</button>
        </form>
    </div>
    <div id="alerta">
    </div>
    <div class="compras productos" id="compras">
        <h2>Ultimos productos ingresados</h2>
        <table>
            <thead class="table_thead">
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Categoria</th>
                </tr>
            </thead>
            
            <?php while ($filas = mysqli_fetch_assoc($resultado)) {
				# code...
				?>
            <tbody class="table_tbody" id="tbody_carrito">
                <td><?php echo $filas['idProducto']; ?></td>
                <td><?php echo $filas['nombre']; ?></td>
                <td><?php echo $filas['precio']; ?></td>
                <td><?php echo $filas['cantidad']; ?></td>
                <td><?php echo $filas['categoria']; ?></td>
            </tbody>
				<?php } ?> 
				<!-- Fin tarjeta -->
        </table>
        <a href="visualizarProductos.php" class="boton aboton">Ver todos los productos</a>
    </div>
    <footer class="footer">
        <p>Copyright &copy; 2021 Daniel Bustillos Villar</p>
    </footer>
    <script src="JS/menu.js"></script>
    <script src="JS/validarFormulario.js"></script>
</body>
</html>
    <?php 
}
?>