<?php
namespace es\ucm\fdi\aw\productos;
use es\ucm\fdi\aw\productos\productosDAO;
use es\ucm\fdi\aw\Formulario;

class FormularioSumarExistencias extends Formulario {


    private $id;


    public function __construct($id) {

        $this->id = $id;

        parent::__construct('formAddExisxt', ['urlRedireccion' => 'adminProductos.php', 'method'=>'POST', 'enctype'=>'multipart/form-data']);
    }

    protected function generaCamposFormulario(&$datos)
    {

        $id = $this->id;
   

        $htmlErroresGlobales = self::generaListaErroresGlobales($this->errores);
        $erroresCampos = self::generaErroresCampos(['id'], $this->errores, 'span', array('class' => 'error'));

     
        $html = <<<EOS
            <form method="post">
            <input type="hidden" name="id" value="{$id}">
            <input type="number" name="cantidad" min="1" value="1">
            <button type="submit">Añadir existencias</button>
        </form>
        EOS;
        return $html;
    }

    protected function procesaFormulario(&$datos)
    {
        $id = $datos["id"];


        if(isset($datos["id"]) && isset($datos["cantidad"])) {
            $idProducto = $datos["id"];
            $cantidad = $datos["cantidad"];
        
            // Validar que los datos recibidos no estén vacíos
            if(empty($idProducto) || empty($cantidad)) {
                // Manejar el caso en que los datos estén vacíos
                $mensajeError = "Error: Los datos recibidos son inválidos.";
            } else {
                // Sumar las existencias del producto
                if(productosDAO::sumarUnidades($idProducto, $cantidad)) {
                    // Redirigir a la página de administración de productos con un mensaje de éxito
                    header('Location: adminProductos.php?mensaje=Existencias actualizadas correctamente.');
                    exit(); // Terminar la ejecución del script después de la redirección
                } else {
                    // Manejar el caso en que ocurra un error al sumar las existencias
                    $mensajeError = "Error: No se pudo actualizar las existencias del producto.";
                }
            }
        } else {
            // Manejar el caso en que los datos no se hayan recibido correctamente
            $mensajeError = "Error: No se han recibido los datos necesarios.";
        }
    }
}

?>
