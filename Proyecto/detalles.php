
<?php
require_once "includes/config.php";
use es\ucm\fdi\aw\productos\productosDAO;
use es\ucm\fdi\aw\pedidos\pedidosDAO;
use es\ucm\fdi\aw\valoraciones\valoracionesDAO;

$tituloPagina = "Detalles del producto";

$id = htmlspecialchars($_GET['prod']);
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
    if(isset($_SESSION['DNI'])  && pedidosDAO::hay_pedido($app->DNIUsuario(),$idProd)){
        $dni = $app->DNIUsuario();
        $valoracion = valoracionesDAO::getValoracion($dni,$idProd);
        $accion = 'Editar';
        if($valoracion==''){
            $accion='Agregar';
        }
        $boton= <<<EOS
        <button type="button" id="miBoton" dni='{$dni}' idProducto='{$idProd}' >$accion valoracion</button>
        EOS;
    }
   
    $results=valoracionesDAO::getValoraciones($idProd);

    if($results!=0){
        $comentario='';
        foreach($results as $result){

            $usuarionombre= htmlspecialchars($result['usuario']);
            $texto= htmlspecialchars($result['Texto']);
            $puntuacion= htmlspecialchars($result['Puntuacion']);

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

    $form= new es\ucm\fdi\aw\carrito\FormularioAgregarCarrito($idProd, $precio, $existencias);
    $htmlFormCart = $form->gestiona();
    $detalles = <<<EOS
    <div class='detalles'>
    <h1 class='titulo-tienda'>$nombre</h1>
    <img src='$imagen' alt='$nombre'>
    <p><strong></strong> $descripcion</p>
    <div class='linea-botón'>
        <p class='precio-existencias'><strong></strong> Precio: $precio €</p>
        <p class='precio-existencias'><strong></strong> Existencias: $existencias</p>
        $htmlFormCart
        $boton
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





