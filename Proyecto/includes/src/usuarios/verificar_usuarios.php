<?php
require_once "../../config.php";
use es\ucm\fdi\aw\usuarios\usuarioDAO;


$nombre = $_GET['user'];
if (usuarioDAO::exist($nombre)) {
    echo "nombre ya registrado";
    
} else {
    echo "nombre no registrado.";
}
?>