<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión World</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
    <div class="container mt-5">
        <h1 class="text-center text-primary mb-4">🌍 Datos del Mundo</h1>
        <div class="card bg-secondary shadow">
            <div class="card-body">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>País</th>
                            <th>Población</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Nota: usamos 'country' en minúsculas por el cambio que hicimos
                        $res = $conexion->query("SELECT Code, Name, Population FROM country LIMIT 10");
                        while($f = $res->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $f['Code']; ?></td>
                            <td><?php echo $f['Name']; ?></td>
                            <td><?php echo number_format($f['Population']); ?></td>
                            <td><a href="editar.php?id=<?php echo $f['Code']; ?>" class="btn btn-sm btn-warning">Editar</a></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>