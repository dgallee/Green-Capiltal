<?php
require_once 'includes/config.php';
use es\ucm\fdi\aw\valoraciones\valoracionesDAO;

$DNI=$_GET['Dni'];
$Prod=$_GET['idProd'];
$dir = $_GET['dir'];

//Agregar Valoracion
$tituloPagina = 'Formulario Valoracion';
$valoracion=ValoracionesDAO::getValoracion($DNI,$Prod);

$tipo='Editar';
if($valoracion==''){

$tipo='Agregar';

}


$form= new es\ucm\fdi\aw\valoraciones\FormularioAgregarValoracion($valoracion,$DNI,$Prod,$dir);
$formAddVal = $form->gestiona();    
$contenidoPrincipal=<<<EOS
<h1>$tipo Valoracion</h1>
$formAddVal;
EOS;

require 'includes/vistas/comun/layout.php';



//Modificar Valoracion












?>