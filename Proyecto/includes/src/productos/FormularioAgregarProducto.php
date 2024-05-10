<?php
namespace es\ucm\fdi\aw\productos;
use es\ucm\fdi\aw\productos\productosDAO;
use es\ucm\fdi\aw\Formulario;

class FormularioAgregarProducto extends Formulario {
    public function __construct() {
        parent::__construct('formAgregarProducto', ['urlRedireccion' => 'adminProductos.php', 'method'=>'POST', 'enctype'=>'multipart/form-data']);
    }
    
    protected function generaCamposFormulario(&$datos)
    {
        $htmlErroresGlobales = self::generaListaErroresGlobales($this->errores);
        $erroresCampos = self::generaErroresCampos(['nombre_producto', 'resumen', 'descripcion', 'precio','categoria','existencias','especie'], $this->errores, 'span', array('class' => 'error'));

        $html = <<<EOS
        $htmlErroresGlobales
        <form method="POST" enctype="multipart/form-data">
        <fieldset class="formulario">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre_producto" id="nombre_producto" required>
            <span id="productomal" class="error">  Ya existe este producto</span>
        </div>
        {$erroresCampos['nombre_producto']}  
        <div>
            <label for="resumen">Resumen:</label>
            <input type="text" name="resumen" id="resumen" required>

        </div>
        {$erroresCampos['resumen']}
        <div>
            <label for="descripcion">Descripción:</label>
            <input type="text" name="descripcion" id="descripcion" required>
        </div>
        {$erroresCampos['descripcion']}
        <div>
        <label for="precio">Precio:</label>
        <input type="text" name="precio" id="precio" pattern="^\d+(\.\d{1,2})?$" title="Por favor, introduce un número con hasta dos decimales." required>
        </div>
        {$erroresCampos['precio']}
        <div>
            <label for="categoria">Categoría:</label>
            <select name="categoria" id="categoria">
            <option value='Plantas de interior'>Plantas de interior</option>
            <option value='Plantas de exterior'>Plantas de exterior</option>
            <option value='Plantas exóticas'>Plantas exóticas</option>
            <option value='Flores de temporada'>Flores de temporada</option>
            </select> 
        </div>
        {$erroresCampos['categoria']}    
        <div>
        <label for="existencias">Existencias:</label>
        <input type="number" name="existencias" id="existencias" required>
        </div>
        {$erroresCampos['existencias']}
        <div>
            <label for="especie">Especie:</label>
            <input type="text" name="especie" id="especie" required>
        </div>
        {$erroresCampos['especie']}
        <div>
            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen" required>
            <span id="extension_img" class="error"> Debe ser png o jpg</span>

        </div>
        <button type="submit">Ingresar</button>
        </fieldset>
        </form>
        EOS;

        return $html;
    }
    

    protected function procesaFormulario(&$datos)
    {
        
        $name = $datos['nombre_producto'] ?? '';
        $res = $datos['resumen'] ?? '';
        $desc = $datos['descripcion'] ?? '';
        $precio = $datos['precio'] ?? '';
        $cat = $datos['categoria'] ?? '';
        $existencias = $datos['existencias'] ?? '';
        $esp = $datos['especie'] ?? '';
        $img = $datos['imagen'] ?? '';
        $dniVendedor = $_SESSION['DNI'] ?? '';
        
        // Validar existencias
        if ($existencias < 1) {
            $this->errores['existencias'] = "Las existencias deben ser al menos 1.";
        }
         // Validar si el nombre del producto ya existe en la base de datos
        if (!productosDAO::nombreRepetido($name)) {
            $this->errores['nombre_producto'] = "El nombre de producto ya está en uso.";
        }
        // Si hay errores, retornar false para indicar que el formulario no se procesó correctamente
        if (count($this->errores) > 0) {
            return false;
        }

        $idProducto = productosDAO::add($name, $res, $desc, $precio, $cat, $existencias, $esp, '', $dniVendedor);

        if(isset($_FILES['imagen'])) {
            $nombreArchivo = $_FILES['imagen']['name'];
            $ubicacionTemporal = $_FILES['imagen']['tmp_name'];
            $error = $_FILES['imagen']['error'];
        
            // Obtener el ID del producto después de insertarlo en la base de datos
            if ($idProducto !== false) {
                // Renombrar el archivo de imagen con el ID del producto
                $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                $nuevoNombreArchivo = $idProducto . '.' . $extension;
                $rutaDestino = IMAG . $nuevoNombreArchivo;
                $rutaBD = 'img/' . $nuevoNombreArchivo;
        
                // Mover el archivo a la carpeta de imágenes del proyecto con el nuevo nombre
                if(move_uploaded_file($ubicacionTemporal, $rutaDestino)) {
                    // Actualizar la ruta de la imagen en la base de datos con el nuevo nombre
                    rename($rutaDestino, IMAG . $nuevoNombreArchivo);
                    // Agregar el producto con la ruta de la imagen actualizada
                    $esValido = (productosDAO::actualizarImagen($idProducto, $rutaBD));
        
                    if ($esValido) {
                        header('Location: adminProductos.php');
                    } else {
                        error_log("Hubo un error al agregar el producto.");
                    }
                } else {
                    // Si hay algún error al mover el archivo, redirecciona a una página de error o maneja el error según corresponda
                    error_log("Hubo un error al subir el archivo.");
                }
            } else {
                // Si no se pudo agregar el producto a la base de datos, redirecciona a una página de error o maneja el error según corresponda
                error_log("Hubo un error al agregar el producto.");
            }
        } else {
            // Si no se cargó ningún archivo, redirecciona a una página de error o maneja la situación según corresponda
            error_log("No se cargó ninguna imagen.");
        }
    }




    
}
?>