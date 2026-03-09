<?php
include("../conexion.php");

if(isset($_POST['guardar'])){

$nombre=$_POST['nombre'];

$sql="INSERT INTO especialidad(nombre_especialidad)
VALUES('$nombre')";

mysqli_query($conn,$sql);

header("Location:listar.php");

}
?>

<h2>Agregar Especialidad</h2>

<form method="POST">

Nombre de Especialidad

<input type="text" name="nombre" required>

<br><br>

<button name="guardar">Guardar</button>

</form>