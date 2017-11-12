<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro de Usuarios</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="centro">
		<form action="guardar_user.php"  method="post" class="bonito">
			<p class="reg">Registrarse</p>
			<p class="intru">Favor de llenar las casillas con su Informacion Personal</p>
			<br>
			<table>
				<tr>
					<td class="sepa"><input type="text" name="nombre_user" id="" placeholder="Nombre(s)" class="grande"></td>
					<td class="sepa"><input type="text" name="apellido_user" id="" placeholder="Apellido(s)" class="grande"></td>
				</tr>
				<tr>
					<td colspan="2" class="sepa"><input type="text" name="puesto" id="" placeholder="Puesto" class="grande"></td>
				</tr>
				<tr>
					<td colspan="2" class="sepa"><input class="grande" type="email" name="email_user" id="" placeholder="Correo Electronico"></td>
				</tr>
				<tr>
					<td class="sepa"><input class="grande" type="text" name="user" id="" placeholder="Usuario"></td>
					<td class="sepa"><input type="password" name="password_user" id="" placeholder="Password" class="grande"></td>
				</tr>
				<tr>
					<td class="sepa2"><input type="submit" value="Guardar" class="bot" style="cursor: pointer;"></td>
					<td class="sepa2"><a class="bot" href="index.php">Log In</a></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>