<?php
namespace MiProyecto\Formularios;

require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';
require_once 'includes/src/Formulario.php'; // Asegúrate de incluir el archivo donde está definida la clase Formulario
require_once 'productosDAO.php';
use Producto;


class FormularioEditarProducto extends Formulario {


    private $name;
    private $id;
    private $res;
    private $desc;
    private $precio;
    private $cat;
    private $existencias;
    private $esp;
    private $img;

    public function __construct($name, $res, $desc, $precio, $cat, $id, $existencias, $esp, $img) {

        $this->name=$name;
        $this->res=$res;
        $this->desc=$desc;
        $this->precio=$precio;
        $this->cat=$cat;
        $this->id=$id;
        $this->existencias=$existencias;
        $this->esp=$esp;
        $this->img=$img;

        parent::__construct('formEditProd', ['urlRedireccion' => 'adminProductos.php', 'method'=>'POST', 'enctype'=>'multipart/form-data']);
    }

    protected function generaCamposFormulario(&$datos)
    {
        $name = $this->name;
        $id = $this->id;
        $res = $this->res;
        $desc = $this->desc;
        $precio = $this->precio;
        $cat = $this->cat;
        $existencias = $this->existencias;
        $esp = $this->esp;
        $img = $this->img;

        $htmlErroresGlobales = self::generaListaErroresGlobales($this->errores);
        $erroresCampos = self::generaErroresCampos(['nombre', 'resumen', 'descripcion', 'precio','categoria','existencias','especie'], $this->errores, 'span', array('class' => 'error'));

     
        $html = <<<EOS
        <form action="procesarEditarProducto.php" method="post" enctype="multipart/form-data">
        <fieldset class="formulario">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre"  value="$name"/> 
        </div>
        {$erroresCampos['nombre']}
        <div>
            <label for="resumen">Resumen:</label>
            <input type="text" name="resumen" id="resumen"  value="$res"/>  
        </div>
        {$erroresCampos['resumen']}
        <div>
            <label for="descripcion">Descripción:</label>
            <input type="text" name="descripcion" id="descripcion" value= "$desc"/>
        </div>
        {$erroresCampos['descripcion']}
        <div>
        <label for="precio">Precio:</label>
        <input type="text" name="precio" id="precio" value="$precio" pattern="^\d+(\.\d{1,2})?$" title="Por favor, introduce un número con hasta dos decimales.">
        </div>
        {$erroresCampos['precio']}
        <div>
            <label for="categoria">Categoría:</label>
            <input type="text" name="categoria" id="categoria" value= "$cat"/>
        </div>
        {$erroresCampos['categoria']}    
     
        <input type="hidden" name="id" value="$id">
     
        <div>
            <label for="especie">Especie:</label>
            <input type="text" name="especie" id="especie"  value="$esp"/>
        </div>
        {$erroresCampos['especie']}
        <div>
            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen"/>
        </div>
     
        <button type="submit">Ingresar</button>
        </fieldset>
        </form>
     
        EOS;
        return $html;
    }

    protected function procesaFormulario(&$datos)
    {
        $name = $datos["nombre"];
        $res = $datos["resumen"];
        $desc = $datos["descripcion"];
        $precio = $datos["precio"];
        $cat = $datos["categoria"];
        $id = $datos["id"];
        $esp = $datos["especie"];

        // Validar si el nombre del producto ya existe en la base de datos
        if ($name != $this->name && !Producto::nombreRepetido($name)) {
            $this->errores['nombre'] = "El nombre de producto ya está en uso.";
        }
        // Si hay errores, retornar false para indicar que el formulario no se procesó correctamente
        if (count($this->errores) > 0) {
            return false;
        }
    
        $esValido = (Producto::edit($name, $res, $desc, $precio, $cat, $id, $esp, ''));

        
        if(isset($_FILES['imagen'])) {
            $nombreArchivo = $_FILES['imagen']['name'];
            $ubicacionTemporal = $_FILES['imagen']['tmp_name'];
            $error = $_FILES['imagen']['error'];
        
            // Obtener el ID del producto después de insertarlo en la base de datos
            if ($id !== false) {
                // Renombrar el archivo de imagen con el ID del producto
                $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                $nuevoNombreArchivo = $id . '.' . $extension;
                $rutaDestino = IMAG . $nuevoNombreArchivo;
                $rutaBD = 'img/' . $nuevoNombreArchivo;
        
                // Mover el archivo a la carpeta de imágenes del proyecto con el nuevo nombre
                if(move_uploaded_file($ubicacionTemporal, $rutaDestino)) {
                    // Actualizar la ruta de la imagen en la base de datos con el nuevo nombre
                    rename($rutaDestino, IMAG . $nuevoNombreArchivo);
                    // Agregar el producto con la ruta de la imagen actualizada
                    $esValido = (Producto::actualizarImagen($id, $rutaBD));
                }
            }
        }
    }
}

?>
