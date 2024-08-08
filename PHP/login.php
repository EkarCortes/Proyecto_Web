<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/Style/login.css">
</head>
<body>
    
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="/PHP_LOGIC/register.php" method="POST">
            <h1>Crear Cuenta</h1>
            <input type="text" name="nombre" placeholder="Nombre" required />
            <input type="text" name="telefono" placeholder="Teléfono" required />
            <input type="email" name="correo" placeholder="Correo Electrónico" required />
            <input type="text" name="usuario" placeholder="Usuario" required />
            <input type="password" name="password" placeholder="Contraseña" required />
            <button type="submit">Registrarse</button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form action="/PHP_LOGIC/login_Logic.php" method="POST">
            <h1>Inicio de Sesión</h1>
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Contraseña" required />
            <button type="submit">Iniciar sesión</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Bienvenido!</h1>
                <p>Desea iniciar sesión?</p>
                <button class="ghost" id="signIn">Inicio de sesión</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Bienvenido</h1>
                <p>Desea registrarse?</p>
                <button class="ghost" id="signUp">Registrarse</button>
            </div>
        </div>
    </div>
</div>

<script src="/JS/login.js"></script>
    
</body>
</html>
