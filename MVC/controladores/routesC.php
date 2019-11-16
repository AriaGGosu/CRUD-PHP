<?php

class RutasControlador{

    public function plantilla() {
        include "vistas/template.php";
    }
// funcion publica con nombre rutas
// esta funcion comprueba si la variable rutas traida por metodo get esta definida
// si esta definida guardamos la variable en la variable "ruta" en $rutas 
// o si no le asignamos un valor por defecto 

    public function Rutas(){
        if(isset($_GET["ruta"])){
            $rutas = $_GET["ruta"];
        }else{
            $rutas = "index";
        }

// aqui tenemos la variable $respuesta que sera un objeto de la clase modelo
// asociada a la funcion RutasModelo y esta recibira el valor traido por metodo GET de $rutas


    $respuesta = Modelo::RutasModelo($rutas);
    include $respuesta;
    
    }
}

?>