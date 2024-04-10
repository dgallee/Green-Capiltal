<?php

function buildTablaUsuarios($usuarios){
    $tablaUsuarios = <<<EOS
    <table class="table table-striped">
    <tr>
    <th>Nombre</th>
    <th>Apellidos</th>
    <th>Correo</th>
    <th>Dirección</th>
    <th>Teléfono</th>
    <th>DNI</th>
    <th>Usuario</th>
    <th>Contraseña</th>
    <th>Tipo usuario</th>
    <th>Acciones</th>
    </tr>
    EOS;

    // Añade una fila a la tabla para cada usuario
    foreach ($usuarios as $usuario) {
        $tipoUsuario = '';
        if ($usuario['Tipo'] == 0) {
            $tipoUsuario = 'usuario';
        } elseif ($usuario['Tipo'] == 1) {
            $tipoUsuario = 'admin';
        } elseif ($usuario['Tipo'] == 2) {
            $tipoUsuario = 'comerciante';
        }

        $tablaUsuarios .= <<<EOS
        <tr>
        <td>{$usuario['Nombre']}</td>
        <td>{$usuario['Apellidos']}</td>
        <td>{$usuario['Correo']}</td>
        <td>{$usuario['Direccion']}</td>
        <td>{$usuario['Telefono']}</td>
        <td>{$usuario['DNI']}</td>
        <td>{$usuario['Usuario']}</td>
        <td>{$usuario['Contrasena']}</td>
        <td>{$tipoUsuario}</td>
        <td>
            <button onclick="location.href='editar.php?user={$usuario['DNI']}'">Editar</button>
            <button onclick="location.href='eliminar.php?user={$usuario['DNI']}'">Eliminar</button>
        </td>
        </tr>
        EOS;
    }

    // Cierra la tabla
    $tablaUsuarios .= "</table>";

    return $tablaUsuarios;
}

?>
