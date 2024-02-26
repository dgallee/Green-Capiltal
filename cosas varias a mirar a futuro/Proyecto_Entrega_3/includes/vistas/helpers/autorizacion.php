<?php

    function estaLogado()
    {
        return isset($_SESSION['idUsuario']);
    }


    function esMismoUsuario($idUsuario)
    {
        return estaLogado() && $_SESSION['idUsuario'] == $idUsuario;
    }

    function idUsuarioLogado()
    {
        return $_SESSION['idUsuario'] ?? false;
    }

    function esAdmin()
    {
        if (!is_array($_SESSION['roles'])) {
            // Convert the roles string to an array
            $_SESSION['roles'] = explode(',', $_SESSION['roles']);
            
        }
        var_dump($_SESSION['roles']);

        return estaLogado() && (array_search(Usuario::ADMIN_ROLE, $_SESSION['roles']) !== false);
    }


    function verificaLogado($urlNoLogado)
    {
        if (! estaLogado()) {
            Utils::redirige($urlNoLogado);
        }
    }

    

?>
