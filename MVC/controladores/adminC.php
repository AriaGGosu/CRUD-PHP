<?php

    class AdminC {

        public function ingresoC(){

            if(isset($_POST["usuarioI"])){

                $datosC = array("usuario"=>$_POST["usuarioI"], "clave"=>$_POST["claveI"]);  
                $tablaDB = "administradores";

                $respuesta = AdminM::ingresoM($datosC, $tablaDB);

            }

        }

    }














?>