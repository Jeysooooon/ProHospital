<?php
include("../conexion.php");

$id=$_GET['id'];

$sql="SELECT * FROM especialidad WHERE id_especialidad=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

if(isset($_POST['actualizar'])){

$nombre=$_POST['nombre'];

$sql="UPDATE especialidad SET
nombre_especialidad='$nombre'
WHERE id_especialidad=$id";

mysqli_query($conn,$sql);

header("Location:listar.php");

}
?>

<h2>Editar Especialidad</h2>

<form method="POST">

Nombre de Especialidad

<input type="text" name="nombre" value="<?php echo $row['nombre_especialidad']; ?>">

<br><br>

<button name="actualizar">Actualizar</button>

</form>