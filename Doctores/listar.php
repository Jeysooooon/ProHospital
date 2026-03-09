<?php
include("../conexion.php");

// 1. Cambiamos la consulta a la tabla 'doctores'
$sql = "SELECT * FROM doctores";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Doctores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <h2>Lista de Doctores</h2>
    <a href="agregar.php" class="btn btn-primary mb-3">Agregar Nuevo Doctor</a>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Especialidad</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td> 
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['apellido']; ?></td>
                <td><?php echo $row['especialidad']; ?></td>
                <td><?php echo $row['telefono']; ?></td>
                <td><?php echo $row['correo']; ?></td>
                <td><?php echo $row['estado']; ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="eliminar.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">Eliminar</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>