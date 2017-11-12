<?php
include "conexion.php";

$nombreprov = $_POST["nombreprov"];
$emailprov = $_POST["emailprov"];
$telprov = $_POST["telprov"];
$dirprov = $_POST["dirprov"];
$errores = "";
$nombreprov = strtoupper($nombreprov);


//validar inputs----
if (!preg_match("/^[0-9]{10}|^[0-9]{7}$/",$telprov))
{
    $errores .= ' Ingresa un telefono válido';
}
if (!preg_match("|^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$|",$nombreprov)) {
     $errores .= ' Ingresa un nombre válido';
}
//--------Validar que no exista un nombre provedor con el mismo nombre------

$statement =$conexion->prepare('SELECT * FROM proveedores WHERE nom_prov = :nombreproveedor LIMIT 1');
$statement->execute(array(':nombreproveedor' => $nombreprov));
$resultado = $statement->fetch();

if($resultado != false){
  $errores .= ' El proveedor ya existe';
  
}else{
    if($errores ==''){
        $statement = $conexion->prepare('INSERT INTO proveedores (id, nom_prov,	email_prov,tel_prov, dir_prov) VALUES (null, :nombre, :email,:telefono,:direccion)');
        $statement->execute(array(
            ':nombre' => $nombreprov,
            ':email' => $emailprov,
            ':telefono' => $telprov,
            ':direccion' => $dirprov
        ));
        echo "<script>alert('Se ha guardado correctamente los datos.'); window.location='agregar_prov.php';</script>"; 
    }
    else{
      echo "<script type='text/javascript'>alert('$errores'); window.location='agregar_prov.php';</script>";
    }
}



?>