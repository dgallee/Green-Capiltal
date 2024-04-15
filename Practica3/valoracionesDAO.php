<?php

    require_once "pedidosDAO.php";

    class Valoracion{

        private $vIdProducto;
        private $vDniUsuario;
        private $vPuntuacion;
        private $vTexto;
        
        private function __construct($vIdProducto, $vDniUsuario, $vPuntuacion, $vTexto) {
            
            $this->vIdProducto = $vIdProducto;
            $this->vDniUsuario = $vDniUsuario;
            $this->vPuntuacion = $vPuntuacion;
            $this->vTexto = $vTexto;
        }
        
        public static function showTable(){        
            $conn = Aplicacion::getInstance()->getConexionBD();
            // Consulta SQL para obtener todos los usuarios
            $query = "SELECT * FROM valoraciones";
            $result = $conn->query($query);
            $valoraciones = array();
        
            if ($result->num_rows > 0) {
                // Guarda los datos de cada fila en el array
                while($row = $result->fetch_assoc()) {
                    $valoraciones[] = $row;
                }
                $result->free();
            }
        
            // Devuelve el array de usuarios
            return $valoraciones;
        }


        public function getIdProducto() {
            return $this->vIdProducto;
        }
        
        public function getDniUsuario() {
            return $this->vDniUsuario;
        }
        
        public function getPuntuacion() {
            return $this->vPuntuacion;
        }
        
        public function getTexto() {
            return $this->vTexto;
        }
        
    }

    


?>