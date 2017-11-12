<?php
include "conexion.php";
$id = $_GET['id'];


	$statement =$conexion->prepare("DELETE FROM guardar_productos WHERE id=".$id);
    $statement->execute();
    header("Location:venta.php");









?>

