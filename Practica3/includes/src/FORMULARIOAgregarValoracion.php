<?php
namespace MiProyecto\Formularios;

require_once 'includes/src/Formulario.php'; 
require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';
require_once 'productosDAO.php';

use Producto;

class FormularioAgregarValoracion extends Formulario {
    private $Valoracion;
    private $Dni;
    private $idProd;


    public function __construct($Valoracion,$Dni,$idProd) {
        $this->Valoracion=$Valoracion;
        $this->Dni=$Dni;
        $this->idProd=$idProd;
    

        parent::__construct('formAgregarProducto', ['urlRedireccion' => 'pedidos.php', 'method'=>'POST', 'enctype'=>'multipart/form-data']);
    }
    
    protected function generaCamposFormulario(&$datos)
    {
        $htmlErroresGlobales = self::generaListaErroresGlobales($this->errores);
        $erroresCampos = self::generaErroresCampos(['Valoracion'], $this->errores, 'span', array('class' => 'error'));

        $tipo=0;

        $html = <<<EOS
        $htmlErroresGlobales
        <form method="POST" enctype="multipart/form-data">
        <fieldset class="formulario">
        <div>
            <label for="Producto">Producto:</label>
            <input type="text" name="Producto" id="Producto" value="$this->idProd" readonly>
        </div>

        <div>
            <label for="Valoracion">Valoracion:</label>
            <input type="text" name="Valoracion" id="Valoracion" required>
        </div>
        <div>
        <label for="type">Puntuacion:</label>
        <select name="type" id="type">
            <option value="0" . ($tipo == 0 ? 'selected' : '') . >0</option>
            <option value="1" . ($tipo == 1 ? 'selected' : '') . >1</option>
            <option value="2" . ($tipo == 2 ? 'selected' : '') . >2</option>
            <option value="3" . ($tipo == 3 ? 'selected' : '') . >3</option>
            <option value="4" . ($tipo == 4 ? 'selected' : '') . >4</option>
            <option value="5" . ($tipo == 5 ? 'selected' : '') . >5</option>
        </select>
        </div>
        
        <button type="submit">Ingresar</button>
        </fieldset>
        </form>
        EOS;

        return $html;
    }
    

    protected function procesaFormulario(&$datos)
    {
        





    }
    
    
}
?>