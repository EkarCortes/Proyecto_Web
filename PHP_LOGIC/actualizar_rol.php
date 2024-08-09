<?php
session_start();
require 'conexion.php'; // Archivo que contiene la conexión a la base de datos

// Verificar si el usuario está autenticado y tiene privilegios suficientes
// if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'administrador') {
//     header("Location: login.php");
//     exit;
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $nuevo_rol = $_POST['rol'];

    // Validar que el rol es uno de los permitidos
    $roles_permitidos = ['administrador', 'agente de ventas', 'ninguno'];
    if (!in_array($nuevo_rol, $roles_permitidos)) {
        header("Location: Actualizar_roles.php?error=InvalidRole");
        exit;
    }

    // Actualizar el rol del usuario en la base de datos
    $stmt = $pdo->prepare("UPDATE usuarios SET privilegio = :rol WHERE id = :user_id");
    $result = $stmt->execute([
        'rol' => $nuevo_rol,
        'user_id' => $user_id
    ]);

    if ($result) {
        // Redirigir con éxito
        header("Location: /PHP/Actualizar_roles.php?success=RoleUpdated");
        exit;
    } else {
        // Redirigir con error
        header("Location: Actualizar_roles.php?error=UpdateFailed");
        exit;
    }
} else {
    // Si no es una solicitud POST, redirigir a la página de actualización de roles
    header("Location: Actualizar_roles.php");
    exit;
}
?>
