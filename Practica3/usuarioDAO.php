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
        private $id;
        private $roles;
        public const ADMIN_ROLE = 1;

        public const USER_ROLE = 2;

        private function __construct($uUser,  $uPass,$uName ) {
            
            $this->uName = $uName;
         
            $this->uUser = $uUser;
            $this->uPass = $uPass;
           
        }
            public static function login($nombreUsuario, $password){

            $conn = Aplicacion::getInstance()->getConexionBD();
            // Consulta SQL para verificar si el usuario y la contraseña coinciden
            $user = self::search($nombreUsuario);
            if ($user && $user->compruebaPassword($password)) {
                return $user;
            }
            return false;
        }
        private static function hashPassword($password)
        {
            return password_hash($password, PASSWORD_DEFAULT);
        }
    
        
        public static function search($nombreUsuario){

            $conn = Aplicacion::getInstance()->getConexionBD();            
            $query = sprintf("SELECT * FROM usuarios WHERE Usuario = '$nombreUsuario'");
            $rs = $conn->query($query);
            if ($rs->num_rows > 0) {
                $row = $rs->fetch_assoc();
                $user = new Usuario($row['Usuario'], $row['Contrasena'], $row['Nombre']);
                $rs->free();
                return $user;
            }
            else  error_log("Error BD ({$conn->errno}): {$conn->error}");
            return false;

        }
        public static function buscaUsuario($nombreUsuario){

            return Usuario::search($nombreUsuario);
        }
        
        public function añadeRol($role)
       {
        $this->roles[] = $role;
       }


        public static function crea($nombreUsuario, $password, $nombre, $rol)
    {
        $user = new Usuario($nombreUsuario, self::hashPassword($password), $nombre);
        $user->añadeRol($rol);
        return $user->guarda();
    }
    public function guarda()
    {
        if ($this->id !== null) {
            return self::actualiza($this);
        }
        return self::inserta($this);
    }
    private static function actualiza($usuario)
    {
        $result = false;
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query=sprintf("UPDATE Usuarios U SET nombreUsuario = '%s', nombre='%s', password='%s' WHERE U.id=%d"
            , $conn->real_escape_string($usuario->nombreUsuario)
            , $conn->real_escape_string($usuario->nombre)
            , $conn->real_escape_string($usuario->password)
            , $usuario->id
        );
        if ( $conn->query($query) ) {
            $result = self::borraRoles($usuario);
            if ($result) {
                $result = self::insertaRoles($usuario);
            }
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        
        return $result;
    }
    private static function borraRoles($usuario)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("DELETE FROM RolesUsuario RU WHERE RU.usuario = %d"
            , $usuario->id
        );
        if ( ! $conn->query($query) ) {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
            return false;
        }
        return $usuario;
    }
    private static function inserta($usuario)
    {
        $result = false;
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query=sprintf("INSERT INTO Usuarios(Usuario, Nombre, Contrasena) VALUES ('%s', '%s', '%s')"
            , $conn->real_escape_string($usuario->uUser)
            , $conn->real_escape_string($usuario->uName)
            , $conn->real_escape_string($usuario->uPass)
        );
        if ( $conn->query($query) ) {
            $usuario->id = $conn->insert_id;
            $result = self::insertaRoles($usuario);
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        return $result;
    }
    private static function insertaRoles($usuario)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        foreach($usuario->roles as $rol) {
            $query = sprintf("INSERT INTO RolesUsuario(usuario, rol) VALUES (%d, %d)"
                , $usuario->id
                , $rol
            );
            if ( ! $conn->query($query) ) {
                error_log("Error BD ({$conn->errno}): {$conn->error}");
                return false;
            }
        }
        return $usuario;
    }




        public static function register($name, $surname, $mail, $dir, $tfno, $dni, $username, $password) {
            
            // Crear conexión
            $conn = Aplicacion::getInstance()->getConexionBD();

            // Preparar la consulta SQL
            $query = "INSERT INTO usuarios (Nombre, Apellidos, Correo, Direccion, Telefono, Dni, Usuario, Contrasena, Tipo) VALUES ('$name', '$surname', '$mail', '$dir', '$tfno', '$dni', '$username', '$password', 0)";
        

            try{//Controlar excepcion sql
            // Ejecutar la consulta SQL
            if ($conn->query($query) === TRUE) {
                $result = true;
            } else {
                $result = false;
            }
        }catch(Exception $e){

            return false;
        }
        
            // Devolver el resultado
            return $result;
        }

        public static function delete($username) {
            
            $conn = Aplicacion::getInstance()->getConexionBD();

            // Prepara la consulta SQL
            $query = "DELETE FROM usuarios WHERE Usuario = '$username'";
        

            try{//Controlar excepcion sql
            // Ejecuta la consulta
            if ($conn->query($query) === TRUE) {
                return true;
            } else {
                return false;
            }
        }catch(Exception $e){

             return false;
        }
        
        }
        private static function cargaRoles($usuario)
        {
            $roles=[];
                
            $conn = Aplicacion::getInstance()->getConexionBd();
            $query = sprintf("SELECT RU.rol FROM RolesUsuario RU WHERE RU.usuario=%d"
                , $usuario->id
            );
            $rs = $conn->query($query);
            if ($rs) {
                $roles = $rs->fetch_all(MYSQLI_ASSOC);
                $rs->free();
    
                $usuario->roles = [];
                foreach($roles as $rol) {
                    $usuario->roles[] = $rol['rol'];
                }
                return $usuario;
    
            } else {
                error_log("Error BD ({$conn->errno}): {$conn->error}");
            }
            return false;
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
            }
        
            // Devuelve el array de usuarios
            return $usuarios;
        }

        public static function edit($nombre, $apellidos, $correo, $direccion, $telefono, $dni, $usuario, $contrasena, $tipo, $usuarioAntiguo) {
            // Conexión a la base de datos
            $conn = Aplicacion::getInstance()->getConexionBD();
            // Obtener los datos actuales del usuario
            $userActual = self::search($usuarioAntiguo);
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
            if ($tipo != 0 && $tipo != 1) {
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
        
        public function tieneRol($role)
        {
            if ($this->roles == null) {
                self::cargaRoles($this);
            }
            return array_search($role, $this->roles) !== false;
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
        public function getNombre()
        {
            return $this->uName;
        }
    
        
    }

    


?>