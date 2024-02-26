<?php



require_once '../../../../includes/config.php';

require_once RAIZ_APP."/vistas/helpers/usuarios.php";
require_once RAIZ_APP."/vistas/helpers/autorizacion.php";
require_once RAIZ_APP."/vistas/helpers/forms/form_register.php";

$tituloPagina = 'Register';

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
$password = $_POST["password"] ?? null;
$rep_password = $_POST["rep_password"] ?? null;
$email = $_POST["email"] ?? null;
$esValido = $username && $email && ($password==$rep_password) && ($usuario = Usuario::crea($username, $password,$email));//comprabaciones de datos
if (!$esValido) {
	$htmlFormLogin = buildFormularioRegister($username, $password,$rep_password,$email);
	$contenidoPrincipal=<<<EOS
		<h1>Error</h1>
		<p>Uno de los campos era vacio o las contraseñas no coinciden o ya has creado cuenta.</p>
		$htmlFormLogin
	EOS;
	require_once RAIZ_APP."/vistas/comun/layout.php";
	exit();
}

//if valido deberia hacer con email
Usuario::inserta($usuario);
$contenidoPrincipal=<<<EOS
	<h1>Bienvenido ${_SESSION['nombre']}</h1>
	<p>Usa el menú de la izquierda para navegar.</p>
EOS;

$conn = BD::getInstance()->getConexion();
$query = sprintf("SELECT * FROM usuario U WHERE U.NombreApellido='%s'", $conn->real_escape_string($nombreUsuario));
$rs = $conn->query($query);

$_SESSION['idUsuario'] = $usuario->idusuario;

$_SESSION['roles'] = $usuario->isAdmin;

$_SESSION['nombre'] = $usuario->NombreApellido;


require_once RAIZ_APP."/vistas/comun/layout.php";