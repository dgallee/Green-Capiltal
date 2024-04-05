<?php
namespace MiProyecto\Formularios;

require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';
require_once 'includes/vistas/helpers/login.php';
require_once 'includes/Formulario.php'; // Asegúrate de incluir el archivo donde está definida la clase Formulario


class FormularioEditar extends Formulario {
    protected function generaCamposFormulario(&$datos)
    {
        // Aquí puedes definir los campos del formulario de edición
        $name = $datos['nombre'] ?? '';
        $surname = $datos['apellidos'] ?? '';
        $mail = $datos['correo'] ?? '';
        $dire = $datos['direccion'] ?? '';
        $tfno = $datos['telefono'] ?? '';
        $dni = $datos['dni'] ?? '';
        $username = $datos['username'] ?? '';
        $password = $datos['password'] ?? '';
        $tipo = $datos['type'] ?? '';

        $html = <<<HTML
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="$name" required>
        </div>
        <div>
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" value="$surname" required>
        </div>
        <div>
            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo" value="$mail" required>
        </div>
        <div>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" value="$dire" required>
        </div>
        <div>
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" value="$tfno" required>
        </div>
        <div>
            <label for="dni">DNI:</label>
            <input type="text" id="dni" name="dni" value="$dni" required>
        </div>
        <div>
            <label for="username">Nombre de usuario:</label>
            <input type="text" id="username" name="username" value="$username" required>
        </div>
        <div>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" value="$password" required>
        </div>
        <div>
            <label for="type">Tipo:</label>
            <input type="text" id="type" name="type" value="$tipo" required>
        </div>
        HTML;

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
        $oldUser = $_POST["oldUser"];

        $esValido = (Usuario::edit($name, $surname, $mail, $dire, $tfno, $dni, $username, $password, $tipo, $oldUser));
        if ($esValido){
            header('Location: adminUsuarios.php');
        }
        else{
            header('Location: adminUsuarios.php');
        }
    }
}

?>
