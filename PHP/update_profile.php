<?php
session_start();
include('conexion.php');

// Obtener el ID del usuario desde la sesión
$userId = $_SESSION['user_id'] ?? null;

if ($userId) {
    // Obtener los datos del usuario
    $stmt = $pdo->prepare("SELECT nombre, telefono, correo, usuario FROM usuarios WHERE id = :id");
    $stmt->execute(['id' => $userId]);
    $user = $stmt->fetch();
} else {
    // Redirigir si no hay ID de usuario
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Perfil</title>
    <link rel="stylesheet" href="/Style/update_profile.css">
</head>
<body>
    
    <div class="container">
    <button class="close-btn" onclick="window.history.back()">×</button>
        <h1>Actualizar Datos Personales</h1>
        <form action="/PHP_LOGIC/update_profile_logic.php" method="POST">
            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($userId); ?>" />
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($user['nombre']); ?>" required />

            <label for="telefono">Teléfono</label>
            <input type="text" id="telefono" name="telefono" value="<?php echo htmlspecialchars($user['telefono']); ?>" required />

            <label for="correo">Correo Electrónico</label>
            <input type="email" id="correo" name="correo" value="<?php echo htmlspecialchars($user['correo']); ?>" required />

            <label for="usuario">Usuario</label>
            <input type="text" id="usuario" name="usuario" value="<?php echo htmlspecialchars($user['usuario']); ?>" required />

            <button type="submit">Actualizar</button>
        </form>
    </div>
</body>
</html>
