<?php
namespace MiProyecto\Formularios;

require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';
require_once 'includes/src/Formulario.php'; // Asegúrate de incluir el archivo donde está definida la clase Formulario
require_once 'includes/src/FORMULARIOLogin.php';//Desconozco porque hay que incluirlo o da excepción
use Usuario;


class FormularioRegistro extends Formulario {
    public function __construct() {
        parent::__construct('formRegistro', ['urlRedireccion' => 'index.php']);
    }
    
    protected function generaCamposFormulario(&$datos)
    {
        $nombreUsuario = $datos['nombreUsuario'] ?? '';
        $nombre = $datos['nombre'] ?? '';
        $apellidos=$datos['apellidos']??'';

        // Se generan los mensajes de error si existen.
        $htmlErroresGlobales = self::generaListaErroresGlobales($this->errores);
        $erroresCampos = self::generaErroresCampos(['nombre', 'apellidos', 'correo', 'direccion','telefono','dni','username','password','password2'], $this->errores, 'span', array('class' => 'error'));

        
        $html = <<<EOF
        $htmlErroresGlobales
        <fieldset class="formulario">
            <legend>Datos para el registro</legend>
            
            <label for="nombre">Nombre:</label>
            <div>
                <input id="nombre" type="text" name="nombre" value="$nombre" />
            </div>
            {$erroresCampos['nombre']}
            
            <label for="apellidos">Apellidos:</label>
             <div>
                <input type="text" name="apellidos" id="apellidos" required>
            </div>
            {$erroresCampos['apellidos']}

            <label for="correo">Correo:</label>
             <div>
                <input type="email" name="correo" id="correo" required>
            </div>
            {$erroresCampos['apellidos']}

            <label for="direccion">Dirección:</label>
            <div>
                <input type="text" name="direccion" id="direccion" required>
            </div>
            {$erroresCampos['direccion']}

            <label for="telefono">Teléfono:</label>
            <div>
                <input type="text" name="telefono" id="telefono" pattern="[0-9]{9}" title="Por favor, introduzca exactamente 9 números." required>
            </div>
            {$erroresCampos['telefono']}

            <label for="dni">DNI:</label>
            <div>
                <input type="text" name="dni" id="dni" pattern="[0-9]{8}[A-Za-z]" title="Por favor, introduzca 8 números seguidos de una letra." required>
            </div>
            {$erroresCampos['dni']}

            <label for="username">Usuario:</label>
            <div>     
                <input type="text" name="username" id="username">
            </div>
            {$erroresCampos['username']}
            
            <label for="password">Contraseña:</label>
            <div>
                <input type="password" name="password" id="password">
            </div>
            {$erroresCampos['password']}

            <label for="password2">Repetir contraseña:</label>
            <div>
                <input id="password2" type="password" name="password2" />
            </div>
            {$erroresCampos['password2']}

            <div>
                <button type="submit" name="registro">Registrar</button>
            </div>
        </fieldset>
        EOF;

         
        /*
         $html=<<<EOS
         <form action="procesarRegistro.php" method="post">
         <fieldset>
                 <div>
                     <label for="nombre">Nombre:</label>
                     <input type="text" name="nombre" id="nombre" required>
                 </div>
                 <div>
                     <label for="apellidos">Apellidos:</label>
                     <input type="text" name="apellidos" id="apellidos" required>
                 </div>
                 <div>
                     <label for="correo">Correo:</label>
                     <input type="email" name="correo" id="correo" required>
                 </div>
                 <div>
                     <label for="direccion">Dirección:</label>
                     <input type="text" name="direccion" id="direccion" required>
                 </div>
                 <div>
                     <label for="telefono">Teléfono:</label>
                     <input type="text" name="telefono" id="telefono" pattern="[0-9]{9}" title="Por favor, introduzca exactamente 9 números." required>
                 </div>
             
                 <div>
                     <label for="dni">DNI:</label>
                     <input type="text" name="dni" id="dni" pattern="[0-9]{8}[A-Za-z]" title="Por favor, introduzca 8 números seguidos de una letra." required>
                 </div>
                 <div>
                     <label for="username">Usuario:</label>
                     <input type="text" name="username" id="username">
                 </div>
                 <div>
                     <label for="password">Contraseña:</label>
                     <input type="password" name="password" id="password">
                 </div>
                 <button type="submit">Ingresar</button>
             </fieldset>
             </form>
     
         EOS;
         */

        return $html;
    }
    

    protected function procesaFormulario(&$datos)
    {
        $this->errores = [];

        $nombreUsuario = trim($datos['username'] ?? '');
        $nombreUsuario = filter_var($nombreUsuario, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ( ! $nombreUsuario || mb_strlen($nombreUsuario) < 5) {
            $this->errores['username'] = 'El nombre de usuario tiene que tener una longitud de al menos 5 caracteres.';
        }

        $nombre = trim($datos['nombre'] ?? '');
        $nombre = filter_var($nombre, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ( ! $nombre || mb_strlen($nombre) < 5) {
            $this->errores['nombre'] = 'El nombre tiene que tener una longitud de al menos 5 caracteres.';
        }

        $password = trim($datos['password'] ?? '');
        $password = filter_var($password, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ( ! $password || mb_strlen($password) < 5 ) {
            $this->errores['password'] = 'El password tiene que tener una longitud de al menos 5 caracteres.';
        }

        $password2 = trim($datos['password2'] ?? '');
        $password2 = filter_var($password2, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ( ! $password2 || $password != $password2 ) {
            $this->errores['password2'] = 'Los passwords deben coincidir';
        }

        $apellidos = trim ($datos['apellidos'] ?? '');
        $apellidos=filter_var($apellidos, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $correo = trim($datos['correo'] ?? '');
        $correo= filter_var($correo, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $direccion= trim($datos['direccion']?? '');
        $direccion=filter_var($direccion, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $telefono = trim($datos['telefono']??'');
        $telefono=filter_var($telefono, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $dni = trim($datos['dni']??'');
        $dni = filter_var($dni, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (count($this->errores) === 0) {
           // $usuario = Usuario::buscaUsuario($nombreUsuario);

           $usuario=Usuario::searchLogin($nombreUsuario);
	
            if ($usuario) {
                $this->errores[] = "El usuario ya existe";
            } else {
               // $usuario = Usuario::crea($nombreUsuario, $password, $nombre, Usuario::USER_ROLE);
               $usuario= Usuario::register($nombre,$apellidos,$correo,$direccion,$telefono,$dni,$nombreUsuario,$password);
               $_SESSION["username"] = $nombreUsuario;
               $_SESSION["password"] = $password;
               $_SESSION["DNI"] = $dni;
               $_SESSION["tipo"]=0;
            }
        }
    }
}

?>
