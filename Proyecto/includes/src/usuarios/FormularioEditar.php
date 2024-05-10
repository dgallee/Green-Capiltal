<?php
namespace es\ucm\fdi\aw\usuarios;
use es\ucm\fdi\aw\usuarios\usuarioDAO;
use es\ucm\fdi\aw\Formulario;

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

        parent::__construct('formEdit', ['urlRedireccion' => 'adminUsuarios.php']);
    }
    protected function generaCamposFormulario(&$datos)
    {
        // Aquí puedes definir los campos del formulario de edición

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
        <fieldset class="formulario">

        <label for="nombre">Nombre:</label>
        <div>
            <input type="text" name="nombre" id="nombre" value="$nombre"/>
        </div>
        <label for="apellidos">Apellidos:</label>
        <div>
            <input type="text" name="apellidos" id="apellidos" value="$apellido"/>
        </div>
        <label for="correo">Correo:</label>
        <div>
            <input type="email" name="correo" id="correo" value="$email"/>
        </div>
        <label for="direccion">Dirección:</label>
        <div>
            <input type="text" name="direccion" id="direccion" value="$dir"/>
        </div>
        <label for="telefono">Teléfono:</label>
        <div>
            <input type="text" name="telefono" id="telefono" value="$tel" pattern="[0-9]{9}" title="Por favor, introduzca exactamente 9 números.">
        </div>
    
        <input type="hidden" name="dni" value="$DNI">
        <span id="dnimal" class="error">  Ya existe un Usuario con ese DNI</span>

        <label for="username">Usuario:</label>
        <div>
            <input type="text" name="username" id="username" value="$user"/>
        </div>
        <label for="password">Contraseña:</label>
        <div>
            <input type="password" name="password" id="password" value="$pass"/>
        </div>
        <label for="type">Tipo:</label>
        <div>
        <select name="type" id="type">
            <option value="0" . ($tipo == 0 ? 'selected' : '') . >Usuario</option>
            <option value="1" . ($tipo == 1 ? 'selected' : '') . >Admin</option>
            <option value="2" . ($tipo == 2 ? 'selected' : '') . >Comerciante</option>
            <option value="3" . ($tipo == 3 ? 'selected' : '') . >Moderador</option>
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
       

        
        $esValido = (usuarioDAO::edit($name, $surname, $mail, $dire, $tfno, $dni, $username, $password, $tipo));
    }
}

?>
