<?php
    require_once 'includes/config.php';
    use es\ucm\fdi\aw\usuarios\usuarioDAO;

    $tituloPagina = 'Editar';

    $dni = $_GET['user'];
    $userEdit = usuarioDAO::search($dni);

    if($userEdit){
        $form= new es\ucm\fdi\aw\usuarios\FormularioEditar($userEdit->getUName(), $userEdit->getUSurname(), $userEdit->getUEmail(), $userEdit->getUDir(), $userEdit->getUTel(), $userEdit->getuDNI(), $userEdit->getUUser(), $userEdit->getUPass(), $userEdit->getUTipo());
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

