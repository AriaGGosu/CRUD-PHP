<?php 

    require_once "controllers/routesC.php";
    require_once "controllers/adminC.php";
    require_once "controllers/employeeC.php";

    require_once "model/routesM.php";
    require_once "model/adminM.php";
    require_once "model/employeeM.php";

    $routes = new RoutesController();
    $routes -> Template();

?>