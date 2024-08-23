<?php
include './designdb.php';
?>
<div class="containerMain">
    <header class="header">
        <div class="containerNav">
            <div class="containerNavInfo">
                <div class="logo">
                    <a href="">
                        <img src="/IMG/logo.png" alt=""></a>
                </div>
                <div class="icons">
                    <a href="<?php echo $facebookLink; ?>"><i class="bi bi-facebook"></i></a>
                    <a href="<?php echo $instagramLink; ?>"><i class="bi bi-instagram"></i></a>
                    <a href="<?php echo $youtubeLink; ?>"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
            <nav>
                <div class="login">
                    <a href="/PHP/index.php"> <img src="/IMG/log-out.png" alt=""></a>
                </div>


                <div class="navOptions">
                    <ul>
                        <li><a href="#">INICIO |</a></li>
                        <li><a href="#AboutUs">QUIENES SOMOS |</a></li>
                        <li><a href="/PHP/rent_Properties.php">ALQUILERES |</a></li>
                        <li><a href="/PHP/sale_Properties.php">VENTAS |</a></li>
                        <li><a href="#contac">CONTACTENOS</a></li>
                    </ul>
                </div>
                <div class="search">
                    <form action="./search.php" method="GET">
                        <input type="text" name="searchQuery" placeholder="Buscar...">
                        <button type="submit">Buscar</button>
                    </form>
                </div>

            </nav>
        </div>
        <div class="hero">
            <div class="hero-text">
                <h1><?php echo $bannerMessage; ?></h1>
            </div>
        </div>
    </header>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</div>

<?php
include './home.php';
?>