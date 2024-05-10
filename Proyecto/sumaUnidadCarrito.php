<?php

    require_once 'includes/config.php';
    use es\ucm\fdi\aw\productos\productosDAO;
    use es\ucm\fdi\aw\carrito\carritoDAO;

    $tituloPagina = 'Suma Unidad Carrito';
    $DNI = $app->DNIUsuario();
    $cantidad = htmlspecialchars($_POST["Cantidad"]);
    $idProducto = htmlspecialchars($_POST["idProducto"]);
    $precio = productosDAO::precio($idProducto);
    $existencias = productosDAO::existencias($idProducto);
    if($existencias >= 1){
        $esValido = carritoDAO::add($DNI, $idProducto, '1', $precio);
        if ($esValido) {
            // Redirigir al usuario a la página de detalles del producto o al carrito de compras.
            $reduce = productosDAO::reducirUnidades($idProducto, '1');
            if($reduce){
                header('Location: carrito.php');
            }
            else{
                error_log("Error al reducir las existencias del producto en la tienda");
            }
            header("Location: carrito.php");
            
        } else {
            // Manejar el error, por ejemplo, mostrando un mensaje al usuario.
            error_log("Error al incrementar las unidades del producto en el carrito.");
        }
    }
    else{
        
        header("Location: carrito.php");
    }

?>