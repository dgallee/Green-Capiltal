<?php

/**
 * Funciones de utilidad para acceso a la base de datos.
 */
class Aplicacion
{
    private static $instancia = null;
    private $inicializada=false;

    /**
     * Devuelve una instancia de {@see BD}.
     * 
     * 
     * @return Aplicacion Obtiene la única instancia de la <code>BD</code>
     */
    public static function getInstance()
    {
        if (self::$instancia === null) {
            self::$instancia = new self;
        }
        return self::$instancia;
    }

    private $conexion;
    private $bdDatosConexion;

    private function __construct()
    {
        $this->conexion = null;
    }

    /**
     * Evita que se pueda utilizar el operador clone.
     */
    public function __clone()
    {
        throw new Exception('No tiene sentido el clonado');
    }

    /**
     * Evita que se pueda utilizar serialize().
     */
    public function __sleep()
    {
        throw new Exception('No tiene sentido el serializar el objeto');
    }

    /**
     * Evita que se pueda utilizar unserialize().
     */
    public function __wakeup()
    {
        throw new Exception('No tiene sentido el deserializar el objeto');
    }

    public function init($bdDatosConexion){

    if(!$this->inicializada){
    $this->bdDatosConexion=$bdDatosConexion;
    $this->inicializada=true;

    }


    }

    function getConexionBD()
    {
         if(!$this->inicializada){
            echo 'Aplicacion no inicializada';
            return;
         }


        if ($this->conexion == null) {
            $conn = new mysqli($this->bdDatosConexion['host'],$this->bdDatosConexion['user'], $this->bdDatosConexion['pass'], $this->bdDatosConexion['name']);
            if ($conn->connect_errno) {
                error_log("Error de conexión a la BD: ({$conn->connect_errno }) {$conn->connect_error}");
                paginaError(502, 'Error', 'Oops', 'No ha sido posible conectarse a la base de datos.');
            }

            if (!$conn->set_charset("utf8mb4")) {
                error_log("Error al configurar la codificación de la BD: ({$conn->errno }) {$conn->error}");
                paginaError(502, 'Error', 'Oops', 'No ha sido posible configurar la base de datos.');
            }

            $this->conexion = $conn;

            // Se llamará a cierraConexion() antes de terminar la ejecución del script
            register_shutdown_function(Closure::fromCallable([$this, 'cierraConexion']));
        }
        return $this->conexion;
    }
    
    private function cierraConexion()
    {
        if ($this->conexion != null && !$this->conexion->connect_errno) {
            $this->conexion->close();
        }
    }
    
}
