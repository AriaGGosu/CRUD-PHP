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

        public function ShowEmployeeC(){
            $tableDB = "empleados";
            $response = EmployeeM::ShowEmployeeM($tableDB);

            foreach ($response as $key => $value) {
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
        public function EditEmployeeC(){

            $dataC = $_GET["id"];
            $tableDB = "empleados";

            $response = EmployeeM::EditEmployeeM($dataC,$tableDB);

            echo '
            <input value='.$response["id"].' type="hidden" name="idE">
            
            <input value='.$response["nombre"].' type="text" placeholder="Nombre" name="nombreE" required>

            <input value='.$response["apellido"].' type="text" placeholder="Apellido" name="apellidoE" required>
    
            <input value='.$response["email"].' type="email" placeholder="Email" name="emailE" required>
    
            <input value='.$response["puesto"].' type="text" placeholder="Puesto" name="puestoE" required>
    
            <input value='.$response["salario"].' type="text" placeholder="Salario" name="salarioE" required>
    
            <input type="submit" value="Actualizar">';

        }

        // actualizar empleados 
        public function UpdateEmployeeC(){

            if(isset($_POST["nombreE"])){

                $dataC = array(
                    "id"=>$_POST["idE"],
                    "nombre"=>$_POST["nombreE"],
                    "apellido"=>$_POST["apellidoE"],
                    "email"=>$_POST["emailE"],
                    "puesto"=>$_POST["puestoE"],
                    "salario"=>$_POST["salarioE"],    
                );

                $tableDB ="empleados";

                $response = EmployeeM::UpdateEmployeeM($dataC,$tableDB);

                if($response == "Ok"){
                    header("location:index.php?ruta=employee");
                }else{
                    echo "error";
                }
            }

        }

        // borrar empleado 

        public function DeleteEmployeeC() {

            if(isset($_GET["idB"])) {

                $dataC = $_GET["idB"];
                $tableDB = "empleados";

                $response = EmployeeM::DeleteEmployeeM($dataC, $tableDB);
                if($response == "Ok"){

                    header("location:index.php?ruta=employee");

                }else{
                    echo "Error";
                }
            }

        }










    }


?>