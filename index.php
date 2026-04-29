<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Control - Mundo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
    <div class="container mt-5">
        <h1 class="text-center text-primary mb-4">🌍 Gestión de Países</h1>
        <div class="card bg-secondary shadow">
            <div class="card-body">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Población</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Consulta a la tabla 'country'
                        $res = $conexion->query("SELECT code, name, population FROM country");
                        while($f = $res->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $f['code']; ?></td>
                            <td><?php echo $f['name']; ?></td>
                            <td><?php echo number_format($f['population']); ?></td>
                            <td>
                                <a href="editar.php?id=<?php echo $f['code']; ?>" class="btn btn-sm btn-warning">Editar</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>