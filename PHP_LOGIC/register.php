<!-- register.php -->
<?php
session_start();
require 'conexion.php'; // Archivo que contiene la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    // Asignar "ninguno" por defecto si no se envía un rol
    $rol = isset($_POST['rol']) ? $_POST['rol'] : 'ninguno';

    // Validar que el correo electrónico o el nombre de usuario no estén ya en uso
    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE correo = :correo OR usuario = :usuario");
    $stmt->execute(['correo' => $correo, 'usuario' => $usuario]);
    if ($stmt->rowCount() > 0) {
        // Error: El correo electrónico o el nombre de usuario ya están en uso
        header("Location: register.php?error=EmailOrUsernameExists");
        exit;
    }

    // Encriptar la contraseña
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insertar el nuevo usuario en la base de datos
    $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, telefono, correo, usuario, contrasena, privilegio) VALUES (:nombre, :telefono, :correo, :usuario, :contrasena, :privilegio)");
    $result = $stmt->execute([
        'nombre' => $nombre,
        'telefono' => $telefono,
        'correo' => $correo,
        'usuario' => $usuario,
        'contrasena' => $hashedPassword,
        'privilegio' => $rol
    ]);

    if ($result) {
        // Redirigir al inicio de sesión después de un registro exitoso
        header("Location: /PHP/index_U.php");
        exit;
    } else {
        // Error al registrar el usuario
        header("Location: register.php?error=registrationFailed");
        exit;
    }
} else {
    // Si no es una solicitud POST, redirigir al registro
    header("Location: register.php");
    exit;
}
?>
