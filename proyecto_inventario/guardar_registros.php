<?php
include "conexion.php";
//--------si esta seleccionado un producto trae la info de solo es proctudo y se le resta 1 al stock del inventario y
//se actualizan tablas
if(isset($_POST['producto'])){
    $producto = $_POST['producto'];
    $statement =$conexion->prepare("SELECT * FROM productos where nombre_articulo like '%".$producto."%'");
    $statement->execute();
    $resultado = $statement->fetchAll();
    foreach ($resultado as $row=> $item) {
     $costo = $item['costo'];
     $productos = $item['nombre_articulo'];
     $resta=$item['articulos_existentes']-1;
     $arti = $resta;
     $statement =$conexion->prepare("UPDATE productos SET articulos_existentes = :arti where nombre_articulo like '%".$producto."%'");
     $statement->execute(array(
         ':arti'=>$arti
     )
     
     );
     
    
     
  
    
   }
   
 
   
   $statement = $conexion->prepare('INSERT INTO guardar_productos (id, nombre_articulo, costo, arti) VALUES (null, :nombre, :costo, :arti)');
   $statement->execute(array(
       ':nombre' => $productos,
       ':costo' => $costo,
       ':arti' => $arti
   ));
   //si el stock es igual a 5 manda mensaje de solicitar mas producto
   if($resta==5){
    echo "<script type='text/javascript'>alert('solicite mas articulos de $producto al proveedor'); window.location='venta.php';</script>";
   }
   else{header("Location:venta.php");}
   
  
}

  


?>