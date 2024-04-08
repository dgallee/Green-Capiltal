<?php

function builtFormularioEditar($nombre, $apellido, $email, $dir, $tel, $DNI, $user, $pass, $tipo){
    return <<<EOS
    <form action="procesarEditar.php" method="post">
    <fieldset>
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="$nombre"/>
    </div>
    <div>
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" value="$apellido"/>
    </div>
    <div>
        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" value="$email"/>
    </div>
    <div>
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="direccion" value="$dir"/>
    </div>
    <div>
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" value="$tel" pattern="[0-9]{9}" title="Por favor, introduzca exactamente 9 números.">
    </div>

    <input type="hidden" name="dni" value="$DNI">

    <div>
        <label for="username">Usuario:</label>
        <input type="text" name="username" id="username" value="$user"/>
    </div>
    <div>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" value="$pass"/>
    </div>
    <div>
    <label for="type">Tipo:</label>
    <select name="type" id="type" selected="$tipo"/>
        <option value="0">0</option>
        <option value="1">1</option>
    </select>
    </div>

    <button type="submit">Ingresar</button>
    </fieldset>
    </form>

    EOS;
}
?>