<?php

    class EmpleadosC {

        // registrar empleados

        public function RegistrarEmpleadosC(){

            if(isset($_POST["nombreR"])){

                $datosC = array(
                    "nombre"=>$_POST["nombreR"],
                    "apellido"=>$_POST["apellidoR"],
                    "email"=>$_POST["emailR"],
                    "puesto"=>$_POST["puestoR"],
                    "salario"=>$_POST["salarioR"]
                );
                $tablaBD ="empleados";

                $respuesta = EmpleadosM::RegistrarEmpleadosM($datosC, $tablaBD);

                if($respuesta == "Bien"){
                    header("location:index.php?ruta=empleados");
                }else {
                    echo "Error en el codigo";
                }
            }
        }

        //mostrar empleados

        public function MostrarEmpleadosC(){
            $tablaBD = "empleados";
            $respuesta = EmpleadosM::MostrarEmpleadosM($tablaBD);

            foreach ($respuesta as $key => $value) {
                echo '
                <tr>
                    <td>'.$value["nombre"].'</td>
                    <td>'.$value["apellido"].'</td>
                    <td>'.$value["email"].'</td>
                    <td>'.$value["puesto"].'</td>
                    <td>'.$value["salario"].'</td>
                    <td><button>Editar</button></td>
                    <td><button>Borrar</button></td>
                </tr>';
            }
        }

    }


?>