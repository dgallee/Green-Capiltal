



<?php


require_once 'pedidos.php';
require_once 'valoracionesDAO.php';
function builtDetails($nombre, $id, $descripcion, $precio, $categoria, $existencias, $especie, $imagen) {

    $boton='';
    $comentario='<p>No hay comentarios</p>';
    if(isset($_SESSION['DNI'])  && Pedido::hay_pedido($_SESSION['DNI'],$id)){
    $boton= <<<EOS
    <button type="button" id="miBoton" dni='{$_SESSION['DNI']}' idProducto='{$id}' >valorar o modficar</button>
    EOS;
    }
   
    $results=Valoracion::getValoraciones($id);

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
            <input type="hidden" name="prodId" value=$id>
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
    return $detalles;
}
?>

