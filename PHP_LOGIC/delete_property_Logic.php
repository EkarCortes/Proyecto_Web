<?php
session_start();
include('conexion.php');

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['propiedadIdEliminar'];
        $agente_id = $_SESSION['user_id']; // Obtener el ID del agente desde la sesión

        // Verificar que la propiedad pertenece al agente
        $sql = "SELECT agente_id FROM propiedades WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $propiedad = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($propiedad) {
            if ($propiedad['agente_id'] == $agente_id) {
                // La propiedad pertenece al agente, proceder a eliminar
                $sql = "DELETE FROM propiedades WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    echo "Propiedad eliminada con éxito.";
                } else {
                    echo "Error al eliminar la propiedad.";
                }
            } else {
                echo "No tienes permiso para eliminar esta propiedad.";
            }
        } else {
            echo "Propiedad no encontrada.";
        }
    }
} catch (PDOException $e) {
    echo "Error en la base de datos: " . $e->getMessage();
}

header('Location: /PHP/post_property.php');
exit;
?>
