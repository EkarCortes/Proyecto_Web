<?php
// Iniciar sesión si es necesario
session_start();

// Incluir la conexión a la base de datos
include('conexion.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$agentId = $_SESSION['user_id'];

try {
    // Verificar si el formulario ha sido enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los datos del formulario
        $tipo = $_POST['tipo'];
        $destacada = isset($_POST['destacada']) ? 1 : 0;
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $agente_id = $agentId;
        $imagen_url = $_POST['imagen']; // Capturamos la URL de la imagen

        // Insertar nueva propiedad
        $sql = "INSERT INTO propiedades (tipo, destacada, titulo, descripcion, precio, agente_id, imagen) 
                VALUES (:tipo, :destacada, :titulo, :descripcion, :precio, :agente_id, :imagen)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':destacada', $destacada, PDO::PARAM_INT);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':agente_id', $agente_id, PDO::PARAM_INT);
        $stmt->bindParam(':imagen', $imagen_url);

        if ($stmt->execute()) {
            echo "Propiedad agregada con éxito.";
        } else {
            echo "Error al agregar la propiedad.";
        }
    }
} catch (PDOException $e) {
    echo "Error en la base de datos: " . $e->getMessage();
}

// Redirigir a la página de gestión de propiedades
header('Location: /PHP/post_property.php');  //CAMBIAR A LA PÁGINA CORRECTA
exit;
?>
