<?php
require 'conexion.php';

// Función para obtener las últimas 3 propiedades por tipo
function getLatestPropertiesByType($pdo, $type) {
    $sql = "SELECT * FROM propiedades 
            WHERE tipo = :type 
            ORDER BY id DESC 
            LIMIT 3";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['type' => $type]);
    return $stmt->fetchAll();
}

// Función para obtener las últimas 3 propiedades destacadas por tipo
function getHighlightedProperties($pdo, $type) {
    $sql = "SELECT * FROM propiedades 
            WHERE tipo = :type AND destacada = 1 
            ORDER BY id DESC 
            LIMIT 3";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['type' => $type]);
    return $stmt->fetchAll();
}

// Obtener propiedades para cada tipo
$latestSale = getLatestPropertiesByType($pdo, 'venta');
$latestRental = getLatestPropertiesByType($pdo, 'alquiler');

// Obtener propiedades destacadas para cada tipo
$highlightedSale = getHighlightedProperties($pdo, 'venta');
$highlightedRental = getHighlightedProperties($pdo, 'alquiler');

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
    $colorContainer1_3 = '#ffffff';
    $colorContainer2_4 = '#ffffff';
    $colorFooter = '#ffffff';
    $iconPrincipalUrl = '/IMG/house_2.jpg';
    $iconFooterUrl = '/IMG/default-footer-icon.png';
    $bannerImageUrl = '/IMG/default-banner.jpg';
    $bannerMessage = 'Mensaje por defecto';
    $quienesSomosText = 'Texto por defecto sobre nosotros';
    $quienesSomosImageUrl = '/IMG/default-about-us.jpg';
    $facebookLink = '#';
    $instagramLink = '#';
    $youtubeLink = '#';
    $address = 'Dirección por defecto';
    $phone = '0000-0000';
    $email = 'default@example.com';
}

// Cerrar la conexión
$pdo = null;
?>


