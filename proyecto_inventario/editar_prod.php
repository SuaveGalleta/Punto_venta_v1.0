<?php 

include "conexion.php";

$id = $_POST['id'];
$codigo_articulo = $_POST['codigo_articulo'];
$nombre_articulo = $_POST['nombre_articulo'];
$costo = $_POST['costo'];
$proveedor = $_POST['proveedor'];
$articulos_existentes = $_POST['articulos_existentes'];
$errores="";
$nombre_articulo = strtoupper($nombre_articulo);
//validar inputs----
if (!is_numeric($codigo_articulo))
{
    $errores .= " Ingresa un codigo válido";
}
elseif (!preg_match('/^[a-zA-Z-\s]+$/',$nombre_articulo)) {
     $errores .= " Ingresa un nombre válido";
}
if(!is_numeric($costo)){
    $errores .= " Ingresa numeros"; 
}
if(!is_numeric($articulos_existentes))
{
	$errores .= ' Ingresa un numero';
	

}
//consulta
if ($errores =="") {
    $statement =$conexion->prepare('UPDATE productos SET codigo_articulo = :codprod, nombre_articulo = :nomprod, costo = :costo, proveedor = :prov, articulos_existentes = :artexis WHERE id ='.$id);
   $statement->execute(array(
   ':codprod' => $codigo_articulo,
   'nomprod' => $nombre_articulo,
   'costo' => $costo,
   'prov' => $proveedor,
   'artexis' => $articulos_existentes
   ));
    echo "<script>alert('Se han actualizado correctamente los datos.'); window.location='mostrar_productos.php';</script>"; 
} 
else{
    echo "<script>alert('$errores');window.location='mostrar_productos.php';</script>";
}

?>