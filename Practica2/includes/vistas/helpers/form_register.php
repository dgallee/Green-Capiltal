<?php

function buildFormularioRegister($username='', $password='',$rep_password='',$email='')
{
    $ruta=RUTA_APP."/includes/vistas/helpers/process/procesarRegister.php";
    return <<<EOS
    <form id="formRegister" action=$ruta method="POST">
        <fieldset>
            <legend>Register new user</legend>
            <div><label>Name:</label> <input type="text" name="username" value="$username" /></div>
            <div><label>Password:</label> <input type="password" name="password" password="$password" /></div>
            <div><label>Repeat Password:</label> <input type="password" name="rep_password" rep_password="$rep_password" /></div>
            <div><label>Email:</label> <input type="email" name="email" email="$email" /></div>
            <div><button type="submit">submit</button></div>
        </fieldset>

        <p> No Hace Nada esta a medio poner faltaria conectarlo con la bd </>
    </form>
   
    EOS;
}

?>