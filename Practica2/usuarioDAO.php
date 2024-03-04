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

        public static function register($name, $surname, $mail, $dir, $tfno, $dni, $username, $password) {
            
            // Crear conexión
            $conn = BD::getInstance()->getConexion();

            // Preparar la consulta SQL
            $query = "INSERT INTO usuarios (Nombre, Apellidos, Correo, Direccion, Telefono, Dni, Usuario, Contrasena, Tipo) VALUES ('$name', '$surname', '$mail', '$dir', '$tfno', '$dni', '$username', '$password', 0)";
        
            // Ejecutar la consulta SQL
            if ($conn->query($query) === TRUE) {
                $result = true;
            } else {
                $result = false;
            }
        
            // Devolver el resultado
            return $result;
        }
    }



?>