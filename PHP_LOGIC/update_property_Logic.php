
<?php
session_start();
include('conexion.php');

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['propiedadIdActualizar'];
        $tipo = $_POST['tipoActualizar'];
        $destacada = isset($_POST['destacadaActualizar']) ? 1 : 0;
        $titulo = $_POST['tituloActualizar'];
        $descripcion = $_POST['descripcionActualizar'];
        $precio = $_POST['precioActualizar'];
        $imagen_url = $_POST['imagenActualizar'];

        // Actualizar propiedad existente
        $sql = "UPDATE propiedades 
                SET tipo = :tipo, destacada = :destacada, titulo = :titulo, descripcion = :descripcion, precio = :precio, imagen = :imagen 
                WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':destacada', $destacada, PDO::PARAM_INT);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':imagen', $imagen_url);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "Propiedad actualizada con éxito.";
        } else {
            echo "Error al actualizar la propiedad.";
        }
    }
} catch (PDOException $e) {
    echo "Error en la base de datos: " . $e->getMessage();
}

header('Location: /PHP/post_property.php');
exit;
?>
