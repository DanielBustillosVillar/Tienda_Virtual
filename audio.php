<?php
	require_once "PHP/consultar.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagenes/logo.png"> 
    <title>Audio</title>
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
    <section class="banner">
        <figure id="banner_contenido">
            <img src="imagenes/banner_audio01.jpg" alt="Banner">
            <img src="imagenes/banner_audio02.jpg" alt="Banner">
            <img src="imagenes/banner_audio03.jpg" alt="Banner">
            <img src="imagenes/banner_audio04.jpg" alt="Banner">
            <img src="imagenes/banner_audio05.png" alt="Banner">
        </figure>
        <div class="titulo secundario">
            <p><span>No te pierdas de nada</span> El parlante que quieras lo encuentras en Danis</p>
            <form class="formulario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" id="submit">
                <input type="text" name="nombreProducto" id="nombreProducto" class="lupa" placeholder="Buscar">
                <button class="boton" name="productos" id="busqueda">Buscar</button>
            </form>
        </div>
    </section>
    <div id="alerta" class="<?php echo $color;?> <?php echo $clase ?>">
        <p><?php echo $mensajes ?></p>
    </div>
    <div class="contenedor">
        <main class="main_pages" id="productos">
            <!-- TARJETA 1 -->
                    <article class="tarjet card">
                        <figure class="tarject_figure">
                            <img src="imagenes/audio_01.jpg" alt="Audio">
                        </figure>
                        <div class="tarject_contenido">
                            <p>PARLANTE BLUETOOTH PANASONIC ONE BOX 1200W SC-TMAX40PUK</p>
                            <span class="precio">S/ 899.00</span>
                            <button class="boton agregarPro" data-id="A1">Agregar al carrito</button>
                        </div>
                    </article>
            <!--TARJETA 2  -->
                    <article class="tarjet card">
                        <figure class="tarject_figure">
                            <img src="imagenes/audio_02.jpg" alt="Televisor">
                        </figure>
                        <div class="tarject_contenido">
                            <p>MINICOMPONENTE PANASONIC BLUETOOTH AKX730 - NEGRO</p>
                            <span class="precio">S/ 999.00</span>
                            <button class="boton agregarPro" data-id="A2">Agregar al carrito</button>
                        </div>
                    </article>
            <!-- TARJETA 3 -->
                    <article class="tarjet card">
                        <figure class="tarject_figure">
                            <img src="imagenes/audio_03.jpg" alt="Televisor">
                        </figure>
                        <div class="tarject_contenido">
                            <p>PARLANTE XTECH BLUETOOTH 50W CON INTERNA Y MICR??FONO</p>
                            <span class="precio">S/ 199.00</span>
                            <button class="boton agregarPro" data-id="A3">Agregar al carrito</button>
                        </div>
                    </article>
            <!-- TARJETA 4 -->
                    <article class="tarjet card">
                        <figure class="tarject_figure">
                            <img src="imagenes/audio_04.jpg" alt="Televisor">
                        </figure>
                        <div class="tarject_contenido">
                            <p>EQUIPO DE SONIDO ONE BODY BLUETOOTH LG ON2D</p>
                            <span class="precio">S/ 499.00</span>
                            <button class="boton agregarPro" data-id="A4">Agregar al carrito</button>
                        </div>
                    </article>

                    <?php while ($filas = mysqli_fetch_assoc($resultado)) {
                    # code...
                    ?>
                    <article class="tarjet card">
                        <figure class="tarject_figure">
                            <img src="<?php echo $filas['imagen']; ?>" alt="<?php echo $filas['categoria']; ?>">
                        </figure>
                        <div class="tarject_contenido">
                            <p><?php echo $filas['nombre']; ?></p>
                            <span class="precio">S/ <?php echo $filas['precio']; ?></span>
                            <button class="boton agregarPro" data-id="<?php echo $filas['idProducto']; ?>">Agregar al carrito</button>
                        </div>
                    </article>
                    <?php } ?>
                </main>
                <aside class="aside">
                    <figure>
                        <img src="imagenes/aside.jpg" alt="Aside">
                    </figure>
                </aside>
    </div>
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
    <script src="JS/app.js"></script>
    <script src="JS/agregarProductos.js"></script>
</body>
</html>