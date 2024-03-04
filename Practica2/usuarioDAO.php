<?php
    class Usuario{

        public static function login($nombreUsuario, $password){

            $conn = BD::getInstance()->getConexion();
            // Consulta SQL para verificar si el usuario y la contraseña coinciden
            $query = "SELECT Usuario, Contrasena FROM usuarios WHERE Usuario = '$nombreUsuario' AND Contrasena = '$password'";
            $result = mysqli_query($conn, $query);
        
            if (mysqli_num_rows($result) > 0) {
                return true;
            } else {
                return false;
            }
        }
    }



?>