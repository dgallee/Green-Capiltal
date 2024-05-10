<?php
require_once 'includes/config.php';
use es\ucm\fdi\aw\valoraciones\valoracionesDAO;

$DNI=htmlspecialchars($_GET['Dni']);
$Prod=htmlspecialchars($_GET['idProd']);


valoracionesDAO::deleteValoracion($DNI,$Prod);

$contenidoPrincipal=<<<EOS
<h1>Valoracion Eliminada</h1>
<p class="descripcion3"> Su valoración ha sido eliminada correctamente </p>
EOS;

require 'includes/vistas/comun/layout.php';

?>