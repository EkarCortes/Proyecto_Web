<!--DESIGN.PHP -->
<?php
session_start();
if ($_SESSION['privilegio'] !== 'administrador') {
    header("Location: login.php");
    exit;
}

require 'conexion.php';

// Obtener la configuración actual para mostrar en el formulario
$query = "SELECT * FROM configuraciones LIMIT 1";
$result = mysqli_query($conn, $query);
$config = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personalizar Página</title>
</head>
<body>
    <h2>Personalizar Página</h2>
    <form action="design_Logic.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="color_fondo">Color de Fondo:</label>
            <input type="color" name="color_fondo" id="color_fondo" value="<?php echo $config['color_fondo']; ?>">
        </div>
        <div>
            <label for="color_texto">Color de Texto:</label>
            <input type="color" name="color_texto" id="color_texto" value="<?php echo $config['color_texto']; ?>">
        </div>
        <div>
            <label for="icono_principal">Cambiar Ícono Principal:</label>
            <input type="file" name="icono_principal" id="icono_principal">
        </div>
        <div>
            <label for="icono_blanco">Cambiar Ícono Blanco:</label>
            <input type="file" name="icono_blanco" id="icono_blanco">
        </div>
        <div>
            <label for="imagen_banner">Cambiar Imagen del Banner:</label>
            <input type="file" name="imagen_banner" id="imagen_banner">
            <label for="mensaje_banner">Mensaje del Banner:</label>
            <input type="text" name="mensaje_banner" id="mensaje_banner" value="<?php echo $config['mensaje_banner']; ?>">
        </div>
        <div>
            <label for="imagen_quienes_somos">Imagen "Quienes Somos":</label>
            <input type="file" name="imagen_quienes_somos" id="imagen_quienes_somos">
            <label for="info_quienes_somos">Información "Quienes Somos":</label>
            <textarea name="info_quienes_somos" id="info_quienes_somos" rows="4"><?php echo $config['info_quienes_somos']; ?></textarea>
        </div>
        <div>
            <label for="facebook">URL de Facebook:</label>
            <input type="url" name="facebook" id="facebook" value="<?php echo $config['facebook']; ?>">
        </div>
        <div>
            <label for="instagram">URL de Instagram:</label>
            <input type="url" name="instagram" id="instagram" value="<?php echo $config['instagram']; ?>">
        </div>
        <div>
            <label for="youtube">URL de YouTube:</label>
            <input type="url" name="youtube" id="youtube" value="<?php echo $config['youtube']; ?>">
        </div>
        <div>
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" id="direccion" value="<?php echo $config['direccion']; ?>">
            <label for="telefono">Teléfono:</label>
            <input type="tel" name="telefono" id="telefono" value="<?php echo $config['telefono']; ?>">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $config['email']; ?>">
        </div>
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
