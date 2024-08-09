<!-- DESIGN_lOGIC.PHP -->
<?php
session_start();
if ($_SESSION['privilegio'] !== 'administrador') {
    header("Location: login.php");
    exit;
}

require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $color_fondo = $_POST['color_fondo'];
    $color_texto = $_POST['color_texto'];
    $mensaje_banner = $_POST['mensaje_banner'];
    $info_quienes_somos = $_POST['info_quienes_somos'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $youtube = $_POST['youtube'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    // Subir archivos (íconos e imágenes)
    $uploadsDir = '/uploads/';
    $iconoPrincipal = $_FILES['icono_principal']['name'] ? $uploadsDir . basename($_FILES['icono_principal']['name']) : null;
    $iconoBlanco = $_FILES['icono_blanco']['name'] ? $uploadsDir . basename($_FILES['icono_blanco']['name']) : null;
    $imagenBanner = $_FILES['imagen_banner']['name'] ? $uploadsDir . basename($_FILES['imagen_banner']['name']) : null;
    $imagenQuienesSomos = $_FILES['imagen_quienes_somos']['name'] ? $uploadsDir . basename($_FILES['imagen_quienes_somos']['name']) : null;

    // Subir archivos
    if ($iconoPrincipal) move_uploaded_file($_FILES['icono_principal']['tmp_name'], $iconoPrincipal);
    if ($iconoBlanco) move_uploaded_file($_FILES['icono_blanco']['tmp_name'], $iconoBlanco);
    if ($imagenBanner) move_uploaded_file($_FILES['imagen_banner']['tmp_name'], $imagenBanner);
    if ($imagenQuienesSomos) move_uploaded_file($_FILES['imagen_quienes_somos']['tmp_name'], $imagenQuienesSomos);

    // Actualizar la base de datos
    $query = "UPDATE configuraciones SET 
              color_fondo = '$color_fondo', 
              color_texto = '$color_texto', 
              mensaje_banner = '$mensaje_banner', 
              info_quienes_somos = '$info_quienes_somos', 
              facebook = '$facebook', 
              instagram = '$instagram', 
              youtube = '$youtube', 
              direccion = '$direccion', 
              telefono = '$telefono', 
              email = '$email'";

    if ($iconoPrincipal) $query .= ", icono_principal = '$iconoPrincipal'";
    if ($iconoBlanco) $query .= ", icono_blanco = '$iconoBlanco'";
    if ($imagenBanner) $query .= ", imagen_banner = '$imagenBanner'";
    if ($imagenQuienesSomos) $query .= ", imagen_quienes_somos = '$imagenQuienesSomos'";

    mysqli_query($conn, $query);

    // Redirigir de vuelta al formulario con un mensaje de éxito
    header("Location: design.php?status=success");
    exit;
}
