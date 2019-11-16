<?php

    class AdminC {

        public function LoginC(){

            if(isset($_POST["usuarioI"])){

                $dataC = array("usuario"=>$_POST["usuarioI"], "clave"=>$_POST["claveI"]);  
                $tableDB = "administradores";

                $response = AdminM::LoginM($dataC, $tableDB);

                if($response["usuario"] == $_POST["usuarioI"] && $response["clave"] == $_POST["claveI"]){
                    
                    session_start();
                    $_SESSION["login"] = true;
                    header("location:index.php?ruta=employee");

                }else {
                    echo "Invalid username or password ";
                }

            }

        }

    }














?>