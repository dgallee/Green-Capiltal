<?php
require_once "../../config.php";
use es\ucm\fdi\aw\productos\productosDAO;


$nombre = $_GET['user'];
if (productosDAO::exist($nombre)) {
    echo "producto ya registrado";
} else {
    echo "producto no registrado.";
}
?>