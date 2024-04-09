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

function dniUsuarioLogado() {
    // Verificar si la variable de sesión está definida
    if(isset($_SESSION['DNI'])) {
        // Devolver el valor de la variable de sesión 'DNI'
        return $_SESSION['DNI'];
    } else {
        // Manejar el caso en el que la variable de sesión no esté definida
        return "DNI no disponible";
    }
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