<?php

    require_once 'includes/config.php';
    require_once 'carritoDAO.php';
    require_once 'productosDAO.php';

    $tituloPagina = 'Suma Unidad Carrito';
    $DNI = $_SESSION["DNI"];
    $cantidad = $_POST["Cantidad"];
    $idProducto = $_POST["idProducto"];
    $precio = Producto::precio($idProducto);

    if($cantidad == '1'){
        $delete = Carrito::elimina($idProducto,$DNI);
    
        if ($delete){
            header('Location: carrito.php');
        }

        else {
            echo "No se ha podido eliminar el producto seleccionado del carrito";
            header('Location: carrito.php');
        }
    }
    else{
        $esValido = Carrito::restaUnidades($DNI, $idProducto, 1, $precio);
        
        if ($esValido) {
            // Redirigir al usuario a la página de detalles del producto o al carrito de compras.
            $reduce = Producto::sumarUnidades($idProducto, '1');
            if($reduce){
                header('Location: carrito.php');
            }
            else{
                echo "Error al incrementar las existencias del producto en la tienda";
            }
            header("Location: carrito.php");
            
        } else {
            // Manejar el error, por ejemplo, mostrando un mensaje al usuario.
            echo "Error al reducir las unidades del producto en el carrito.";
        }
    }
?>