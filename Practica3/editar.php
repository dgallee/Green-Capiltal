<?php
    require_once 'includes/config.php';
    require_once 'includes/vistas/helpers/autorizacion.php';
    require_once 'usuarioDAO.php';
    require_once 'includes/src/FORMULARIOEditar.php';

    $tituloPagina = 'Editar';

    $dni = $_GET['user'];
    $userEdit = Usuario::search($dni);

    if($userEdit){
        $form= new MiProyecto\Formularios\FormularioEditar($userEdit->getUName(), $userEdit->getUSurname(), $userEdit->getUEmail(), $userEdit->getUDir(), $userEdit->getUTel(), $userEdit->getuDNI(), $userEdit->getUUser(), $userEdit->getUPass(), $userEdit->getUTipo());
        $formEdit = $form->gestiona();
        
    } else {
        $formEdit = "El usuario no existe.";
    }

    $contenidoPrincipal=<<<EOS
    <h1>Editar usuarios</h1>
    $formEdit
    EOS;

    require 'includes/vistas/comun/layout.php';
?>

