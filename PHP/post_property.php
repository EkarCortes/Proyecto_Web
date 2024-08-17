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
    <link rel="stylesheet" href="/Style/post_property.css">
</head>
<body>
<div class="container">
<button class="close-btn" onclick="window.history.back()">×</button>

    <h1>Gestión de Propiedades</h1>
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
    <div class="mb-4">
        <!-- Botones para abrir los modales -->
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPropiedad">Agregar</button>
        <button class="btn btn-danger" data-toggle="modal" data-target="#modalEliminarPropiedad">Eliminar</button>
        <button class="btn btn-warning" data-toggle="modal" data-target="#modalActualizarPropiedad">Actualizar</button>
    </div>
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
                    <button type="submit" class="btn btn-warning actuali">Actualizar</button>
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
