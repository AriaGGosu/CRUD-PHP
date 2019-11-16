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

    public static function MostrarEmpleadosM($tablaBD) {

        $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD");
        $pdo ->execute();

        return $pdo -> fetchAll();
        $pdo -> close();
    
    }

    // editar empleados
    public static function EditarEmpleadosM($datosC,$tablaBD){

        $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD WHERE id = :id");
        $pdo -> bindParam(":id", $datosC, PDO::PARAM_INT);
        $pdo -> execute();

        return $pdo -> fetch();
        $pdo -> close();
    }

    public static function ActualizarEmpleadosM($datosC,$tablaBD){

        $pdo = ConexionBD::cDB()->prepare(
            "UPDATE $tablaBD SET id = :id, nombre = :nombre,
            apellido = :apellido, email = :email,
            puesto = :puesto, salario = :salario 
            WHERE id = :id");

        $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo -> bindParam(":email", $datosC["email"], PDO::PARAM_STR);
        $pdo -> bindParam(":puesto", $datosC["puesto"], PDO::PARAM_STR);
        $pdo -> bindParam(":salario", $datosC["salario"], PDO::PARAM_STR);

        if($pdo -> execute()){
            $pdo -> close();
            return "Bien";
        }else{
            $pdo -> close();
            return "Error";
        }


    }


    // borrar empleado 
    public static function DeleteEmployeeM($datosC, $tablaBD) {

        $pdo = ConnectionDB::cDB()->prepare("DELETE FROM $tablaBD WHERE id = :id");
        $pdo -> bindParam(":id", $datosC, PDO::PARAM_INT );
        
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