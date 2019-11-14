<?php 

    require_once "controladores/rutasC.php";
    require_once "controladores/adminC.php";

    require_once "modelo/rutasM.php";
    require_once "modelo/adminM.php";

    $rutas = new RutasControlador();
    $rutas -> plantilla();

?>