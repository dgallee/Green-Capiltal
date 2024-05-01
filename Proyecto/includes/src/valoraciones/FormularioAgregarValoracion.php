<?php
namespace es\ucm\fdi\aw\valoraciones;
use es\ucm\fdi\aw\valoraciones\valoracionesDAO;
use es\ucm\fdi\aw\Formulario;

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
        $boton='';
        if($this->Valoracion!=''){


            $boton=<<<EOS
            <button type ="button" id='eliminarvaloracion' dni='{$_SESSION['DNI']}' idProducto='{$this->idProd}' >Eliminar </button>'
            
            EOS;

        }
    

        $html = <<<EOS
        $htmlErroresGlobales
        <form method="POST" enctype="multipart/form-data">
        <fieldset class="formulario">
        <div>
            <label for="Producto">Producto:</label>
            <input type="text" name="Producto" id="Producto" value="$this->idProd" readonly>
        </div>
        <input type="hidden" name="dni" value="$this->Dni">

        <div>
            <label for="Valoracion">Valoracion:</label>
            <input type="text" name="Valoracion" id="Valoracion" value="$this->Valoracion"  required>
        </div>
        <div>
        <label for="point">Puntuacion:</label>
        <select name="point" id="point">
            <option value="1" . ($tipo == 1 ? 'selected' : '') . >1</option>
            <option value="2" . ($tipo == 2 ? 'selected' : '') . >2</option>
            <option value="3" . ($tipo == 3 ? 'selected' : '') . >3</option>
            <option value="4" . ($tipo == 4 ? 'selected' : '') . >4</option>
            <option value="5" . ($tipo == 5 ? 'selected' : '') . >5</option>
        </select>
        </div>
        
        <button type="submit">Confirmar</button>
        <br>

        $boton
        
        </fieldset>
        </form>
        EOS;

        return $html;
    }
    

    protected function procesaFormulario(&$datos)
    {

        
        //Valoracion::addValoracion($datos['Producto'],$datos['dni'],$datos['point'],$datos['Valoracion']);

        if($this->Valoracion==''){
        valoracionesDAO::addValoracion($datos['dni'],$datos['Producto'],$datos['point'],$datos['Valoracion']);
        }else{

        valoracionesDAO::editValoracion($datos['dni'],$datos['Producto'],$datos['point'],$datos['Valoracion']);

        }





    }
    
    
}
?>