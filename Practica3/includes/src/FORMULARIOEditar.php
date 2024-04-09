<?php
namespace MiProyecto\Formularios;

require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';
require_once 'includes/vistas/helpers/login.php';
require_once 'includes/src/Formulario.php'; // Asegúrate de incluir el archivo donde está definida la clase Formulario
use Usuario;


class FormularioEditar extends Formulario {


    private $name;
    private $surname;
    
    private $email;
    private $dir;
    private $tel;
    private $dni;
    private $user;

    private $pass;
    
    private $tipo;

    public function __construct($name,$surname,$email,$dir,$tel,$dni,$user,$pass,$tipo) {

        $this->name=$name;
        $this->surname=$surname;
        $this->email=$email;
        $this->dir=$dir;
        $this->tel=$tel;
        $this->dni=$dni;
        $this->user=$user;
        $this->pass=$pass;
        $this->tipo=$tipo;

        parent::__construct('formEdit');
    }
    protected function generaCamposFormulario(&$datos)
    {
        // Aquí puedes definir los campos del formulario de edición

      

        /*
        $nombre = $datos['nombre'] ?? '';
        $apellido = $datos['apellidos'] ?? '';
        $email = $datos['correo'] ?? '';
        $dir = $datos['direccion'] ?? '';
        $tel = $datos['telefono'] ?? '';
        $DNI = $datos['dni'] ?? '';
        $user = $datos['username'] ?? '';
        $pass = $datos['password'] ?? '';
        $tipo = $datos['type'] ?? '';
        */
        $nombre= $this->name;
        $apellido = $this->surname;
        $email = $this->email;
        $dir= $this->dir;
        $tel=$this->tel;
        $DNI=$this->dni;
        $user=$this->user;
        $pass=$this->pass;
        $tipo=$this->tipo;

        

        $html = <<<EOS
        <form action="procesarEditar.php" method="post">
        <fieldset>
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="$nombre"/>
        </div>
        <div>
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" value="$apellido"/>
        </div>
        <div>
            <label for="correo">Correo:</label>
            <input type="email" name="correo" id="correo" value="$email"/>
        </div>
        <div>
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" id="direccion" value="$dir"/>
        </div>
        <div>
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" value="$tel" pattern="[0-9]{9}" title="Por favor, introduzca exactamente 9 números.">
        </div>
    
        <input type="hidden" name="dni" value="$DNI">
    
        <div>
            <label for="username">Usuario:</label>
            <input type="text" name="username" id="username" value="$user"/>
        </div>
        <div>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" value="$pass"/>
        </div>
        <div>
        <label for="type">Tipo:</label>
        <select name="type" id="type" selected="$tipo"/>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
        </select>
        </div>
    
        <button type="submit">Ingresar</button>
        </fieldset>
        </form>
    
        EOS;

        return $html;
    }

    protected function procesaFormulario(&$datos)
    {
        $name = $_POST["nombre"];
        $surname = $_POST["apellidos"];
        $mail = $_POST["correo"];
        $dire = $_POST["direccion"];
        $tfno = $_POST["telefono"];
        $dni = $_POST["dni"];
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = $_POST["password"];
        $tipo = $_POST["type"];
       

        
        $esValido = (Usuario::edit($name, $surname, $mail, $dire, $tfno, $dni, $username, $password, $tipo));
        if ($esValido){
            header('Location: adminUsuarios.php');
        }
        else{
            header('Location: adminUsuarios.php');
        }
    }
}

?>
