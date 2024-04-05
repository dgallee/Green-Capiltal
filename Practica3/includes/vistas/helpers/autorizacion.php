<?php

function estaLogado()
{
    return isset($_SESSION['nombre']);
}


function esMismoUsuario($usuario)
{
    return estaLogado() && $_SESSION['nombre'] == $usuario;
}

function idUsuarioLogado()
{
    return $_SESSION['nombre'] ?? false;
}

function esAdmin()
{
    return estaLogado() && ($_SESSION['esAdmin'] == 1);
}

function verificaLogado($urlNoLogado)
{
    if (! estaLogado()) {
        Utils::redirige($urlNoLogado);
    }
}

?>