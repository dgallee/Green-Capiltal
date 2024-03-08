<?php

function builtFormularioEditar($user, $DNI){
    return <<<EOS
    <form action="procesarEditar.php" method="post">
    <fieldset>
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
    </div>
    <div>
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos">
    </div>
    <div>
        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo">
    </div>
    <div>
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="direccion">
    </div>
    <div>
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" pattern="[0-9]{9}" title="Por favor, introduzca exactamente 9 números.">
    </div>

    <input type="hidden" name="dni" value="$DNI">

    <div>
        <label for="username">Usuario:</label>
        <input type="text" name="username" id="username">
    </div>
    <div>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password">
    </div>
    <div>
        <label for="type">Tipo:</label>
        <input type="number" name="type" id="type" min="0" max="1" step="1">
    </div>


    <input type="hidden" name="oldUser" value="$user">
    
    <button type="submit">Ingresar</button>
    </fieldset>
    </form>

    EOS;
}







?>