<?php

require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';
require_once 'includes/vistas/helpers/login.php';
require_once 'usuarioDAO.php';

$tituloPagina = 'Login';

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
$password = $_POST["password"] ?? null;

$esValido = $username && $password && ($usuario = Usuario::login($username, $password));
if (!$esValido) {
	$htmlFormLogin = buildFormularioLogin($username, $password);
	$contenidoPrincipal=<<<EOS
		<h1>Error</h1>
		<p>El usuario o contraseña no son válidos.</p>
		$htmlFormLogin
	EOS;
	require 'includes/vistas/comun/layout.php';
	exit();
}
else{

	$_SESSION["username"] = $username;
	$_SESSION["password"] = $password;
}
$contenidoPrincipal=<<<EOS
	<h1>Bienvenido {$_SESSION['username']}</h1>
	<p>Usa el menú de la izquierda para navegar.</p>
EOS;

require 'includes/vistas/comun/layout.php';
