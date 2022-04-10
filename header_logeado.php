<header>
    <div class="nav-img">
        <img src="" alt="">

    </div>
    <div class="nav-main">
        <ul>
            <li> <a href="index.php">Inicio</a> </li>
            <li> <a href="">Tienda</a> </li>
            <li> <a href="">Nosotros</a> </li>
            <li> <a href="">Demas</a></li>
        </ul>
    </div>
    <div class="nav-acount">
        
        <h3><?php echo $_SESSION["usuario"] ?></h3>
        <a href="cerrar_session.php">Cerrar sesion</a>
        <a href="lista.php" >Ver Carrito</a>
    </div>
</header>
