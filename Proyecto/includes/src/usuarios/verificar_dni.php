<?php
require_once "../../config.php";
use es\ucm\fdi\aw\usuarios\usuarioDAO;


$dni = $_GET['dni'];
if (usuarioDAO::exist_dni($dni)) {
    echo "dni ya registrado";
    
} else {
    echo "dni no registrado";
}
?>