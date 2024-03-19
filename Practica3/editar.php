<?php
    require_once 'includes/config.php';
    require_once 'includes/vistas/helpers/autorizacion.php';
    require_once 'includes/vistas/helpers/editar.php';
    require_once 'usuarioDAO.php';

    $tituloPagina = 'Editar';

    $user = $_GET['user'];
    $userEdit = Usuario::search($user);

    if($userEdit){
        $infoant = <<<EOS
        Nombre: {$userEdit->getUName()}<br>
        Apellidos: {$userEdit->getUSurname()}<br>
        Correo: {$userEdit->getUEmail()}<br>
        Dirección: {$userEdit->getUDir()}<br>
        Teléfono: {$userEdit->getUTel()}<br>
        DNI: {$userEdit->getuDNI()}<br>
        Usuario: {$userEdit->getUUser()}<br>
        Contraseña: {$userEdit->getUPass()}<br>
        Tipo: {$userEdit->getUTipo()}<br>
        EOS;
        
    } else {
        echo "El usuario no existe.";
        $infoant= "";
    }

    $formEdit = builtFormularioEditar($user, $userEdit->getuDNI());
    $contenidoPrincipal=<<<EOS
    <h1>Editar usuarios</h1>
    $infoant
    <p></p>
    $formEdit
    EOS;

    require 'includes/vistas/comun/layout.php';
?>

