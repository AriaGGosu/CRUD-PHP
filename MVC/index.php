<?php 

    require_once "controladores/rutasC.php";
    require_once "modelo/rutasM.php";

    $rutas = new RutasControlador();
    $rutas -> plantilla();

?>