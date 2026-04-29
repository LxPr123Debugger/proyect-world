<?php 
include("conexion.php"); 
$id = $_GET['id'];

if(isset($_POST['update'])) {
    $nueva_pob = $_POST['poblacion'];
    // Aquí actúan tus TRIGGERS de la base de datos
    $sql = "UPDATE country SET population = $nueva_pob WHERE code = '$id'";
    
    if($conexion->query($sql)) {
        header("Location: index.php");
    } else {
        $error = $conexion->error;
    }
}

$pais = $conexion->query("SELECT * FROM country WHERE code = '$id'")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light p-5">
    <div class="container col-md-4">
        <div class="card bg-secondary p-4">
            <h3>Editar: <?php echo $pais['Name']; ?></h3>
            <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
            <form method="POST">
                <input type="number" name="poblacion" class="form-control mb-3" value="<?php echo $pais['Population']; ?>">
                <button name="update" class="btn btn-success w-100">Guardar Cambios</button>
                <a href="index.php" class="btn btn-link text-white w-100 mt-2">Cancelar</a>
            </form>
        </div>
    </div>
</body>
</html>