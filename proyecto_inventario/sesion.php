<?php
include "conexion.php";

session_start();
$user = $_POST['user'];
$contra = $_POST['contra'];
$errores = "";

// TRAER USUARIOS DE LA BASE DE DATOS
$statement =$conexion->prepare('SELECT user,password_user FROM usuarios WHERE user = :usuario and password_user = :password');
$statement->execute(array(
    ':usuario' => $user,
    ':password' => $contra
));
$resultado = $statement->fetch();


//vemos si el usuario y contraseña es váildo 
if($resultado != false){
    $_SESSION['username'] = $_POST['user'];
    header ("Location:menu.php");
    
}else{
   $errores = "usuario y/o contraseña incorrectos";
   echo "<script>alert('$errores'); window.location='index.php';</script>";
}

?>
 