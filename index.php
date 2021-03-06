<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagenes/logo.png"> 
    <title>Inicio</title>
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
    <section class="banner" id="banner">
        <figure id="banner_contenido">
            <img src="imagenes/banner_04.jpg" alt="Banner">
            <img src="imagenes/banner_movil.jpg" alt="Banner">
            <img src="imagenes/banner_02.jpg" alt="Banner">
            <img src="imagenes/banner_03.jpg" alt="Banner">
            <img src="imagenes/banner_01.jpg" alt="Banner">
            <img src="imagenes/banner_05.jpg" alt="Banner">
            <img src="imagenes/banner_06.jpg" alt="Banner">
        </figure>
        <div class="titulo">
            <h1>Electro Domesticos Dani</h1>
            <p>Su mejor decisi??n en electrodomesticos. Televisores, equipos de audio, laptops, impresoras, computadoras, electrodomesticos para el hogar, entre muchos m??s.</p>
        </div>
    </section>
    <div class="contenedor">
        <main class="main" id="productos">
            <article class="card">
                <figure>
                    <img src="imagenes/televisor.jpg" alt="Televisores">
                </figure>
                <button class="boton"><a href="televisores.php">Televisores</a></button>
            </article>
    
            <article class="card">
                <figure>
                    <img src="imagenes/audio.jpg" alt="Audio">
                </figure>
                <button class="boton"><a href="audio.php">Audio</a></button>
            </article>
    
            <article class="card">
                <figure>
                    <img src="imagenes/computo.jpg" alt="Computo">
                </figure>
                <button class="boton"><a href="computo.php">Computo</a></button>
            </article>
    
            <article class="card">
                <figure>
                    <img src="imagenes/electrodomesticos.jpg" alt="Electrodomesticos">
                </figure>
                <button class="boton"><a href="electrohogar.php">Electrohogar</a></button>
            </article>
    
           
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
    <script src="JS/agregarProductos.js"></script>
</body>
</html>