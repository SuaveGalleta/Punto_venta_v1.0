<?php 

  include "conexion.php";

   $id=$_POST['id'];
   $nombreprov=$_POST['nombreprov'];
   $emailprov =$_POST['emailprov'];
   $telprov = $_POST['telprov'];
   $dirprov =$_POST['dirprov'];
   $errores = "";
$nombreprov = strtoupper($nombreprov);


//validar inputs----
if (!preg_match("/^[0-9]{10}|^[0-9]{7}$/",$telprov))
{
    $errores .= " Ingresa un telefono válido";
}
elseif (!preg_match('/^[a-zA-Z-\s]+$/',$nombreprov)) {
     $errores .= " Ingresa un nombre válido";
}

if ($errores =="") {
 	$statement =$conexion->prepare('UPDATE proveedores SET nom_prov = :nombreprov, email_prov = :emailprov, tel_prov = :telprov, dir_prov = :dirprov WHERE id ='.$id);
    $statement->execute(array(
    ':nombreprov' => $nombreprov,
    'emailprov' => $emailprov,
    'telprov' => $telprov,
    'dirprov' => $dirprov
    ));
     echo "<script>alert('Se han actualizado correctamente los datos.'); window.location='mostrar_proveedores.php';</script>"; 
 } 
 else{
 	echo "<script>alert('$errores');window.location='mostrar_proveedores.php';</script>";
 }




 ?>