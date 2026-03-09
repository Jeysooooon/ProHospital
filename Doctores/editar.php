<?php
include("../conexion.php");

// 1. Obtenemos el ID del doctor a editar
$id = $_GET['id'];

// 2. Buscamos los datos actuales de ese doctor
$sql = "SELECT * FROM doctores WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if(isset($_POST['actualizar'])){
    // 3. Recogemos los nuevos datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $especialidad = $_POST['especialidad'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $estado = $_POST['estado'];

    // 4. Actualizamos la tabla doctores
    $sql = "UPDATE doctores SET 
            nombre='$nombre', 
            apellido='$apellido', 
            especialidad='$especialidad', 
            telefono='$telefono', 
            correo='$correo', 
            estado='$estado' 
            WHERE id = $id";

    mysqli_query($conn, $sql);

    // 5. Redirigimos a la lista
    header("Location: listar.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Doctor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <div class="card p-4 shadow">
        <h2>Editar Datos del Doctor</h2>
        <hr>
        <form method="POST">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $row['nombre']; ?>"><br>

            <label>Apellido:</label>
            <input type="text" name="apellido" class="form-control" value="<?php echo $row['apellido']; ?>"><br>

            <label>Especialidad:</label>
            <input type="text" name="especialidad" class="form-control" value="<?php echo $row['especialidad']; ?>"><br>

            <label>Teléfono:</label>
            <input type="text" name="telefono" class="form-control" value="<?php echo $row['telefono']; ?>"><br>

            <label>Correo:</label>
            <input type="email" name="correo" class="form-control" value="<?php echo $row['correo']; ?>"><br>

            <label>Estado:</label>
            <select name="estado" class="form-select">