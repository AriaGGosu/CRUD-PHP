<?php

class EmpleadosM extends ConexionBD {

    // registrar empleados en la base de datos
    public static function RegistrarEmpleadosM($datosC, $tablaBD){

        $pdo = ConexionBD::cDB()->prepare(
            "INSERT INTO $tablaBD (nombre, apellido, email, puesto, salario) 
            VALUES (:nombre, :apellido, :email, :puesto, :salario)");

        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo -> bindParam(":email", $datosC["email"], PDO::PARAM_STR);
        $pdo -> bindParam(":puesto", $datosC["puesto"], PDO::PARAM_STR);
        $pdo -> bindParam(":salario", $datosC["salario"], PDO::PARAM_STR);

        if($pdo -> execute()){
            return "Bien";
        }else{
            return "Error";
        }
    }

    // mostrar empleados de la base de datos

    public static function MostrarEmpleadosM($tablaBD) {

        $pdo = ConexionBD::cDB()->prepare("SELECT * FROM $tablaBD");
        $pdo ->execute();

        return $pdo -> fetchAll();
    
    }

}















?>