<?php

    require_once 'includes/config.php';
    use es\ucm\fdi\aw\productos\productosDAO;
    use es\ucm\fdi\aw\carrito\carritoDAO;

    $tituloPagina = 'Suma Unidad Carrito';
    $DNI = $app->DNIUsuario();
    $cantidad = htmlspecialchars($_POST["Cantidad"]);
    $idProducto = htmlspecialchars($_POST["idProducto"]);
    $precio = productosDAO::precio($idProducto);

    if($cantidad == '1'){
        $delete = carritoDAO::elimina($idProducto,$DNI);
    
        if ($delete){
            header('Location: carrito.php');
        }

        else {
            error_log("No se ha podido eliminar el producto seleccionado del carrito");
            header('Location: carrito.php');
        }
    }
    else{
        $esValido = carritoDAO::restaUnidades($DNI, $idProducto, 1, $precio);
        
        if ($esValido) {
            // Redirigir al usuario a la página de detalles del producto o al carrito de compras.
            $reduce = productosDAO::sumarUnidades($idProducto, '1');
            if($reduce){
                header('Location: carrito.php');
            }
            else{
                error_log("Error al incrementar las existencias del producto en la tienda");
            }
            header("Location: carrito.php");
            
        } else {
            // Manejar el error, por ejemplo, mostrando un mensaje al usuario.
            error_log("Error al reducir las unidades del producto en el carrito.");
        }
    }
?>