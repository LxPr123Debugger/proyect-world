<?php 
include("conexion.php"); 
$id = $_GET['id'];

// Si se presiona el botón Guardar
if(isset($_POST['update'])) {
    $nueva_pob = $_POST['poblacion'];
    $sql = "UPDATE country SET population = $nueva_pob WHERE code = '$id'";
    
    if($conexion->query($sql)) {
        header("Location: index.php");
    } else {
        $error = $conexion->error;
    }
}

// Obtener datos del país actual
$pais = $conexion->query("SELECT * FROM country WHERE code = '$id'")->fetch_assoc();
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
            <h3 class="mb-4">Editar Población: <br><span class="text-info"><?php echo $pais['name']; ?></span></h3>
            
            <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
            
            <form method="POST">
                <label class="form-label">Nueva Población:</label>
                <input type="number" name="poblacion" class="form-control mb-3" value="<?php echo $pais['population']; ?>" required>
                
                <button name="update" class="btn btn-success w-100 mb-2">Guardar Cambios</button>
                <a href="index.php" class="btn btn-outline-light w-100">Cancelar</a>
            </form>
        </div>
    </div>
</body>
</html>