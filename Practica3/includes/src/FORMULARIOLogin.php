<?php

namespace MiProyecto\Formularios;
require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';
require_once 'includes/src/Formulario.php'; // Asegúrate de incluir el archivo donde está definida la clase Formulario
require_once 'includes/src/FORMULARIOLogin.php';
use Usuario;


class FormularioLogin extends Formulario
{
    public function __construct() {
        parent::__construct('formLogin', ['urlRedireccion' => 'index.php']);
    }
    
    protected function generaCamposFormulario(&$datos)
    {
        // Se reutiliza el nombre de usuario introducido previamente o se deja en blanco
        $nombreUsuario = $datos['nombreUsuario'] ?? '';

        

        // Se generan los mensajes de error si existen.
        $htmlErroresGlobales = self::generaListaErroresGlobales($this->errores);
        $erroresCampos = self::generaErroresCampos(['nombreUsuario', 'password'], $this->errores, 'span', array('class' => 'error'));

        // Se genera el HTML asociado a los campos del formulario y los mensajes de error.
        $html = <<<EOF
        $htmlErroresGlobales
        <fieldset class="formulario">
            <legend>Usuario y contraseña</legend>
            <label for="nombreUsuario">Usuario:</label>
            <div>
                <input id="nombreUsuario" type="text" name="nombreUsuario" value="$nombreUsuario" >
            </div>
            {$erroresCampos['nombreUsuario']}

            <label for="password">Contraseña:</label>
            <div>
                <input id="password" type="password" name="password" >
            </div>
            {$erroresCampos['password']}
            <div>
            <button type="submit">Entrar</button>
            <button type="button" onclick="location.href='registro.php'">Registrarse</button>
            </div>
        </fieldset>
        EOF;
       // <a href="registro.php"><button type="button">Registrarse</button></a>
        return $html;
    }

    protected function procesaFormulario(&$datos)
    {
        $this->errores = [];
        $nombreUsuario = trim($datos['nombreUsuario'] ?? '');
        $nombreUsuario = filter_var($nombreUsuario, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ( ! $nombreUsuario || empty($nombreUsuario) ) {
            $this->errores['nombreUsuario'] = 'El nombre de usuario no puede estar vacío';
        }
        
        $password = trim($datos['password'] ?? '');
        $password = filter_var($password, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ( ! $password || empty($password) ) {
            $this->errores['password'] = 'El password no puede estar vacío.';
        }
        
        if (count($this->errores) === 0) {
            $usuario = Usuario::login($nombreUsuario, $password);
        
            if (!$usuario) {
                $this->errores[] = "El usuario o el password no coinciden";
            } else {
                //Pongo comentarios por si lo volvemos a usar
                //$_SESSION['login'] = true;
                //$_SESSION['nombre'] = $usuario->getUName();
                $_SESSION["username"] = $nombreUsuario;
	            $_SESSION["password"] = $password;
                $_SESSION["DNI"] = $usuario->getUDNI();
                $_SESSION["tipo"] = $usuario->getUTipo();
            }
        }
    }
}

?>
