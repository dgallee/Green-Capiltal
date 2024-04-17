<?php

    require_once "pedidosDAO.php";
    require_once "carritoDAO.php";

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

            $conn = Aplicacion::getInstance()->getConexionBD();
            // Consulta SQL para verificar si el usuario y la contraseña coinciden
            $nombreUsuario = $conn->real_escape_string($nombreUsuario);
            $user = self::searchLogin($nombreUsuario);
            if ($user && $user->compruebaPassword($password)) {
                return $user;
            }
            return false;
        }
        
        public static function searchLogin($usuario){

            $conn = Aplicacion::getInstance()->getConexionBD();          
            $usuario = $conn->real_escape_string($usuario);  
            $query = sprintf("SELECT * FROM usuarios WHERE Usuario = '$usuario'");
            $rs = $conn->query($query);
            if ($rs->num_rows > 0) {
                $row = $rs->fetch_assoc();
                $user = new Usuario($row['Nombre'], $row['Apellidos'], $row['Correo'], $row['Direccion'], $row['Telefono'], $row['DNI'], $row['Usuario'], $row['Contrasena'], $row['Tipo']);
                $rs->free();
                return $user;
            }
            else  error_log("Error BD ({$conn->errno}): {$conn->error}");
            return false;

        }

        public static function search($dni){

            $conn = Aplicacion::getInstance()->getConexionBD();          
            $dni = $conn->real_escape_string($dni);  
            $query = sprintf("SELECT * FROM usuarios WHERE DNI = '$dni'");
            $rs = $conn->query($query);
            if ($rs->num_rows > 0) {
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
            $conn = Aplicacion::getInstance()->getConexionBD();

            //Hasheo
            $password = $conn->real_escape_string($password);
            $password=password_hash($password,PASSWORD_DEFAULT);
            
            // Preparar la consulta SQL
            $name = $conn->real_escape_string($name);
            $surname = $conn->real_escape_string($surname);
            $mail = $conn->real_escape_string($mail);
            $dir = $conn->real_escape_string($dir);
            $tfno = $conn->real_escape_string($tfno);
            $dni = $conn->real_escape_string($dni);
            $username = $conn->real_escape_string($username);
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

        public static function delete($dni) {
            
            $conn = Aplicacion::getInstance()->getConexionBD();
            $dni = $conn->real_escape_string($dni);
            // Prepara la consulta SQL
            Pedido::deletePedidos($dni);
            Carrito::eliminarUsuario($dni);
            $query = "DELETE FROM usuarios WHERE DNI = '$dni'";
        
            // Ejecuta la consulta
            if ($conn->query($query) === TRUE) {
                return true;
            } else {
                return false;
            }
        
        }

        public static function showTable(){
        
            $conn = Aplicacion::getInstance()->getConexionBD();
            // Consulta SQL para obtener todos los usuarios
            $query = "SELECT * FROM usuarios";
            $result = $conn->query($query);
        
            $usuarios = array();
        
            if ($result->num_rows > 0) {
                // Guarda los datos de cada fila en el array
                while($row = $result->fetch_assoc()) {
                    $usuarios[] = $row;
                }
                $result->free();
            }
        
            // Devuelve el array de usuarios
            return $usuarios;
        }

        public static function edit($nombre, $apellidos, $correo, $direccion, $telefono, $dni, $usuario, $contrasena, $tipo) {
            // Conexión a la base de datos
            $conn = Aplicacion::getInstance()->getConexionBD();
            // Obtener los datos actuales del usuario
            $nombre = $conn->real_escape_string($nombre);
            $apellidos = $conn->real_escape_string($apellidos);
            $correo = $conn->real_escape_string($correo);
            $direccion = $conn->real_escape_string($direccion);
            $telefono = $conn->real_escape_string($telefono);
            $dni = $conn->real_escape_string($dni);
            $usuario = $conn->real_escape_string($usuario);
            $contrasena = $conn->real_escape_string($contrasena);
            $tipo = $conn->real_escape_string($tipo);

            $userActual = self::search($dni);
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
            else if(!password_verify($contrasena, password_hash($userActual->getUPass(),PASSWORD_DEFAULT))) {
                $contrasena=password_hash($contrasena,PASSWORD_DEFAULT);
            }

            if ($tipo != 0 && $tipo != 1 && $tipo != 2 && $tipo != 3) {
                $tipo = $userActual->uTipo;
            }
            
        
            // Preparar la consulta SQL
            $query = "UPDATE usuarios SET Nombre='$nombre', Apellidos='$apellidos', Correo='$correo', Direccion='$direccion', Telefono=$telefono, DNI='$dni', Usuario='$usuario', Contrasena='$contrasena', Tipo=$tipo WHERE DNI='$dni'";

            // Ejecutar la consulta SQL
            if ($conn->query($query) === TRUE) {
                return true;
            } else {
                return false;
            }
        }
        
        public function compruebaPassword($password){
           return password_verify($password, $this->uPass);
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