<?php

    namespace es\ucm\fdi\aw\valoraciones;
    use es\ucm\fdi\aw\Aplicacion;

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

                $Query= "SELECT usuario From usuarios Where DNI='$dni'";
                $aux= $conn->query($Query);
                $usuario=$aux->fetch_assoc()['usuario'];
                $fila['usuario']=$usuario;

                $valoraciones[] = $fila;
             
            }
            return $valoraciones;
         }


         return 0;

        }



        public static function editValoracion($DniUsuario,$IdProducto,$Puntuacion,$Texto){
            $conn = Aplicacion::getInstance()->getConexionBD();

            $DniUsuario=$conn->real_escape_string($DniUsuario);
            $IdProducto=$conn->real_escape_string($IdProducto);
            $Puntuacion=$conn->real_escape_string($Puntuacion);
            $Texto=$conn->real_escape_string($Texto);

            $query="UPDATE Valoraciones set Texto='$Texto',Puntuacion='$Puntuacion' where DniUsuario ='$DniUsuario' and IdProducto='$IdProducto'";
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