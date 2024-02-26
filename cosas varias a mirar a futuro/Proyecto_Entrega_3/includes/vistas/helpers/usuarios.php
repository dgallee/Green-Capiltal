<?php
    require_once 'autorizacion.php';
    
    function saludo()
    {
        $html = '';
        
        if (estaLogado()) {
            
            $image_dir=RUTA_IMGS."/login-user.svg";
            $urlLogout = Utils::buildUrl('logout.php');
            $html = <<<EOS
                <img src="$image_dir" alt="usuario" width=50 heigth=50> 
                {$_SESSION['nombre']} 
                <a href="{$urlLogout}">(salir)</a>
            EOS;
        } else {
            $urlLogin = Utils::buildUrl('login.php');
            $image_dir=RUTA_IMGS."/login-unknownuser.svg";
            $html = <<<EOS
                <a href="{$urlLogin}"> <img src="$image_dir" alt="usuario desconocido" width=50 heigth=50></li>
                <br>
                Login</a>
            EOS; 
        }

        return $html;
    }

    function logout()
    {
        //Doble seguridad: unset + destroy
        unset($_SESSION['idUsuario']);
        unset($_SESSION['roles']);
        unset($_SESSION['nombre']);
        
        session_destroy();
        session_start();
    }

?>
