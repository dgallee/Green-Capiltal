<?php
require_once 'autorizacion.php';

function saludo()
{
    $html = '';

    if (estaLogado()) {
        $urlLogout = Utils::buildUrl('/logout.php');
        $html = <<<EOS
        Bienvenido, {$_SESSION['username']} <a href="{$urlLogout}">(salir)</a>
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
    unset($_SESSION['username']);
    unset($_SESSION['tipo']);
    unset($_SESSION['password']);
    
    session_destroy();
    session_start();
}
