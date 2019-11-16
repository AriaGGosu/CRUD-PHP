<?php 

    require_once "controladores/routesC.php";
    require_once "controladores/adminC.php";
    require_once "controladores/employeeC.php";

    require_once "modelo/routesM.php";
    require_once "modelo/adminM.php";
    require_once "modelo/employeeM.php";

    $rutas = new RutasControlador();
    $rutas -> plantilla();

?>