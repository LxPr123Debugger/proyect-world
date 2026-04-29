<?php 
include("conexion.php"); 

if(isset($_POST['save'])) {
    $code = $_POST['code'];
    $name = $_POST['name'];
    $pob = $_POST['poblacion'];
    
    $sql = "INSERT INTO country (Code, Name, Population) VALUES ('$code', '$name', $pob)";
    
    if($conexion->query($sql)) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Error al crear: " . $conexion->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light p-5">
    <div class="container col-md-4">
        <div class="card bg-secondary p-4 shadow">
            <h3 class="mb-4 text-info">Añadir Nuevo País</h3>
            <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
            <form method="POST">
                <input type="text" name="code" class="form-control mb-3" placeholder="Código (ej: COL)" maxlength="3" required>
                <input type="text" name="name" class="form-control mb-3" placeholder="Nombre del País" required>
                <input type="number" name="poblacion" class="form-control mb-3" placeholder="Población" required>
                <button name="save" class="btn btn-primary w-100 mb-2">Registrar País</button>
                <a href="index.php" class="btn btn-outline-light w-100">Volver</a>
            </form>
        </div>
    </div>
</body>
</html>