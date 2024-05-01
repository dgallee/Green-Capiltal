<?php

require_once 'includes/config.php';
use es\ucm\fdi\aw\usuarios\usuarioDAO;

$tituloPagina = 'Admin';

if ($app->esAdmin() == false) {
	Aplicacion::paginaError(403, $tituloPagina, '¡Acceso Denegado!', 'No tienes permisos suficientes para acceder al panel de administración de la web.');
}

// Obtén el array de usuarios
$usuarios = usuarioDAO::showTable();

// Comienza a construir la tabla

$tablaUsuarios = <<<EOS
    <div class="tableContainer">
    <table class="tableAdmin">
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

    foreach ($usuarios as $usuario) {
        $tipoUsuario = '';
        if ($usuario['Tipo'] == 0) {
            $tipoUsuario = 'usuario';
        } elseif ($usuario['Tipo'] == 1) {
            $tipoUsuario = 'admin';
        } elseif ($usuario['Tipo'] == 2) {
            $tipoUsuario = 'comerciante';
        } elseif ($usuario['Tipo'] == 3) {
        $tipoUsuario = 'moderador';
        }
        if ($usuario['Tipo'] == 1){

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
            <a href="editar.php?user={$usuario['DNI']}">
            <img src="img/editar.png" alt="Editar" class="botonImagen" >
            </a>
        </td>
        </tr>
        EOS;

        }

        else {

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
            <a href="editar.php?user={$usuario['DNI']}">
            <img src="img/editar.png" alt="Editar" class="botonImagen" >
            </a>
            <a href="eliminar.php?user={$usuario['DNI']}">
            <img src="img/eliminar.png" alt="Eliminar" class="botonImagen" >
            </a>
        </td>
        </tr>
        EOS;
        }
        
    }

    // Cierra la tabla
    $tablaUsuarios .= "</table></div>";

$contenidoPrincipal = <<<EOS
<h1 class='titulo'>Listado de Usuarios</h1>
<p>$tablaUsuarios
EOS;

require 'includes/vistas/comun/layout.php';

?>