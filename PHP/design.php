<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personalizar Página</title>
    <link rel="stylesheet" href="/Style/design.css">
</head>
<body>
    <div class="container">
    <button class="close-btn" onclick="window.history.back()">×</button>
        <h1>Personalizar Página</h1>
        <form action="/PHP_LOGIC/design_Logic.php" method="post">
            <!-- Colores -->
             <fieldset>
               <label class="lbltitu" for="">Colores de pagina:</label> 
                <div class="color-picker">
                    <label for="colorContainer1_3">Contenedor 1 y 3:</label>
                    <br>
                    <br>
                    <input type="color" id="colorContainer1_3" name="colorContainer1_3">
                </div>

                <div class="color-picker">
                    <label for="colorContainer2_4">Contenedor 2 y 4:</label>
                    <br>
                    <br>
                    <input type="color" id="colorContainer2_4" name="colorContainer2_4">
                </div>

                <div class="color-picker">
                    <label for="colorFooter">Otros:</label>
                    <br>
                    <br>
                    <input type="color" id="colorFooter" name="colorFooter">
                </div>

            <!-- Íconos -->
                 <label class="lbltitu" for="">Iconos</label>
                <input type="text" id="iconPrincipalUrl" name="iconPrincipalUrl" placeholder="Ingrese la URL del ícono principal"><br>

                <input type="text" id="iconFooterUrl" name="iconFooterUrl" placeholder="Ingrese la URL del ícono footer"><br>

            <!-- Imagen del Banner y Mensaje -->
                <label class="lbltitu" for="">Banner</label>
                <input type="text" id="bannerImageUrl" name="bannerImageUrl" placeholder="Ingrese la URL de la imagen del banner"><br>

                <input type="text" id="bannerMessage" name="bannerMessage" placeholder="ingrese el mensaje de banner"><br>

            <!-- Información de Quiénes Somos -->
               <label  class="lbltitu">Quienes somos</label>
                <textarea id="quienesSomosText" name="quienesSomosText" placeholder="ingrese el texto"></textarea><br>

                <input type="text" id="quienesSomosImageUrl" name="quienesSomosImageUrl" placeholder="Ingrese la URL de la imagen"><br>

            <!-- Enlaces en Redes Sociales -->
                <label class="lbltitu" for="">Redes Sociales:</label>
                <input type="url" id="facebookLink" name="facebookLink" placeholder="Ingrese el enlace a Facebook"><br>

                <input type="url" id="instagramLink" name="instagramLink" placeholder="Ingrese el enlace a Instagram"><br>

                <input type="url" id="youtubeLink" name="youtubeLink" placeholder="Ingrese el enlace a YouTube"><br>

            <!-- Información de Contacto -->
                <label class="lbltitu" for="">Información de contacto</label>
               <input type="text" id="address" name="address" placeholder="Ingrese la dirección"><br>

                <input type="tel" id="phone" name="phone" placeholder="Ingrese el telefono"><br>

                <input type="email" id="email" name="email" placeholder="Ingrese el email"><br>
            </fieldset>

4444        </form>
    </div>
    <script>
           document.querySelectorAll('input[type="color"]').forEach(function(colorInput) {
            colorInput.addEventListener('input', function() {
                document.getElementById(colorInput.id + '_value').textContent = colorInput.value;
            });
        });
    </script>
</body>
</html>
