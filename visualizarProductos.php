<?php
	require_once "PHP/consultar.php";
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
    <title>Visualizar productos</title>
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
                <li><img src="imagenes/home.svg" alt="Inicio" class="navegacion__icono"><a href="index.php" class="link">Inicio</a></li>
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
    <div class="compras" id="compras">
        <table>
            <thead class="table_thead">
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table_tbody" id="tbody_carrito">
            </tbody>
        </table>
        <button class="boton" id="btn_vaciar_carrito">Vaciar carrito</button>
    </div>
    
    <div class="buscador">
        <p>Buscar producto</p>
        <form class="formulario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" id="submit">
            <input type="text" name="nombreProducto" id="nombreProducto" class="lupa" placeholder="Buscar">
            <button class="boton" name="productos" id="busqueda">Buscar</button>
        </form>
    </div>
    <div id="alerta" class="<?php echo $color;?> <?php echo $clase ?>">
    <p><?php echo $mensajes ?></p>
    </div>
    <main class="main_pages" id="productos">
    <a href="ingresarProductos.php" class="boton as">Agregar Producto</a>
<!-- TARJETA 1 -->
        <article class="tarjet card visualizar">
            <figure class="tarject_figure visualizar_figure">
                <img src="imagenes/electrodomesticos_01.jpg" alt="Audio">
            </figure>
            <div class="tarject_contenido visualizar_figure">
                <p>Codigo <span>A2</span></p>
                <p>Nombre <span>nombre</span></p>
                <p>Precio <span>1200</span></p>
                <p>Cantidad <span>120</span></p>
                <p>Descripcion <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos ex ab iste nobis culpa iure alias quam pariatur quibusdam beatae, nostrum molestiae facere, saepe iusto at voluptates necessitatibus sunt hic.</span></p>
                <p>Categoria <span>Audio</span></p>
                <button class="boton" data-id="E1">Modificar</button>
                <button class="boton btn_delete" data-id="E1">Eliminar</button>
            </div>
        </article>
<!--TARJETA 2  -->
        <article class="tarjet card visualizar">
            <figure class="tarject_figure visualizar_figure">
                <img src="imagenes/electrodomesticos_02.jpg" alt="Televisor">
            </figure>
            <div class="tarject_contenido visualizar_figure">
                <p>LICUADORA TAURUS 2 VELOCIDADES TJB 1300 1.5LT</p>
                <span class="precio">S/ 119.00</span>
                <button class="boton" data-id="E2">Modificar</button>
                <button class="boton btn_delete" data-id="E1">Eliminar</button>
            </div>
        </article>
<!-- TARJETA 3 -->
        <article class="tarjet card visualizar">
            <figure class="tarject_figure visualizar_figure">
                <img src="imagenes/electrodomesticos_03.jpg" alt="Televisor">
            </figure>
            <div class="tarject_contenido visualizar_figure">
                <p>COCINA INDURAMA GRANADA P 4 HORNILLAS</p>
                <span class="precio">S/ 999.00</span>
                <button class="boton" data-id="E3">Modificar</button>
                <button class="boton btn_delete" data-id="E1">Eliminar</button>
            </div>
        </article>
<!-- TARJETA 4 -->
        <article class="tarjet card visualizar">
            <figure class="tarject_figure visualizar_figure">
                <img src="imagenes/electrodomesticos_04.jpg" alt="Televisor">
            </figure>
            <div class="tarject_contenido visualizar_figure">
                <p>LAVADORA SAMSUNG ECO INVERTER WA17T6260BY/PE 17 KG</p>
                <span class="precio">S/ 1,349.00</span>
                <button class="boton" data-id="E4">Modificar</button>
                <button class="boton btn_delete" data-id="E1">Eliminar</button>
            </div>
        </article>
        
        <?php while ($filas = mysqli_fetch_assoc($resultado)) {
		# code...
		?>
        <article class="tarjet card visualizar">
            <figure class="tarject_figure visualizar_figure">
                <img src="<?php echo $filas['imagen']; ?>" alt="<?php echo $filas['categoria']; ?>">
            </figure>
            <div class="tarject_contenido visualizar_figure">
                <p>Codigo <span><?php echo $filas['idProducto']; ?></span></p>
                <p>Nombre <span><?php echo $filas['nombre']; ?></span></p>
                <p>Precio <span><?php echo $filas['precio']; ?></span></p>
                <p>Cantidad <span><?php echo $filas['cantidad']; ?></span></p>
                <p>Descripcion <span><?php echo $filas['descripcion']; ?></span></p>
                <p>Categoria <span><?php echo $filas['categoria']; ?></span></p>
                <!-- <button class="boton" data-id="<?php echo $filas['idProducto']; ?>">Modificar</button> -->
                <!-- <button class="boton btn_delete" data-id="<?php echo $filas['idProducto']; ?>">Eliminar</button> -->
                <form action="ingresarProductos.php" method="POST" name="submit" id="submit">
					<td><input type="submit" id="modificar" name="modificar" class="boton" value="Modificar"></td>
                    <input type="hidden" name="idProducto" id="idProducto" value="<?php echo $filas['idProducto']; ?>">
                </form>
                <form action="PHP/eliminar.php" method="POST" name="submit" id="submit">
					<td><input type="submit" id="eliminarP" name="eliminarP"class="boton btn_delete" value="Eliminar"></td>
					<input type="hidden" name="idProducto" id="idProducto" value="<?php echo $filas['idProducto']; ?>">
                </form>

            </div>
        </article>
        <?php } ?>
    </main>
    <aside class="aside">
        <figure>
            <img src="imagenes/aside_04.jpg" alt="Aside">
        </figure>
    </aside>
    <div class="contacto">
        <form action="suscripcion.php">
            <h3>Suscribete para estar al tanto de nuevos productos</h3>
            <input type="email" placeholder="Correo">
            <button class="boton">Enviar</button>
        </form>
        <div class="redes">
            <a href="http://facebbok.danielbustillos.com" class="facebook"></a>
            <a href="twitter.com" class="twitter"></a>
            <a href="instagram.dani.com" class="instagram"></a>
        </div>
    </div>
    <footer class="footer">
        <p>Copyright &copy; 2021 Daniel Bustillos Villar</p>
    </footer>
    <script src="JS/menu.js"></script>
    <script src="JS/agregarProductos.js"></script>
</body>
</html>
    <?php 
}
?>