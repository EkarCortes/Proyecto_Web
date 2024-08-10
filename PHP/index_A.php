<?php
require 'conexion.php'; // Archivo que contiene la conexión a la base de datos

// Consultar los datos desde la base de datos
$sql = "SELECT * FROM personalizacion WHERE id = 1";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar si se obtuvieron datos
if ($data) {
    $colorContainer1_3 = $data['colorContainer1_3'];
    $colorContainer2_4 = $data['colorContainer2_4'];
    $colorFooter = $data['colorFooter'];
    $iconPrincipalUrl = $data['iconPrincipalUrl'];
    $iconFooterUrl = $data['iconFooterUrl'];
    $bannerImageUrl = $data['bannerImageUrl'];
    $bannerMessage = $data['bannerMessage'];
    $quienesSomosText = $data['quienesSomosText'];
    $quienesSomosImageUrl = $data['quienesSomosImageUrl'];
    $facebookLink = $data['facebookLink'];
    $instagramLink = $data['instagramLink'];
    $youtubeLink = $data['youtubeLink'];
    $address = $data['address'];
    $phone = $data['phone'];
    $email = $data['email'];
} else {
    // Valores por defecto si no se obtienen datos
    // $colorContainer1_3 = '#ffffff';
    // $colorContainer2_4 = '#ffffff';
    // $colorFooter = '#ffffff';
    // $iconPrincipalUrl = '/IMG/house_2.jpg';
    // $iconFooterUrl = '/IMG/default-footer-icon.png';
    // $bannerImageUrl = '/IMG/default-banner.jpg';
    // $bannerMessage = 'Mensaje por defecto';
    // $quienesSomosText = 'Texto por defecto sobre nosotros';
    // $quienesSomosImageUrl = '/IMG/default-about-us.jpg';
    // $facebookLink = '#';
    // $instagramLink = '#';
    // $youtubeLink = '#';
    // $address = 'Dirección por defecto';
    // $phone = '0000-0000';
    // $email = 'default@example.com';
}

// Cerrar la conexión
$pdo = null;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/Style/index.css">
    <link rel="stylesheet" href="/Style/properties.css">
    <link rel="stylesheet" href="/Style/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .containerMain {
            background-image: url('<?php echo $bannerImageUrl; ?>');
        }

        .container-F {
            background-color: <?php echo $colorFooter; ?>;
        }

        .container-Properties {
            background-color: <?php echo $colorContainer1_3; ?>;
        }

        .container-Sale {
            background-color: <?php echo $colorContainer2_4; ?>;
        }

        .logo a img {
            content: url('<?php echo $iconPrincipalUrl; ?>');
        }

        .footer_DR {
            background-color: <?php echo $colorContainer1_3; ?>;
        }
        .AboutUs {
            background-color: <?php echo $colorContainer2_4; ?>;
        }
    </style>
</head>

<body>
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
                        <a href="/PHP/Admin_user.php"> <img src="/IMG/user.png" alt=""></a> 
                        <a href="/PHP/design.php"> <img src="/IMG/design.png" alt=""></a> 
                        <a href="/PHP/login.php"> <img src="/IMG/log-out.png" alt=""></a> 
                    </div>
                    <div class="navOptions">
                        <ul>
                            <li><a href="#">INICIO |</a></li>
                            <li><a href="#">QUIENES SOMOS |</a></li>
                            <li><a href="#">ALQUILERES |</a></li>
                            <li><a href="#">VENTAS |</a></li>
                            <li><a href="#">CONTACTENOS</a></li>
                        </ul>
                    </div>
                    <div class="search">
                        <input type="text" placeholder="Buscar...">
                    </div>
                </nav>
            </div>
            <div class="hero">
                <div class="hero-text">
                    <h1><?php echo $bannerMessage; ?></h1>
                </div>
            </div>
        </header>
    </div>

    <section class="AboutUs">
        <h1>QUIENES SOMOS</h1>
        <div class="content">
            <div class="text">
                <p><?php echo $quienesSomosText; ?></p>
            </div>
            <div class="image">
                <img src="<?php echo $quienesSomosImageUrl; ?>" alt="Office Image">
            </div>
        </div>
    </section>

    <section class="container-Properties">
        <h1 style="text-align: center; margin-bottom: 20px;">PROPIEDADES DESTACADAS</h1>

        <div class="container">
            <div class="card">
                <img src="/IMG/house.jpg" alt="Casa 1">
                <h2>Casa Mora</h2>
                <p>Ubicada en las faldas del volcán Arenal, contiene 1000 mts de terreno y uno de las mejores vistas del lugar</p>
                <span>Precio: $65000</span>
            </div>
            <div class="card">
                <img src="/IMG/house.jpg" alt="Casa 2">
                <h2>Casa Mora</h2>
                <p>Ubicada en las faldas del volcán Arenal, contiene 1000 mts de terreno y uno de las mejores vistas del lugar</p>
                <span>Precio: $65000</span>
            </div>
            <div class="card">
                <img src="/IMG/house.jpg" alt="Casa 3">
                <h2>Casa Mora</h2>
                <p>Ubicada en las faldas del volcán Arenal, contiene 1000 mts de terreno y uno de las mejores vistas del lugar</p>
                <span>Precio: $65000</span>
            </div>
        </div>

        <div style="text-align: center; margin-top: 20px;">
            <a href="#" class="button">VER MAS...</a>
        </div>
    </section>

    <section class="container-Sale">
        <h1 style="text-align: center; margin-bottom: 20px; color: black">PROPIEDADES EN VENTA</h1>

        <div class="container">
            <div class="card">
                <img src="/IMG/house.jpg" alt="Casa 1">
                <h2>Casa Mora</h2>
                <p>Ubicada en las faldas del volcán Arenal, contiene 1000 mts de terreno y uno de las mejores vistas del lugar</p>
                <span>Precio: $65000</span>
            </div>
            <div class="card">
                <img src="/IMG/house.jpg" alt="Casa 2">
                <h2>Casa Mora</h2>
                <p>Ubicada en las faldas del volcán Arenal, contiene 1000 mts de terreno y uno de las mejores vistas del lugar</p>
                <span>Precio: $65000</span>
            </div>
            <div class="card">
                <img src="/IMG/house.jpg" alt="Casa 3">
                <h2>Casa Mora</h2>
                <p>Ubicada en las faldas del volcán Arenal, contiene 1000 mts de terreno y uno de las mejores vistas del lugar</p>
                <span>Precio: $65000</span>
            </div>
        </div>

        <div style="text-align: center; margin-top: 20px;">
            <a href="#" class="button">VER MAS...</a>
        </div>
    </section>
    <section class="container-Properties">
        <h1 style="text-align: center; margin-bottom: 20px;">PROPIEDADES EN ALQUILER</h1>

        <div class="container">
            <div class="card">
                <img src="/IMG/house.jpg" alt="Casa 1">
                <h2>Casa Mora</h2>
                <p>Ubicada en las faldas del volcán Arenal, contiene 1000 mts de terreno y uno de las mejores vistas del lugar</p>
                <span>Precio: $65000</span>
            </div>
            <div class="card">
                <img src="/IMG/house.jpg" alt="Casa 2">
                <h2>Casa Mora</h2>
                <p>Ubicada en las faldas del volcán Arenal, contiene 1000 mts de terreno y uno de las mejores vistas del lugar</p>
                <span>Precio: $65000</span>
            </div>
            <div class="card">
                <img src="/IMG/house.jpg" alt="Casa 3">
                <h2>Casa Mora</h2>
                <p>Ubicada en las faldas del volcán Arenal, contiene 1000 mts de terreno y uno de las mejores vistas del lugar</p>
                <span>Precio: $65000</span>
            </div>
        </div>

        <div style="text-align: center; margin-top: 20px;">
            <a href="#" class="button">VER MAS...</a>
        </div>
    </section>

    <div class="container-F">
        <div class="container-Footer footer">
            <div class="info">

                <div class="icon-footer"> <i class="bi bi-geo-alt-fill"></i>
                    <p>Dirección: <?php echo $address; ?></p>
                </div>

                <div class="icon-footer"> <i class="bi bi-telephone-fill"></i>
                    <p>Teléfono: <?php echo $phone; ?></p>
                </div>
                <div class="icon-footer"> <i class="bi bi-envelope-fill"></i>
                    <p>Email: <?php echo $email; ?></p>
                </div>
            </div>

            <div class="logo">
                <a href="">
                    <img src="/IMG/logo.png" alt=""></a>
                <h2>Bienes Raices</h2>
                <div class="icons">
                    <a href="<?php echo $facebookLink; ?>"><i class="bi bi-facebook"></i></a>
                    <a href="<?php echo $instagramLink; ?>"><i class="bi bi-instagram"></i></a>
                    <a href="<?php echo $youtubeLink; ?>"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
            <div class="form">
                <h3>Contactanos</h3>
                <form class="form-Email" action="#" method="post">
                    <input type="text" name="nombre" placeholder="Nombre" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="tel" name="telefono" placeholder="Teléfono" required>
                    <textarea name="mensaje" placeholder="Mensaje" required style="resize: none;"></textarea>
                    <button type="submit">Enviar</button>
                </form>
            </div>
        </div>
        <footer class="footer_DR">
            <p>Derechos Reservados 2024</p>
        </footer>
    </div>
</body>

</html>