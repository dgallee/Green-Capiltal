<?php

namespace es\ucm\fdi\aw\productos;
use es\ucm\fdi\aw\Aplicacion;
use es\ucm\fdi\aw\pedidos\pedidosDAO;
use es\ucm\fdi\aw\carrito\carritoDAO;


class productosDAO{

    private $pNombre;
    private $pId;
    private $pRes;
    private $pDesc;
    private $pPrecio;
    private $pCategoria;
    private $pExistencias;
    private $pEspecie;
    private $pImagen;

    public function __construct($pNombre, $pId, $pRes, $pDesc, $pPrecio, $pCategoria, $pExistencias, $pEspecie, $pImagen){
        $this->pNombre = $pNombre;
        $this->pId = $pId;
        $this->pRes = $pRes;
        $this->pDesc = $pDesc;
        $this->pPrecio = $pPrecio;
        $this->pCategoria = $pCategoria;
        $this->pExistencias = $pExistencias;
        $this->pEspecie = $pEspecie;
        $this->pImagen = $pImagen;
    }

    public static function showProducts(){

        $conn = Aplicacion::getInstance()->getConexionBD();
        $sql = 'SELECT Nombre, Id, Resumen, Descripcion, Precio, Categoria, Existencias, Especie, Imagen FROM productos';
        $result = $conn->query($sql);
        $productos = array();

        if ($result->num_rows > 0) {
            // Guarda los datos de cada fila en el array
            while($row = $result->fetch_assoc()) {
                $productos[] = $row;
            }
            $result->free();
        }

        return $productos;


    }

    public static function showTable($dniVendedor){        
        $conn = Aplicacion::getInstance()->getConexionBD();
        // Consulta SQL para obtener todos los usuarios
        $dniVendedor = $conn->real_escape_string($dniVendedor);
        if($dniVendedor == "admin"){
            $query = "SELECT * FROM productos";
        } else{
            $query = "SELECT * FROM productos WHERE DniVendedor = '$dniVendedor'";
        }
        $result = $conn->query($query);
    
        $productos = array();
    
        if ($result->num_rows > 0) {
            // Guarda los datos de cada fila en el array
            while($row = $result->fetch_assoc()) {
                $productos[] = $row;
            }
            $result->free();
        }
    
        // Devuelve el array de usuarios
        return $productos;
    }

    
    public static function delete($id) {
            
        $conn = Aplicacion::getInstance()->getConexionBD();
        $id = $conn->real_escape_string($id);
        pedidosDAO::deleteProd($id);
        carritoDAO::deleteProd($id);
        // Prepara la consulta SQL
        $query = "DELETE FROM productos WHERE Id = '$id'";
    
        // Ejecuta la consulta
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    
    }

    public static function search($id){

        $conn = Aplicacion::getInstance()->getConexionBD();
        $id = $conn->real_escape_string($id);
        $query = sprintf("SELECT * FROM productos WHERE Id = '$id'");
        $rs = $conn->query($query);
        if ($rs->num_rows > 0) {
            $row = $rs->fetch_assoc();
            $prod = new productosDAO($row['Nombre'], $row['Id'], $row['Resumen'], $row['Descripcion'], $row['Precio'], $row['Categoria'], $row['Existencias'], $row['Especie'], $row['Imagen']);
            $rs->free();
            return $prod;
        }
        else  error_log("Error BD ({$conn->errno}): {$conn->error}");
        return false;

    }

    public static function edit($name, $res, $desc, $precio, $cat, $id, $esp, $img) {
        // Conexión a la base de datos
        $conn = Aplicacion::getInstance()->getConexionBD();
        // Obtener los datos actuales del usuario
        $id = $conn->real_escape_string($id);
        $prodActual = self::search($id);
        // Comprobar si las variables son distintas a las locales y que no estén vacías
        if (empty($name)) {
            $name = $prodActual->pNombre;
        }
        if (empty($res)) {
            $res = $prodActual->pRes;
        }
        if (empty($desc)) {
           $desc =  $prodActual->pDesc;
        }
        if (empty($precio)) {
            $precio = $prodActual->pPrecio;
        }
        if (empty($cat)) {
            $cat = $prodActual->pCategoria;
        }
        if (empty($esp)) {
            $esp = $prodActual->pEspecie;
        }
        if (empty($img)) {
            $img = $prodActual->pImagen;
        }
        $name = $conn->real_escape_string($name);
        $res = $conn->real_escape_string($res);
        $desc = $conn->real_escape_string($desc);
        $cat = $conn->real_escape_string($cat);
        $esp = $conn->real_escape_string($esp);
        $img = $conn->real_escape_string($img);
        // Preparar la consulta SQL
        $query = "UPDATE productos SET Nombre = '$name', Resumen = '$res', Descripcion = '$desc', Precio = '$precio', Categoria = '$cat', Especie = '$esp', Imagen = '$img' WHERE Id = '$id'";
    
        // Ejecutar la consulta SQL
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public static function add($name, $res, $desc, $precio, $cat, $existencias, $esp, $img, $dniVendedor) {
        // Conexión a la base de datos
        $conn = Aplicacion::getInstance()->getConexionBD();
    
        // Obtener los datos actuales del usuario
        $query1 = "SELECT MAX(Id) AS max_id FROM productos";
        $result = $conn->query($query1);
        $max_id = $result->fetch_assoc();
        $id = $max_id['max_id'] + 1;
        $result->free();
    
        $name = $conn->real_escape_string($name);
        $res = $conn->real_escape_string($res);
        $desc = $conn->real_escape_string($desc);
        $cat = $conn->real_escape_string($cat);
        $esp = $conn->real_escape_string($esp);
        $img = $conn->real_escape_string($img);
        // Preparar la consulta SQL
        $query = "INSERT INTO productos (`Nombre`, `Id`, `Resumen`, `Descripcion`, `Precio`, `Categoria`, `Existencias`, `Especie`, `Imagen`, `DniVendedor`) VALUES ('$name', '$id', '$res', '$desc', $precio, '$cat', $existencias, '$esp', '$img', '$dniVendedor')";    
        // Ejecutar la consulta SQL
        if ($conn->query($query) === TRUE) {
            return $id;
        } else {
            return false;
        }
    }    
    
    public static function reducirUnidades($idProducto, $cantidad) {
        // Conexión a la base de datos
        $conn = Aplicacion::getInstance()->getConexionBD();
        $idProducto = $conn->real_escape_string($idProducto);
        // Preparar la consulta SQL
        $query = "UPDATE productos SET Existencias = Existencias - ? WHERE Id = ?";
        $stmt = $conn->prepare($query);
    
        if (!$stmt) {
            error_log("Error al preparar la consulta: " . $conn->error);
            return false;
        }
    
        // Enlazar parámetros
        $stmt->bind_param("ii", $cantidad, $idProducto);
    
        // Ejecutar la consulta preparada
        if ($stmt->execute()) {
            return true;
        } else {
            error_log("Error al ejecutar la consulta: " . $stmt->error);
            return false;
        }
    }


    public static function actualizarImagen($idProducto, $rutaImagen) {
        // Conexión a la base de datos
        $conn = Aplicacion::getInstance()->getConexionBD();
        $idProducto = $conn->real_escape_string($idProducto);
        $rutaImagen = $conn->real_escape_string($rutaImagen);
        // Preparar la consulta SQL para actualizar la ruta de la imagen
        $query = "UPDATE productos SET Imagen = ? WHERE Id = ?";

        // Preparar la declaración
        $statement = $conn->prepare($query);

        // Vincular los parámetros
        $statement->bind_param("si", $rutaImagen, $idProducto);

        // Ejecutar la consulta
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public static function sumarUnidades($idProducto, $cantidad) {
        // Conexión a la base de datos
        $conn = Aplicacion::getInstance()->getConexionBD();
        $idProducto = $conn->real_escape_string($idProducto);
        // Consulta para actualizar las existencias del producto
        $query = "UPDATE productos SET Existencias = Existencias + $cantidad WHERE Id = '$idProducto'";
        // Ejecutar la consulta SQL
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }

    }
    public static function  getCategorias() {
        $conn = Aplicacion::getInstance()->getConexionBD();
        $sql = "SELECT Categoria FROM productos";
        $resultado = $conn->query($sql);
        $categorias = array();
    
        while ($fila = $resultado->fetch_assoc()) {
            $categorias[] = $fila['Categoria'];
        }
        $resultado->free();
        // Elimina duplicados
        $categorias = array_unique($categorias);
    
        return $categorias;
    }

    public static function queryBusqueda($termino,$precio,$categoria) {

        $conn = Aplicacion::getInstance()->getConexionBD();
        if ($conn->connect_error){
            die("La conexión ha fallado" . $conn->connect_error);
        }
    
        

        $query = "SELECT * FROM productos WHERE 1";

        
        if (!empty($termino)) {
            
           
            $query .= " AND (Nombre LIKE ? OR Descripcion LIKE ?)";
        
            if (!empty($categoria)) {
                
                $query .= " AND Categoria = ?";
            }
            
            if (!empty($precio)) {
            
                $query .= " AND Precio <= ?";
            }
            $statement = $conn->prepare($query);

            $termino = "%".$termino."%";
            
            if(!empty($categoria) and !empty($precio)){
                
                $statement->bind_param("sssd", $termino, $termino,$categoria, $precio);
                
            }
            else if(!empty($precio)){
               
                $statement->bind_param("ssd", $termino, $termino, $precio);
            }
        
            $statement->execute();
           
            
            

        }
        else {
           

            if (!empty($categoria) || !empty($precio)) {//busqueda sin termino 
                
                if (!empty($categoria)) {//busqueda solo por precio
               
                    $query .= " AND Categoria = ?";
                }

                if (!empty($precio)) {//busqueda solo por precio
               
                    $query .= " AND Precio <= ?";
                }
                
        
                $statement = $conn->prepare($query);
                $termino = "%".$termino."%";
                if(!empty($categoria)  and !empty($precio)){
                    $statement->bind_param("sd",$categoria, $precio);
                    
                }
                else if(!empty($precio)){
                    $statement->bind_param("d", $precio);
                }
                
                $statement->execute();
  
            }
        }
        

        $result = $statement->get_result();

        // Verificar si se encontraron resultados
        if ($result->num_rows > 0) {
            $items = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            // No se encontraron resultados, devolver null
            $items = null;
        }

        

        return $items;

    }

    public static function nombreRepetido($nombre){

        $conn = Aplicacion::getInstance()->getConexionBD();
        $pNombre = $conn->real_escape_string($nombre);
        $query = "SELECT Nombre FROM productos WHERE Nombre = '$pNombre'";
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            $result->free();
            return false;
        } else {
            // Manejo de error si la consulta falla o no devuelve resultados
            $result->free();
            return true;
        }

    }

    public static function precio($pId){
        $conn = Aplicacion::getInstance()->getConexionBD();
        $pId = $conn->real_escape_string($pId);
        $query = "SELECT Precio FROM productos WHERE Id = '$pId'";
        $result = $conn->query($query);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $result->free();
            return $row['Precio'];
        } else {
            // Manejo de error si la consulta falla o no devuelve resultados
            return false;
        }
    }

    public static function obtenerNombre($pId){
        $conn = Aplicacion::getInstance()->getConexionBD();
        $pId = $conn->real_escape_string($pId);
        $query = "SELECT Nombre FROM productos WHERE Id = '$pId'";
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

    public static function existencias($pId){
        $conn = Aplicacion::getInstance()->getConexionBD();
        $pId = $conn->real_escape_string($pId);
        $query = "SELECT Existencias FROM productos WHERE Id = '$pId'";
        $result = $conn->query($query);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $result->free();
            return $row['Existencias'];
        } else {
            // Manejo de error si la consulta falla o no devuelve resultados
            return false;
        }
    }
    
    public function getNombre(){
        return $this->pNombre;
    }

    public function getId(){

        return $this->pId;
    }

    public function getRes(){

        return $this->pRes;
    }
    public function getDesc(){
        return $this->pDesc;
    }

    public function getPrecio(){
        return $this->pPrecio;
    }

    public function getCategoria(){
        return $this->pCategoria;
    }

    public function getExistencias(){
        return $this->pExistencias;
    }

    public function getEspecie(){
        return $this->pEspecie;
    }

    public function getImagen(){
        return $this->pImagen;
    }
}
?>