
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Log_in </title>
	<link rel="stylesheet" href="style.css"
</head>
<body>
	<div class="centro">
		<form action="sesion.php" method="post" class="uno">
			<h2 class="hola">LOG IN</h2>
			<br><br>
			<input class="espacios" type="text" name="user" id="" required="" placeholder="USUARIO" value="<?php if(isset($_POST['user'])){
				echo $_POST["user"];
			}
				
			 ?>"><br><br>
			<input class="espacios" type="password" name="contra" id="" required="" placeholder="CONTRASEÑA">
			<br><br>
			<input type="submit" value="Iniciar Sesion" class="boton" style="cursor:pointer;">
		</form>
		<div class="crear">
		    <br>
		    <span class="bye">¿No Tienes una Cuenta?</span><br><br><br>
			<a href="registro_user.php" class="hello">CREAR CUENTA</a>
		</div>
	</div>
</body>
</html>