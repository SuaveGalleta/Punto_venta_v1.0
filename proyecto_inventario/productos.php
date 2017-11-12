<?php 
include "conexion.php";
#-------------------------declaracion de variables----------------------------
$codigoArticulo = $_POST['codigo_articulo'];
$nombreArticulo = $_POST['nombre_articulo'];
$costo = $_POST['costo'];
$proveedor = $_POST['proveedor'];
$articulosExistentes = $_POST['articulos_existentes'];
$nombreArticulo = strtoupper($nombreArticulo);
$errores = "";



#--------------------------validacion de inputs----------------------------
if (!preg_match('/^[a-zA-Z-\s]*$/',$nombreArticulo))
{
    $errores .= ' Ingresa un nombre de articulo valido';
    
}
if(!is_numeric($codigoArticulo))
{
	$errores .= ' Ingresa un numero de articulo valido';
	

}
if(!is_numeric($costo))
{
	$errores .= ' Ingresa un numero';
	

}
if(!is_numeric($articulosExistentes))
{
	$errores .= ' Ingresa un numero';
	

}

#---------------------------validar que no se repitan los nombres de los articulos------------------------------
$statement =$conexion->prepare('SELECT * FROM productos WHERE codigo_articulo = :codigo_art LIMIT 1');
$statement->execute(array(':codigo_art' => $codigoArticulo));
$resultado = $statement->fetch();

if($resultado != false){
  $errores .= ' El codigo del articulo ya existe';
  
}else{
    if($errores ==''){
        $statement = $conexion->prepare('INSERT INTO productos (id, codigo_articulo, nombre_articulo, costo, proveedor,articulos_existentes) VALUES (null, :codigo, :nombre,:costo,:proveedor,:articulosex)');
        $statement->execute(array(
            ':codigo' => $codigoArticulo,
            ':nombre' => $nombreArticulo,
            ':costo' => $costo,
			':proveedor' => $proveedor,
			':articulosex' => $articulosExistentes
        ));
        echo "<script>alert('Se ha guardado correctamente los datos.'); window.location='agregar_prod.php';</script>"; 
    }
    else{
      echo "<script type='text/javascript'>alert('$errores'); window.location='agregar_prod.php';</script>";
    }
}





 ?>