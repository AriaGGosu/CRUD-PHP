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
                    <td><a href="index.php?ruta=editar&id='.$value["id"].'"><button>Editar</button></a></td>
                    <td><a href="index.php?ruta=empleados&idB='.$value["id"].'"><button>Borrar</button></a></td>
                </tr>';
            }
        }


        // editar empleados
        public function EditarEmpleadosC(){

            $datosC = $_GET["id"];
            $tablaBD = "empleados";

            $respuesta = EmpleadosM::EditarEmpleadosM($datosC,$tablaBD);

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

                $respuesta = EmpleadosM::ActualizarEmpleadosM($datosC,$tablaBD);

                if($respuesta == "Bien"){
                    header("location:index.php?ruta=empleados");
                }else{
                    echo "error";
                }
            }

        }

        // borrar empleado 

        public function BorrarEmpleadoC() {

            if(isset($_GET["idB"])) {

                $datosC = $_GET["idB"];
                $tablaBD = "empleados";

                $respuesta = EmpleadosM::BorrarEmpleadoM($datosC, $tablaBD);
                if($respuesta == "Bien"){

                    header("location:index.php?ruta=empleados");

                }else{
                    echo "Error";
                }
            }

        }










    }


?>