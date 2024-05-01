
<?php
require_once "includes/config.php";
use es\ucm\fdi\aw\productos\productosDAO;
use es\ucm\fdi\aw\pedidos\pedidosDAO;
use es\ucm\fdi\aw\valoraciones\valoracionesDAO;

$tituloPagina = "Detalles del producto";

$id = $_GET['prod'];
$caracteristicas = productosDAO::search($id);
$cantidad = isset($_POST['cantidad']) ? max(1, intval($_POST['cantidad'])) : 1;

$nombre = $caracteristicas->getNombre();
$idProd = $caracteristicas->getId();
$descripcion = $caracteristicas->getDesc();
$precio = $caracteristicas->getPrecio();
$categoria = $caracteristicas->getCategoria();
$existencias = $caracteristicas->getExistencias();
$especie = $caracteristicas->getEspecie();
$imagen = $caracteristicas->getImagen();

$boton='';
    $comentario='<p>No hay comentarios</p>';

    $valoracion='';
    if(isset($_SESSION['DNI'])  && pedidosDAO::hay_pedido($_SESSION['DNI'],$idProd)){
        $dni = $_SESSION['DNI'];
        $valoracion = valoracionesDAO::getValoracion($dni,$idProd);
        $accion = 'Editar';
        if($valoracion==''){
            $accion='Agregar';
        }
        $boton= <<<EOS
        <button type="button" id="miBoton" dni='{$_SESSION['DNI']}' idProducto='{$idProd}' >$accion valoracion</button>
        EOS;
    }
   
    $results=valoracionesDAO::getValoraciones($idProd);

    if($results!=0){
        $comentario='';
        foreach($results as $result){

            $usuarionombre=$result['usuario'];
            $texto=$result['Texto'];
            $puntuacion=$result['Puntuacion'];

            $j=$puntuacion;
            $estrellas='';
            for($i=0;$i<5;$i++){

                if($j!=0){
                $estrellas.='<span class="star">&#9733;</span>';
                $j--;
                }else{
                    $estrellas.= '<span class="star">&#9734;</span>';

                }

            }

            $comentario.=<<<EOS
            <div class="comentario">
               <div class="nombre-usuario">$usuarionombre</div>
               <div class="texto-valoracion">$texto</div>
               <div class="estrellas">
            $estrellas
            </div>
            </div>
            EOS;
        }
    }

    $detalles = <<<EOS
    <div class='detalles'>
    <h1 class='titulo-tienda'>$nombre</h1>
    <img src='$imagen' alt='$nombre'>
    <p><strong></strong> $descripcion</p>
    <div class='linea-botón'>
        <p class='precio-existencias'><strong></strong> Precio: $precio €</p>
        <p class='precio-existencias'><strong></strong> Existencias: $existencias</p>
        <form id="form-cantidad" action="procesarAgregarCarrito.php" method="post">
            <input type="hidden" name="prodId" value=$idProd>
            <input type="hidden" name="precioProducto" value="$precio">
            <p>Unidades a comprar: <span id="unidades-comprar">1</span></p>
            <input type="hidden" id="cantidad" name="cantidad" value="1">
            <input type="hidden" id="existencias" value="$existencias">
            <button type="button" id="btn-sumar">+</button>
            <button type="button" id="btn-restar">-</button>
            <button type="submit" id="btn-add-articulo">Agregar al carrito</button>
            $boton
        </form>
    </div>
    <p class='categoria-especie'><strong></strong> Categoria: $categoria</p>
    <p class='categoria-especie'><strong></strong> Especie: $especie</p>
    <h1 class='titulo-tienda'>Valoraciones</h1>
    $comentario

    </div>
    EOS;

$contenidoPrincipal = <<<EOS
<p>$detalles
EOS;


require('includes/vistas/comun/layout.php');
?>





