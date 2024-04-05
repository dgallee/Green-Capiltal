<?php

function buildTablaUsuarios($usuarios){
    $tablaUsuarios = <<<EOS
    <table>
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
    </tr>
    EOS;

    // Añade una fila a la tabla para cada usuario
    foreach ($usuarios as $usuario) {
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
        <td>{$usuario['Tipo']}</td>
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