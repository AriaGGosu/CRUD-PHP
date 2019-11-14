<?php

    require_once "conexionBD.php";

    class AdminM extends ConexionBD {

        static public function ingresoM($datosC, $tablaDB){

            $pdo = ConexionBD::cDB()->prepare("SELECT usuario, clave FROM $tablaDB WHERE usuario = :usuario");
            $pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
            $pdo -> execute();
            return $pdo-> fetch();
            $pdo->close();
             
        }
    }


?>