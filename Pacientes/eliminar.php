<?php

include("../conexion.php");

$id=$_GET['id'];

$sql="DELETE FROM pacientes WHERE id_Pacientes=$id";

mysqli_query($conn,$sql);

header("Location:listar.php");

?>