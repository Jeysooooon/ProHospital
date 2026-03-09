<?php
include("../conexion.php");

$sql="SELECT * FROM pacientes";
$result=mysqli_query($conn,$sql);
?>

<h2>Lista de Pacientes</h2>

<a href="agregar.php">Agregar Paciente</a>

<table border="1">

<tr>

<th>ID</th>
<th>Nombre</th>
<th>Apellido</th>
<th>Telefono</th>
<th>Direccion</th>
<th>Fecha Nacimiento</th>
<th>Genero</th>
<th>Acciones</th>

</tr>

<?php
while($row=mysqli_fetch_array($result)){
?>

<tr>

<td><?php echo $row['id_Pacientes']; ?></td>
<td><?php echo $row['Nombre']; ?></td>
<td><?php echo $row['Apellido']; ?></td>
<td><?php echo $row['Telefono']; ?></td>
<td><?php echo $row['Direccion']; ?></td>
<td><?php echo $row['Fecha_Nacimiento']; ?></td>
<td><?php echo $row['Genero']; ?></td>

<td>

<a href="editar.php?id=<?php echo $row['id_Pacientes']; ?>">Editar</a>

<a href="eliminar.php?id=<?php echo $row['id_Pacientes']; ?>">Eliminar</a>

</td>

</tr>

<?php } ?>

</table>