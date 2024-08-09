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
        <h1>Personalizar Página</h1>
        <form action="/PHP_LOGIC/design_Logic.php" method="post">
            <!-- Colores -->
            <fieldset>
                <legend>Colores de la Página</legend>
                <label for="colorContainer1_3">Color contenedor 1 y 3:</label>
                <input type="color" id="colorContainer1_3" name="colorContainer1_3"><br>

                <label for="colorContainer2_4">Color contenedor 2 Y 4:</label>
                <input type="color" id="colorContainer2_4" name="colorContainer2_4"><br>

                <label for="colorFooter">Color Otros:</label>
                <input type="color" id="colorFooter" name="colorFooter"><br>
            </fieldset>

            <!-- Íconos -->
            <fieldset>
                <legend>Íconos</legend>
                <label for="iconPrincipalUrl">URL del Ícono Principal:</label>
                <input type="text" id="iconPrincipalUrl" name="iconPrincipalUrl" placeholder="Ingrese la URL del ícono principal"><br>

                <label for="iconFooterUrl">URL del Ícono Footer:</label>
                <input type="text" id="iconFooterUrl" name="iconFooterUrl" placeholder="Ingrese la URL del ícono footer"><br>
            </fieldset>

            <!-- Imagen del Banner y Mensaje -->
            <fieldset>
                <legend>Banner</legend>
                <label for="bannerImageUrl">URL de la Imagen del Banner:</label>
                <input type="text" id="bannerImageUrl" name="bannerImageUrl" placeholder="Ingrese la URL de la imagen del banner"><br>

                <label for="bannerMessage">Mensaje del Banner:</label>
                <input type="text" id="bannerMessage" name="bannerMessage"><br>
            </fieldset>

            <!-- Información de Quiénes Somos -->
            <fieldset>
                <legend>Quiénes Somos</legend>
                <label for="quienesSomosText">Texto:</label>
                <textarea id="quienesSomosText" name="quienesSomosText"></textarea><br>

                <label for="quienesSomosImageUrl">URL de la Imagen:</label>
                <input type="text" id="quienesSomosImageUrl" name="quienesSomosImageUrl" placeholder="Ingrese la URL de la imagen"><br>
            </fieldset>

            <!-- Enlaces en Redes Sociales -->
            <fieldset>
                <legend>Redes Sociales</legend>
                <label for="facebookLink">Facebook:</label>
                <input type="url" id="facebookLink" name="facebookLink" placeholder="Ingrese el enlace a Facebook"><br>

                <label for="instagramLink">Instagram:</label>
                <input type="url" id="instagramLink" name="instagramLink" placeholder="Ingrese el enlace a Instagram"><br>

                <label for="youtubeLink">YouTube:</label>
                <input type="url" id="youtubeLink" name="youtubeLink" placeholder="Ingrese el enlace a YouTube"><br>
            </fieldset>

            <!-- Información de Contacto -->
            <fieldset>
                <legend>Información de Contacto</legend>
                <label for="address">Dirección:</label>
                <input type="text" id="address" name="address"><br>

                <label for="phone">Teléfono:</label>
                <input type="tel" id="phone" name="phone"><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email"><br>
            </fieldset>

            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
