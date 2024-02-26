<?php 

class Usuario{


use MagicProperties;
public const ADMIN_ROLE=1;
public const USER_ROLE=0;
 
public static function login($nombreUsuario, $password)
{
    $usuario = self::buscaUsuario($nombreUsuario);
    if ($usuario && $usuario->compruebaPassword($password)) {
        return $usuario;
    }
    return false;
}
public static function crea($nombreUsuario, $password, $email)
{
    $user = self::buscaUsuario($nombreUsuario);
    if ($user) {
        return false;
    }
    $user = new Usuario($nombreUsuario,self::hashPassword($password), $email,0,0);
    //$user = new Usuario($fila['NombreApellido'], $fila['psswd'],$fila['Email'],$fila['idusuario']);
    return $user;
}
public static function buscaUsuario($nombreUsuario)
{
    $conn = BD::getInstance()->getConexion();
    $query = sprintf("SELECT * FROM usuario U WHERE U.NombreApellido='%s'", $conn->real_escape_string($nombreUsuario));
    $rs = $conn->query($query);
    if ($rs) {
        $fila = $rs->fetch_assoc();
        if(isset($fila['NombreApellido'])){
       
        $user = new Usuario($fila['NombreApellido'], $fila['psswd'],$fila['Email'],$fila['IsAdmin'],$fila['idusuario']);
        $rs->free();
        //borrar print
        return $user; 
        }
        else{
            return false;
        }
    } else {
        error_log("Error BD ({$conn->errno}): {$conn->error}");
    }
    return false;
}
public static function buscaPorId($idUsuario)
{
    $conn = BD::getInstance()->getConexion();
    $query = sprintf("SELECT * FROM usuario WHERE idUsuario=%d", $idUsuario);
    $rs = $conn->query($query);
    if ($rs) {
        $fila = $rs->fetch_assoc();
        $user = new Usuario($fila['NombreApellido'], $fila['psswd'],$fila['Email'],$fila['idusuario']);
        $rs->free();

        return $user;
    } else {
        error_log("Error BD ({$conn->errno}): {$conn->error}");
    }
    return false;
}
private static function hashPassword($password)
{
    return password_hash($password, PASSWORD_DEFAULT);
}

public static function inserta($usuario)
{
    $result = false;
    $conn = BD::getInstance()->getConexion();
    $query=sprintf("INSERT INTO usuario(NombreApellido, Email, psswd,IsAdmin) VALUES ('%s', '%s', '%s','%d')"
        , $conn->real_escape_string($usuario->NombreApellido)
        , $conn->real_escape_string($usuario->Email)
        , $conn->real_escape_string($usuario->psswd)
        , $usuario->isAdmin
    );
    if ( $conn->query($query) ) {
        $results=true;
    } else {
        error_log("Error BD ({$conn->errno}): {$conn->error}");
    }
    return $result;
}

// private static function actualiza($usuario)
//     {
//         $result = false;
//         $conn = BD::getInstance()->getConexion();
//         $query=sprintf("UPDATE Usuarios U SET nombreUsuario = '%s', nombre='%s', password='%s' WHERE U.id=%d"
//             , $conn->real_escape_string($usuario->nombreUsuario)
//             , $conn->real_escape_string($usuario->nombre)
//             , $conn->real_escape_string($usuario->password)
//             , $usuario->id
//         );
//         if ( $conn->query($query) ) {
//             $result = self::borraRoles($usuario);
//             if ($result) {
//                 $result = self::insertaRoles($usuario);
//             }
//         } else {
//             error_log("Error BD ({$conn->errno}): {$conn->error}");
//         }
        
//         return $result;
//     }

    private $idusuario;

    private $NombreApellido;

    private $Email;

    private $psswd;

    private $isAdmin;

    private function __construct($nombreUsuario, $password,$Email, $roles,$id)
    {
        $this->idusuario = $id;
        $this->NombreApellido = $nombreUsuario;
        $this->psswd = $password;
        $this->Email = $Email;
        $this->isAdmin = $roles;
    }

    public function getidusuario()
    {
        return $this->idusuario;
    }

    public function getNombreApellido()
    {
        return $this->NombreApellido;
    }
    public function getisAdmin(){

        return $this->isAdmin;
    }

    public function compruebaPassword($password)
    {
        return password_verify($password, $this->psswd);
    }

    public function cambiaPassword($nuevoPassword)
    {
        $this->password = self::hashPassword($nuevoPassword);
    }
    
    public function guarda()
    {
        if ($this->id !== null) {
            return self::actualiza($this);
        }
        return self::inserta($this);
    }
    
    public function borrate()
    {
        if ($this->id !== null) {
            return self::borra($this);
        }
        return false;
    }
}

?>