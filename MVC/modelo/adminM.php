<?php

    require_once "conexionBD.php";

    class AdminM extends conexionBD {

        static public function ingresoM($datosC, $tablaDB){

            $pdo = ConexionDB::cDB()->prepare("SELECT usuario, clave WHERE usuario = :usuario");
            

        }

    }


?>