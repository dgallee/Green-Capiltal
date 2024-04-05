<?php

function estaLogado()
{
    return isset($_SESSION['username']);
}


function esMismoUsuario($usuario)
{
    return estaLogado() && $_SESSION['username'] == $usuario;
}

function idUsuarioLogado()
{
    return $_SESSION['username'] ?? false;
}

function esAdmin()
{
    return estaLogado() && ($_SESSION['tipo'] == 1);
}

function verificaLogado($urlNoLogado)
{
    if (! estaLogado()) {
        Utils::redirige($urlNoLogado);
    }
}

?>