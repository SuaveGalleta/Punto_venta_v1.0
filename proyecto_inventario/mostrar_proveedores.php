<?php
 session_start();
  if(empty($_SESSION['username'])){
    header('Location:index.php');
  }

  include "conexion.php";
  $tamanio_paginas = 4;
  if (isset($_GET['pagina'])) {
       if ($_GET['pagina']==1) {

           header("Location:mostrar_proveedores.php");
      
        }
        else{
      $pagina = $_GET['pagina'];
      }
  }else{
         $pagina = 1;
  }

     
  $empezar_desde = ($pagina-1)*$tamanio_paginas;
  $statement =$conexion->prepare('SELECT * FROM proveedores order by id asc');
  $statement->execute();
  $resultado = $statement->fetchAll();
  $num_filas = $statement->rowCount();
  $total_paginas = ceil($num_filas/$tamanio_paginas);

  //echo "tenemos ".$num_filas." que muestra ".$tamanio_paginas." con un total de paginas de ".$total_paginas;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PROVEEDORES</title>
	<link rel="stylesheet" href="style.css">
  <script>
    function validar(url){
            var eliminar = confirm("Realmente quieres eliminar el proveedor")
            if (eliminar == true){
              window.location=mostrar_proveedores.php;
            }
            else{
              return false;
            }

    }

  </script>
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
	<div class="formularios">
    <table>
      <tr class="tabla">
        <th class="tablas">NOMBRE</th>
        <th class="tablas">EMAIL</th>
        <th class="tablas">TELEFONO</th>
        <th class="tablas">DIRECCIÓN</th>
        <th class="tablas"></th>
        <th class="tablas"></th>
      </tr>
      
      <?php
        
        $sql_limite =$conexion->prepare("SELECT * FROM proveedores LIMIT $empezar_desde,$tamanio_paginas");
         $sql_limite->execute();
         $resultado = $sql_limite->fetchAll();

          foreach ($resultado as $row=> $item) {
          echo "<tr>";
          echo"<td class='tablas'>".$item["nom_prov"]."</td>";
          echo"<td class='tablas'>".$item["email_prov"]."</td>";
          echo"<td class='tablas'>".$item["tel_prov"]."</td>";
          echo"<td class='tablas'>".$item["dir_prov"]."</td>";
          echo"<td class='tablas'><a href=actualizar_proveedores.php?editar=1&id=".$item['id']."><img class='elefante' src='img/ic_create_white_48dp.png' alt=''></a>";
          echo"<td class='tablas'><a href=eliminar_prov.php?id=".$item['id']."><img class='elefante' src='img/ic_delete_white_48dp.png' alt=''></a>";
          echo "</tr>";
        }
      ?>

      
    </table>
    <br><br><br>
    <div class="laptop">
      <?php 
       for($i = 1; $i<=$total_paginas; $i++){

         
         echo "<a class='paginacion' href='?pagina=".$i."'>".$i."</a>  ";

       }

     ?>
    </div>

  </div>

</div>
	
</body>
</html>