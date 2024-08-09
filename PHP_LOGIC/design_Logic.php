<?php

require 'conexion.php'; // Archivo que contiene la conexión a la base de datos

// Recuperar datos del formulario
$colorContainer1_3 = $_POST['colorContainer1_3'] ?? '';
$colorContainer2_4 = $_POST['colorContainer2_4'] ?? '';
$colorFooter = $_POST['colorFooter'] ?? '';
$iconPrincipalUrl = $_POST['iconPrincipalUrl'] ?? '';
$iconFooterUrl = $_POST['iconFooterUrl'] ?? '';
$bannerImageUrl = $_POST['bannerImageUrl'] ?? '';
$bannerMessage = $_POST['bannerMessage'] ?? '';
$quienesSomosText = $_POST['quienesSomosText'] ?? '';
$quienesSomosImageUrl = $_POST['quienesSomosImageUrl'] ?? '';
$facebookLink = $_POST['facebookLink'] ?? '';
$instagramLink = $_POST['instagramLink'] ?? '';
$youtubeLink = $_POST['youtubeLink'] ?? '';
$address = $_POST['address'] ?? '';
$phone = $_POST['phone'] ?? '';
$email = $_POST['email'] ?? '';

// Construir la consulta SQL dinámica
$setClauses = [];
$params = [];

if ($colorContainer1_3 !== '') {
    $setClauses[] = 'colorContainer1_3 = :colorContainer1_3';
    $params[':colorContainer1_3'] = $colorContainer1_3;
}
if ($colorContainer2_4 !== '') {
    $setClauses[] = 'colorContainer2_4 = :colorContainer2_4';
    $params[':colorContainer2_4'] = $colorContainer2_4;
}
if ($colorFooter !== '') {
    $setClauses[] = 'colorFooter = :colorFooter';
    $params[':colorFooter'] = $colorFooter;
}
if ($iconPrincipalUrl !== '') {
    $setClauses[] = 'iconPrincipalUrl = :iconPrincipalUrl';
    $params[':iconPrincipalUrl'] = $iconPrincipalUrl;
}
if ($iconFooterUrl !== '') {
    $setClauses[] = 'iconFooterUrl = :iconFooterUrl';
    $params[':iconFooterUrl'] = $iconFooterUrl;
}
if ($bannerImageUrl !== '') {
    $setClauses[] = 'bannerImageUrl = :bannerImageUrl';
    $params[':bannerImageUrl'] = $bannerImageUrl;
}
if ($bannerMessage !== '') {
    $setClauses[] = 'bannerMessage = :bannerMessage';
    $params[':bannerMessage'] = $bannerMessage;
}
if ($quienesSomosText !== '') {
    $setClauses[] = 'quienesSomosText = :quienesSomosText';
    $params[':quienesSomosText'] = $quienesSomosText;
}
if ($quienesSomosImageUrl !== '') {
    $setClauses[] = 'quienesSomosImageUrl = :quienesSomosImageUrl';
    $params[':quienesSomosImageUrl'] = $quienesSomosImageUrl;
}
if ($facebookLink !== '') {
    $setClauses[] = 'facebookLink = :facebookLink';
    $params[':facebookLink'] = $facebookLink;
}
if ($instagramLink !== '') {
    $setClauses[] = 'instagramLink = :instagramLink';
    $params[':instagramLink'] = $instagramLink;
}
if ($youtubeLink !== '') {
    $setClauses[] = 'youtubeLink = :youtubeLink';
    $params[':youtubeLink'] = $youtubeLink;
}
if ($address !== '') {
    $setClauses[] = 'address = :address';
    $params[':address'] = $address;
}
if ($phone !== '') {
    $setClauses[] = 'phone = :phone';
    $params[':phone'] = $phone;
}
if ($email !== '') {
    $setClauses[] = 'email = :email';
    $params[':email'] = $email;
}

// Construir la consulta SQL
$sql = "UPDATE personalizacion SET " . implode(', ', $setClauses) . " WHERE id = 1";

try {
    // Preparar y ejecutar la consulta
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    echo "Los cambios se guardaron correctamente.";
} catch (PDOException $e) {
    echo "Error al guardar los cambios: " . $e->getMessage();
}

// Cerrar la conexión
$pdo = null;
?>
