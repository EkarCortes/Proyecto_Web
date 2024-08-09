<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
   <link rel="stylesheet" href="/Style/crear_usuarios.css">
</head>
<body>
    <div class="container">
    <button class="close-btn" onclick="window.history.back()">×</button>
        <div class="form-container">
            <h1>Crear Usuario</h1>
            <form action="/PHP_LOGIC/registerA.php" method="POST">
                <input type="text" name="nombre" placeholder="Nombre" required />
                <input type="text" name="telefono" placeholder="Teléfono" required />
                <input type="email" name="correo" placeholder="Correo Electrónico" required />
                <input type="text" name="usuario" placeholder="Usuario" required />
                <input type="password" name="password" placeholder="Contraseña" required />
                
                <!-- Campo para asignar rol -->
                <select name="rol" required>
                    <option value="">Asignar un rol</option>
                    <option value="administrador">Administrador</option>
                    <option value="agente de ventas">Agente de Ventas</option>
                    <option value="ninguno">Ninguno</option>
                </select>

                <button type="submit">Registrarse</button>
            </form>
        </div>
    </div>
</body>
</html>
