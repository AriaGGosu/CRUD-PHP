<?php

    class AdminC {

        public function ingresoC(){

            if(isset($_POST["usuarioI"])){

                $datosC = array("usuario"=>$_POST["usuarioI"], "clave"=>$_POST["claveI"]);  
                $tablaDB = "administradores";

                $respuesta = AdminM::ingresoM($datosC, $tablaDB);

                if($respuesta["usuario"] == $_POST["usuarioI"] && $respuesta["clave"] == $_POST["claveI"]){
                    
                    session_start();
                    $_SESSION["ingreso"] = true;
                    header("location:index.php?ruta=empleados");

                }else {
                    echo "Error al ingresar";
                }

            }

        }

    }














?>