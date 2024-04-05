<?php
require_once __DIR__.'/../helpers/barrabusqueda.php';
require_once __DIR__.'/../../src/FORMULARIOBusqueda.php';


/*
function busqueda(){
        
}*/

?>

<div class="busqueda">
        <p><?php
        
        $form=new MiProyecto\Formularios\FormularioBusqueda();
        
        if($_SERVER['REQUEST_METHOD']==='GET')echo $form->gestiona();  
        else{
                
                
               
               $contenidoPrincipal=$form->gestiona();

              // echo $contenidoPrincipal;
              // require_once RAIZ_APP."/vistas/comun/layout.php";

        }

   
      
        
        
       
        //echo buildFormularioBusqueda();
    
        ?>
</div>