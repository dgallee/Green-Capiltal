<?php

    require_once 'includes/config.php';
    use es\ucm\fdi\aw\carrito\carritoDAO;

    $tituloPagina = 'Finalizar Pago';
    $DNI = $app->DNIUsuario();

    $ok = carritoDAO::finalizaPago($DNI);

    if ($ok){
        header('Location: pedidoRealizado.php');
    }

    else {
        error_log("Error al procesar el pago");
    }


?>