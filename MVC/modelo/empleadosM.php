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
        $pdo -> close();
    }

    // mostrar empleados de la base de datos

    public static function MostrarEmpleadosM($tablaBD) {

        $pdo = ConexionBD::cDB()->prepare("SELECT * FROM $tablaBD");
        $pdo ->execute();

        return $pdo -> fetchAll();
        $pdo -> close();
    
    }

    // editar empleados
    public static function EditarEmpleadosM($datosC,$tablaBD){

        $pdo = ConexionBD::cDB()->prepare("SELECT * FROM $tablaBD WHERE id = :id");
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
            return "Bien";
        }else{
            return "Error";
        }

        $pdo -> close();

    }


    // borrar empleado 
    public static function BorrarEmpleadoM($datosC, $tablaBD) {

        $pdo = ConexionBD::cDB()->prepare("DELETE FROM $tablaBD WHERE id = :id");
        $pdo -> bindParam(":id", $datosC, PDO::PARAM_INT );
        
        if($pdo -> execute()){
            return "Bien";
        }else {
            return "Error";
        }

        $pdo -> close();

    }

}

?>