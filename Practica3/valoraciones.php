<?php
require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';
require_once 'productosDAO.php';
require_once 'includes/src/FORMULARIOAgregarValoracion.php';
require_once 'valoracionesDAO.php';

$DNI=$_GET['Dni'];
$Prod=$_GET['idProd'];


//Agregar Valoracion



$tituloPagina = 'Formulario Valoracion';



$valoracion=Valoracion::getValoracion($DNI,$Prod);

$Tipo='Editar';
if($valoracion==''){

$Tipo='Agregar';

}


$form= new MiProyecto\Formularios\FormularioAgregarValoracion($valoracion,$DNI,$Prod);
$formAddVal = $form->gestiona();    
$contenidoPrincipal=<<<EOS
<h1>$Tipo Valoracion</h1>
$formAddVal;
EOS;

require 'includes/vistas/comun/layout.php';



//Modificar Valoracion












?>