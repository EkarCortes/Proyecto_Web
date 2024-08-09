<!-- login_logic.php -->
<?php
session_start();
require 'conexion.php'; // Archivo que contiene la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['email'];
    $password = $_POST['password'];

    // Consulta para verificar el usuario
    $stmt = $pdo->prepare("SELECT id, nombre, correo, contrasena, privilegio FROM usuarios WHERE correo = :correo");
    $stmt->execute(['correo' => $correo]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['contrasena'])) {
        // Usuario autenticado
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nombre'];
        $_SESSION['user_role'] = $user['privilegio'];

        // Redirigir basado en el rol
        if ($user['privilegio'] == 'administrador') {
            header("Location: /PHP/index_A.php");
        } elseif ($user['privilegio'] == 'agente de ventas') {
            header("Location: /PHP/index_V.php");
        } else {
            header("Location: /PHP/index_U.php");
        }
        exit;
    } else {
        // Error de autenticación
        header("Location: login.php?error=InvalidCredentials");
        exit;
    }
} else {
    // Si no es una solicitud POST, redirigir al login
    header("Location: login.php");
    exit;
}
?>
