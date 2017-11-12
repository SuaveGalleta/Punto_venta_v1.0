<?php 
include "conexion.php";
$id = $_GET['id'];
echo ($confirma = "<script>javascript:confirm('Esta seguro de que quiere eliminar el registro?');</script>"
);

if ($confirma == true) {
	$statement =$conexion->prepare("DELETE FROM proveedores WHERE id=".$id);
    $statement->execute();

    if (!$statement) {
    	echo("<script>javascript:alert('Error al eliminar el registro!');window.location='mostrar_proveedores.php';</script>");
    }
    else{
    	 echo("<script>javascript:alert('Se ha eliminado el registro correctamente!');window.location='mostrar_proveedores.php';</script>");
    }
}
else{
	header('Location:mostrar_proveedores.php');
}








 ?>