<?php
require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';
require_once 'includes/vistas/helpers/login.php';
require_once 'productosDAO.php';
require_once 'usuarioDAO.php';
require_once 'carritoDAO.php';

if (isset($_POST['prodId']) && isset($_POST['cantidad'])) {
    $prodId = $_POST['prodId'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precioProducto'];
    var_dump($precio);

    verificaLogado('login.php');

    
    $nombreUsuario = idUsuarioLogado();
    $usuario = Usuario::searchLogin($nombreUsuario);
    // agrego en la tabla carritos o actualizo si ya estaba
    $esValido = Carrito::add($usuario->getUDNI(), $prodId, $cantidad, $precio);

    if ($esValido) {
        // Redirigir al usuario a la página de detalles del producto o al carrito de compras.
        $reduce = Producto::reducirUnidades($prodId, $cantidad);
        if($reduce){
            header('Location: detalles.php?prod=' . $prodId);
        }
        else{
            echo "Error al reducir las existencias del producto";
        }

        $dni = $usuario->getUDNI();
        header("Location: carrito.php");
        
    } else {
        // Manejar el error, por ejemplo, mostrando un mensaje al usuario.
        echo "Error al agregar el producto al carrito.";
    }
} else {
    // Manejar el error si no se enviaron los datos esperados.
    echo "Error: datos faltantes.";
}
?>