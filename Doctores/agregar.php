<?php
include("../conexion.php"); // Asegúrate que conexion.php tenga los datos de Railway

if(isset($_POST['guardar'])){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $especialidad = $_POST['especialidad'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $estado = $_POST['estado'];

    // Insertamos en la tabla doctores
    $sql = "INSERT INTO doctores (nombre, apellido, especialidad, telefono, correo, estado) 
            VALUES ('$nombre', '$apellido', '$especialidad', '$telefono', '$correo', '$estado')";

    if(mysqli_query($conn, $sql)){
        header("Location: listar.php"); // Te manda a la lista cuando termina
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agregar Doctor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Registrar Nuevo Doctor</h2>
    <form method="POST" class="card p-4 shadow">
        <label>Nombre:</label>
        <input type="text" name="nombre" class="form-control" required><br>

        <label>Apellido:</label>
        <input type="text" name="apellido" class="form-control" required><br>

        <label>Especialidad:</label>
        <input type="text" name="especialidad" class="form-control" required><br>

        <label>Teléfono:</label>
        <input type="text" name="telefono" class="form-control"><br>

        <label>Correo:</label>
        <input type="email" name="correo" class="form-control"><br>

        <label>Estado:</label>
        <select name="estado" class="form-select">
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
        </select><br>

        <button name="guardar" class="btn btn-success">Guardar Doctor</button>
        <a href="listar.php" class="btn btn-secondary">Volver</a>
    </form>
</body>
</html>