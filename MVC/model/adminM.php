<?php

    require_once "connectionDB.php";

    class AdminM extends ConnectionDB {

        static public function LoginM($dataC, $tableDB){

            $pdo = ConnectionDB::cDB()->prepare("SELECT usuario, clave FROM $tableDB WHERE usuario = :usuario");
            $pdo -> bindParam(":usuario", $dataC["usuario"], PDO::PARAM_STR);
            $pdo -> execute();
            return $pdo-> fetch();
            $pdo->close();
             
        }
    }


?>