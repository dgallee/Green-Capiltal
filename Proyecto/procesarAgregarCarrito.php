<?php
require_once 'includes/config.php';
use es\ucm\fdi\aw\usuarios\usuarioDAO;
use es\ucm\fdi\aw\carrito\carritoDAO;
use es\ucm\fdi\aw\productos\productosDAO;
use es\ucm\fdi\aw\Aplicacion;

if (isset($_POST['prodId']) && isset($_POST['cantidad'])) {
    $prodId = $_POST['prodId'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precioProducto'];
    var_dump($precio);

    $app->verificaLogado('login.php');

    
    $nombreUsuario = $_SESSION['username'];
    $usuario = usuarioDAO::searchLogin($nombreUsuario);
    // agrego en la tabla carritos o actualizo si ya estaba
    $esValido = carritoDAO::add($usuario->getUDNI(), $prodId, $cantidad, $precio);

    if ($esValido) {
        // Redirigir al usuario a la página de detalles del producto o al carrito de compras.
        $reduce = productosDAO::reducirUnidades($prodId, $cantidad);
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