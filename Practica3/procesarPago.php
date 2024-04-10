<?php

    require_once 'includes/config.php';
    require_once 'carritoDAO.php';

    $tituloPagina = 'Finalizar Pago';
    $DNI = $_SESSION["DNI"];

    $ok = Carrito::finalizaPago($DNI);

    if ($ok){
        header('Location: pedidos.php');
    }

    else {
        echo "Error al procesar el pago";
    }


?>