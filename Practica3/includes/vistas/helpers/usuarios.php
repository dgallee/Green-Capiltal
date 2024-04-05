<?php
require_once 'autorizacion.php';

function saludo()
{
    $html = '';

    if (estaLogado()) {
        $urlLogout = Utils::buildUrl('/logout.php');
        $html = <<<EOS
        Bienvenido, {$_SESSION['nombre']} <a href="{$urlLogout}">(salir)</a>
        EOS;
    } else {
        $urlLogin = Utils::buildUrl('/login.php');
        $html = <<<EOS
        Usuario desconocido. <a href="{$urlLogin}">Login</a>
        EOS;
    }

    return $html;
}

function logout()
{
    //Doble seguridad: unset + destroy
    unset($_SESSION['nombre']);
    unset($_SESSION['esAdmin']);
    unset($_SESSION['password']);
    
    session_destroy();
    session_start();
}

?>