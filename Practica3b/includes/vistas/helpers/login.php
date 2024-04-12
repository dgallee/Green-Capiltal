<?php

function buildFormularioLogin($username='', $password='')
{
    return <<<EOS
    <form id="formLogin" action="procesarLogin.php" method="POST">
    <fieldset>
        <legend>Usuario y contraseña</legend>
        <div><label>Name:</label> <input type="text" name="username" value="$username" /></div>
        <div><label>Password:</label> <input type="password" name="password" value="$password" /></div>
        <div>
            <button type="submit">Entrar</button>
            <a href="registro.php"><button type="button">Registrarse</button></a>
        </div>
    </fieldset>
    </form>

    EOS;
}

?>