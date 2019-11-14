<?php

    class ConexionBD{

        public function cDB(){

            $bd = new PDO("mysql:host=localhost;dbname=crud","root","");
            return $bd;
        }

    }

?>

<!--

para conectarnos a la base de dato por PDO 
PDO es una extensión de php que permite acceder a distintos sistemas de base de datos 
utilizando las mismas funciones 

PDO = php data object 

host: localhost
nombre bd: crud
usuario: root
contraseña: 

-->