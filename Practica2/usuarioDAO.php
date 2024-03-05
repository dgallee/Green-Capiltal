<?php
    class Usuario{

        private $uName;
        private $uSurname;
        private $uEmail;
        private $uDir;
        private $uTel;
        private $uDNI;
        private $uUser;
        private $uPass;
        private $uTipo;

        private function __construct($uName, $uSurname, $uEmail, $uDir, $uTel, $uDNI, $uUser, $uPass, $uTipo) {
            
            $this->uName = $uName;
            $this->uSurname = $uSurname;
            $this->uEmail = $uEmail;
            $this->uDir = $uDir;
            $this->uTel = $uTel;
            $this->uDNI = $uDNI;
            $this->uUser = $uUser;
            $this->uPass = $uPass;
            $this->uTipo = $uTipo;
        }
        public static function login($nombreUsuario, $password){

            $conn = BD::getInstance()->getConexion();
            // Consulta SQL para verificar si el usuario y la contraseña coinciden
            $user = self::search($nombreUsuario);
            if ($user && $user->compruebaPassword($password)) {
                return $user;
            }
            return false;
        }
        
        public static function search($nombreUsuario){

            $conn = BD::getInstance()->getConexion();            
            $query = sprintf("SELECT * FROM usuarios WHERE Usuario = '$nombreUsuario'");
            $rs = $conn->query($query);
            if ($rs) {
                $row = $rs->fetch_assoc();
                $user = new Usuario($row['Nombre'], $row['Apellidos'], $row['Correo'], $row['Direccion'], $row['Telefono'], $row['DNI'], $row['Usuario'], $row['Contrasena'], $row['Tipo']);
                $rs->free();
                return $user;
            }
            else  error_log("Error BD ({$conn->errno}): {$conn->error}");
            return false;

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

        public static function delete($username) {
            
            $conn = BD::getInstance()->getConexion();

            // Prepara la consulta SQL
            $query = "DELETE FROM usuarios WHERE Usuario = '$username'";
        
            // Ejecuta la consulta
            if ($conn->query($query) === TRUE) {
                echo "Usuario eliminado con éxito.";
                return true;
            } else {
                echo "Error al eliminar el usuario: " . $conn->error;
                return false;
            }
        
        }

        public static function showTable(){
        
            $conn = BD::getInstance()->getConexion();
            // Consulta SQL para obtener todos los usuarios
            $query = "SELECT * FROM usuarios";
            $result = $conn->query($query);
        
            $usuarios = array();
        
            if ($result->num_rows > 0) {
                // Guarda los datos de cada fila en el array
                while($row = $result->fetch_assoc()) {
                    $usuarios[] = $row;
                }
            } else {
                echo "No hay usuarios en la base de datos.";
            }
        
            // Devuelve el array de usuarios
            return $usuarios;
        }

        public static function edit($nombre, $apellidos, $correo, $direccion, $telefono, $dni, $usuario, $contrasena, $tipo, $usuarioAntiguo) {
            // Conexión a la base de datos
            $conn = BD::getInstance()->getConexion();
            // Obtener los datos actuales del usuario
            $userActual = self::search($usuarioAntiguo);
            echo "eeeeeeeeee";
            // Comprobar si las variables son distintas a las locales y que no estén vacías
            if (empty($nombre)) {
                $nombre = $userActual->uName;
            }
            if (empty($apellidos)) {
                $apellidos = $userActual->uSurname;
            }
            if (empty($correo)) {
               $correo =  $userActual->uEmail;
            }
            if (empty($direccion)) {
                $direccion = $userActual->uDir;
            }
            if (empty($telefono)) {
                $telefono = $userActual->uTel;
            }
            if (empty($usuario)) {
                $usuario = $userActual->uUser;
            }
            if (empty($contrasena)) {
                $contrasena = $userActual->uPass;
            }
            if (empty($tipo)) {
                $tipo = $userActual->uTipo;
            }
        
            // Preparar la consulta SQL
            $query = "UPDATE usuarios SET Nombre='$nombre', Apellidos='$apellidos', Correo='$correo', Direccion='$direccion', Telefono=$telefono, DNI='$dni', Usuario='$usuario', Contrasena='$contrasena', Tipo=$tipo WHERE DNI='$dni'";
        
            // Ejecutar la consulta SQL
            if ($conn->query($query) === TRUE) {
                echo "Usuario actualizado con éxito.";
                return true;
            } else {
                echo "Error al actualizar el usuario: " . $conn->error;
                return false;
            }
        }
        
        

        public function compruebaPassword($password){
            return $password == $this->uPass;
            /*return password_verify($password, $this->password); */
        }

        public function getUName() {
            return $this->uName;
        }
        
        public function getUSurname() {
            return $this->uSurname;
        }
        
        public function getUEmail() {
            return $this->uEmail;
        }
        
        public function getUDir() {
            return $this->uDir;
        }
        
        public function getUTel() {
            return $this->uTel;
        }
        
        public function getUDNI() {
            return $this->uDNI;
        }
        
        public function getUUser() {
            return $this->uUser;
        }
        
        public function getUPass() {
            return $this->uPass;
        }
        
        public function getUTipo() {
            return $this->uTipo;
        }
        
    }

    


?>