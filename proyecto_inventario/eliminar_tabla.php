<?php
include "conexion.php";
$statement =$conexion->prepare("DELETE FROM guardar_productos");
$statement->execute();
header("Location:venta.php");



?>