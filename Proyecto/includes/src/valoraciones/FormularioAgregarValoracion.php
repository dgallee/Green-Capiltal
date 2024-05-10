<?php
namespace es\ucm\fdi\aw\valoraciones;
use es\ucm\fdi\aw\valoraciones\valoracionesDAO;
use es\ucm\fdi\aw\Formulario;

class FormularioAgregarValoracion extends Formulario {
    private $Valoracion;
    private $Dni;
    private $idProd;
    private $dir; //estara a 0 si debe redirigir a tienda o a 1 si es a pedido

    public function __construct($Valoracion,$Dni,$idProd,$dir) {
        $this->Valoracion=$Valoracion;
        $this->Dni=$Dni;
        $this->idProd=$idProd;
        
        $this->dir=$dir;
        if($dir == 0){
            parent::__construct('formAgregarProducto', ['urlRedireccion' => "detalles.php?prod={$idProd}", 'method'=>'POST', 'enctype'=>'multipart/form-data']);
        }
        else{
            parent::__construct('formAgregarProducto', ['urlRedireccion' => 'pedidos.php', 'method'=>'POST', 'enctype'=>'multipart/form-data']);
        }
    }
    
    protected function generaCamposFormulario(&$datos)
    {
        $htmlErroresGlobales = self::generaListaErroresGlobales($this->errores);
        $erroresCampos = self::generaErroresCampos(['Valoracion'], $this->errores, 'span', array('class' => 'error'));

        $tipo=0;
        $boton='';
        if($this->Valoracion!=''){


            $boton=<<<EOS
            <button type ="button" id='eliminarvaloracion' data-dni='{$_SESSION['DNI']}' data-idProducto='{$this->idProd}' >Eliminar </button>'
            
            EOS;

        }
    

        $html = <<<EOS
        $htmlErroresGlobales
       
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
            <option value="1" >1</option>
            <option value="2" >2</option>
            <option value="3" >3</option>
            <option value="4" >4</option>
            <option value="5" >5</option>
        </select>
        </div>
        
        <button type="submit">Confirmar</button>
        <br>

        $boton
        
        </fieldset>
        
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