<?php

    class EmployeeC {

        // registrar empleados

        public function RegisterEmployeeC(){

            if(isset($_POST["nombreR"])){

                $dataC = array(
                    "nombre"=>$_POST["nombreR"],
                    "apellido"=>$_POST["apellidoR"],
                    "email"=>$_POST["emailR"],
                    "puesto"=>$_POST["puestoR"],
                    "salario"=>$_POST["salarioR"]
                );
                $tableDB ="empleados";

                $response = EmployeeM::RegisterEmployeeM($dataC, $tableDB);

                if($response == "Ok"){
                    header("location:index.php?ruta=employee");
                }else {
                    echo "Syntax error";
                }
            }
        }

        //mostrar empleados

        public function MostrarEmpleadosC(){
            $tablaBD = "empleados";
            $respuesta = EmployeeM::MostrarEmpleadosM($tablaBD);

            foreach ($respuesta as $key => $value) {
                echo '
                <tr>
                    <td>'.$value["nombre"].'</td>
                    <td>'.$value["apellido"].'</td>
                    <td>'.$value["email"].'</td>
                    <td>'.$value["puesto"].'</td>
                    <td>'.$value["salario"].'</td>
                    <td><a href="index.php?ruta=edit&id='.$value["id"].'"><button>Editar</button></a></td>
                    <td><a href="index.php?ruta=employee&idB='.$value["id"].'"><button>Borrar</button></a></td>
                </tr>';
            }
        }


        // editar empleados
        public function EditarEmpleadosC(){

            $datosC = $_GET["id"];
            $tablaBD = "empleados";

            $respuesta = EmployeeM::EditarEmpleadosM($datosC,$tablaBD);

            echo '
            <input value='.$respuesta["id"].' type="hidden" name="idE">
            
            <input value='.$respuesta["nombre"].' type="text" placeholder="Nombre" name="nombreE" required>

            <input value='.$respuesta["apellido"].' type="text" placeholder="Apellido" name="apellidoE" required>
    
            <input value='.$respuesta["email"].' type="email" placeholder="Email" name="emailE" required>
    
            <input value='.$respuesta["puesto"].' type="text" placeholder="Puesto" name="puestoE" required>
    
            <input value='.$respuesta["salario"].' type="text" placeholder="Salario" name="salarioE" required>
    
            <input type="submit" value="Actualizar">';

        }

        // actualizar empleados 
        public function ActualizarEmpleadosC(){

            if(isset($_POST["nombreE"])){

                $datosC = array(
                    "id"=>$_POST["idE"],
                    "nombre"=>$_POST["nombreE"],
                    "apellido"=>$_POST["apellidoE"],
                    "email"=>$_POST["emailE"],
                    "puesto"=>$_POST["puestoE"],
                    "salario"=>$_POST["salarioE"],    
                );

                $tablaBD ="empleados";

                $respuesta = EmployeeM::ActualizarEmpleadosM($datosC,$tablaBD);

                if($respuesta == "Bien"){
                    header("location:index.php?ruta=empleados");
                }else{
                    echo "error";
                }
            }

        }

        // borrar empleado 

        public function DeleteEmployeeC() {

            if(isset($_GET["idB"])) {

                $datosC = $_GET["idB"];
                $tablaBD = "empleados";

                $respuesta = EmployeeM::DeleteEmployeeM($datosC, $tablaBD);
                if($respuesta == "Ok"){

                    header("location:index.php?ruta=employee");

                }else{
                    echo "Error";
                }
            }

        }










    }


?>