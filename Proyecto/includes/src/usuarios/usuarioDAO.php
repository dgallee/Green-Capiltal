<?php

namespace es\ucm\fdi\aw\usuarios;
use es\ucm\fdi\aw\Aplicacion;
use es\ucm\fdi\aw\pedidos\pedidosDAO;
use es\ucm\fdi\aw\carrito\carritoDAO;
define("PIMIENTA", 'greencapital');

    class usuarioDAO{

        private $uName;
        private $uSurname;
        private $uEmail;
        private $uDir;
        private $uTel;
        private $uDNI;
        private $uUser;
        private $uPass;
        private $uTipo;
        private $salt;

        private function __construct($uName, $uSurname, $uEmail, $uDir, $uTel, $uDNI, $uUser, $uPass, $salt, $uTipo) {
            
            $this->uName = $uName;
            $this->uSurname = $uSurname;
            $this->uEmail = $uEmail;
            $this->uDir = $uDir;
            $this->uTel = $uTel;
            $this->uDNI = $uDNI;
            $this->uUser = $uUser;
            $this->uPass = $uPass;
            $this->uTipo = $uTipo;
            $this->salt = $salt;
        }
        public static function login($nombreUsuario, $password){

            $conn = Aplicacion::getInstance()->getConexionBD();
            // Consulta SQL para verificar si el usuario y la contraseña coinciden
            $nombreUsuario = $conn->real_escape_string($nombreUsuario);
            $user = self::searchLogin($nombreUsuario);
            if ($user && $user->compruebaPassword($password, $user->salt)) {
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
                $user = new usuarioDAO($row['Nombre'], $row['Apellidos'], $row['Correo'], $row['Direccion'], $row['Telefono'], $row['DNI'], $row['Usuario'], $row['Contrasena'], $row['salt'], $row['Tipo']);
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
                $user = new usuarioDAO($row['Nombre'], $row['Apellidos'], $row['Correo'], $row['Direccion'], $row['Telefono'], $row['DNI'], $row['Usuario'], $row['Contrasena'], $row['salt'], $row['Tipo']);
                $rs->free();
                return $user;
            }
            else  error_log("Error BD ({$conn->errno}): {$conn->error}");
            return false;

        }

        public static function exist_dni($dni){
            $conn = Aplicacion::getInstance()->getConexionBD();
            
            // Preparar la consulta SQL para evitar la inyección de SQL
            $query = "SELECT * FROM usuarios WHERE DNI = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $dni); // "s" indica que es un string
            $stmt->execute();
            $result = $stmt->get_result();
    
            // Comprobar si la consulta devuelve alguna fila
            if ($result->num_rows > 0) {
                // Si encuentra un nombre igual, devolver true
                return true;
            } else {
                // Si no encuentra un nombre igual, devolver false
                return false;
            }
        }

        public static function exist($nombre){
            $conn = Aplicacion::getInstance()->getConexionBD();
            
            // Preparar la consulta SQL para evitar la inyección de SQL
            $query = "SELECT * FROM usuarios WHERE Usuario = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $nombre); // "s" indica que es un string
            $stmt->execute();
            $result = $stmt->get_result();
    
            // Comprobar si la consulta devuelve alguna fila
            if ($result->num_rows > 0) {
                // Si encuentra un nombre igual, devolver true
               
                return true;
            } else {
                // Si no encuentra un nombre igual, devolver false
                return false;
            }
        }

        public static function register($name, $surname, $mail, $dir, $tfno, $dni, $username, $password) {
            
            // Crear conexión
            $conn = Aplicacion::getInstance()->getConexionBD();

            $salt = rand();
            //Hasheo
            $password = $conn->real_escape_string($password);
            $password=password_hash($password. $salt. PIMIENTA , PASSWORD_DEFAULT);
            
            // Preparar la consulta SQL
            $name = $conn->real_escape_string($name);
            $surname = $conn->real_escape_string($surname);
            $mail = $conn->real_escape_string($mail);
            $dir = $conn->real_escape_string($dir);
            $tfno = $conn->real_escape_string($tfno);
            $dni = $conn->real_escape_string($dni);
            $username = $conn->real_escape_string($username);
            $query = "INSERT INTO usuarios (Nombre, Apellidos, Correo, Direccion, Telefono, Dni, Usuario, Contrasena, salt, Tipo) VALUES ('$name', '$surname', '$mail', '$dir', '$tfno', '$dni', '$username', '$password', '$salt', 0)";
        
            // Ejecutar la consulta SQL
            if ($conn->query($query) === TRUE) {
                $result = true;
            } else {
                $result = false;
            }
        
            // Devolver el resultado
            return $result;
        }

        public static function addUser($name, $surname, $mail, $dir, $tfno, $dni, $username, $password, $type) {
            
            // Crear conexión
            $conn = Aplicacion::getInstance()->getConexionBD();

            //Hasheo
            $salt = rand();
            $password = $conn->real_escape_string($password);
            $password=password_hash($password. $salt. PIMIENTA , PASSWORD_DEFAULT);
            
            // Preparar la consulta SQL
            $name = $conn->real_escape_string($name);
            $surname = $conn->real_escape_string($surname);
            $mail = $conn->real_escape_string($mail);
            $dir = $conn->real_escape_string($dir);
            $tfno = $conn->real_escape_string($tfno);
            $dni = $conn->real_escape_string($dni);
            $username = $conn->real_escape_string($username);
            $query = "INSERT INTO usuarios (Nombre, Apellidos, Correo, Direccion, Telefono, Dni, Usuario, Contrasena, salt, Tipo) VALUES ('$name', '$surname', '$mail', '$dir', '$tfno', '$dni', '$username', '$password', '$salt', $type)";
        
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
            pedidosDAO::deletePedidos($dni);
            carritoDAO::eliminarUsuario($dni);
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

        public static function obtenerNombre($uDNI){
            $conn = Aplicacion::getInstance()->getConexionBD();
            $DNI = $conn->real_escape_string($uDNI);
            $query = "SELECT Nombre FROM usuarios WHERE DNI = '$DNI'";
            $result = $conn->query($query);
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $result->free();
                return $row['Nombre'];
            } else {
                // Manejo de error si la consulta falla o no devuelve resultados
                return false;
            }
        }

        public static function obtenerUsuario($uDNI){
            $conn = Aplicacion::getInstance()->getConexionBD();
            $DNI = $conn->real_escape_string($uDNI);
            $query = "SELECT Usuario FROM usuarios WHERE DNI = '$DNI'";
            $result = $conn->query($query);
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $result->free();
                return $row['Usuario'];
            } else {
                // Manejo de error si la consulta falla o no devuelve resultados
                return false;
            }
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
                $salt = rand();
                $contrasena=password_hash($contrasena. $salt. PIMIENTA ,PASSWORD_DEFAULT);
            }

            if ($tipo != 0 && $tipo != 1 && $tipo != 2 && $tipo != 3) {
                $tipo = $userActual->uTipo;
            }
            
        
            // Preparar la consulta SQL
            $query = "UPDATE usuarios SET Nombre='$nombre', Apellidos='$apellidos', Correo='$correo', Direccion='$direccion', Telefono=$telefono, DNI='$dni', Usuario='$usuario', Contrasena='$contrasena',salt='$salt', Tipo=$tipo WHERE DNI='$dni'";

            // Ejecutar la consulta SQL
            if ($conn->query($query) === TRUE) {
                return true;
            } else {
                return false;
            }
        }
        
        public function compruebaPassword($password, $salt){
           return password_verify($password. $salt. PIMIENTA, $this->uPass);
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