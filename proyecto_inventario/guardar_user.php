<?php 
//conexion a la base de datos
include "conexion.php";
// creacion de variables
$nombre_user = $_POST["nombre_user"];
$apellido_user = $_POST["apellido_user"];
$puesto = $_POST["puesto"];
$email_user = $_POST["email_user"];
$user = $_POST["user"];
$password_user = $_POST["password_user"];
$errores = "";
$nombre_user = strtoupper($nombre_user);
$apellido_user = strtoupper($apellido_user);
$user = strtoupper($user);
//validar inputs
if (!preg_match('/^[a-zA-Z-\s]*$/',$nombre_user))
{
    $errores = "Ingresa un nombre valido";
    //echo "<script>alert('$errores');window.location='registro_user.php';</script>";
    
}
elseif (!preg_match('/^[a-zA-Z-\s]*$/',$apellido_user)) {
     $errores = "Ingresa un apellido válido";
     //echo "<script>alert('$errores');window.location='registro_user.php';</script>";
}
//-------------Validar que no exista un usuario con el mismo nombre-------------------
$statement =$conexion->prepare('SELECT * FROM usuarios WHERE user = :usuario LIMIT 1');
$statement->execute(array(':usuario' => $user));
$resultado = $statement->fetch();
//---------------------------------------------------------------------------------------
if($resultado != false){
    $errores = "El usuario ya existe";
    //echo "<script>alert('$errores');window.location='agregar_prov.php';</script>";
  }else{
      if($errores ==''){
          $statement = $conexion->prepare('INSERT INTO usuarios (id, nombre_user,apellido_user,email_user, user, password_user) VALUES (null, :nombre, :apellido,:email,:usuario,:password)');
          $statement->execute(array(
              ':nombre' => $nombre_user,
              ':apellido' => $apellido_user,
              ':email' => $email_user,
              ':usuario' => $user,
              ':password'=> $password_user
          ));
          echo "<script>alert('Se ha guardado correctamente los datos.'); window.location='registro_user.php';</script>"; 
      }
  }
echo $errores;


?>