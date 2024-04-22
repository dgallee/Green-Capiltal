<?php
require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';
require_once 'productosDAO.php';
require_once 'includes/src/FORMULARIOAgregarValoracion.php';

$DNI=$_GET['Dni'];
$Prod=$_GET['idProd'];


//Agregar Valoracion



$tituloPagina = 'Agregar';

$form= new MiProyecto\Formularios\FormularioAgregarValoracion('',$DNI,$Prod);
$formAddVal = $form->gestiona();    
$contenidoPrincipal=<<<EOS
<h1>Agregar Valoracion</h1>
$formAddVal;
EOS;

require 'includes/vistas/comun/layout.php';



//Modificar Valoracion












?>