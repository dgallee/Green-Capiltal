<?php
require_once 'includes/config.php';
require_once 'includes/vistas/helpers/adminProductos.php';

$tituloPagina = 'procesarsumarexistencias';

    producto::sumarExistencias();
    header('Location: adminProductos.php');


    require_once RAIZ_APP."/vistas/comun/layout.php";

?>