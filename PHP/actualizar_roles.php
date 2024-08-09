<?php
session_start();
require 'conexion.php'; // Archivo que contiene la conexión a la base de datos

// Verificar si el usuario está autenticado y tiene privilegios suficientes
// if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'administrador') {
//     header("Location: login.php");
//     exit;
// }

// Obtener todos los usuarios de la base de datos
$stmt = $pdo->query("SELECT id, nombre, usuario, correo, privilegio FROM usuarios");
$usuarios = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Roles</title>
    <link rel="stylesheet" href="/Style/actualizar_roles.css">
</head>
<body>
    <div class="container">
    <button class="close-btn" onclick="window.history.back()">×</button>
        <h1>Actualizar Roles de Usuarios</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Correo</th>
                    <th>Rol Actual</th>
                    <th>Actualizar Rol</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo htmlspecialchars($usuario['id']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['usuario']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['correo']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['privilegio']); ?></td>
                    <td>
                        <form action="/PHP_LOGIC/actualizar_rol.php" method="POST">
                            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($usuario['id']); ?>">
                            <select name="rol">
                                <option value="administrador" <?php if ($usuario['privilegio'] == 'administrador') echo 'selected'; ?>>Administrador</option>
                                <option value="agente de ventas" <?php if ($usuario['privilegio'] == 'agente de ventas') echo 'selected'; ?>>Agente de Ventas</option>
                                <option value="ninguno" <?php if ($usuario['privilegio'] == 'ninguno') echo 'selected'; ?>>Ninguno</option>
                            </select>
                            <button type="submit">Actualizar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
