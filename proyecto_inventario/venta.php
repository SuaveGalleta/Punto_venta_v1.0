<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ventas</title>
</head>
<body>
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
    <title>MENU</title>
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
          <li class="mochila"><a class="teclado" href="agregar_prov.php"> <img width="50px" src="img/ic_person_add_white_48dp.png" alt="">AGREGAR PROVEEDOR</a></li>
          <li class="mochila"><a class="teclado" href="mostrar_proveedores.php"><img width="50px" src="img/ic_person_white_48dp.png" alt="">PROVEEDORES</a></li>
          <li class="mochila"><a class="teclado" href="agregar_prod.php"><img width="50px" src="img/ic_create_white_48dp.png" alt="">AGREGAR ARTICULO</a></li>
          <li class="mochila"><a class="teclado" href="mostrar_productos.php"><img width="50px" src="img/ic_content_paste_white_48dp.png" alt="">ARTICULOS</a></li>
          <li class="mochila"><a class="teclado" href="venta.php"><img width="50px" src="img/ic_shopping_cart_white_48dp.png" alt="">VENTA</a></li>
        </ul>
      </div>
      <div class="inicio">
      <div class="formularios">
      <img  class="imagen3" src="img/ic_shopping_cart_white_48dp.png" alt=""><h2 class="titulo">Venta</h2>
      <form method="post" action="guardar_registros.php" name="Products">
      <?php 
       include "conexion.php";
       $statement =$conexion->prepare('SELECT * FROM productos order by id asc');
       $statement->execute();
       $resultado = $statement->fetchAll();
       
      
      ?>
       <table>
           <tr>
               <td><select name="producto" id="">
               <option value="productos">Productos</option>
								<?php
								foreach ($resultado as $row=> $item) {
                echo"<option value=".$item["nombre_articulo"].">".$item["nombre_articulo"]."</option>";
               
                
                }
                 
                 
                
                
                
								?>               
               
               </select></td>
               
                            
               <td><input type="submit" value="Agregar"></td> 
               <td><a href="eliminar_tabla.php">Nuevo</a></td>              
           </tr>
       </table>
       
       
      </form>
      
         
      
      <table>
      <tr>
        
        <td>Nombre</td>
        <td>Costo</td>
        <td>Articulos Existentes</td>
        <td></td>
        
      </tr>
      <?php
      //---------------mostrar elementos y hacer sumas de costos
      $suma=0;
      
      $statement2 =$conexion->prepare('SELECT * FROM guardar_productos');
      $statement2->execute();
      $resultado1 = $statement2->fetchALL();
      ?>
      <?php
							foreach ($resultado1 as $row=> $item) {
                  echo"<tr>";
                   echo"<td>".$item['nombre_articulo']."</td>";
                   echo"<td>".$item['costo']."</td>"; 
                   echo"<td>".$item['arti']."</td>"; 
                   echo"<td><a href=eliminar_reg.php?id=".$item['id'].">Eliminar</a></td>";
                   $suma += $item['costo'];
                 
                       
                }
                echo"<tr>";
                echo"<td>Total: </td>";
                echo"<td>$suma</td>";
                
                
                echo"</tr>";

                
                 
      ?>
      
      </table>
      <form action="registro_venta.php" method="post">
      <?php
     //-------------traer informacion de la suma para poder guardarla
    
      echo"<input type='hidden' value=$suma name='total'>";

      ?>
      
      <input type="submit" value="Vender">
      


      
      
      </form>
      
      </div>
      
      </div>
         
    </div>
        
      
    
  
    
</body>
</html>