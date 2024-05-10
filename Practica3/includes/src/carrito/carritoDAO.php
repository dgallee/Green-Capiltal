<?php
namespace es\ucm\fdi\aw\carrito;
use es\ucm\fdi\aw\Aplicacion;
use es\ucm\fdi\aw\productos\productosDAO;
use es\ucm\fdi\aw\pedidos\pedidosDAO;




class carritoDAO{

    private $cId;
    private $cDniusuario;
    private $cIdProducto;
    private $cCantidad;
    private $precioTotal;

    public function __construct($cId, $cDniusuario, $cIdProducto, $cCantidad, $precioTotal){
        $this->cId = $cId;
        $this->cDniusuario = $cDniusuario;
        $this->cIdProducto = $cIdProducto;
        $this->cCantidad = $cCantidad;
        $this->precioTotal = $precioTotal;
    }

    public static function mostrarCarrito($cDniusuario){

        $conn = Aplicacion::getInstance()->getConexionBD();
        $sql = "SELECT Id, DniUsuario, IdProducto, Cantidad, PrecioTotal FROM carrito WHERE DniUsuario = '$cDniusuario'";
        $result = $conn->query($sql);
        $articulos = array();

        if ($result->num_rows > 0) {
            // Guarda los datos de cada fila en el array
            while($row = $result->fetch_assoc()) {
                $articulos[] = $row;
            }
            $result->free();
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
            $result->free();
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

    public static function eliminarUsuario($dni){

        $conn = Aplicacion::getInstance()->getConexionBD();

        $query = "DELETE FROM carrito WHERE DniUsuario = '$dni'";
        $conn->query($query);

        return true;

    }

    public static function deleteProd($id) {
        $conn = Aplicacion::getInstance()->getConexionBD();

        $query = "DELETE FROM carrito WHERE IdProducto = '$id'";

        $result = $conn->query($query);

        return true;
    }
    
    public static function usuarioEliminado($cDniusuario) {
            
        $conn = Aplicacion::getInstance()->getConexionBD();

        // Prepara la consulta SQL
        $query = "DELETE FROM carrito WHERE DniUsuario = '$cDniusuario'";
    
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
            $carrito = new carritoDAO($row['Id'], $row['DniUsuario'], $row['IdProducto'], $row['Cantidad'], $row['PrecioTotal']);
            $rs->free();
            return $carrito;
        }
        else  error_log("Error BD ({$conn->errno}): {$conn->error}");
        return false;

    }

    public static function restaUnidades($cDniusuario, $cIdProducto, $cCantidad, $precio){
        // Conexión a la base de datos
        $conn = Aplicacion::getInstance()->getConexionBD();
    
        // Verificar si ya existe una fila con el mismo DNI de usuario y ID de producto
        $query = "SELECT * FROM carrito WHERE DniUsuario = '$cDniusuario' AND IdProducto = '$cIdProducto'";
        $result = $conn->query($query);
    
        if ($result && $result->num_rows > 0) {
            // Si ya existe una fila, realizar la actualización de la cantidad
            $row = $result->fetch_assoc();
            $result->free();
            $cantidadExistente = $row['Cantidad'];
            if(!$cantidadExistente > $cCantidad){
                error_log("No hay suficientes unidades para el número que se desea eliminar");
                return false;
            }
            $nuevaCantidad = $cantidadExistente - $cCantidad;
            $nuevoPrecio = $nuevaCantidad * $precio;
            $query = "UPDATE carrito SET Cantidad = '$nuevaCantidad', PrecioTotal = '$nuevoPrecio' WHERE DniUsuario = '$cDniusuario' AND IdProducto = '$cIdProducto'";
        } else {
            error_log("El producto que se desea eliminar no existe");
            return false;
        }
    
        // Ejecutar la consulta SQL
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public static function add($cDniusuario, $cIdProducto, $cCantidad, $precio) {
        // Conexión a la base de datos
        $conn = Aplicacion::getInstance()->getConexionBD();
    
        // Verificar si ya existe una fila con el mismo DNI de usuario y ID de producto
        $query = "SELECT * FROM carrito WHERE DniUsuario = '$cDniusuario' AND IdProducto = '$cIdProducto'";
        $result = $conn->query($query);
    
        if ($result && $result->num_rows > 0) {
            // Si ya existe una fila, realizar la actualización de la cantidad
            $row = $result->fetch_assoc();
            $result->free();
            $cantidadExistente = $row['Cantidad'];
            $nuevaCantidad = $cantidadExistente + $cCantidad;
            $nuevoPrecio = $nuevaCantidad * $precio;
            $query = "UPDATE carrito SET Cantidad = '$nuevaCantidad', PrecioTotal = '$nuevoPrecio' WHERE DniUsuario = '$cDniusuario' AND IdProducto = '$cIdProducto'";
        } else {
            // Si no existe una fila, realizar la inserción de una nueva fila
            $precioTotal = $precio * $cCantidad;
            $query = "INSERT INTO carrito (`DniUsuario`, `IdProducto`, `Cantidad`, `PrecioTotal`) VALUES ('$cDniusuario', '$cIdProducto', '$cCantidad', $precioTotal)";
        }
    
        // Ejecutar la consulta SQL
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }  
    
    public static function elimina($cIdProducto, $cDniusuario){
        $conn = Aplicacion::getInstance()->getConexionBD();

        // Obtener la cantidad del producto en el carrito
        $queryCantidad = "SELECT Cantidad FROM carrito WHERE IdProducto = '$cIdProducto' AND DniUsuario = '$cDniusuario'";
        $resultCantidad = $conn->query($queryCantidad);
        if ($resultCantidad && $resultCantidad->num_rows > 0) {
            $row = $resultCantidad->fetch_assoc();
            $resultCantidad->free();
            $cantidad = $row['Cantidad'];
        } else {
            return false; // No se encontró el producto en el carrito
        }

        // Eliminar el producto del carrito
        $queryEliminar = "DELETE FROM carrito WHERE IdProducto = '$cIdProducto' AND DniUsuario = '$cDniusuario'";
        if ($conn->query($queryEliminar) === TRUE) {
            productosDAO::sumarUnidades($cIdProducto, $cantidad);
            return true; // Éxito al eliminar la fila y actualizar el stock
        } else {
            return false; // Error al ejecutar la consulta
        }
    }

    public static function acabaCompra($cIdProducto, $cDniusuario){
        $conn = Aplicacion::getInstance()->getConexionBD();

        // Obtener la cantidad del producto en el carrito
        $queryCantidad = "SELECT Cantidad FROM carrito WHERE IdProducto = '$cIdProducto' AND DniUsuario = '$cDniusuario'";
        $resultCantidad = $conn->query($queryCantidad);
        if ($resultCantidad && $resultCantidad->num_rows > 0) {
            $row = $resultCantidad->fetch_assoc();
            $resultCantidad->free();
        } else {
            return false; // No se encontró el producto en el carrito
        }

        // Eliminar el producto del carrito
        $queryEliminar = "DELETE FROM carrito WHERE IdProducto = '$cIdProducto' AND DniUsuario = '$cDniusuario'";
        if ($conn->query($queryEliminar) === TRUE) {
            return true; // Éxito al eliminar la fila
        } else {
            return false; // Error al ejecutar la consulta
        }
    }

    public static function finalizaPago($cDniusuario){
        $carrito = self::mostrarCarrito($cDniusuario);
        if (!$carrito) {
            return false; // No hay elementos en el carrito del usuario
        }
        $idPedido = pedidosDAO::obtenerIdActual();
        $idPedido += 1;
        $numProductos = self::numeroProductosEnCarrito($cDniusuario);
        // Iterar sobre cada artículo en el carrito
        foreach ($carrito as $articulo) {
            // Obtener el precio total del artículo del carrito
            $precioTotalArticulo = $articulo['PrecioTotal'];
            $cantidad = $articulo['Cantidad'];
            $dni = $articulo['DniUsuario'];
            // Obtener el ID del producto
            $idProducto = $articulo['IdProducto'];
            // Eliminar el artículo del carrito
            self::acabaCompra($idProducto, $cDniusuario);
            pedidosDAO::addPedido($idPedido, $idProducto, $cantidad, $precioTotalArticulo, $dni);
        }

        return true;
    }

    public static function numeroProductosEnCarrito($cDniusuario) {
        // Conexión a la base de datos
        $conn = Aplicacion::getInstance()->getConexionBD();
    
        // Consulta para obtener el número de productos en el carrito del usuario
        $query = "SELECT SUM(Cantidad) AS totalProductos FROM carrito WHERE DniUsuario = '$cDniusuario'";
        $result = $conn->query($query);
    
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $result->free();
            $totalProductos = $row['totalProductos'];
            if ($totalProductos !== null) {
                return $totalProductos;
            } else {
                // Si no hay productos en el carrito, devolvemos 0
                return 0;
            }
        } else {
            // Error al ejecutar la consulta, devolvemos 0
            return 0;
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