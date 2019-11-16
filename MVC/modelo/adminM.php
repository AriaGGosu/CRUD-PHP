<?php

    require_once "connectionDB.php";

    class AdminM extends ConnectionDB {

        static public function ingresoM($datosC, $tablaDB){

            $pdo = ConnectionDB::cDB()->prepare("SELECT usuario, clave FROM $tablaDB WHERE usuario = :usuario");
            $pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
            $pdo -> execute();
            return $pdo-> fetch();
            $pdo->close();
             
        }
    }


?>