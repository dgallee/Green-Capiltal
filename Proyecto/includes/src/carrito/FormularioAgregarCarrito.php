<?php
namespace es\ucm\fdi\aw\carrito;

use es\ucm\fdi\aw\Formulario;
use es\ucm\fdi\aw\usuarios\usuarioDAO;
use es\ucm\fdi\aw\carrito\carritoDAO;
use es\ucm\fdi\aw\productos\productosDAO;

class FormularioAgregarCarrito extends Formulario {

    private $idProd;
    private $precio;
    private $existencias;

    public function __construct($idProd, $precio, $existencias) {
        
        $this->idProd = $idProd;
        $this->precio = $precio;
        $this->existencias = $existencias;
        parent::__construct('CartSearch', ['urlRedireccion' => 'carrito.php']);
    }

    protected function generaCamposFormulario(&$datos)
    {

       $htmlErroresGlobales = self::generaListaErroresGlobales($this->errores);
        //$erroresCampos = self::generaErroresCampos(['nombreUsuario', 'password'], $this->errores, 'span', array('class' => 'error'));

        $idProd = $this->idProd;
        $precio = $this->precio;
        $existencias = $this->existencias;
        
        $ret = <<<EOS
        
            <input type="hidden" name="prodId" value=$idProd>
            <input type="hidden" name="precioProducto" value="$precio">
            <p>Unidades a comprar: <span id="unidades-comprar">1</span></p>
            <input type="hidden" id="cantidad" name="cantidad" value="1">
            <input type="hidden" id="existencias" value="$existencias">
            <button type="button" id="btn-sumar">+</button>
            <button type="button" id="btn-restar">-</button>
            <button type="submit" id="btn-add-articulo">Agregar al carrito</button>
        
        EOS;
        return $ret;
    }

    protected function procesaFormulario(&$datos)
    {
        if (isset($datos['prodId']) && isset($datos['cantidad'])) {
            $prodId = $datos['prodId'];
            $cantidad = $datos['cantidad'];
            $precio = $datos['precioProducto'];
            var_dump($precio);
            $nombreUsuario = $_SESSION['username'];
            $usuario = usuarioDAO::searchLogin($nombreUsuario);
            
            if ($usuario == NULL){
                header('Location: login.php');
                exit();
            }

            else{

                // agrego en la tabla carritos o actualizo si ya estaba
                $esValido = carritoDAO::add($usuario->getUDNI(), $prodId, $cantidad, $precio);
            
                if ($esValido) {
                    // Redirigir al usuario a la página de detalles del producto o al carrito de compras.
                    $reduce = productosDAO::reducirUnidades($prodId, $cantidad);
                    if($reduce){
                        header('Location: detalles.php?prod=' . $prodId);
                    }
                    else{
                        error_log("Error al reducir las existencias del producto");
                    }
            
                    $dni = $usuario->getUDNI();
                    header("Location: carrito.php");
                    
                } else {
                    // Manejar el error, por ejemplo, mostrando un mensaje al usuario.
                    error_log("Error al agregar el producto al carrito.");
                }
            }
        }
            
    }
}
?>
