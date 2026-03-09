<?php
include("../conexion.php");

$sql="SELECT * FROM especialidad";
$result=mysqli_query($conn,$sql);
?>

<h2>Lista de Especialidades</h2>

<a href="agregar.php">Agregar Especialidad</a>

<table border="1">

<tr>
<th>ID</th>
<th>Especialidad</th>
<th>Acciones</th>
</tr>

<?php
while($row=mysqli_fetch_array($result)){
?>

<tr>

<td><?php echo $row['id_especialidad']; ?></td>
<td><?php echo $row['nombre_especialidad']; ?></td>

<td>

<a href="editar.php?id=<?php echo $row['id_especialidad']; ?>">Editar</a>

<a href="eliminar.php?id=<?php echo $row['id_especialidad']; ?>">Eliminar</a>

</td>

</tr>

<?php } ?>

</table>