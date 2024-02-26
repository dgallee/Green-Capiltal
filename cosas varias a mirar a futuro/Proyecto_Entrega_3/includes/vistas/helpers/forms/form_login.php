<?php

function buildFormularioLogin($username='', $password='')
{
    //<form class="formLogin" action="includes/vistas/helpers/process/procesarLogin.php" method="POST">
    $ruta=RUTA_APP."/includes/vistas/helpers/process/procesarLogin.php";
    return <<<EOS
    
    <form class="formLogin" action=$ruta method="POST">
        <fieldset>
            <legend>Log into private area</legend>
            <div><label>Username:</label> <input type="text" name="username" value="$username" /></div>
            <div><label>Password:</label> <input type="password" name="password" password="$password" /></div>
            <div><button type="submit">Entrar</button></div>
        </fieldset>
    </form>
   
    EOS;
}

?>