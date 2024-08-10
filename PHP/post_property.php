<?php
session_start();
require 'conexion.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$agentId = $_SESSION['user_id'];

// Consultar las propiedades del agente
$stmt = $pdo->prepare("SELECT * FROM propiedades WHERE agente_id = :agentId");
$stmt->execute(['agentId' => $agentId]);
$propiedades = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Propiedades</title>
    <link rel="stylesheet" href="/Style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            background-color: #0A1A2D;
        }
        .container {
            margin-top: 20px;
            width: 100%;
            max-width: auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
            background-color: #ffffff;
        }
        h1 {
            margin-bottom: 20px;
            color: #0A1A2D;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input, select, button {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input:focus, select:focus {
            border-color: #007bff;
            outline: none;
        }
        button {
            background-color: #0A1A2D;
            color: #ffffff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        .form-container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
        }
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 18px;
            cursor: pointer;
            color: #686767;
            border: none;
            background: none;
        }
        .close-btn:hover {
            color: #0A1A2D;
            background-color: white;
        }
        .modal-content {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Gestión de Propiedades</h1>
    
    <div class="mb-4">
        <!-- Botones para abrir los modales -->
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPropiedad">Agregar Propiedad</button>
        <button class="btn btn-danger" data-toggle="modal" data-target="#modalEliminarPropiedad">Eliminar Propiedad</button>
        <button class="btn btn-warning" data-toggle="modal" data-target="#modalActualizarPropiedad">Actualizar Propiedad</button>
    </div>
    
    <!-- Tabla para mostrar las propiedades -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Destacada</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($propiedades as $propiedad): ?>
                <tr>
                    <td><?= htmlspecialchars($propiedad['id']) ?></td>
                    <td><?= htmlspecialchars($propiedad['tipo']) ?></td>
                    <td><?= htmlspecialchars($propiedad['destacada'] ? 'Sí' : 'No') ?></td>
                    <td><?= htmlspecialchars($propiedad['titulo']) ?></td>
                    <td><?= htmlspecialchars($propiedad['descripcion']) ?></td>
                    <td><?= htmlspecialchars($propiedad['precio']) ?></td>
                    <td><img src="<?= htmlspecialchars($propiedad['imagen']) ?>" alt="Imagen Propiedad" style="width: 100px; height: auto;"></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal Agregar Propiedad -->
<div id="modalAgregarPropiedad" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Propiedad</h5>
                <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/PHP_LOGIC/property_Logic.php" method="POST">
                    <div class="form-group">
                        <label for="tipo">Tipo:</label>
                        <select name="tipo" id="tipo" class="form-control" required>
                            <option value="venta">Venta</option>
                            <option value="alquiler">Alquiler</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="destacada">Destacada:</label>
                        <input type="checkbox" name="destacada" id="destacada">
                    </div>
                    <div class="form-group">
                        <label for="titulo">Título:</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="number" name="precio" id="precio" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="imagen">URL de la Imagen:</label>
                        <input type="text" name="imagen" id="imagen" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar Propiedad</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Eliminar Propiedad -->
<div id="modalEliminarPropiedad" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar Propiedad</h5>
                <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/PHP_LOGIC/delete_property_Logic.php"  method="POST">
                    <div class="form-group">
                        <label for="propiedadIdEliminar">ID de la Propiedad:</label>
                        <input type="number" name="propiedadIdEliminar" id="propiedadIdEliminar" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Eliminar Propiedad</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Actualizar Propiedad -->
<div id="modalActualizarPropiedad" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Actualizar Propiedad</h5>
                <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/PHP_LOGIC/update_property_Logic.php"  method="POST">
                    <div class="form-group">
                        <label for="propiedadIdActualizar">ID de la Propiedad:</label>
                        <input type="number" name="propiedadIdActualizar" id="propiedadIdActualizar" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tipoActualizar">Tipo:</label>
                        <select name="tipoActualizar" id="tipoActualizar" class="form-control" >
                            <option value="venta">Venta</option>
                            <option value="alquiler">Alquiler</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="destacadaActualizar">Destacada:</label>
                        <input type="checkbox" name="destacadaActualizar" id="destacadaActualizar">
                    </div>
                    <div class="form-group">
                        <label for="tituloActualizar">Título:</label>
                        <input type="text" name="tituloActualizar" id="tituloActualizar" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="descripcionActualizar">Descripción:</label>
                        <textarea name="descripcionActualizar" id="descripcionActualizar" class="form-control" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="precioActualizar">Precio:</label>
                        <input type="number" name="precioActualizar" id="precioActualizar" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="imagenActualizar">URL de la Imagen:</label>
                        <input type="text" name="imagenActualizar" id="imagenActualizar" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-warning">Actualizar Propiedad</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
