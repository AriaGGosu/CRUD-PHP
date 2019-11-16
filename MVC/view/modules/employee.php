<?php	

	session_start();
	if(!$_SESSION["login"]){
		header("location:index.php?ruta=login");
		exit();
	}


?>

	<br>
	<h1>Empleados</h1>

	<table id="t1" border="1">
		
		<thead>
			
			<tr>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Email</th>
				<th>Puesto</th>
				<th>Salario</th>
				<th></th>
				<th></th>

			</tr>

		</thead>

		<tbody>

			<?php

				$show = new EmployeeC();
				$show -> ShowEmployeeC();

			?>

		</tbody>

	</table>

<?php

	$delete = new EmployeeC();
	$delete -> DeleteEmployeeC();

?>