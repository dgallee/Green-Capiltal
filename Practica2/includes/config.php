<?php
/* */
/* Parámetros de configuración de la aplicación */
/* */

// Parámetros de configuración generales
define('RUTA_APP', '/Proyecto-AW/Green-Capiltal/Practica2');
define('RUTA_IMGS', RUTA_APP . '/img');
define('RUTA_CSS', RUTA_APP . '/css');
define('RUTA_JS', RUTA_APP . '/js');
define('INSTALADA', true);

// Parámetros de configuración de la BD
define('BD_HOST', 'localhost');
define('BD_NAME', 'greencapital');
define('BD_USER', 'greencapital');
define('BD_PASS', 'greencapital');

/* */
/* Utilidades básicas de la aplicación */
/* */

require_once __DIR__.'/src/Utils.php';

/* */
/* Inicialización de la aplicación */
/* */

if (!INSTALADA) {
	Utils::paginaError(502, 'Error', 'Oops', 'La aplicación no está configurada. Tienes que modificar el fichero config.php');
}

/* */
/* Configuración de Codificación y timezone */
/* */

ini_set('default_charset', 'UTF-8');
setLocale(LC_ALL, 'es_ES.UTF.8');
date_default_timezone_set('Europe/Madrid');

/* */
/* Clases y Traits de la aplicación */
/* */
require_once 'src/Arrays.php';
require_once 'src/traits/MagicProperties.php';

/* */
/* Clases que simulan una BD almacenando los datos en memoria */
/*
require_once 'src/usuarios/memoria/Usuario.php';
require_once 'src/mensajes/memoria/Mensaje.php';
*/

/*
 * Configuramos e inicializamos la sesión para todas las peticiones
 */
session_start([
	'cookie_path' => RUTA_APP, // Para evitar problemas si tenemos varias aplicaciones en htdocs
]);

/* */
/* Inicialización de las clases que simulan una BD en memoria */
/*
Usuario::init();
Mensaje::init();
*/

/* */
/* Clases que usan una BD para almacenar el estado */
/* */
require_once 'src/BD.php';
require_once 'usuarioDAO.php';
