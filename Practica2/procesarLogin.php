<?php

require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';
require_once 'includes/vistas/helpers/login.php';
require_once 'usuarioDAO.php';

$tituloPagina = 'Login';

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
$password = $_POST["password"] ?? null;

$esValido = $username && $password && ($usuario = Usuario::login($username, $password));
if ($esValido) {


	$_SESSION["username"] = $username;
	$_SESSION["password"] = $password;
	$_SESSION["tipo"] = $usuario->getUTipo();

}
else{

	$htmlFormLogin = buildFormularioLogin($username, $password);
	$contenidoPrincipal=<<<EOS
		<h1 class='titulo'>Error</h1>
		<p class='mensaje'>El usuario o contraseña no son válidos.</p>
		$htmlFormLogin
	EOS;
	require 'includes/vistas/comun/layout.php';
	exit();
}
$contenidoPrincipal=<<<EOS
	<h1 class='titulo'>¡Bienvenido {$_SESSION['username']}!</h1>
	<p class='mensaje'>Ya tienes acceso a las funciones habilitadas en exclusiva para tu tipo de usuario.</p>
EOS;

require 'includes/vistas/comun/layout.php';

?>