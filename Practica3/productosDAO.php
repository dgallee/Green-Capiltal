<?php

class Producto{

    private $pNombre;
    private $pDesc;
    private $pPrecio;
    private $pCategoria;
    private $pExistencias;
    private $pEspecie;
    private $pImagen;

    public function __construct($pNombre, $pDesc, $pPrecio, $pCategoria, $pExistencias, $pEspecie, $pImagen){
        $this->pNombre = $pNombre;
        $this->pDesc = $pDesc;
        $this->pPrecio = $pPrecio;
        $this->pCategoria = $pCategoria;
        $this->pExistencias = $pExistencias;
        $this->pEspecie = $pEspecie;
        $this->pImagen = $pImagen;
    }

    public static function showProducts(){

        $conn = BD::getInstance()->getConexion();
        $sql = 'SELECT Nombre, Descripcion, Precio, Categoria, Existencias, Especie, Imagen FROM productos';
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

    public function getNombre(){
        return $this->pNombre;
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