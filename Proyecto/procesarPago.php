<?php

    require_once 'includes/config.php';
    use es\ucm\fdi\aw\carrito\carritoDAO;

    $tituloPagina = 'Finalizar Pago';
    $DNI = $_SESSION["DNI"];

    $ok = carritoDAO::finalizaPago($DNI);

    if ($ok){
        header('Location: pedidoRealizado.php');
    }

    else {
        echo "Error al procesar el pago";
    }


?>