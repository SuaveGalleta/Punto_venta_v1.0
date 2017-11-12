<?php
 session_start();
  if(empty($_SESSION['username'])){
    header('Location:index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>AGREGAR PROVEEDOR</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="centro2">
	<div class="fecha">
		<p class="admin">BIENVENIDO <?php echo(strtoupper($_SESSION['username']));  ?></p>
	    <p class="admin">TIENDA DE ABARROTES YOLI</p>
	    <div class="fecha2">
	    	<a class="teclado2" href="cerrar.php">CERRAR SESION</a>

	    </div>
	</div>
	<div class="opciones">
	    <ul>
	    	<li class="mochila"><a class="teclado" href="menu.php"><img width="50px" src="img/ic_home_white_48dp.png" alt=""> INICIO</a></li>
	    	<li class="mochila"><a class="teclado" href="agregar_prov.php"><img width="50px" src="img/ic_person_add_white_48dp.png" alt="">AGREGAR PROVEEDOR</a></li>
	    	<li class="mochila"><a class="teclado" href="mostrar_proveedores.php"><img width="50px" src="img/ic_person_white_48dp.png" alt="">PROVEEDORES</a></li>
	    	<li class="mochila"><a class="teclado" href="agregar_prod.php"><img width="50px" src="img/ic_create_white_48dp.png" alt="">AGREGAR ARTICULO</a></li>
	    	<li class="mochila"><a class="teclado" href="mostrar_productos.php"><img width="50px" src="img/ic_content_paste_white_48dp.png" alt="">ARTICULOS</a></li>
	    	<li class="mochila"><a class="teclado" href="venta.php"><img width="50px" src="img/ic_shopping_cart_white_48dp.png" alt="">VENTA</a></li>
	    </ul>
	</div>
	<?php 
     include "conexion.php";
     if (isset($_GET['editar'])) {
	  $id = $_GET['id'];
     }
     $statement =$conexion->prepare('SELECT * FROM proveedores WHERE id = :id');
     $statement->execute(array(':id'=> $id));
     $resultado = $statement->fetch();


	 ?>

	<div class="formularios">
	 <img  class="imagen3" src="img/ic_person_add_white_48dp.png" alt=""><h2 class="titulo">Actualizar Proveedor</h2>
		<form action="editar_prov.php" method="post" name=proveedor>
			<table>
				<tr>
					
					<td colspan="2" class="der"><input class="grande" type="text" name="nombreprov" id="" required="" placeholder="Nombre del Proveedor" value="<?php echo $resultado['nom_prov']; ?>"></td>
				</tr>
				<tr>
					<td class="der"><input class="grande" type="email" name="emailprov" id="" required="" placeholder="Email del Proveedor" value="<?php echo $resultado['email_prov']; ?>"></td>
					<td class="der"><input class="grande" type="tel" name="telprov" id="" required="" placeholder="Telefono del Proveedor" value="<?php echo $resultado['tel_prov']; ?>"></td>
				</tr>
				<tr>
					<td colspan="2" class="der" ><input id="uni" class="grande" type="text" name="dirprov" id="" required="" placeholder="Direccion del Proveedor" value="<?php echo $resultado['dir_prov']; ?>"></td>
				</tr>
				<tr>
					<td class="der"><input class="referencia" type="button" onclick="proveedor.submit()" value="Actualizar" style="cursor: pointer;"><input type="hidden" value="<?php echo $_GET['id']; ?>" name="id"></td>
					<td class="der"><input class="referencia" type="reset" value="Borrar" style="cursor: pointer;"></td>
				</tr>
			</table>
			
		</form>
	</div>

</div>
	
</body>
</html>