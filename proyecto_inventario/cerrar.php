<?php

session_start();

// con este código destruimos la cookie ya creada y redireccionamos al usuario a la pagina del formulario.

session_destroy();

header("Location:index.php");

?>
 