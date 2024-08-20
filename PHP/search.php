<?php
include './conexion.php'; // Incluye la conexión a la base de datos

if (isset($_GET['searchQuery'])) {
    $searchQuery = $_GET['searchQuery'];

    // Realiza la consulta a la base de datos
    $stmt = $pdo->prepare("SELECT * FROM propiedades WHERE LOWER(descripcion) LIKE LOWER(:searchQuery)");
    $stmt->execute(['searchQuery' => '%' . $searchQuery . '%']);

    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title> 
    <link rel="stylesheet" href="/Style/search.css">
</head>

<body>
    <div class="containerMain">
        <header class="header">
            <h1>Resultados de Búsqueda</h1>
        </header>
        <section class="results container">
            <?php if (!empty($resultados)) : ?>
                <?php foreach ($resultados as $propiedad) : ?>
                    <div class="card">
                        <img src="<?php echo htmlspecialchars($propiedad['imagen']); ?>" alt="<?php echo htmlspecialchars($propiedad['titulo']); ?>">
                        <div class="card-content">
                            <h2><?php echo htmlspecialchars($propiedad['titulo']); ?></h2>
                            <p><?php echo htmlspecialchars($propiedad['descripcion']); ?></p>
                            <p>Precio: <?php echo htmlspecialchars($propiedad['precio']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No se encontraron resultados para tu búsqueda.</p>
            <?php endif; ?>
        </section>
    </div>
</body>

</html>
