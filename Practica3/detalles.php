<?php
require_once "includes/src/Aplicacion.php";
require_once "includes/config.php";
require_once 'includes/vistas/helpers/usuarios.php';
require_once 'productosDAO.php';
require_once 'includes/vistas/helpers/detalles.php';

$tituloPagina = "Detalles del producto";

$id = $_GET['prod'];
$caracteristicas = Producto::search($id);
$cantidad = isset($_POST['cantidad']) ? max(1, intval($_POST['cantidad'])) : 1;
$existencias = $caracteristicas->getExistencias();

$detallesProd = builtDetails($caracteristicas->getNombre(), $caracteristicas->getId(), $caracteristicas->getDesc(), $caracteristicas->getPrecio(), $caracteristicas->getCategoria(), $existencias, $caracteristicas->getEspecie(), $caracteristicas->getImagen(), $cantidad);

$contenidoPrincipal = <<<EOS
<p>$detallesProd</p>
<form id="form-cantidad">
    <p>Unidades a comprar: <span id="unidades-comprar">$cantidad</span></p>
    <input type="hidden" id="cantidad" name="cantidad" value="$cantidad">
    <button type="button" id="btn-sumar">+</button>
    <button type="button" id="btn-restar">-</button>
</form>
EOS;

require('includes/vistas/comun/layout.php');
?>
<script>
    var existencias = <?php echo $existencias; ?>;
</script>
<script src="js/compra.js"></script>


