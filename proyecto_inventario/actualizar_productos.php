<?php
session_start();
if(empty($_SESSION['username'])){
header('Location:index.php');
}
include "conexion.php";
		$statement =$conexion->prepare('SELECT * FROM proveedores order by id asc');
$statement->execute();
$resultado = $statement->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>ACTUALIZAR PRODUCTO</title>
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
			<div class="formularios">
				<img  class="imagen3" src="img/ic_create_white_48dp.png" alt=""><h2 class="titulo">Actualizar Articulo</h2>
				<?php 
                  include "conexion.php";
                   if (isset($_GET['editar'])) {
	               $id = $_GET['id'];
                   }
                   $statement =$conexion->prepare('SELECT * FROM productos WHERE id = :id');
                   $statement->execute(array(':id'=> $id));
                   $resultado = $statement->fetch();


	            ?>
				
				<form action="editar_prod.php" method="post">
					<table>
						<tr>
							
							<td class="der"><input class="grande" type="text" name="codigo_articulo" id="" required="" placeholder="Codigo del Articulo" value="<?php echo $resultado['codigo_articulo']; ?>"></td>
							<td class="der"><input class="grande" type="text" name="nombre_articulo" id="" required="" placeholder="Nombre del Articulo" value="<?php echo $resultado['nombre_articulo']; ?>"></td>
						</tr>
						<tr>
							<td class="der"><input class="grande" type="text" name="costo" id="" required="" placeholder="Costo" value="<?php echo $resultado['costo']; ?>"></td>
							
							<td class="der"><select class="grande" name="proveedor" id="">
								<option value="<?php  echo $resultado['proveedor']; ?>"><?php  echo $resultado['proveedor']; ?></option>
								<?php 
                                  $statement2 =$conexion->prepare('SELECT nom_prov FROM proveedores');
                                  $statement2->execute();
                                  $resultado2 = $statement2->fetchALL();
                                   foreach ($resultado2 as $row=> $item) {
                                    echo"<option value=".$item["nom_prov"].">".$item["nom_prov"]."</option>";

                                  }
								 ?>
							</select></td>
						</tr>
						<tr>
							<td colspan="2" class="der" ><input class="grande" type="text" name="articulos_existentes" id="" required="" placeholder="Articulos Existentes" value="<?php echo $resultado['articulos_existentes'] ?>"></td>
							
						</tr>
						<tr>
							<td class="der"><input class="referencia" type="submit" value="Actualizar" style="cursor: pointer;"></td>
							<input type="hidden" value="<?php echo $_GET['id']; ?>" name="id">
							<td class="der"><input class="referencia" type="reset" value="Borrar" style="cursor: pointer;"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		
	</body>
</html>