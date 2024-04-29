<?php
require_once 'includes/config.php';
require_once 'valoracionesDAO.php';

$DNI=$_GET['Dni'];
$Prod=$_GET['idProd'];


Valoracion::deleteValoracion($DNI,$Prod);

$contenidoPrincipal=<<<EOS
<h1>Valoracion Eliminada</h1>
<p> Su Valoracion ha sido eliminada correctamente </p>;
EOS;

require 'includes/vistas/comun/layout.php';

?>