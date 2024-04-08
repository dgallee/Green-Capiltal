<?php

class Carrito{

    private $cId;
    private $cDniusuario;
    private $cIdProducto;
    private $cCantidad;

    public function __construct($cId, $cDniusuario, $cIdProducto, $cCantidad){
        $this->cId = $cId;
        $this->cDniusuario = $cDniusuario;
        $this->cIdProducto = $cIdProducto;
        $this->cCantidad = $cCantidad;
    }

    public static function mostrarCarrito($cDniusuario){

        $conn = Aplicacion::getInstance()->getConexionBD();
        $sql = "SELECT Id, DNI_usuario, Id_producto, Cantidad FROM carrito WHERE DNI_usuario = '$cDniusuario'";
        $result = $conn->query($sql);
        $articulos = array();

        if ($result->num_rows > 0) {
            // Guarda los datos de cada fila en el array
            while($row = $result->fetch_assoc()) {
                $articulos[] = $row;
            }
        }
        return $articulos;
    }

    public static function mostrarTabla(){
        
        $conn = Aplicacion::getInstance()->getConexionBD();
        // Consulta SQL para obtener todos los usuarios
        $query = "SELECT * FROM carrito";
        $result = $conn->query($query);
        $carrito = array();
    
        if ($result->num_rows > 0) {
            // Guarda los datos de cada fila en el array
            while($row = $result->fetch_assoc()) {
                $carrito[] = $row;
            }
        }
        return $carrito;
    }

    public static function eliminar($cId){

        $conn = Aplicacion::getInstance()->getConexionBD();

        // Prepara la consulta SQL
        $query = "DELETE FROM carrito WHERE Id = '$cId'";
    
        // Ejecuta la consulta
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }


    }
    
    public static function usuarioEliminado($cDniusuario) {
            
        $conn = Aplicacion::getInstance()->getConexionBD();

        // Prepara la consulta SQL
        $query = "DELETE FROM carrito WHERE DNI_usuario = '$cDniusuario'";
    
        // Ejecuta la consulta
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    
    }

    public static function productoEliminado($cIdProducto) {
            
        $conn = Aplicacion::getInstance()->getConexionBD();

        // Prepara la consulta SQL
        $query = "DELETE FROM carrito WHERE Id_producto = '$cIdProducto'";
    
        // Ejecuta la consulta
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    
    }

    public static function search($cId){

        $conn = Aplicacion::getInstance()->getConexionBD();
        $query = sprintf("SELECT * FROM productos WHERE Id = '$cId'");
        $rs = $conn->query($query);
        if ($rs->num_rows > 0) {
            $row = $rs->fetch_assoc();
            $carrito = new Carrito($row['Id'], $row['DNI_usuario'], $row['Id_producto'], $row['Cantidad']);
            $rs->free();
            return $carrito;
        }
        else  error_log("Error BD ({$conn->errno}): {$conn->error}");
        return false;

    }

    public static function add($cDniusuario, $cIdProducto, $cCantidad) {
        // Conexión a la base de datos
        $conn = Aplicacion::getInstance()->getConexionBD();
    
        // Verificar si ya existe una fila con el mismo DNI de usuario y ID de producto
        $query = "SELECT * FROM carrito WHERE DNI_usuario = '$cDniusuario' AND Id_producto = '$cIdProducto'";
        $result = $conn->query($query);
    
        if ($result && $result->num_rows > 0) {
            // Si ya existe una fila, realizar la actualización de la cantidad
            $row = $result->fetch_assoc();
            $cantidadExistente = $row['Cantidad'];
            $nuevaCantidad = $cantidadExistente + $cCantidad;
            $query = "UPDATE carrito SET Cantidad = '$nuevaCantidad' WHERE DNI_usuario = '$cDniusuario' AND Id_producto = '$cIdProducto'";
        } else {
            // Si no existe una fila, realizar la inserción de una nueva fila
            $query = "INSERT INTO carrito (`DNI_usuario`, `Id_producto`, `Cantidad`) VALUES ('$cDniusuario', '$cIdProducto', '$cCantidad')";
        }
    
        // Ejecutar la consulta SQL
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }  
    

    public function getId(){
        return $this->cId;
    }

    public function getDNI(){

        return $this->cDniusuario;
    }

    public function getIdProducto(){

        return $this->cIdProducto;
    }
    public function getCantidad(){
        return $this->cCantidad;
    }
}


?>