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
        <div class="hey">
          <div class="rej">
            <span id="liveclock" style="position:relative left:0;top:0;"></span>
            <script language="JavaScript" type="text/javascript">
            <!--
            function show5(){
            if (!document.layers&&!document.all&&!document.getElementById)
            return
            var Digital=new Date()
            var hours=Digital.getHours()
            var minutes=Digital.getMinutes()
            var seconds=Digital.getSeconds()
            var dn="PM"
            if (hours<12)
            dn="AM"
            if (hours>12)
            hours=hours-12
            if (hours==0)
            hours=12
            if (minutes<=9)
            minutes="0"+minutes
            //change font size here to your desire
            myclock="<font size='10' face='Arial' ><b><font size='4'>Hora actual:</font></br>"+hours+":"+minutes+" "+dn+"</b></font>"
            if (document.layers){
            document.layers.liveclock.document.write(myclock)
            document.layers.liveclock.document.close()
            }
            else if (document.all)
            liveclock.innerHTML=myclock
            else if (document.getElementById)
            document.getElementById("liveclock").innerHTML=myclock
            setTimeout("show5()",1000)
            }
            window.onload=show5
            //-->
            </script>
          </div>
        </div>
        <div class="hey">
          <img class="logos" src="img/logo_sabritas.jpg" alt="">
          <img class="logos" src="img/coca_logo_2.png" alt="">
          <img class="logos" src="img/logo_gamesa.png" alt="">
          <img class="logos" src="img/logo_la_lupita.png" alt="">
        </div>
      </div>
    </div>
    
  </body>
</html>