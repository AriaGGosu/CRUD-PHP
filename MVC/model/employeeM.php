<?php

require_once "connectionDB.php";

class EmployeeM extends ConnectionDB {

    // registrar empleados en la base de datos
    public static function RegisterEmployeeM($dataC, $tableDB){

        $pdo = ConnectionDB::cDB()->prepare(
            "INSERT INTO $tableDB (nombre, apellido, email, puesto, salario) 
            VALUES (:nombre, :apellido, :email, :puesto, :salario)");

        $pdo -> bindParam(":nombre", $dataC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":apellido", $dataC["apellido"], PDO::PARAM_STR);
        $pdo -> bindParam(":email", $dataC["email"], PDO::PARAM_STR);
        $pdo -> bindParam(":puesto", $dataC["puesto"], PDO::PARAM_STR);
        $pdo -> bindParam(":salario", $dataC["salario"], PDO::PARAM_STR);

        if($pdo -> execute()){
            return "Ok";
        }else{
            return "Error";
        }
        $pdo -> close();
    }

    // mostrar empleados de la base de datos

    public static function ShowEmployeeM($tableDB) {

        $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tableDB");
        $pdo ->execute();

        return $pdo -> fetchAll();
        $pdo -> close();
    
    }

    // editar empleados
    public static function EditEmployeeM($dataC,$tableDB){

        $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tableDB WHERE id = :id");
        $pdo -> bindParam(":id", $dataC, PDO::PARAM_INT);
        $pdo -> execute();

        return $pdo -> fetch();
        $pdo -> close();
    }

    public static function UpdateEmployeeM($dataC,$tableDB){

        $pdo = ConnectionDB::cDB()->prepare(
            "UPDATE $tableDB SET id = :id, nombre = :nombre,
            apellido = :apellido, email = :email,
            puesto = :puesto, salario = :salario 
            WHERE id = :id");

        $pdo -> bindParam(":id", $dataC["id"], PDO::PARAM_INT);
        $pdo -> bindParam(":nombre", $dataC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":apellido", $dataC["apellido"], PDO::PARAM_STR);
        $pdo -> bindParam(":email", $dataC["email"], PDO::PARAM_STR);
        $pdo -> bindParam(":puesto", $dataC["puesto"], PDO::PARAM_STR);
        $pdo -> bindParam(":salario", $dataC["salario"], PDO::PARAM_STR);

        if($pdo -> execute()){   
            return "Ok";
        }else{
            return "Error";
        }
        
        $pdo -> close();

    }


    // borrar empleado 
    public static function DeleteEmployeeM($dataC, $tableDB) {

        $pdo = ConnectionDB::cDB()->prepare("DELETE FROM $tableDB WHERE id = :id");
        $pdo -> bindParam(":id", $dataC, PDO::PARAM_INT );
        
        if($pdo -> execute()){
            return "Ok";
            $pdo -> close();
        }else {
            return "Error";
            $pdo -> close();
        }
    }

}

?>