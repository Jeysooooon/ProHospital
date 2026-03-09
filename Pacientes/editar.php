<?php
include("../conexion.php");

$id=$_GET['id'];

$sql="SELECT * FROM pacientes WHERE id_Pacientes=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

if(isset($_POST['actualizar'])){

$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$fecha=$_POST['fecha'];
$genero=$_POST['genero'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];

$sql="UPDATE pacientes SET

Telefono='$telefono',
Direccion='$direccion',
Fecha_Nacimiento='$fecha',
Genero='$genero',
Nombre='$nombre',
Apellido='$apellido'

WHERE id_Pacientes=$id";

mysqli_query($conn,$sql);

header("Location:listar.php");

}
?>

<h2>Editar Paciente</h2>

<form method="POST">

Nombre<br>
<input type="text" name="nombre" value="<?php echo $row['Nombre']; ?>"><br>

Apellido<br>
<input type="text" name="apellido" value="<?php echo $row['Apellido']; ?>"><br>

Telefono<br>
<input type="text" name="telefono" value="<?php echo $row['Telefono']; ?>"><br>

Direccion<br>
<input type="text" name="direccion" value="<?php echo $row['Direccion']; ?>"><br>

Fecha Nacimiento<br>
<input type="date" name="fecha" value="<?php echo $row['Fecha_Nacimiento']; ?>"><br>

Genero<br>
<input type="text" name="genero" value="<?php echo $row['Genero']; ?>"><br>

<button name="actualizar">Actualizar</button>

</form>