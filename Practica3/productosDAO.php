<?php

class Producto{

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
        }

        return $productos;


    }

    public static function showTable(){
        
        $conn = Aplicacion::getInstance()->getConexionBD();
        // Consulta SQL para obtener todos los usuarios
        $query = "SELECT * FROM productos";
        $result = $conn->query($query);
    
        $productos = array();
    
        if ($result->num_rows > 0) {
            // Guarda los datos de cada fila en el array
            while($row = $result->fetch_assoc()) {
                $productos[] = $row;
            }
        }
    
        // Devuelve el array de usuarios
        return $productos;
    }

    
    public static function delete($id) {
            
        $conn = Aplicacion::getInstance()->getConexionBD();

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
        $query = sprintf("SELECT * FROM productos WHERE Id = '$id'");
        $rs = $conn->query($query);
        if ($rs->num_rows > 0) {
            $row = $rs->fetch_assoc();
            $prod = new Producto($row['Nombre'], $row['Id'], $row['Resumen'], $row['Descripcion'], $row['Precio'], $row['Categoria'], $row['Existencias'], $row['Especie'], $row['Imagen']);
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
    
        // Preparar la consulta SQL
        $query = "UPDATE productos SET Nombre = '$name', Resumen = '$res', Descripcion = '$desc', Precio = '$precio', Categoria = '$cat', Especie = '$esp', Imagen = '$img' WHERE Id = '$id'";
    
        // Ejecutar la consulta SQL
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public static function add($name, $res, $desc, $precio, $cat, $existencias, $esp, $img) {
        // Conexión a la base de datos
        $conn = Aplicacion::getInstance()->getConexionBD();
    
        // Obtener los datos actuales del usuario
        $query1 = "SELECT MAX(Id) AS max_id FROM productos";
        $result = $conn->query($query1);
        $max_id = $result->fetch_assoc();
        $id = $max_id['max_id'] + 1;
    
        // Preparar la consulta SQL
        $query = "INSERT INTO productos (`Nombre`, `Id`, `Resumen`, `Descripcion`, `Precio`, `Categoria`, `Existencias`, `Especie`, `Imagen`) VALUES ('$name', '$id', '$res', '$desc', $precio, '$cat', $existencias, '$esp', '$img')";
    
        // Ejecutar la consulta SQL
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }    
    
    public static function reducirUnidades($idProducto, $cantidad) {
        // Conexión a la base de datos
        $conn = Aplicacion::getInstance()->getConexionBD();
    
        // Consulta para actualizar las existencias del producto
        $query = "UPDATE productos SET Existencias = Existencias - $cantidad WHERE Id = '$idProducto'";
    
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
    
        // Elimina duplicados
        $categorias = array_unique($categorias);
    
        return $categorias;
    }

    public static function queryBusqueda() {

        $conn = Aplicacion::getInstance()->getConexionBD();
        if ($conn->connect_error){
            die("La conexión ha fallado" . $conn->connect_error);
        }
    
        $termino = isset($_GET["busqueda"]) ? trim($_GET["busqueda"]) : "";
       


        if (isset($_GET["filter2"]) && $_GET["filter2"] != "") {
            $categoria = $_GET["filter2"];
        }
        
        if (isset($_GET["filter1"])) {
            $precio = $_GET["filter1"];
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
            else if(!empty($categoria)){//aqui nunca entra
                
                $statement->bind_param("sss", $termino, $termino, $categoria);
            }
            else if(!empty($precio)){
               
                $statement->bind_param("ssd", $termino, $termino, $precio);
            }
            else{//aqui tampoco
                
                $statement->bind_param("ss", $termino, $termino);
                
            }
        
            $statement->execute();
           
            $items = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
            

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
                else if(!empty($categoria)){
                    $statement->bind_param("s", $categoria);
                }
                else if(!empty($precio)){
                    $statement->bind_param("d", $precio);
                }
                
                $statement->execute();
                $items = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
                
            }
        }
        return $items;

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