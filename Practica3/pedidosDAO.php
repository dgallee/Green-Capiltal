<?php
require_once 'productosDAO.php';
class Pedido{

    private $pId;
    private $pDniusuario;
    private $pIdProducto;
    private $pCantidadProducto;
    private $pPrecioTotalProducto;

    public function __construct($pId, $pDniusuario, $pIdProducto, $pCantidadProducto, $pPrecioTotalProducto){
        $this->pId = $pId;
        $this->pDniusuario = $pDniusuario;
        $this->pIdProducto = $pIdProducto;
        $this->pCantidadProducto = $pCantidadProducto;
        $this->pPrecioTotalProducto = $pPrecioTotalProducto;
    }

    public static function addPedido($idPedido, $idProducto, $cantidad, $precioTotalArticulo, $dni) {
        $conn = Aplicacion::getInstance()->getConexionBD();
        // Preparar la consulta SQL para insertar un nuevo pedido
        $query = "INSERT INTO pedidos (Id, IdProducto, Unidades, PrecioTotal, DniUsuario) 
        VALUES ('$idPedido', '$idProducto', '$cantidad', '$precioTotalArticulo', '$dni')";

        // Ejecutar la consulta SQL
        if ($conn->query($query) === TRUE) {
            return true; // La inserción fue exitosa
        } else {
            return false; // Hubo un error al insertar el pedido
        }
    }

    public static function mostrarPedidos($cDniusuario){

        $conn = Aplicacion::getInstance()->getConexionBD();
        $sql = "SELECT * FROM pedidos WHERE DniUsuario = '$cDniusuario'";
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


    public static function obtenerIdActual() {
        $conn = Aplicacion::getInstance()->getConexionBD();

        // Consultar el ID más alto de la tabla de pedidos
        $query = "SELECT MAX(Id) AS MaxId FROM pedidos";
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $idActual = $row['MaxId'];
            return $idActual ? $idActual : 0;
        } else {
            return 0; // Devolver 0 si la tabla de pedidos está vacía
        }
    }

    public static function deletePedidos($dni) {
        $conn = Aplicacion::getInstance()->getConexionBD();

        $query = "DELETE FROM pedidos WHERE DniUsuario = '$dni'";

        $result = $conn->query($query);

        return true;
    }


    
    public function getId(){
        return $this->pId;
    }

    public function getDNI(){

        return $this->pDniusuario;
    }

    public function getIdProducto(){

        return $this->pIdProducto;
    }
    public function getCantidad(){
        return $this->pCantidadProducto;
    }
    public function getPrecioTotal(){
        return $this->pPrecioTotalProducto;
    }
}


?>