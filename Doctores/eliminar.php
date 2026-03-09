<?php
// 1. Incluimos la conexión
include("../conexion.php");

// 2. Capturamos el ID que viene desde el botón "Eliminar" de listar.php
$id = $_GET['id'];

// 3. Cambiamos la tabla a 'doctores' y la columna a 'id'
$sql = "DELETE FROM doctores WHERE id = $id";

// 4. Ejecutamos la orden
mysqli_query($conn, $sql);

// 5. Regresamos a la lista para ver que ya no está
header("Location: listar.php");
?>