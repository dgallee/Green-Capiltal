<?php
require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';
require_once 'includes/src/usuarios/bd/Item.php';


$tituloPagina = 'Exchanges';

if (!estaLogado()) {
	Utils::paginaError(403, $tituloPagina, 'Usuario no conectado!', 'Debes iniciar sesión para ver el contenido.');
}
else{

    $conn = BD::getInstance()->getConexion();
   
      
             $contenidoPrincipal=<<<EOS
                    <h1>Estas son tus ofertas:</h1>
                    EOS; 

            $exists=0;
            //tengo idusuario

            $queryPost = sprintf("SELECT * FROM post WHERE idPropietario=%d",$_SESSION['idUsuario']);
            $posts = $conn->query($queryPost);

            $item_name_array=array();
            $item_img_array=array();

            $post_item_name_array=array();
            $post_item_img_array=array();

            $exchange_id_array=array();

            $size=0;
            //tengo todos sus posts
            // //tengo todos sus items
           
            foreach($posts as $post){//cada post del usuario tiene ofertas
            
                $queryExchange = sprintf("SELECT * FROM exchanges e WHERE e.idpost=%d",$post['idPost']);
                $exchanges = $conn->query($queryExchange);
                //consigo todos los intercambios que hay con un post

                $post_item_query=sprintf("SELECT * FROM items i WHERE i.id=%d",$post['idItem']);
                $post_item = $conn->query($post_item_query);
                $post_item=$post_item->fetch_assoc();
                //guardo el item del post relacionado
                
                
                foreach($exchanges as $exchange){
                    
                    $queryItem = sprintf("SELECT * FROM items i WHERE i.id=%d",$exchange['id_exchanged_item']);
                    $items = $conn->query($queryItem);
                   
                    //consigo todos los items relacionados con un exchange
                    
                    foreach($items as $item){
                    $item_class=new item($item['id'],$item['idUs'],$item['Nombre'],$item['Descripcion'],$item['Image']);
                    if($item_class->Image=='img/'){//no tiene image;
                        $item_class->Image='img/no_image.png';

                    }
                    // $item_list[]=$item_class;
                    $item_name_array[]=$item_class->Nombre;
                    $item_img_array[]=$item_class->Image;
                    $post_item_name_array[]=$post_item['Nombre'];
                    $post_item_img_array[]=$post_item['Image'];
                    $size=$size+1;
                    $exchange_id_array[]=$size;//aumenta con size
                    $exists=1;
                    }
                }
            

            }
            $RUTACSS=RUTA_CSS."/cuadros.css";
            
            if($exists==0){
                $SingleExchange=<<<EOS
                <h1>No tienes ninguan oferta disponible</h1>
                EOS;
            }
            else{
            $confirmation_dir=RUTA_APP.'/includes/src/process/procesarConfirmacion.php';
            $SingleExchange=<<<EOS
             
            <head>
            <title>Images with Titles</title>
            <link rel="stylesheet" type="text/css" href=$RUTACSS>
            </head>

            EOS;

            for($i=0;$i<$size;$i++){
            $SingleExchange.=<<<EOS
            
            <body>
            <div class="container">
            <div class="left-section">
                <div class="image">
                    
                    <img src="$item_img_array[$i]" alt="Image 1">
                    <div class="title">$item_name_array[$i]</div>

                    </div>
                    
                    </div>
                    <div class="right-section">
                        <div class="image">
                            <img src=$post_item_img_array[$i] alt="$post_item_name_array[$i]">
                            <div class="title">$post_item_name_array[$i]</div>
                            <a href="$confirmation_dir?id=$exchange_id_array[$i]">Aceptar</a></br>
                            
                        </div>
                    </div>
                </div>
            </body>
            EOS;
            }
        }
            $contenidoPrincipal=$contenidoPrincipal.$SingleExchange;
            // $SingleExchange=<<<EOS


            
            // <head>
            // <title>Images with Titles</title>
            // <link rel="stylesheet" type="text/css" href=$RUTACSS>
            // </head>
            //     <body>
            //     <div class="container">
            //     <div class="left-section">
            //         <div class="image">
            // EOS;

            //         for ($i = 0; $i <$size; $i++) {
            //             $SingleExchange.=<<<EOS
            //             <h1>$i</h1>
            //             <h1>$size</h1>
            //             <img src="$item_img_array[$i]" alt="Image 1">
            //             <div class="title">$item_name_array[$i]</div>
                    
            //         EOS;
            //         $SingleExchange.=<<<EOS
            //         </div>
            //             </div>
            //             <div class="right-section">
            //                 <div class="image">
            //                     <img src=$post_item[Image] alt="$post_item[Nombre]">
            //                     <div class="title">$post_item[Nombre]</div>
            //                 </div>
            //             </div>
            //         </div>
            //     </body>
            // EOS;


            
        
            //revisar lo de objetps repetidos y darse items a si mismo

        }
    
    


require 'includes/vistas/comun/layout.php';
