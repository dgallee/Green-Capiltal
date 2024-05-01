<?php
require_once 'includes/config.php';
use es\ucm\fdi\aw\valoraciones\valoracionesDAO;

$DNI=$_GET['Dni'];
$Prod=$_GET['idProd'];


valoracionesDAO::deleteValoracion($DNI,$Prod);

$contenidoPrincipal=<<<EOS
<h1>Valoracion Eliminada</h1>
<p> Su Valoracion ha sido eliminada correctamente </p>;
EOS;

require 'includes/vistas/comun/layout.php';

?>