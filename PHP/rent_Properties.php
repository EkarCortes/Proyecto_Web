<?php
require 'conexion.php';

// Obtener todas las propiedades en alquiler
$rentalProperties = getPropertiesByType($pdo, 'alquiler');

// Función para obtener propiedades por tipo
function getPropertiesByType($pdo, $tipo) {
    $query = "SELECT * FROM propiedades WHERE tipo = :tipo";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':tipo', $tipo);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$sql = "SELECT * FROM personalizacion WHERE id = 1";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar si se obtuvieron datos
if ($data) 
    $colorContainer1_3 = $data['colorContainer1_3'];
    $colorContainer2_4 = $data['colorContainer2_4'];
$pdo = null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propiedades en Alquiler Destacadas</title>
    <link rel="stylesheet" href="/Style/index.css">
    <link rel="stylesheet" href="/Style/properties.css">
    <link rel="stylesheet" href="/Style/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        .container-Properties {
            background-color: <?php echo $colorContainer2_4; ?>;
        }



        .card {
            background-color: <?php echo $colorContainer1_3; ?>;
        }

        .textCard {
            color: <?php echo $colorContainer1_3; ?>;
        }

        .textCard2 {
            color: <?php echo $colorContainer2_4; ?>;
        }
    </style>
</head>
<body>
    <section class="container-Properties textCard" style="width: 100vw; height: 100vh;">
        <h1 style="text-align: center; margin-bottom: 20px;">TODAS LAS PROPIEDADES EN ALQUILER</h1>
        <div class="container">
            <?php foreach ($rentalProperties as $property): ?>
                <div class="card">
                    <img src="<?php echo htmlspecialchars($property['imagen']); ?>" alt="<?php echo htmlspecialchars($property['titulo']); ?>">
                    <h2 class="textCard2"><?php echo htmlspecialchars($property['titulo']); ?></h2>
                    <p class="textCard2"><?php echo htmlspecialchars($property['descripcion']); ?></p>
                    <span class="textCard2">Precio: <?php echo htmlspecialchars($property['precio']); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</body>
</html>
