<?php	

	session_start();
	if(!$_SESSION["login"]){
		header("location:index.php?ruta=login");
		exit();
	}
?>

    <br>
	<h1>EDITAR</h1>

	<form method="post" action="">
		
        <?php
        
            $edit = new EmployeeC();
            $edit -> EditEmployeeC();

            $update = new EmployeeC();
            $update -> UpdateEmployeeC();

        ?>
	</form>

