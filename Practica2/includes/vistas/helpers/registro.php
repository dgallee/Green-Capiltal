<?php

function buildFormularioRegistro()
{
    return <<<EOS
    <form action="procesarRegistro.php" method="post">
    <fieldset>
            <h1>Registro</h1>
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" required>
            </div>
            <div>
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" id="apellidos" required>
            </div>
            <div>
                <label for="correo">Correo:</label>
                <input type="email" name="correo" id="correo" required>
            </div>
            <div>
                <label for="direccion">Dirección:</label>
                <input type="text" name="direccion" id="direccion" required>
            </div>
            <div>
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" id="telefono" pattern="[0-9]{9}" title="Por favor, introduzca exactamente 9 números." required>
            </div>
        
            <div>
                <label for="dni">DNI:</label>
                <input type="text" name="dni" id="dni" pattern="[0-9]{8}[A-Za-z]" title="Por favor, introduzca 8 números seguidos de una letra." required>
            </div>
            <div>
                <label for="username">Usuario:</label>
                <input type="text" name="username" id="username">
            </div>
            <div>
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password">
            </div>
            <button type="submit">Ingresar</button>
        </fieldset>
        </form>

    EOS;
}