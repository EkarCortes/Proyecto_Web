
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
            background-color: <?php echo $colorContainer2_4; ?>;
        }

        .container-Sale {
            background-color: <?php echo $colorContainer1_3; ?>;
        }

        .logo a img {
            content: url('<?php echo $iconPrincipalUrl; ?>');
        }

        .footer_DR {
            background-color: <?php echo $colorContainer2_4; ?>;
        }

        .AboutUs {
            background-color: <?php echo $colorContainer1_3; ?>;
        }
        .card {
            background-color: <?php echo $colorContainer1_3; ?>;
        }
        .card2 {
            background-color: <?php echo $colorContainer2_4; ?>;
        }
        .textCard{
            color: <?php echo $colorContainer1_3; ?>;
        }
        .textCard2{
            color: <?php echo $colorContainer2_4; ?>;
        }
        .button{
            background-color: <?php echo $colorFooter; ?>;
        }

    </style>
</head>

<body>
  
    <section class="AboutUs" id="AboutUs">
        <h1 class="textCard2">QUIENES SOMOS</h1>
        <div class="content">
            <div class="text">
                <p><?php echo $quienesSomosText; ?></p>
            </div>
            <div class="image">
                <img src="<?php echo $quienesSomosImageUrl; ?>" alt="Office Image">
            </div>
        </div>
    </section>

    <!-- Propiedades destacadas -->
    <section class="container-Properties textCard">
        <h1 style="text-align: center; margin-bottom: 20px;">PROPIEDADES DESTACADAS</h1>

        <div class="container">
            <?php
            // Merge and remove duplicates by ID
            $highlightedProperties = array_merge($highlightedSale, $highlightedRental);
            $highlightedProperties = array_unique($highlightedProperties, SORT_REGULAR);
            
            // Mostrar hasta 3 propiedades destacadas
            $displayedProperties = array_slice($highlightedProperties, 0, 3);
            foreach ($displayedProperties as $property): ?>
                <div class="card">
                    <img src="<?php echo htmlspecialchars($property['imagen']); ?>" alt="<?php echo htmlspecialchars($property['titulo']); ?>">
                    <h2 class="textCard2"><?php echo htmlspecialchars($property['titulo']); ?></h2>
                    <p class="textCard2"><?php echo htmlspecialchars($property['descripcion']); ?></p>
                    <span class="textCard2">Precio: <?php echo htmlspecialchars($property['precio']); ?></span>
                </div>
            <?php endforeach; ?>
        </div>

        <div style="text-align: center; margin-top: 30px;">
    <a href="/PHP/featured_Properties.php" class="button">VER MAS...</a>
</div>

    </section>

    <!-- Propiedades en venta -->
    <section class="container-Sale textCard2">
        <h1 style="text-align: center; margin-bottom: 20px;">PROPIEDADES EN VENTA</h1>

        <div class="container">
            <?php foreach ($latestSale as $property): ?>
                <div class="card2">
                    <img src="<?php echo htmlspecialchars($property['imagen']); ?>" alt="<?php echo htmlspecialchars($property['titulo']); ?>">
                    <h2 class="textCard"><?php echo htmlspecialchars($property['titulo']); ?></h2>
                    <p class="textCard"><?php echo htmlspecialchars($property['descripcion']); ?></p>
                    <span class="textCard">Precio: <?php echo htmlspecialchars($property['precio']); ?></span>
                </div>
            <?php endforeach; ?>
        </div>

        <div style="text-align: center; margin-top: 30px;">
    <a href="/PHP/sale_Properties.php" class="button">VER MAS...</a>
</div>

    </section>

    <!-- Propiedades en alquiler -->
    <section class="container-Properties textCard ">
        <h1 style="text-align: center; margin-bottom: 20px;">PROPIEDADES EN ALQUILER</h1>

        <div class="container">
            <?php foreach ($latestRental as $property): ?>
                <div class="card">
                    <img src="<?php echo htmlspecialchars($property['imagen']); ?>" alt="<?php echo htmlspecialchars($property['titulo']); ?>">
                    <h2 class="textCard2"><?php echo htmlspecialchars($property['titulo']); ?></h2>
                    <p class="textCard2"><?php echo htmlspecialchars($property['descripcion']); ?></p>
                    <span class="textCard2">Precio: <?php echo htmlspecialchars($property['precio']); ?></span>
                </div>
            <?php endforeach; ?>
        </div>

        <div style="text-align: center; margin-top: 30px;">
    <a href="/PHP/rent_Properties.php" class="button">VER MAS...</a>
</div>

    </section>

    <!-- Pie de página -->
    
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
            <div class="form" id="contac">
                <h3>Contactanos</h3>
                <form class="form-Email" action="/PHP_LOGIC/submit_form.php" method="POST">
                     <input type="text" name="nombre" placeholder="Nombre" required>
                     <input type="email" name="email" placeholder="Email" required>
                     <input type="tel" name="telefono" placeholder="Teléfono" required>
                     <textarea name="mensaje" placeholder="Mensaje" required style="resize: none;"></textarea>
                     <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
                     <button type="submit">Enviar</button>
                </form>
            </div>
        </div>
        <footer class="footer_DR textCard">
            <p>Derechos Reservados 2024</p>
        </footer>
    </div>
</body>

</body>

</html>

                    
                  
                   