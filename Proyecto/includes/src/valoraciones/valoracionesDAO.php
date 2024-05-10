<?php

    namespace es\ucm\fdi\aw\valoraciones;
    use es\ucm\fdi\aw\Aplicacion;
    use es\ucm\fdi\aw\usuarios\usuarioDAO;

    class valoracionesDAO{

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
            $query = "SELECT * FROM valoraciones";
            $result = $conn->query($query);
            $valoraciones = array();
        
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $valoraciones[] = $row;
                }
                $result->free();
            }
        
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

        public static function addValoracion($DniUsuario,$IdProducto,$Puntuacion,$Texto){
            $conn = Aplicacion::getInstance()->getConexionBD();

            $DniUsuario=$conn->real_escape_string($DniUsuario);
            $IdProducto=$conn->real_escape_string($IdProducto);
            $Puntuacion=$conn->real_escape_string($Puntuacion);
            $Texto=$conn->real_escape_string($Texto);

            $query="INSERT INTO valoraciones (DniUsuario,IdProducto,Puntuacion,Texto) values ('$DniUsuario','$IdProducto','$Puntuacion','$Texto')";
            if ($conn->query($query) === TRUE) {
                $result = true;
            } else {
                $result = false;
            }
        
            // Devolver el resultado
            return $result;


        }
        
        public static function getValoracion($DniUsuario,$IdProducto){

            $conn = Aplicacion::getInstance()->getConexionBD();
            $DniUsuario=$conn->real_escape_string($DniUsuario);
            $IdProducto=$conn->real_escape_string($IdProducto);
            $Query= "SELECT Texto From valoraciones where DniUsuario ='$DniUsuario' and IdProducto='$IdProducto'";


            $result = $conn->query($Query);

            if($result->num_rows>0){

             $row=$result->fetch_assoc();
             $result->free();

             return $row['Texto'];
            }
            


            return '';
        }
        public static function getValoraciones($IdProducto){
         $conn=Aplicacion::getInstance()->getConexionBD();
         $IdProducto=$conn->real_escape_string($IdProducto);

         $Query= "SELECT DniUsuario,Texto,Puntuacion From valoraciones Where IdProducto='$IdProducto'";
         $result = $conn->query($Query);

         $valoraciones=array();

         if($result->num_rows>0){
          
            while ($fila = $result->fetch_assoc()) {


                $dni=$fila['DniUsuario'];
                $nombre = UsuarioDAO::obtenerNombre($dni);
                $fila['Nombre']=$nombre;

                $valoraciones[] = $fila;
             
            }
            return $valoraciones;
         }


         return 0;

        }

        public static function mediaValoraciones($IdProducto){
            $conn = Aplicacion::getInstance()->getConexionBD();
        
            $query = "SELECT AVG(Puntuacion) as MediaValoracion FROM valoraciones WHERE IdProducto = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $IdProducto);
            $stmt->execute();
        
            $result = $stmt->get_result();
        
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return round($row['MediaValoracion']);
            }
            else return false;
        }
        
        public static function editValoracion($DniUsuario,$IdProducto,$Puntuacion,$Texto){
            $conn = Aplicacion::getInstance()->getConexionBD();

            $DniUsuario=$conn->real_escape_string($DniUsuario);
            $IdProducto=$conn->real_escape_string($IdProducto);
            $Puntuacion=$conn->real_escape_string($Puntuacion);
            $Texto=$conn->real_escape_string($Texto);

            $query="UPDATE valoraciones set Texto='$Texto',Puntuacion='$Puntuacion' where DniUsuario ='$DniUsuario' and IdProducto='$IdProducto'";
            if ($conn->query($query) === TRUE) {
                $result = true;
            } else {
                $result = false;
            }
        
            // Devolver el resultado
            return $result;


        }
        public static function deleteValoracion($DniUsuario,$IdProducto){
            $conn = Aplicacion::getInstance()->getConexionBD();

            $DniUsuario=$conn->real_escape_string($DniUsuario);
            $IdProducto=$conn->real_escape_string($IdProducto);

            $query="DELETE FROM valoraciones where DniUsuario='$DniUsuario' and IdProducto='$IdProducto'";
            if ($conn->query($query) === TRUE) {
                $result = true;
            } else {
                $result = false;
            }


            return $result;


        }


        
    }

    


?>