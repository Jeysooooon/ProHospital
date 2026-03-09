<?php

include("../conexion.php");

$id=$_GET['id'];

$sql="DELETE FROM especialidad WHERE id_especialidad=$id";

mysqli_query($conn,$sql);

header("Location:listar.php");

?>