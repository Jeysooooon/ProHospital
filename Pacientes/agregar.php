<?php
include("../conexion.php");

if(isset($_POST['guardar'])){

$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$fecha=$_POST['fecha'];
$genero=$_POST['genero'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];

$sql="INSERT INTO pacientes(Telefono,Direccion,Fecha_Nacimiento,Genero,Nombre,Apellido)
VALUES('$telefono','$direccion','$fecha','$genero','$nombre','$apellido')";

mysqli_query($conn,$sql);

header("Location:listar.php");

}
?>

<h2>Agregar Paciente</h2>

<form method="POST">

Nombre<br>
<input type="text" name="nombre"><br>

Apellido<br>
<input type="text" name="apellido"><br>

Telefono<br>
<input type="text" name="telefono"><br>

Direccion<br>
<input type="text" name="direccion"><br>

Fecha Nacimiento<br>
<input type="date" name="fecha"><br>

Genero<br>
<select name="genero">

<option>Masculino</option>
<option>Femenino</option>

</select><br><br>

<button name="guardar">Guardar</button>

</form>