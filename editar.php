<?php 
include("conexion.php"); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Gestión del Mundo</title>
    <!-- Bootstrap 5 para un diseño moderno -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #1a1d20; }
        .card { border: none; border-radius: 15px; }
        .table-hover tbody tr:hover { background-color: #2c3034; }
        .btn-action { margin-right: 5px; }
    </style>
</head>
<body class="text-light">

    <div class="container mt-5">
        <!-- Encabezado con botón de Crear -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">🌍 Gestión de Países</h1>
            <a href="crear.php" class="btn btn-success btn-lg shadow">
                <i class="bi bi-plus-circle"></i> + Nuevo País
            </a>
        </div>

        <div class="card bg-secondary shadow-lg">
            <div class="card-body p-0">
                <table class="table table-dark table-hover mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th class="ps-4">Código</th>
                            <th>Nombre del País</th>
                            <th>Población</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Consulta sin límite para ver todos, o aumenta el LIMIT si prefieres
                        $res = $conexion->query("SELECT code, name, population FROM country LIMIT 50");
                        
                        if($res->num_rows > 0):
                            while($f = $res->fetch_assoc()): ?>
                            <tr>
                                <td class="ps-4 fw-bold text-info"><?php echo $f['code']; ?></td>
                                <td><?php echo $f['name']; ?></td>
                                <td><?php echo number_format($f['population']); ?></td>
                                <td class="text-center">
                                    <!-- Botón Editar -->
                                    <a href="editar.php?id=<?php echo $f['code']; ?>" 
                                       class="btn btn-sm btn-warning btn-action">Editar</a>
                                    
                                    <!-- Botón Borrar con confirmación -->
                                    <a href="borrar.php?id=<?php echo $f['code']; ?>" 
                                       class="btn btn-sm btn-danger btn-action" 
                                       onclick="return confirm('¿Estás seguro de eliminar a <?php echo $f['name']; ?>?')">
                                       Borrar
                                    </a>
                                </td>
                            </tr>
                        <?php 
                            endwhile; 
                        else: ?>
                            <tr>
                                <td colspan="4" class="text-center p-4">No se encontraron países en la base de datos.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <p class="text-muted mt-3 small text-end">Mostrando los registros de la tabla 'country'.</p>
    </div>

    <!-- Script de Bootstrap (Opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>