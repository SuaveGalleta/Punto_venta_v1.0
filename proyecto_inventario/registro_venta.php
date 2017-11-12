<?php
include "conexion.php";
$total = $_POST['total'];
$nombre = "";
$statement2 =$conexion->prepare('SELECT * FROM guardar_productos');
$statement2->execute();
$resultado1 = $statement2->fetchALL();
foreach ($resultado1 as $row=> $item) {
    
        $producto=$item['nombre_articulo'];
        $costo = $item['costo'];
        $arti = $item['arti'];
        $nombre .= $item['nombre_articulo'];
        
}
$statement =$conexion->prepare("UPDATE productos SET articulos_existentes = :arti where nombre_articulo like '%".$producto."%'");
$statement->execute(array(
      ':arti'=>$arti
     )
     
  );
echo "$nombre";
$statement = $conexion->prepare('INSERT INTO registro_venta (id, nombre_articulo, costo) VALUES (null, :nombre, :costo)');
$statement->execute(array(
    ':nombre' => $nombre,
    ':costo' => $total
));




?>