<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>CRUD</title>
	<link rel="stylesheet" type="text/css" href="view/css/estilos.css">
</head>

<body>

    <?php 
        include "modules/menu.php";
    ?>

    <section>
        <?php
            $routes = new RoutesController();
            $routes-> Routes();
        ?>
    </section>

</body>

</html>